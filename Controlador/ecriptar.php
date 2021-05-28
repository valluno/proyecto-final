
<?php

class emcriptar{
 public static function obtenerEncriptacion($texto){

    $passwordHashed = crypt($texto,"pvp");
    return $passwordHashed;
 }
}
    
/*$emcr = new emcriptar();
echo "Encriptacion: " . $emcr::obtenerEncriptacion("admin123456")."<br>";//CONTRASEÑA SIN ENCRIPTAR DEL USUARIO ADMINISTRADOR*/