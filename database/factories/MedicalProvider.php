<?php

namespace Database\Factories;

use Faker\Provider\Base;

class MedicalProvider extends Base
{
    protected static $medicalHistory = [
        'Diabetes',
        'Hypertension',
        'Asthma',
        'Allergies',
        'Heart Disease',
        'Chronic Pain',
        'Arthritis',
        'Cancer',
        'Depression',
        'Anxiety'
    ];

    protected static $medications = [
        'Metformin',
        'Lisinopril',
        'Albuterol',
        'Amoxicillin',
        'Atorvastatin',
        'Amlodipine',
        'Gabapentin',
        'Omeprazole',
        'Sertraline',
        'Ibuprofen'
    ];

    public function medicalHistory()
    {
        return static::randomElement(static::$medicalHistory);
    }

    public function currentMedications()
    {
        return static::randomElement(static::$medications);
    }
}
