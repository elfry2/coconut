<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\AlertQueueController;
use App\Models\Item;
use App\Models\History;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ItemController extends Controller
{
    public function index(Request $request)
    {
      $parameters = [];

      if (!empty(PreferenceController::read('dateRange')))
        $parameters['dateRange'] = explode(';', urldecode(PreferenceController::read('dateRange')));

      $maxRecordPerPage = env('APP_MAX_RECORD_PER_PAGE');

      $currentPage = 1;

      $parameters['totalPageCount'] = 1;

      if (isset($request->page)) {
        $currentPage = $request->page;
      }

      $parameters['pageTitle'] = 'Stock Opname';

      $currentItemsCategory = PreferenceController::read('currentItemsCategory');
      if (empty($currentItemsCategory)) {
        $currentItemsCategory = Item::distinct('category')
          ->orderBy('name', 'asc')
          ->pluck('category')
          ->first();
      }

      $currentItemsOrder = PreferenceController::read('currentItemsOrder');

      if(!isset($currentItemsOrder) || empty($currentItemsOrder))
        $currentItemsOrder = 'asc';

      $parameters['items'] = Item::where('stock', '>=', 0);

      if(isset($currentItemsCategory) || !empty($currentItemsCategory)){
        $currentItemsCategory = urldecode($currentItemsCategory);
        $parameters['items'] = Item::where('category', $currentItemsCategory);
      }

      $parameters['items'] = $parameters['items']->orderBy('name', $currentItemsOrder);

      if(isset($request->q) && !empty($request->q))
        PreferenceController::createOrUpdate('currentSearchQuery', $request->q, new Request);

      if (!empty(PreferenceController::read('currentSearchQuery'))) {
        $parameters['currentSearchQuery'] = PreferenceController::read('currentSearchQuery');
        $fuzzifiedSearchQuery = '';

        for($i = 0; $i<strlen($parameters['currentSearchQuery']); $i++) {
          $fuzzifiedSearchQuery.=$parameters['currentSearchQuery'][$i].'%';
        }
        $parameters['items'] = $parameters['items']->where('name', 'LIKE', '%'.$fuzzifiedSearchQuery);
      }

      if ($parameters['items']->count()!=0) {
        $parameters['totalPageCount'] = ceil($parameters['items']
          ->count()/$maxRecordPerPage);
      } else $totalPageCount = 1;

      $parameters['items'] = $parameters['items']->skip(($currentPage-1)*$maxRecordPerPage)
        ->take($maxRecordPerPage);

      $parameters['items'] = $parameters['items']->get();

      $parameters['itemCategories'] = Item::distinct('category')
        ->orderBy('name', 'asc')
        ->pluck('category');

      $parameters['units'] = Item::distinct('unit')->pluck('unit');

      $parameters['currentItemsCategory'] = $currentItemsCategory;

      $parameters['currentItemsOrder'] = $currentItemsOrder;

      $parameters['alerts'] = AlertQueueController::dequeueAll();

      $parameters['maxRecordPerPage'] = $maxRecordPerPage;

      return view('items', $parameters);
    }

    public function create(Request $request)
    {
      Item::create([
        'name'=>$request->name,
        'category'=>$request->category,
        'unit'=>$request->unit,
        'price'=>$request->price
      ]);

      PreferenceController::createOrUpdate('currentItemsCategory', urlencode($request->category), new Request);

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Barang berhasil ditambahkan.'
      ]);

      return redirect(route('item.index'));
    }

    public function delete($id)
    {
      History::where('item_id', $id)->delete();

      Item::where('id', $id)->delete();

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Barang berhasil dihapus.'
      ]);

      return redirect(route('item.index'));
    }

    public function edit($id, Request $request)
    {
      Item::where('id', $id)->update([
        'name'=>$request->name,
        'category'=>$request->category,
        'unit'=>$request->unit,
        'price'=>$request->price
      ]);

      PreferenceController::createOrUpdate('currentItemsCategory', urlencode($request->category), new Request);

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Barang berhasil ditambahkan.'
      ]);

      return redirect(route('item.index'));
    }

    public function generateReport(Request $request)
    {
      $spreadsheet = new Spreadsheet();

      $sheet = $spreadsheet->getActiveSheet();

      $sheet->setCellValue('A1', 'Daftar Stock Opname Barang '.$request->itemsCategory);
      $sheet->setCellValue('A2', 'Per '.date('d F Y', strtotime($request->toDate)));
      $sheet->mergeCells('A1:O1');
      $sheet->mergeCells('A2:O2');
      $sheet->setCellValue('A3', 'No.');
      $sheet->mergeCells('A3:A4');
      $sheet->setCellValue('B3', 'Jenis Barang');
      $sheet->mergeCells('B3:B4');
      $sheet->setCellValue('C3', 'Satuan');
      $sheet->mergeCells('C3:C4');

      $sheet->setCellValue('D3', 'Saldo '.date('d F Y', strtotime($request->fromDate)));
      $sheet->mergeCells('D3:F3');
      $sheet->setCellValue('D4', 'Saldo');
      $sheet->setCellValue('E4', 'Harga Satuan');
      $sheet->setCellValue('F4', 'Total Harga (Rp)');

      $sheet->setCellValue('G3', 'Penambahan Sejak '.date('d F Y', strtotime($request->fromDate)));
      $sheet->mergeCells('G3:I3');
      $sheet->setCellValue('G4', 'Saldo');
      $sheet->setCellValue('H4', 'Harga Satuan');
      $sheet->setCellValue('I4', 'Total Harga (Rp)');

      $sheet->setCellValue('J3', 'Pemakaian Sejak '.date('d F Y', strtotime($request->fromDate)));
      $sheet->mergeCells('J3:L3');
      $sheet->setCellValue('J4', 'Saldo');
      $sheet->setCellValue('K4', 'Harga Satuan');
      $sheet->setCellValue('L4', 'Total Harga (Rp)');

      $sheet->setCellValue('M3', 'Saldo '.date('d F Y', strtotime($request->toDate)));
      $sheet->mergeCells('M3:O3');
      $sheet->setCellValue('M4', 'Saldo');
      $sheet->setCellValue('N4', 'Harga Satuan');
      $sheet->setCellValue('O4', 'Total Harga (Rp)');

      $boldAndCenterStyleArray = [
          'font' => [
              'bold' => true,
          ],
          'alignment' => [
              'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
              'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
          ]
      ];

      $sheet->getStyle('A1:O4')->applyFromArray($boldAndCenterStyleArray);

      $items = Item::where('category', $request->itemsCategory)->get();

      $i = 5;
      foreach ($items as $item) {
        $lastHistoryEntryBeforeFromDate = History::where('item_id', $item->id)->where('created_at', '<=', $request->fromDate.' 00:00:00')->orderBy('created_at', 'desc')->first();
        $historyEntriesBetweenFromDateAndToDate = History::where('item_id', $item->id)->where('created_at', '>=', $request->fromDate.' 00:00:00')->where('created_at', '<=', $request->toDate.' 23:59:59')->orderBy('created_at', 'desc');
        $lastHistoryEntryBeforeToDate = History::where('item_id', $item->id)->where('created_at', '<=', $request->toDate.' 23:59:59')->orderBy('created_at', 'desc')->first();

        $sheet->setCellValue('A'.$i, $i-4);
        $sheet->setCellValue('B'.$i, $item->name);
        $sheet->setCellValue('C'.$i, $item->unit);

        $sheet->setCellValue('D'.$i, isset($lastHistoryEntryBeforeFromDate) ? $lastHistoryEntryBeforeFromDate->stock_after : 0);
        $sheet->setCellValue('E'.$i, $item->price);
        $sheet->setCellValue('F'.$i, (isset($lastHistoryEntryBeforeFromDate) ? $lastHistoryEntryBeforeFromDate->stock_after : 0)*$item->price);

        $sheet->setCellValue('G'.$i, isset($historyEntriesBetweenFromDateAndToDate) ? $historyEntriesBetweenFromDateAndToDate->sum('quantity_in') : 0);
        $sheet->setCellValue('H'.$i, $item->price);
        $sheet->setCellValue('I'.$i, (isset($historyEntriesBetweenFromDateAndToDate) ? $historyEntriesBetweenFromDateAndToDate->sum('quantity_in') : 0)*$item->price);

        $sheet->setCellValue('J'.$i, isset($historyEntriesBetweenFromDateAndToDate) ? $historyEntriesBetweenFromDateAndToDate->sum('quantity_out') : 0);
        $sheet->setCellValue('K'.$i, $item->price);
        $sheet->setCellValue('L'.$i, (isset($historyEntriesBetweenFromDateAndToDate) ? $historyEntriesBetweenFromDateAndToDate->sum('quantity_out') : 0)*$item->price);

        $sheet->setCellValue('M'.$i, isset($lastHistoryEntryBeforeToDate) ? $lastHistoryEntryBeforeToDate->stock_after : 0);
        $sheet->setCellValue('N'.$i, $item->price);
        $sheet->setCellValue('O'.$i++, (isset($lastHistoryEntryBeforeToDate) ? $lastHistoryEntryBeforeToDate->stock_after : 0)*$item->price);
      }

      foreach (range('A', 'Z') as $column) {
        $sheet->getColumnDimension($column)->setAutoSize(true);
      }

      $borderAllStyleArray = [
        'borders' => [
          'allBorders' => [
              'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
          ]
        ]
      ];

      $sheet->getStyle('A3:O'.$i)->applyFromArray($borderAllStyleArray);

      $sheet->mergeCells('A'.$i.':C'.$i);

      $sheet->setCellValue('A'.$i, 'Jumlah');

      foreach (range('D', 'O') as $column) {
        if (!in_array($column, ['E', 'H', 'K', 'N']))
          $sheet->setCellValue($column.$i, '=SUM('.$column.'5:'.$column.($i-1).')');
      }

      $boldStyleArray = [
          'font' => [
              'bold' => true,
          ]
      ];

      $sheet->getStyle('A'.$i.':O'.$i)->applyFromArray($boldStyleArray);

      $writer = new Xlsx($spreadsheet);

      $filePath = 'reports/'.env('APP_NAME').'-'.date('Y-m-d-H-i-s').'.xlsx';
      $file = fopen($filePath, 'w');

      $writer->save($filePath);

      fclose($file);

      return view('download-report',[
        'filePath'=>$filePath,
        'pageTitle'=>'',
        'currentItemsCategory'=>''
      ]);

    }
}
