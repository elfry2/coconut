<?php

namespace App\Http\Controllers;

use App\Models\KnownCase;
use Illuminate\Http\Request;
use App\Models\Symptom;
use App\Models\Disease;
use App\Models\Solution;

class ConsultationController extends Controller
{
    public function consult() {
        return view('consultation', [
            'symptoms' => Symptom::all(),
            'pageTitle' => 'Konsultasi',
            'alerts' => AlertQueueController::dequeueAll()
        ]);
    }

    public function result(Request $request) {
        $parameters = [
            'pageTitle' => 'Diagnosis',
            'alerts' => AlertQueueController::dequeueAll()
        ];

        $knownCases = KnownCase::all();

        // Similarity function
        foreach($knownCases as $knownCase) {
            $intersectingSymptoms = array_intersect(
                $request->symptoms, 
                explode(' ', trim($knownCase->symptoms))
            );

            $knownCase->similarity = count($intersectingSymptoms)
            / max(count($request->symptoms), count(explode(' ', trim($knownCase->symptoms))));
        }

        // Evaluation
        foreach($knownCases as $knownCase) {
            $actualSymptoms = [];
            $actualSolutions = [];

            foreach(explode(' ', trim($knownCase->symptoms)) as $symptom) {
                array_push($actualSymptoms, Symptom::find($symptom));
            }

            $knownCase->symptoms = $actualSymptoms;

            foreach(explode(' ', trim($knownCase->solutions)) as $solution) {
                array_push($actualSolutions, Solution::find($solution));
            }
            
            $knownCase->solutions = $actualSolutions;

            $knownCase->disease = Disease::find($knownCase->disease);
        }

        $parameters['givenSymptoms'] = [];

        foreach($request->symptoms as $symptom) {
            array_push(
                $parameters['givenSymptoms'],
                Symptom::find($symptom)
            );
        }

        // Ranking
        $knownCases = $knownCases->sortByDesc('similarity');

        $parameters['diagnosis'] = $knownCases->first();

        //return dd($parameters);
        
        return view('result', $parameters);
    }
}
