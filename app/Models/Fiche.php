<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fiche extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'titre_fiche',
        'duree_fiche',
        'classe_fiche',
        'matiere_fiche',
        'nom_module',
        'nom_lecon',
        'nb_eleves',
        'outils_didactiques',
        'obj_pedag',
        'obj_spec',
        'competence',
        'requis_fiche',
        'contenu_fiche',
        'evaluation'
    ];
    /**
     * Get all of the scenarios for the Fiche
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function scenarios()
    {
        return $this->hasMany(Scenario::class, 'fiche_id', 'id');
    }

}
