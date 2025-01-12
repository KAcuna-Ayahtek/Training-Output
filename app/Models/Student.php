<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'first_name',
        'last_name',
        'email',
        'address',
        'program_id', // Make sure this is included if you're adding the program_id column
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
