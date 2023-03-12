<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\AlertQueueController;
use App\Models\Solution;

class SolutionController extends Controller
{
    public function index(Request $request)
    {
      $parameters = [];

      $maxRecordPerPage = env('APP_MAX_RECORD_PER_PAGE');

      $currentPage = 1;

      $parameters['totalPageCount'] = 1;

      if (isset($request->page)) {
        $currentPage = $request->page;
      }

      $parameters['pageTitle'] = 'Solusi';

      if(!isset($currentSolutionsOrder) || empty($currentSolutionsOrder))
        $currentSolutionsOrder = 'asc';

      $parameters['solutions'] = new Solution;

      if(isset($request->q) && !empty($request->q))
        PreferenceController::createOrUpdate('currentSearchQuery', $request->q, new Request);

      if (!empty(PreferenceController::read('currentSearchQuery'))) {
        $parameters['currentSearchQuery'] = PreferenceController::read('currentSearchQuery');
        $fuzzifiedSearchQuery = '';

        for($i = 0; $i<strlen($parameters['currentSearchQuery']); $i++) {
          $fuzzifiedSearchQuery.=$parameters['currentSearchQuery'][$i].'%';
        }
        $parameters['solutions'] = $parameters['solutions']->where('name', 'LIKE', '%'.$fuzzifiedSearchQuery);
      }

      if ($parameters['solutions']->count()!=0) {
        $parameters['totalPageCount'] = ceil($parameters['solutions']
          ->count()/$maxRecordPerPage);
      } else $totalPageCount = 1;

      $parameters['solutions'] = $parameters['solutions']->skip(($currentPage-1)*$maxRecordPerPage)
        ->take($maxRecordPerPage);

      $parameters['alerts'] = AlertQueueController::dequeueAll();

      $parameters['maxRecordPerPage'] = $maxRecordPerPage;

      $parameters['solutions'] = $parameters['solutions']->get();
      
      return view('solutions', $parameters);
    }

    public function create(Request $request)
    {
      Solution::create([
        'name'=>$request->name
      ]);

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Solusi berhasil ditambahkan.'
      ]);

      return redirect(route('solution.index'));
    }

    public function delete($id)
    {
      Solution::where('id', $id)->delete();

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Solusi berhasil dihapus.'
      ]);

      return redirect(route('solution.index'));
    }

    public function edit($id, Request $request)
    {
      Solution::where('id', $id)->update([
        'name'=>$request->name
      ]);

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Solusi berhasil diperbarui.'
      ]);

      return redirect(route('solution.index'));
    }
}
