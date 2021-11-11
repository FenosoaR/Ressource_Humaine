<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pointage extends Model
{
    use HasFactory;
    protected $fillable=['idPersonnel','datePointage','type','heureE','heureS'];

    public function personnel(){
        return $this->belongsTo(Personnel::class);
            // belongsTo est une relation de one to one
        }
}
