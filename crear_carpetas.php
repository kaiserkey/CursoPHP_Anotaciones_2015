<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <style>
        body {
            padding: 0;
            margin: 0;
        }

        section {
            padding: 10px;
            width: 500px;
            height: 500px;
            margin: 10px auto;
            text-align: center;
            background-color: blueviolet;
            border: 3px solid blue;
            border-radius: 10px;

        }

        textarea {
            margin-top: 10px;
            margin-bottom: 10px;
            display: block;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            font-weight: bolder;
            color: red;
        }

        input {
            padding: 20px;
            background-color: bisque;
            border-radius: 10px;
        }

        div {
            font-size: 18px;
            color: darkgreen;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: lighter;
            font-style: italic;
        }
    </style>
    <body>
    <?
            if(isset($_POST['crear'])){
                $texto = $_POST['nombres'];
                $arregloDeNombres = explode(",", $texto);
                $ruta = trim($_POST['ruta']);
                $mensajes = array();

                if(!empty($texto)){
                    foreach($arregloDeNombres as $valor) {
                        if(strlen($valor) < 1 || $valor == ' ') {
                            array_push($mensajes, "La carpeta debe tener un nombre correcto.");
                        }else{
                            if(file_exists($valor)) {
                                array_push($mensajes, "La carpeta $valor ya existe.");
                            }else{
                                shell_exec('mkdir ' . "\"../../../../../$ruta/$valor\"" .' -m 777');
                            }
                        }
                    }

                    foreach($arregloDeNombres as $valor) {
                        if(file_exists("../../../../../$ruta/$valor")){
                            array_push($mensajes,"La carpeta $valor fue creada exitosamente");
                        }else{
                            array_push($mensajes,"La carpeta $valor no se ha podido crear");
                        }
                    }
                }else {
                    array_push($mensajes,"NO SE HA INGRESADO NINGUN NOMBRE PARA CREAR CARPETAS");
                }

            }
        ?>
        <section>
            <form action="<? echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="nombres"><h3>Ingresar los nombres de las carpetas separadas por comas.</h3></label>
                <div>
                    <? echo "El directorio actual es: " . getcwd(); ?>
                </div>
                <textarea rows="10" cols="47" id="nombres" name="nombres"></textarea>
                <input type="text" name="ruta" id="ruta" placeholder="Directorio">
                <input type="submit" value="Crear Carpetas" name="crear">
                <div>
                    <?
                        foreach ($mensajes as $valor) {
                            echo "<br> $valor";
                        }
                    ?>
                </div>
            </form>
        </section>
    </body>
</html>