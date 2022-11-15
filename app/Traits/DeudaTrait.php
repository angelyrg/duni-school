<?php

namespace App\Traits;

use App\Models\Matricula;

trait DeudaTrait{

    // public function restarDeuda($matricula_id, $monto, ){
    //     $user = new User();
    //     $user->name = $name;
    //     $user->username = $username;
    //     $user->password = Hash::make($password);
    //     $user->rol = $rol;
    //     $user->save();

    //     return $user->id;
    // }

    public function updateDeuda($matricula_id, $monto){
        $matricula = Matricula::findOrFail($matricula_id);
        $matricula->deuda = $matricula->deuda - $monto;
        $matricula->save();

    }

    public function deletePago($matricula_id, $monto){
        $matricula = Matricula::findOrFail( $matricula_id );
        $matricula->deuda = $matricula->deuda + $monto;
        $matricula->delete();
    }


}




