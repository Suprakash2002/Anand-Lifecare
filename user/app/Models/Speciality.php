<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'name',
        'description'
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'department_id');
    }
}
