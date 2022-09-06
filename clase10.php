<!DOCTYPE html>
<html lang="es">
<head>
<title>Formulario de Prueba DB</title>
<meta charset="utf-8">
<style>
    *{
        padding: 0;
        margin: 0;
    }
    body{
        background-color:blueviolet;
        font-family: Arial, Helvetica, sans-serif;
    }
    #contenido_principal{
        margin: 150px auto;
        width: 600px;
    }
    .texto{
        text-align: left;
    }
    .input{
        text-align: center;
    }
    table{
        background-color:bisque;
        width: 100%;
        border-collapse: collapse;
        border-radius: 20px;
    }
    thead{
        background-color: rgb(10, 68, 10);
        color: white;
        border-bottom: green 5px solid;
    }
    th, td{
        padding: 20px;
    }
    .boton{
        padding: 20px;
        height: 70px;
        width: 200px;
        color:antiquewhite;
        background-color: red;
        border-radius: 30px;
        font-size: 25px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }
    .boton-align{
        text-align: center;
    }

    .datos{
        height: 30px;
        width: 100%;
        font-size: 20px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

</style>
</head>
<body>
    <?
        if(isset($_POST['enviar'])){

            //datos recibidos
            $id=$_POST['codigo'];
            $seccion=$_POST['seccion'];
            $nombreart=$_POST['nombre'];
            $precio=$_POST['precio'];
            $fecha=$_POST['fecha'];
            $importado=$_POST['importado'];
            $pais=$_POST['pais'];
            
            $db_host="localhost";
            $db_nombre="registro_producto";
            $db_usuario="root";
            $db_contrasena="";

            $con = mysqli_connect($db_host, $db_usuario, $db_contrasena);

            if(mysqli_connect_errno()){
                echo "Error: Nose puede conectar con la base de datos";
                exit();
            }
            mysqli_select_db($con, $db_nombre) or die("No se encuentra la BBDD");
            mysqli_set_charset($con, "utf8");    

            $insert = "INSERT INTO producto(id,
                                            seccion,
                                            nombre_articulo,
                                            precio,
                                            fecha, 
                                            importado, 
                                            pais_origen)
                    VALUES(?, ?, ?, ?, ?, ?, ?)";
            
            $resultado= mysqli_prepare($con, $insert);

            $ejecutarConsulta = mysqli_stmt_bind_param($resultado, 'ississs', $id, $seccion, $nombreart, $precio, $fecha, $importado, $pais);

            $ejecutarConsulta = mysqli_stmt_execute($resultado);
            

            if($ejecutarConsulta==false){
                echo "Error: No Se Pudo Insertar Los Datos";
            }else{
                
                echo "Se Insertado los datos correctamente...";
            }
            
            mysqli_stmt_close($resultado);
            
        }
        
        
    ?>
    <div id="contenido_principal">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <table>
                <thead>
                    <tr>
                        <th colspan="2"><h3>Registro de Articulos</h3></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="texto"><label for="codigo">Codigo Articulo</label></td>
                        <td class="input"><input type="text" class="datos" name="codigo" id="codigo"></td>
                    </tr>
                    <tr>
                        <td class="texto"><label for="seccion">Seccion</label></td>
                        <td class="input"><input type="text" class="datos" name="seccion" id="seccion"></td>
                    </tr>
                    <tr>
                        <td class="texto"><label for="nombre">Nombre De Articulo</label></td>
                        <td class="input"><input type="text" class="datos" name="nombre" id="nombre"></td>
                    </tr>
                    <tr>
                        <td class="texto"><label for="precio">Precio</label></td>
                        <td class="input"><input type="text" class="datos" name="precio" id="precio"></td>
                    </tr>
                    <tr>
                        <td class="texto"><label for="fecha">Fecha</label></td>
                        <td class="input"><input type="text" class="datos" name="fecha" id="fecha"></td>
                    </tr>
                    <tr>
                        <td class="texto"><label for="importado">Importado</label></td>
                        <td class="input"><input type="text" class="datos" name="importado" id="importado"></td>
                    </tr>
                    <tr>
                        <td class="texto"><label for="pais">Pais De Origen</label></td>
                        <td class="input"><input type="text" class="datos" name="pais" id="pais"></td>
                    </tr>
                    <tr>
                        <td class="boton-align"><input type="submit" value="Enviar" name="enviar" class="boton"></td>
                        <td class="boton-align"><input type="reset" value="Limpiar" class="boton"></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</body>
</html>