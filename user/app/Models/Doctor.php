<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'department_id',
        'specialization'
    ];

    public function department()
    {
        return $this->belongsTo(Speciality::class, 'department_id');
    }
}