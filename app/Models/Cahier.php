<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cahier extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'classe_cahier',
        'cours_cahier',
        'date_cahier',
        'activite_cahier',
        'remarque_cahier'
    ];
}
