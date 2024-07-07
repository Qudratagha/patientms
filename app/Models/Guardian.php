<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'guardians';
    protected  $guarded = [];
    public function patient(){
        return $this->belongsTo('App\Models\Patients', 'patientID', 'id');
    }
}
