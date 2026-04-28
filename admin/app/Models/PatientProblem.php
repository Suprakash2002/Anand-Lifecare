<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientProblem extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'status',
        'resolved_at'
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'resolved_at' => 'datetime',
    ];
}
