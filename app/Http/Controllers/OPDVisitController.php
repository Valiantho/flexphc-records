<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\OPDVisit;
use Illuminate\Http\Request;

class OPDVisitController extends Controller
{
    /**
     * Display the OPD consultation form.
     */
    public function create(Patient $patient)
{
    $visits = $patient->opdVisits()
        ->latest('visit_date')
        ->get();

    return view('opd.create', compact(
        'patient',
        'visits'
    ));
}

public function show(Patient $patient, OPDVisit $visit)
{
    abort_if($visit->patient_id !== $patient->id, 404);

    return view('opd.show', compact(
        'patient',
        'visit'
    ));
}

public function edit(Patient $patient, OPDVisit $visit)
{
    abort_if($visit->patient_id !== $patient->id, 404);

    return view('opd.edit', compact(
        'patient',
        'visit'
    ));
}

public function update(Request $request, Patient $patient, OPDVisit $visit)
{
    abort_if($visit->patient_id !== $patient->id, 404);

    $request->validate([
        'complaint' => ['required', 'string'],
        'examination' => ['nullable', 'string'],
        'diagnosis' => ['required', 'string'],
        'treatment' => ['required', 'string'],
        'outcome' => ['required', 'string'],
    ]);

    $visit->update([
        'complaint' => $request->complaint,
        'examination' => $request->examination,
        'diagnosis' => $request->diagnosis,
        'treatment' => $request->treatment,
        'outcome' => $request->outcome,
    ]);

    return redirect()
        ->route('opd.show', [$patient, $visit])
        ->with('success', 'Consultation updated successfully.');
}

/**
     * Save a consultation.
     */
    public function store(Request $request, Patient $patient)
{
    $validated = $request->validate([
        'complaint' => 'required|string',
        'examination' => 'nullable|string',
        'diagnosis' => 'required|string',
        'treatment' => 'required|string',
        'outcome' => 'required|in:Treated,Referred,Admitted,Follow-up',
    ]);

    OPDVisit::create([
        'patient_id' => $patient->id,
        'visit_date' => now(),
        'complaint' => $validated['complaint'],
        'examination' => $validated['examination'] ?? null,
        'diagnosis' => $validated['diagnosis'],
        'treatment' => $validated['treatment'],
        'outcome' => $validated['outcome'],
        'created_by' => auth()->id(),
    ]);

    return redirect()
        ->route('patients.find', [
            'card_number' => $patient->card_number
        ])
        ->with('success', 'Consultation saved successfully.');
}

}