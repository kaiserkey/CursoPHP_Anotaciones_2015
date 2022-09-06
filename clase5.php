<?  
$alimentos= array(
    "Frutas"=>array("Manzana"=>"Verde", "Naranja"=>"Naranja", "Banana"=>"Amarillo"),
    "Verduras"=>array("Tomate"=>"Rojo", "Papa"=>"Marron", "Zanahoria"=>"Naranja"),
    "Carnes"=>array("Pollo"=>"Blanca", "Cerdo"=>"Blanca", "Ganado"=>"Roja")
);

foreach($alimentos as $clave=>$tipo)
{
    echo "Clave: $clave ->";
    foreach($tipo as $valor=>$color){
        echo "$valor es de color -> $color, ";
    }
    echo "<br>";
}

//Esto ya no se utiliza por quedar deprecado el each en php 7.* en adelante
/*
foreach($alimentos as $clave=>$tipo)
{
    echo "$clave ->";
    while(list($valor, $color)=each($tipo)){
        echo "$valor es de color: $color, ";
    }
        
    echo "<br>";
}
*/