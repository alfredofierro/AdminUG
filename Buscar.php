<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Buscar Usuario</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Josefin+Slab:100'>
  <link rel="stylesheet" href="./style-fondo.css">
</head>

<body>

<?php  
//CONECTAMOS CON LA BBDD


$conexion = new mysqli("localhost", "root", "", "gasfinder");
if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
}

$sql="SELECT idadmingas,usuario,codigogasolinera,marca from admingas";
$result = $conexion->query($sql);



if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $combobit="";
    
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
      $combobit .='<option value="'.$row['idadmingas'].'"> '.$row['idadmingas'].' - '.$row['usuario'].' </option>';   
    }
}
else
{
    echo "No hubo resultados";
}

?>  









  
<!-- partial:index.partial.html -->
<div class="container"><img class="background" src="ge.png"/>
  <p class="message">Sección: Buscar<br>Usuarios Admin Gasolinera</p>
</div>

<form action="BuscarUsuariosID.php" method="POST">

<div class="form">
  <link rel="stylesheet" href="./stylem.css">    
  <div class="title">Buscar Usuario</div>
  <div class="subtitle">Mediante ID y Usuario.</div>
  <br><br>
  
  <div class="sselect">

    <link rel="stylesheet" href="./style-select.css">
    <select id="idusuario" name="idusuario" class="classic" type="text">
      <div class="cut">
        <?=$combobit;?>
      </div>
      
    </select>
  </div>



    <button type="text" class="submit">Buscar</button>
</form>
  <form action="PanelAdmin.html" method="POST">
    <button type="text" class="submit">Regresar</button>
  </form>

</body>
</html>