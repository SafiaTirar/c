<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    protected $fillable = ['libelle', 'filliere_id'];

    public function filiere()
    {
        return $this->belongsTo(Filliere::class);
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}

