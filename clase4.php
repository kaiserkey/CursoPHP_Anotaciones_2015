<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <?php 
            
            //compara si el valor de las variavles es el mismo
            $comparacion1 = 1==1 ? 'verdadero' : 'falso';
            //compara si el valor de las variables es el mismo y son del mismo tipo
            $comparacion2 = 1===1 ? 'verdadero' : 'falso';
            //compara si el valor de las variables es distinto
            $comparacion3 = 1!=1 ? 'verdadero' : 'falso';
            /**
             * compara el valor y el tipo y devuelve verdadero si el valor de las variable nop son iguales
             * y ademas no son del mismo tipo
             */
            $comparacion4 = 1<>1 ? 'verdadero' : 'falso';
            //comprueva si el valor de la variable es mayor que 
            $comparacion5 = 1>0 ? 'verdadero' : 'falso';
            //comprueba que el valor de las variables sea menor que
            $comparacion6 = 1<2 ? 'verdadero' : 'falso';
            //comprueba que el valor de las variables sea mayor o igual que
            $comparacion7 = 1>=1 ? 'verdadero' : 'falso';
            //comprueba que el valor de las variables sea menor o igual que
            $comparacion8 = 1<=1 ? 'verdadero' : 'falso';

            echo 'El resultado de la $comparacion3 es: '.$comparacion3;
        
        ?>

    </body>
</html>