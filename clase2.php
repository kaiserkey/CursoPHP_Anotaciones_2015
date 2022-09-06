<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <?php

        //funciones en php

        function dameDatos() {

            $nombre="Juan";
            $edad=23;

            return "El nombre es: ".$nombre." Y la edad es: ". $edad . "<br><br>";
        }

        echo damedatos();

        //tambien se puede utilizar la palabra reservada include 
        //para llamar a funciones de otros archivos en php

        include("clase2-1.php");

        //para que una variable conserve su valor cuando la funcion muere o termina su ejecucuin
        //se debe usar la palabra reservada static
        function contador(){

            static $contador=0;
            $contador++;

            echo "El valor de contador es: ".$contador."<br><br>";

        }

        echo contador();
        echo contador();
        echo contador();
        echo contador();

        ?>
    </body>
</html>
