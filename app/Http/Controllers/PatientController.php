<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\OPDVisit;

class PatientController extends Controller
{
    /**
     * Display the patient registration form.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created patient.
     */
    public function store(Request $request)
    {
        Patient::create([
            'card_number' => $request->card_number,
            'surname' => $request->surname,
            'first_name' => $request->first_name,
            'other_name' => $request->other_name,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'occupation' => $request->occupation,
            'next_of_kin' => $request->next_of_kin,
            'next_of_kin_phone' => $request->next_of_kin_phone,
            'status' => true,
            'created_by' => auth()->id(),
        ]);

        
return redirect('/patients/create')
    ->with('success', 'Patient registered successfully.');    }

    /**
 * Display the patient search page.
 */
public function search()
{
    return view('patients.search');
}

public function find(Request $request)
{
    $patient = Patient::where(
        'card_number',
        $request->card_number
    )->first();

    if (!$patient) {
        return redirect()
            ->route('patients.search')
            ->with('error', 'Patient not found.');
    }

    $visits = $patient->opdVisits()
        ->latest('visit_date')
        ->get();

    return view('patients.result', [
        'patient' => $patient,
        'visits' => $visits,
    ]);
}



}   
