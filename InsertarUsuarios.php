<html>
<link rel="stylesheet" href="./style-button.css">
<link rel="stylesheet" href="./style-mostrar.css">
<body style="background-image: url(backgs.png); 
            background-repeat: no-repeat;
            background-size: cover;">

<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gasfinder";

    $usuario=$_POST['usuario'];
    $contra=$_POST['contra'];
    $nes=$_POST['nes'];
    $marca=$_POST['marca'];
    $tel=$_POST['tel'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO admingas (usuario, contra, codigogasolinera, marca, telefono)
        VALUES('$usuario', '$contra', '$nes', '$marca', '$tel')";
        //use exec() because no results are returned
        $conn->exec($sql);
        echo "<br><br><br><br><br> <h2>Usuario Creado existosamente !!!</h2>";
    } catch(PDOException $e) {
        echo /*$sql . */"<br>    Usuario ya registrado!!! <br>" /*. $e->getMessage()*/;
    }

    $conn = null;
?>

<br><br><br>    

    
    <div style="text-align:center;">
        <form action="PanelAdmin.html" method="POST">    
            <span><a href="PanelAdmin.html"></a></span>    
        </form>    
    </div>  
    
    
    
    
</body>    
</html>    