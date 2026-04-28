<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_name',
        'patient_email',
        'patient_mobile',
        'doctor_id',
        'department_id',
        'appointment_date',
        'available_time',
        'notes',
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function actions()
    {
        return $this->hasMany(AppointmentAction::class);
    }

    public function latestAction()
    {
        return $this->hasOne(AppointmentAction::class)->latestOfMany();
    }

    /**
     * Get the current status from the latest action
     */
    public function getCurrentStatus()
    {
        $latestAction = $this->latestAction;
        return $latestAction ? $latestAction->status : 'Scheduled';
    }

    /**
     * Check if the appointment time has passed (end time)
     */
    public function isPast()
    {
        // Parse available_time (e.g., "09:00 AM - 10:00 AM")
        if ($this->available_time && strpos($this->available_time, ' - ') !== false) {
            $times = explode(' - ', $this->available_time);
            $endTime = date('H:i:s', strtotime($times[1]));
        } else {
            // Fallback if format is different
            $endTime = '23:59:59';
        }
        
        $appointmentDateTime = \Carbon\Carbon::parse($this->appointment_date . ' ' . $endTime);
        return $appointmentDateTime->isPast();
    }

    /**
     * Check if appointment is editable (not past and not cancelled/completed)
     */
    public function isEditable()
    {
        // Cannot edit if time has passed
        if ($this->isPast()) {
            return false;
        }
        
        $currentStatus = $this->getCurrentStatus();
        
        // Cannot edit if already cancelled or completed
        if (in_array($currentStatus, ['Cancelled', 'Completed'])) {
            return false;
        }
        
        return true;
    }
}
