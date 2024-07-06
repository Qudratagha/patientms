<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'medical_histories';
    protected  $guarded = [];

    public function patient(){
        return $this->belongsTo('App\Models\Patients', 'patientID', 'id');
    }
}
