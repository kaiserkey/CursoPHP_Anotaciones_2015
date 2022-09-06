<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        

    <?php
    //comentario
    /* Otro tipo de comentario comentario */

    //php tiene tipado dinamico por lo que no es necesario decirle de que tipo es cada variable

    $string= "Hello World";
    $char='C';
    $int=2021;
    $double=20.21;
    $boolean=true;
    $fecha= date('24-01-2021');
    //$objeto=new Objeto();
    $arreglo= array("fecha"=>date('24-01-2021'));

    echo 'La variable $string, contiene: ' . $string . " Y es de tipo: " . gettype($string) . "<br><br>";
    echo 'La variable $char, contiene: ' . $char . " Y es de tipo: " . gettype($char) . "<br><br>";
    echo 'La variable $int, contiene: ' . $int . " Y es de tipo: " . gettype($int) . "<br><br>";
    echo 'La variable $double, contiene: ' . $double . " Y es de tipo: " . gettype($double) . "<br><br>";
    echo 'La variable $boolean, contiene: ' . $boolean . " Y es de tipo: " . gettype($boolean) . "<br><br>";
    echo 'La variable $fecha, contiene: ' . $fecha . " Y es de tipo: " . gettype($fecha) . "<br><br>";
    echo 'La variable $arreglo, contiene: '; print_r($arreglo) . " Y es de tipo: "; echo gettype($arreglo) . "<br><br>";

    

    ?>
    <!-- Esto es un comentario en html -->

    </body>
</html>