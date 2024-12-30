<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filliere extends Model
{
    protected $fillable = ['titre', 'description'];

    public function groupes()
    {
        return $this->hasMany(Groupe::class);
    }
}
