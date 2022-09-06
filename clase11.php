<?

$conexion = new mysqli("localhost", "root", "", "registro_producto");

if($conexion->connect_errno){
    echo "Fallo en la conexion: $conexion->connect_errno";
}

$conexion->set_charset("utf8");

$query = "SELECT * FROM producto";

$resultado = $conexion->query($query);

while($filas=$resultado->fetch_assoc()){
    var_dump($filas);
}

$conexion->close();