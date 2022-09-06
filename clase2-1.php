<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <?php
        //funciones en php

        function dameDatos2() {

            $nombre="Maria";
            $edad=18;

            return "El nombre es: ".$nombre." Y la edad es: ". $edad. "<br><br>";
        }

        function dameDatos3() {
            echo "<h1>Esto es una funcion que no devuelve nada</h1><br><br>";
        }

        echo "<br>Esta funcion retorna ->" . dameDatos2();

        dameDatos3();

        ?>
    </body>
</html>