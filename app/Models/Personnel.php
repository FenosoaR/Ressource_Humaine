<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnel extends Model
{
    use HasFactory;
    protected $fillable=['idPoste','nom','prenom','dateNaissance','sexe','adresse','CIN','telephone','matricule','email'];
  
    public function poste(){
        return $this->belongsTo(Poste::class);
            // belongsTo est une relation de one to one
        }
}
