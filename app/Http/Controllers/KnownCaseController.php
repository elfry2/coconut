<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PreferenceController;
use App\Http\Controllers\AlertQueueController;
use App\Models\KnownCase;
use App\Models\Symptom;
use App\Models\Solution;
use App\Models\Disease;

class KnownCaseController extends Controller
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

      $parameters['pageTitle'] = 'Kasus';

      $parameters['knownCases'] = new KnownCase;

      $parameters['knownCases'] = $parameters['knownCases']->orderBy('created_at', 'desc');

      if(isset($request->q) && !empty($request->q))
        PreferenceController::createOrUpdate('currentSearchQuery', $request->q, new Request);

      if (!empty(PreferenceController::read('currentSearchQuery'))) {
        $parameters['currentSearchQuery'] = PreferenceController::read('currentSearchQuery');
        $fuzzifiedSearchQuery = '';

        for($i = 0; $i<strlen($parameters['currentSearchQuery']); $i++) {
          $fuzzifiedSearchQuery.=$parameters['currentSearchQuery'][$i].'%';
        }
        $parameters['knownCases'] = $parameters['knownCases']->where('name', 'LIKE', '%'.$fuzzifiedSearchQuery);
      }

      if ($parameters['knownCases']->count()!=0) {
        $parameters['totalPageCount'] = ceil($parameters['knownCases']
          ->count()/$maxRecordPerPage);
      } else $totalPageCount = 1;

      $parameters['knownCases'] = $parameters['knownCases']->skip(($currentPage-1)*$maxRecordPerPage)
        ->take($maxRecordPerPage);

      $parameters['alerts'] = AlertQueueController::dequeueAll();

      $parameters['maxRecordPerPage'] = $maxRecordPerPage;

      $parameters['knownCases'] = $parameters['knownCases']->get();
      
      foreach ($parameters['knownCases'] as $knownCase) {
        $symptomsString = "";
        
        $symptomIds = explode(' ', $knownCase->symptoms);

        foreach($symptomIds as $symptomId) {
          $symptomsString .= !is_null(Symptom::find($symptomId))
            ? Symptom::find($symptomId)->name . ', ' : null;
        }

        $knownCase->symptoms = substr($symptomsString, 0, -2);

        $knownCase->disease = Disease::find($knownCase->disease)->name;
        
        $solutionsString = "";
        
        $solutionIds = explode(' ', $knownCase->solutions);

        foreach($solutionIds as $solutionId) {
          $solutionsString .= !is_null(Solution::find($solutionId))
          ? Solution::find($solutionId)->name . ', ' : null;
        }

        $knownCase->solutions = substr($solutionsString, 0, -2);
      }

      return view('known-cases', $parameters);
    }

    public function create(Request $request)
    {
      if (isset($request->symptoms)
        || isset($request->disease)
        || isset($request->solutions)) {
          $symptoms = "";

          foreach($request->symptoms as $symptom) {
            $symptoms .= $symptom . ' ';
          }

          $solutions = "";

          foreach($request->solutions as $solution) {
            $solutions .= $solution . ' ';
          }

          KnownCase::create([
            'symptoms'=>$symptoms,
            'disease'=>$request->disease,
            'solutions'=>$solutions,
          ]);
    
          AlertQueueController::enqueue([
            'type'=>'success',
            'message'=>'Kasus berhasil ditambahkan.'
          ]);
    
          return redirect(route('knownCase.index'));
      }

      $parameters = [];
      
      $parameters['pageTitle'] = 'Tambah kasus';

      $parameters['symptoms'] = Symptom::all();

      $parameters['diseases'] = Disease::all();

      $parameters['solutions'] = Solution::all();

      $parameters['alerts'] = AlertQueueController::dequeueAll();

      $parameters['backButtonURL'] = route('knownCase.index');

      return view('new-case', $parameters);
    }

    public function delete($id)
    {
      KnownCase::where('id', $id)->delete();

      AlertQueueController::enqueue([
        'type'=>'success',
        'message'=>'Kasus berhasil dihapus.'
      ]);

      return redirect(route('knownCase.index'));
    }

    public function edit($id, Request $request)
    {
      if (isset($request->symptoms)
        || isset($request->disease)
        || isset($request->solutions)) {
          $symptoms = "";

          foreach($request->symptoms as $symptom) {
            $symptoms .= $symptom . ' ';
          }

          $solutions = "";

          foreach($request->solutions as $solution) {
            $solutions .= $solution . ' ';
          }

          KnownCase::where('id', $id)->update([
            'symptoms'=>$symptoms,
            'disease'=>$request->disease,
            'solutions'=>$solutions,
          ]);
    
          AlertQueueController::enqueue([
            'type'=>'success',
            'message'=>'Kasus berhasil diperbarui.'
          ]);
    
          return redirect(route('knownCase.index'));
      }

      $parameters = [];

      $parameters['knownCase'] = KnownCase::find($id);

      $parameters['pageTitle'] = "Perbarui rincian kasus \"" 
      . $parameters['knownCase']->created_at . "\"";

      $parameters['symptoms'] = Symptom::all();

      $parameters['diseases'] = Disease::all();

      $parameters['solutions'] = Solution::all();

      $parameters['alerts'] = AlertQueueController::dequeueAll();

      $parameters['backButtonURL'] = route('knownCase.index');

      $parameters['knownCase']->symptoms
      = explode(' ', $parameters['knownCase']->symptoms);
      
      $parameters['knownCase']->solutions
      = explode(' ', $parameters['knownCase']->solutions);

      return view('edit-case', $parameters);
    }
}
