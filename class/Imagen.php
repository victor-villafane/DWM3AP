<?php

class Imagen{
    public function subirImagen($imagen, string $directorio) : string
    {
        if( !empty($imagen["tmp_name"]) ){
            $name = uniqid()."-".$imagen["name"];
            $fileUpload = move_uploaded_file($imagen["tmp_name"], "$directorio/$name");   
            if($fileUpload){
                return $name;
            }else{
                throw new Exception("No se pudo subir la imagen");
            }
        }
    }

    public function borrarImagen(string $filename) : bool
    {
        if( file_exists($filename) ){
            $fileDelete = unlink($filename); 
            if($fileDelete){
                return true;
            }else{
                throw new Exception("No se pudo borrar imagen");
                return false;
            }
        }else{
            return true;
        }
    }
}