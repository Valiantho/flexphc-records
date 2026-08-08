<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OPDVisit extends Model
{
    protected $fillable = [
        'patient_id',
        'visit_date',
        'complaint',
        'examination',
        'diagnosis',
        'treatment',
        'outcome',
        'created_by',
    ];

    protected $casts = [
        'visit_date' => 'date',
    ];

    /**
     * An OPD visit belongs to a patient.
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}