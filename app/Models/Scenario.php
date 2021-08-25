<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scenario extends Model
{
    use HasFactory;
    protected $fillable = [
        'orga_temps',
        'act_prof',
        'act_eleve',
        'mot_cle'
    ];  
    
    public function fiche()
    {
        return $this->belongsTo(Fiche::class, 'fiche_id');
    }
}
