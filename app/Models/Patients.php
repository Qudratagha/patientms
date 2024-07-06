<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'patients';
    protected  $guarded = [];

    public function medicalHistory(){
        return $this->hasMany('App\Models\MedicalHistory', 'patientID', 'id');
    }

    public function medications(){
        return $this->hasMany('App\Models\Medication', 'patientID', 'id');
    }
}
