<!DOCTYPE html>
<html lang="es">
<head>
    <title>Mostrar DataBase</title>
    <meta charset="utf-8">
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background-color:blueviolet;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
            font-weight: bold;
        }

        table{
            border-collapse: collapse;
            background-color:beige;
            width: 100%;
        }
        div{
            margin: 50px auto;
            width:90%;
        }

        td{
            padding: 20px;
            text-align: left;
            border: 5px black solid;
            min-width: 100px;
        }

        form{
            text-align: center;
        }

        .boton{
            height: 30px;
            width: 200px;
            margin: 50px auto;
            background-color:aquamarine;
        }
        .buscar{
            width: 200px;
            height: 20px;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
        label{
            color:beige;
            font-size: 30px;
        }
        .btn-eliminar{
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
            font-size: 20px;
            height: 50px;
            width: 100px;
            background-color:red;
        }
    </style>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"><br/>
        <label for="buscar">BUSCAR</label><br/>
        <select name="opcion" id="opcion">
            <option value="id">ID</option>
            <option value="seccion">Seccion</option>
            <option value="nombre_articulo">Nombre Del Articulo</option>
            <option value="precio">Precio</option>
            <option value="fecha">Fecha</option>
            <option value="inportado">Importado</option>
            <option value="pais_origen">Pais De Origen</option>
        </select>
        <input type="text" name="buscar" class="buscar" id="buscar"><br/>
        <input type="submit" value="Mostrar Resultados" class="boton" name="mostrar"><br/>
    </form>
    <div>
    <?
        if(isset($_POST['mostrar'])){
            $campoDeBusqueda = $_POST['opcion'];
            
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

            $buscar = $_POST['buscar'];
            
            $select = "SELECT * FROM producto WHERE $campoDeBusqueda LIKE ?";

            $resultado= mysqli_prepare($con, $select);

            $ejecutarConsulta=mysqli_stmt_bind_param($resultado, 's', $buscar);

            $ejecutarConsulta=mysqli_stmt_execute($resultado);

            if($ejecutarConsulta==false){
                echo "Error al ejecutar la consulta";
            }else{
                $ejecutarConsulta = mysqli_stmt_bind_result($resultado, $codigo, $seccion, $nombre, $precio, $fecha, $importado, $pais);
                
                echo "<table>";
                echo "<tr>";
                echo "<td>Codigo</td>";
                echo "<td>Seccion</td>";
                echo "<td>Nombre De Articulo</td>";
                echo "<td>Precio</td>";
                echo "<td>Fecha</td>";
                echo "<td>Inportado</td>";
                echo "<td>Pais De Origen</td>";
                echo "</tr>";
                
                while($datosRecibidos=mysqli_stmt_fetch($resultado)){
                    echo "<tr>";
                    echo "<td>";
                    echo $codigo;
                    echo "</td>";
                    echo "<td>";
                    echo $seccion;
                    echo "</td>";
                    echo "<td>";
                    echo $nombre;
                    echo "</td>";
                    echo "<td>";
                    echo $precio;
                    echo "</td>";
                    echo "<td>";
                    echo $fecha;
                    echo "</td>";
                    echo "<td>";
                    echo $importado;
                    echo "</td>";
                    echo "<td>";
                    echo $pais;
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";

                mysqli_close($con);
                }
            }

            
        

    ?>
    </div>

</body>
</html>