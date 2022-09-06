<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #container{
                padding: 10px;
                margin: 5px auto;
                height: 200px;
                width:300px;
                background-color: antiquewhite;
                border: 1px solid black;
            }

            #container input{
                display: block;
            }

            label{
                font-family: Arial, Helvetica, sans-serif;
                font-size:large;
                display: block;
                text-align: center;
            }

            input{
                margin: 5px auto;
            }

            div{
                text-align: center;
                font-family: fantasy;
                font-size: small;
                font-weight:lighter;
                color: brown;
                letter-spacing: 1px;
                margin-top: 10px;
            }
        </style>
    </head>
    <?
        if(isset($_POST['enviar'])){
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];

            if ($nombre == "daniel" && $password == "123"){
                $mostrar = "Login correcto";
            }else{
                $mostrar = "Login incorrecto";
            }
        }
    ?>
    <body>
        <section id="container">
            <form action="<? echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="">
                <input type="submit" value="Enviar" name="enviar">
                <div>
                    <? echo $mostrar; ?>
                </div>
            </form>
        </section>
    </body>
</html>