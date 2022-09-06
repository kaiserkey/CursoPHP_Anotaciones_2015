<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    </head>
    <body>
        <?php
            $var1="mvc";
            $var2="MVC";

            //la funcion strcmp compara dos string y devuelve 0 para true y 1 para false
            //hace distincion de mayusculas y minusculas
            //en caso de no distinguir entre mayusculas y minusculas se puede usar strcasecmp
            if(strcmp($var1, $var2)){
                echo "Los textos no son iguales";
            }else{
                echo "Los textos son iguales";
            }
        ?>

    </body>
</html>