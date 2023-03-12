<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\AlertQueueController;
use App\Models\Item;
use App\Models\History;

class HistoryController extends Controller
{
    public function index(Request $request, $itemId)
    {
      $maxRecordPerPage = env('APP_MAX_RECORD_PER_PAGE');

      $currentPage = 1;

      $parameters['totalPageCount'] = 1;

      if (isset($request->page)) {
        $currentPage = $request->page;
      }

      $item = Item::find($itemId);

      if (!empty(PreferenceController::read('dateRange')))
        $parameters['dateRange'] = explode(';', urldecode(PreferenceController::read('dateRange')));

      $maxRecordPerPage = env('APP_MAX_RECORD_PER_PAGE');

      $currentPage = 1;

      $parameters['totalPageCount'] = 1;

      if (isset($request->page)) {
        $currentPage = $request->page;
      }

      $parameters['itemId'] = $itemId;

      $parameters['pageTitle'] = 'Riwayat keluar-masuk "'.$item->name.'"';

      $parameters['history'] = History::where('item_id', $itemId);

      $currentHistoryOrder = PreferenceController::read('currentHistoryOrder');

      if (empty($currentHistoryOrder)) $currentHistoryOrder = 'desc';

      $parameters['history'] =
        $parameters['history']->orderBy(
          'created_at',
          empty($currentHistoryOrder) | $currentHistoryOrder == 'desc' ? 'desc' : 'asc'
        );

        $currentItemsCategory = PreferenceController::read('currentItemsCategory');
        if (empty($currentItemsCategory)) {
          $currentItemsCategory = Item::distinct('category')
            ->orderBy('name', 'asc')
            ->pluck('category')
            ->first();
        }

      if (!empty($parameters['dateRange'])){
        $parameters['history'] =
          $parameters['history']->where('created_at', '>=', $parameters['dateRange'][0]. ' 00:00:00')
            ->where('created_at', '<=', $parameters['dateRange'][1]. ' 23:59:59');
      }

      if ($parameters['history']->count()!=0) {
        $parameters['totalPageCount'] = ceil($parameters['history']
          ->count()/$maxRecordPerPage);
      } else $totalPageCount = 1;

      $parameters['history'] = $parameters['history']->get();

      $parameters['history'] = $parameters['history']->skip(($currentPage-1)*$maxRecordPerPage)
        ->take($maxRecordPerPage);

      $parameters['alerts'] = AlertQueueController::dequeueAll();

      $parameters['backButtonURL'] = route('item.index');

      $parameters['item'] = $item;

      $parameters['currentHistoryOrder'] =
        $currentHistoryOrder;

      $parameters['maxRecordPerPage'] = $maxRecordPerPage;

      $parameters['currentItemsCategory'] = '';

      return view('history', $parameters);
    }

