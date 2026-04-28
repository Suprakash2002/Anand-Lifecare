<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    protected $fillable = [
        'doctor_id',
        'department_id',
        'patient_name',
        'patient_email',
        'patient_mobile',
        'appointment_date',
        'available_time',
        'notes'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function department()
    {
        return $this->belongsTo(Speciality::class, 'department_id');
    }

    public function actions()
    {
        return $this->hasMany(AppointmentAction::class);
    }

    public function latestAction()
    {
        return $this->hasOne(AppointmentAction::class)->latestOfMany();
    }

    public function getCurrentStatus()
    {
        $latestAction = $this->latestAction;
        return $latestAction ? $latestAction->status : 'Scheduled';
    }
}