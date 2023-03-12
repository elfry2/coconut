<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\AlertQueueController;
use App\Models\Symptom;

class SymptomController extends Controller
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

      $parameters['pageTitle'] = 'Gejala';

      if(!isset($currentSymptomsOrder) || empty($currentSymptomsOrder))
        $currentSymptomsOrder = 'asc';

      $parameters['symptoms'] = new Symptom;

      if(isset($request->q) && !empty($request->q))
        PreferenceController::createOrUpdate('currentSearchQuery', $request->q, new Request);

      if (!empty(PreferenceController::read('currentSearchQuery'))) {
        $parameters['currentSearchQuery'] = PreferenceController::read('currentSearchQuery');
        $fuzzifiedSearchQuery = '';

        for($i = 0; $i<strlen($parameters['currentSearchQuery']); $i++) {
          $fuzzifiedSearchQuery.=$parameters['currentSearchQuery'][$i].'%';
        }
        $parameters['symptoms'] = $parameters['symptoms']->where('name', 'LIKE', '%'.$fuzzifiedSearchQuery);
      }

      if ($parameters['symptoms']->count()!=0) {
        $parameters['totalPageCount'] = ceil($parameters['symptoms']
          ->count()/$maxRecordPerPage);
      } else $totalPageCount = 1;

      $parameters['symptoms'] = $parameters['symptoms']->skip(($currentPage-1)*$maxRecordPerPage)
        ->take($maxRecordPerPage);

      $parameters['alerts'] = AlertQueueController::dequeueAll();

      $parameters['maxRecordPerPage'] = $maxRecordPerPage;

      $parameters['symptoms'] = $parameters['symptoms']->get();
      
      return view('symptoms', $parameters);
    }

    public function create(Request $request)
    {
      Symptom::create([
        'name'=>$request->name
      ]);

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Gejala berhasil ditambahkan.'
      ]);

      return redirect(route('symptom.index'));
    }

    public function delete($id)
    {
      Symptom::where('id', $id)->delete();

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Gejala berhasil dihapus.'
      ]);

      return redirect(route('symptom.index'));
    }

    public function edit($id, Request $request)
    {
      Symptom::where('id', $id)->update([
        'name'=>$request->name
      ]);

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Gejala berhasil diperbarui.'
      ]);

      return redirect(route('symptom.index'));
    }
}
