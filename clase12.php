<?

try{

    $conexion = new PDO('mysql:host=localhost; dbname=registro_producto', 'root', '');

    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conexion->exec('SET CHARACTER SET utf8');

    echo "Se ha conectado a la base de datos. <br>";

    $query = "SELECT * FROM producto WHERE seccion= :secc";

    $resultado = $conexion->prepare($query);

    $resultado->execute(array(':secc'=>'ropa'));

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
                
    while($datos=$resultado->fetch(PDO::FETCH_ASSOC)){
        echo "<tr>";
        echo "<td>";
        echo $datos['id'];
        echo "</td>";
        echo "<td>";
        echo $datos['seccion'];
        echo "</td>";
        echo "<td>";
        echo $datos['nombre_articulo'];
        echo "</td>";
        echo "<td>";
        echo $datos['precio'];
        echo "</td>";
        echo "<td>";
        echo $datos['fecha'];
        echo "</td>";
        echo "<td>";
        echo $datos['importado'];
        echo "</td>";
        echo "<td>";
        echo $datos['pais_origen'];
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

    $resultado->closeCursor();

}catch(PDOException $e){
    die ("ERROR: No se pudo conectar a la base de datos: " . $e->getMessage());
}finally{
    $conexion=null;
}