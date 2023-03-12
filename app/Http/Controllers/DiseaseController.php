<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\AlertQueueController;
use App\Models\Disease;

class DiseaseController extends Controller
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

      $parameters['pageTitle'] = 'Penyakit';

      if(!isset($currentDiseasesOrder) || empty($currentDiseasesOrder))
        $currentDiseasesOrder = 'asc';

      $parameters['diseases'] = new Disease;

      if(isset($request->q) && !empty($request->q))
        PreferenceController::createOrUpdate('currentSearchQuery', $request->q, new Request);

      if (!empty(PreferenceController::read('currentSearchQuery'))) {
        $parameters['currentSearchQuery'] = PreferenceController::read('currentSearchQuery');
        $fuzzifiedSearchQuery = '';

        for($i = 0; $i<strlen($parameters['currentSearchQuery']); $i++) {
          $fuzzifiedSearchQuery.=$parameters['currentSearchQuery'][$i].'%';
        }
        $parameters['diseases'] = $parameters['diseases']->where('name', 'LIKE', '%'.$fuzzifiedSearchQuery);
      }

      if ($parameters['diseases']->count()!=0) {
        $parameters['totalPageCount'] = ceil($parameters['diseases']
          ->count()/$maxRecordPerPage);
      } else $totalPageCount = 1;

      $parameters['diseases'] = $parameters['diseases']->skip(($currentPage-1)*$maxRecordPerPage)
        ->take($maxRecordPerPage);

      $parameters['alerts'] = AlertQueueController::dequeueAll();

      $parameters['maxRecordPerPage'] = $maxRecordPerPage;

      $parameters['diseases'] = $parameters['diseases']->get();
      
      return view('diseases', $parameters);
    }

    public function create(Request $request)
    {
      Disease::create([
        'name'=>$request->name
      ]);

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Penyakit berhasil ditambahkan.'
      ]);

      return redirect(route('disease.index'));
    }

    public function delete($id)
    {
      Disease::where('id', $id)->delete();

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Penyakit berhasil dihapus.'
      ]);

      return redirect(route('disease.index'));
    }

    public function edit($id, Request $request)
    {
      Disease::where('id', $id)->update([
        'name'=>$request->name
      ]);

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Penyakit berhasil diperbarui.'
      ]);

      return redirect(route('disease.index'));
    }
}
