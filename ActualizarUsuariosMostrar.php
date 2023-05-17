<html>
  <body style="background-image: url(backgs.png); 
              background-repeat: no-repeat;
              background-size: cover;">
          
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gasfinder";

    $idusuario = $_POST['idusuario'];

    $id=$_POST['idusuario'];
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE admingas SET idadmingas=$id";
    $sql = "SELECT idadmingas, usuario, contra, codigogasolinera, marca, telefono FROM admingas WHERE idadmingas=$id";
    $result = mysqli_query($conn, $sql);


    $usuario;
    $contra;
    $codigogasolinera;
    $marca;
    $telefono;


    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
      
        $usuario = $row["usuario"];
        $contra = $row["contra"];
        $codigogasolinera = $row["codigogasolinera"];
        $marca = $row["marca"];
        $telefono = $row["telefono"];        

      }
    } else {
      echo "0 Resultados.";
    }

    mysqli_close($conn);
    ?>       

    <form action="ActualizarUsuarios.php" method="POST">
      <div class="form">
        <link rel="stylesheet" href="./style-form.css">    
        <div class="title">Editar Usuario</div>
        <div class="subtitle">Complete el formulario.</div>

        <div class="input-container ic2">
          <input id="ausuario" name="ausuario" class="input" type="text" placeholder=" " value="<?=$usuario?>" />
          <div class="cut"></div>
          <label for="Usuario" class="placeholder">Usuario</label>
        </div>
        <div class="input-container ic2">
          <input id="acontra" name="acontra" class="input" type="text" placeholder=" " value="<?=$contra?>"/>
          <div class="cut"></div>
          <label for="Contra" class="placeholder">Contraseña</label>
        </div>
        <div class="input-container ic2">
          <input id="acodigogasolinera" name="acodigogasolinera"  class="input" type="text" placeholder=" " value="<?=$codigogasolinera?>"/>
          <div class="cut cut-short"></div>
          <label for="Correo" class="placeholder"># Gasolinera</label>
        </div>

        <div class="input-container ic2">
          <input id="amarca" name="amarca"  class="input" type="text" placeholder=" " value="<?=$marca?>"/>
          <div class="cut cut-short"></div>
          <label for="Correo" class="placeholder">Marca</label>
        </div>

        <div class="input-container ic2">
          <input id="atelefono" name="atelefono"  class="input" type="text" placeholder=" " value="<?=$telefono?>"/>
          <div class="cut cut-short"></div>
          <label for="Correo" class="placeholder">Telefono</label>
        </div>

        

        
          
          <div style="text-align:center;">
          <form action="ActualizarProductos.php" method="POST">
            <button type="text" class="submit" value="<?=$idusuario?>" id="aidusuario" name="aidusuario">Actualizar</button>
          </form>

          <form action="PanelAdmin.html" method="POST">
            <button type="text" class="submit">No Actualizar</button>
          </form>
          </div>
      </div>
    </form>
  </body>
</html>