    public function create(Request $request)
    {
      $item = Item::find($request->itemId);

      $createdAt = ($request->date . ' ' . $request->time);

      $previousEntry = History::where('item_id', $request->itemId)
        ->where('created_at', '<', $createdAt)
        ->orderBy('created_at', 'desc')
        ->first();

      $stockAfter = ((empty($previousEntry->stock_after) ? 0 : $previousEntry->stock_after) + $request->quantityIn - $request->quantityOut);

      History::create([
        'created_at'=>$createdAt,
        'item_id'=>$request->itemId,
        'quantity_in'=>$request->quantityIn,
        'quantity_out'=>$request->quantityOut,
        'stock_after'=>$stockAfter,
        'person_in_charge'=>$request->personInCharge,
        'description'=>$request->description
      ]);

      Item::where('id', $request->itemId)
        ->update([
          'stock'=>$stockAfter
        ]);

      // BEGIN recalculate order
      $laterEntries = History::where('item_id', $request->itemId)
        ->where('created_at', '>=', $createdAt)
        ->orderBy('created_at', 'asc')
        ->get();

      foreach ($laterEntries as $entry) {
        $previousEntry = History::where('item_id', $request->itemId)
          ->where('created_at', '<', $entry->created_at)
          ->orderBy('created_at', 'desc')
          ->first();

        $stockAfter = (empty($previousEntry->stock_after) ? 0 : $previousEntry->stock_after) + $entry->quantity_in - $entry->quantity_out;

        History::where('id', $entry->id)->update([
          'stock_after'=>$stockAfter
        ]);

        Item::where('id', $entry->item_id)->update([
          'stock'=>$stockAfter
        ]);
      }
      // END recalculate order

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Riwayat keluar-masuk berhasil ditambahkan.'
      ]);

      return redirect(route('history.index', ['id'=>$request->itemId]));
    }

    public function delete($id)
    {
      $history = History::find($id);

      $item = Item::find($history->item_id);

      $stockAfter = ($item->stock - $history->quantity_in + $history->quantity_out);

      Item::where('id', $history->item_id)->update([
        'stock'=>$stockAfter
      ]);

      History::where('id', $id)->delete();

      // BEGIN recalculate order
      $laterEntries = History::where('item_id', $history->item_id)
        ->where('created_at', '>=', $history->created_at)
        ->orderBy('created_at', 'asc')
        ->get();

      foreach ($laterEntries as $entry) {
        $previousEntry = History::where('item_id', $history->item_id)
          ->where('created_at', '<', $entry->created_at)
          ->orderBy('created_at', 'desc')
          ->first();

        $stockAfter = (empty($previousEntry->stock_after) ? 0 : $previousEntry->stock_after) + $entry->quantity_in - $entry->quantity_out;

        History::where('id', $entry->id)->update([
          'stock_after'=>$stockAfter
        ]);

        Item::where('id', $entry->item_id)->update([
          'stock'=>$stockAfter
        ]);
      }
      // END recalculate order

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Riwayat keluar-masuk berhasil dihapus.'
      ]);

      return redirect(route('history.index', ['id'=>$history->item_id]));
    }

    public function edit($id, Request $request)
    {
      $item = Item::find($request->itemId);

      $createdAt = ($request->date . ' ' . $request->time);

      $previousEntry = History::where('item_id', $request->itemId)
        ->where('created_at', '<', $createdAt)
        ->orderBy('created_at', 'asc')
        ->first();

      $stockAfter = (empty($previousEntry->stock_after) ? 0 : $previousEntry->stock_after) + $request->quantityIn - $request->quantityOut;

      History::where('id', $id)->update([
        'created_at'=>$createdAt,
        'item_id'=>$request->itemId,
        'quantity_in'=>$request->quantityIn,
        'quantity_out'=>$request->quantityOut,
        'stock_after'=>$stockAfter,
        'person_in_charge'=>$request->personInCharge,
        'description'=>$request->description
      ]);

      Item::where('id', $request->itemId)
        ->update([
          'stock'=>$stockAfter
        ]);

      $history = History::find($id);

      // BEGIN recalculate order
      $laterEntries = History::where('item_id', $history->item_id)
        ->where('created_at', '>=', $history->created_at)
        ->get();

      foreach ($laterEntries as $entry) {
        $previousEntry = History::where('item_id', $history->item_id)
          ->where('created_at', '<', $entry->created_at)
          ->orderBy('created_at', 'desc')
          ->first();

        $stockAfter = (empty($previousEntry->stock_after) ? 0 : $previousEntry->stock_after) + $entry->quantity_in - $entry->quantity_out;

        History::where('id', $entry->id)->update([
          'stock_after'=>$stockAfter
        ]);

        Item::where('id', $entry->item_id)->update([
          'stock'=>$stockAfter
        ]);
      }
      // END recalculate order

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Riwayat keluar-masuk berhasil disunting.'
      ]);

      return redirect(route('history.index', ['id'=>$request->itemId]));
    }
}
