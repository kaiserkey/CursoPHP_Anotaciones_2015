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
            margin: 100px auto;
            width: 600px;
        }

        td{
            padding: 20px;
            text-align: left;
            border: 5px black solid;
            min-width: 250px;
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


    </style>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <input type="submit" value="MostrarDB" class="boton" name="mostrar">
    </form>
    <div>
    <?
        if(isset($_POST['mostrar'])){

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

            $select = "SELECT * FROM producto";

            $resultado= mysqli_query($con, $select);
            $datosRecibidos=mysqli_fetch_assoc($resultado);
            foreach($datosRecibidos as $clave=>$valor){
                echo "<table>";
                echo "<tr>";
                echo "<td>CLAVE</td>";
                echo "<td>VALOR</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>$clave</td>";
                echo "<td>$valor</td>";
                echo "</tr>";
                echo "</table>";
            }

            mysqli_query($con, $select)->close();
            mysqli_close($con);
        }
        

    ?>
    </div>

</body>
</html>