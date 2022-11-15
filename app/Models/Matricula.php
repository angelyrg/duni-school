<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    public function estudiante(){
        return $this->belongsTo(Estudiante::class);
    }

    public function apoderado(){
        return $this->belongsTo(Apoderado::class);
    }

    public function pagos(){
        return $this->hasMany(Pago::class);
    }

}