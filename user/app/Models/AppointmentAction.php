<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentAction extends Model
{
    protected $fillable = [
        'appointment_id',
        'status',
        'notes'
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
