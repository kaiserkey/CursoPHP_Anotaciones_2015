<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Registros PDO</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        body{
            background-color:blueviolet;
        }
        div{
            background-color:beige;
            margin: 150px auto;
            width: 500px;
            text-align: center;
        }
        table{
            border-collapse: collapse;
            width: 100%;
        }
        td{
            padding: 20px;
            border: 2px black solid;
        }
        #enviar{
            width: 100px;
            height: 50px;
        }
    </style>
</head>
<body>
    <?
    if(isset($_POST['enviar'])){
        $id=$_POST['id'];
        $seccion=$_POST['seccion'];
        $nombreart=$_POST['nombre'];
        $precio=$_POST['precio'];
        $fecha=$_POST['fecha'];
        $importado=$_POST['importado'];
        $pais=$_POST['pais'];

        try{
            $conexion = new PDO('mysql:host=localhost; dbname=registro_producto', 'root', '');
            $query = "INSERT INTO producto(id, seccion, nombre_articulo, precio, fecha, importado, pais_origen) 
                    VALUES (:id, :secc, :nom, :pre, :fecha, :imp, :pais)";
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->exec('SET CHARACTER SET utf8');
    
            $resultado = $conexion->prepare($query);
            $resultado->execute(array(':id'=>$id, ':secc'=>$seccion, ':nom'=>$nombreart, ':pre'=>$precio, ':fecha'=>$fecha, ':imp'=>$importado, ':pais'=>$pais));
            
            if($resultado->rowCount()>0){
                echo "Se insertaron los datos correctamente...";
            }else{
                echo "No se ha podido insertar los datos...";
            }
            $resultado->closeCursor();
    
        }catch(PDOException $e){
            die("ERROR: No se ha podido conectar a la base de datos: " . $e->getMessage());
        }finally{
            $conexion=null;
        }

    }
        
        
    
    ?>
    <form method="POST" action="<? echo $_SERVER['PHP_SELF'] ?>">
        <div>
            <table>
                <tr>
                    <td colspan="2"><h1>Insertar Contenido PDO</h1></td>
                </tr>
                <tr>
                    <td><label for="id">ID</label></td>
                    <td> <input type="text" name="id" id="id"></td>
                </tr>
                <tr>
                    <td><label for="seccion">Seccion</label></td>
                    <td><input type="text" name="seccion" id="seccion"></td>
                </tr>
                <tr>
                    <td><label for="nombre">Nombre De Articulo</label></td>
                    <td><input type="text" name="nombre" id="nombre"></td>
                </tr>
                <tr>
                    <td><label for="precio">Precio</label></td>
                    <td><input type="text" name="precio" id="precio"></td>
                </tr>
                <tr>
                    <td><label for="fecha">Fecha</label></td>
                    <td><input type="text" name="fecha" id="fecha"></td>
                </tr>
                <tr>
                    <td><label for="importado">Importado</label></td>
                    <td><input type="text" name="importado" id="importado"></td>
                </tr>
                <tr>
                    <td><label for="pais">Pais De Origen</label></td>
                    <td><input type="text" name="pais" id="pais"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="enviar" id="enviar"></td>
                </tr>
            </table>
        </div>
        

    </form>
</body>
</html>