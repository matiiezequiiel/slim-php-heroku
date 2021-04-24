<?php

class Archivo{

    //CSV
    
    static function LeerCsv($path)
    {
        $a=array();

        if(($archivo=fopen($path,"r")) != false)
        {
            while(($dato = fgetcsv($archivo)) != false)
            {
                array_push($a,new Usuario($dato[0],$dato[1],$dato[2])) ; 
            }

        }

        fclose($archivo);

        return $a;
    }

    
    static function GuardarCsv($obj,$path)
    {
        $altaCorrecta=false;
          
        // $miArchivo = fopen("usuarios.csv", "a"); //Guardo el puntero al archivo que voy a escribir.
        $miArchivo = fopen($path, "a"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, $obj->usuario . "," . $obj->clave . "," .
        $obj->mail . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;
    }

    // JSON

    static function LeerJSON($path)
    {
        $a=array();
        $b=array();

     
        if(($archivo=fopen($path,"r")) != false)
        {
            $dato = fread($archivo,filesize($path));
            $a=json_decode($dato);
              
        }

        foreach ($a as $key) {
            array_push($b,new Usuario($key->usuario,$key->clave,$key->mail,$key->id,$key->fecha)) ;
        }

        fclose($archivo);

        return $b;
    }

    static function GuardarJSON($obj,$path)
    {
        $altaCorrecta=false;
        $a=Usuario::LeerJSON($path);
        array_push($a,$obj);
          
        $miArchivo = fopen($path, "w"); //Guardo el puntero al archivo que voy a escribir.
        $retorno= fwrite($miArchivo, json_encode($a,JSON_PRETTY_PRINT) . "\n");

        if($retorno != false)
        {
            $altaCorrecta=true;
        }

        fclose($miArchivo);

        return $altaCorrecta;

    }

    function GuardarImagen($destino)
    {
        $altaCorrecta=false;
        $extArchivo = explode(".", $_FILES ["archivo"] ["name"]);
        $nombre= explode("@", $this->mail);
        $destino .= $nombre[0] . "." . $extArchivo[1];

        if($extArchivo[1] == "jpg")
         {
            if(move_uploaded_file( $_FILES["archivo"] ["tmp_name"],$destino))
            {
                $altaCorrecta=true;
            }

        }

        return $altaCorrecta;      

    }




}





?>