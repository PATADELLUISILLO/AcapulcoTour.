<?php
// Establecer la conexión a la base de datos (reemplaza con tus propios datos de conexión)
include("conexion.php");

// Consulta SQL para obtener todos los datos de la tabla "usuarios"
$sql = "SELECT * FROM acapulco_user";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>EmpleosApp | Listado de Usuarios</title>
    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/jumbotron.css" rel="stylesheet">
    <link href="bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link active" href="inicio.html">Inicio</a>
            </li>
    
          </ul>  
          <a class="btn btn-primary" href="index.html">Cerrar Sesion</a>
        </div>
      </nav>
    </header>

    <main role="main">     
      <hr>
      <div class=""> 

        <div class="card">
          <h4 class="card-header"><strong>Listado de Usuarios</strong></h4>              
          <div class="">            
            <hr>
            <table class="table">
              <thead class="thead-light">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nombre</th>                  
                  <th scope="col">Apellido Paterno</th>
                  <th scope="col">Apellido Materno</th>
                  <th scope="col">Correo</th>
                  <th scope="col">Contraseña</th>
                  <th scope="col">Operaciones</th>
                </tr>
              </thead>
              <tbody>
                    <?php
                            
                            // Recorrer los resultados y generar las filas de la tabla
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            $key = "acedlsh13vuu";
                            $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
          

                            
                            echo "<tr>";
                            echo "<td>" . $row['idacapulco'] . "</td>";
                            echo "<td>" . $row['acapulco_nombre'] . "</td>";
                            echo "<td>" . $row['acapulco_apellidoP'] . "</td>";
                            echo "<td>" . $row['acapulco_apellidoM'] . "</td>";
                            echo "<td>" . $row['acapulco_correo'] . "</td>";
                            echo "<td>" . $row['acapulco_password'] . "</td>";
                            echo '<td> 
                            <a href="#" onclick="return confirm('.'¿Estas seguro?'.')" class="btn btn-success btn-sm" role="button" title="Eliminar el registro."><i class="fas fa-trash" aria-hidden="true"></i></a>
                          </td>';
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No se encontraron usuarios.</td></tr>";
                    }
                    ?>



              </tbody>




    </table>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>