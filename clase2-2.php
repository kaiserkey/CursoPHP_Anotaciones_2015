<?php
    $nombre = "Daniel";
    
    function cambiarNOmbre(&$nombre){
        $nombre= "Juan";
    }

    function cambiarNOmbre2(){
        global $nombre;
        $nombre= "Pepe";
    }

    echo "<br>El nombre original es: " . $nombre;

    cambiarNOmbre2($nombre);

    echo "<br><br>El nombre luego de ser cambiado por la funcion es: " . $nombre;

    cambiarNOmbre($nombre);

    echo "<br><br>El nombre luego de ser cambiado por referencia dentro de la funcion es: " . $nombre;
?>