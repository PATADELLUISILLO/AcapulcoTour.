<?php
    
    include("conexion.php");
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        
    $hass256 = 'sha256';
    $nombre = $_POST['nombre'];
    $apellidoM = $_POST['ApPaterno'];
    $apellidoP = $_POST['ApMaterno'];
    $correo = $_POST['correo'];
    $ubica = $_POST['Ubic'];
    $user = $_POST['usuario'];
    $password = $_POST['password'];
    $solicitud = $_POST['categoria'];
    $fechaNaci = $_POST['fecha'];

$key = "acedlsh13vuu";
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
$encriptadoP = openssl_encrypt($apellidoP, 'aes-256-cbc', $key, 0, $iv);
$encriptadoM = openssl_encrypt($apellidoM, 'aes-256-cbc', $key, 0, $iv);
$encrptadoubic = openssl_encrypt($ubica, 'aes-256-cbc', $key, 0, $iv);
$encripfechaN = openssl_encrypt($fechaNaci, 'aes-256-cbc', $key, 0, $iv);


$hashapeliM = hashrr($hass256, $password);






$identificar = "SELECT * FROM acapulco_user WHERE acapulco_user= '$user' AND acapulco_correo = '$correo'";

$result = $conn->query($identificar);

if ($result->num_rows === 0) {

    $consulta = "INSERT INTO acapulco_user (
    `acapulco_nombre`,
    `acapulco_apellidoM`,
    `acapulco_apellidoP`,
    `acapulco_ubicacion`,
    `acapulco_correo`,
    `acapulco_user`,
    `acapulco_password`,
    `acapulco_solicitud`,
    `acapulco_Fnacimiento`) VALUES  ('$nombre','$encriptadoM','$encriptadoP','$encrptadoubic','$correo','$user','$hashapeliM','$solicitud','$encripfechaN' )";

if ($conn->query($consulta) === TRUE) {


    echo "<script> alert('Gracias por registrarte $nombre');
    window.location = 'index.html'</script>";
} else {
    echo "Error:" . $consulta . "<br>" . $conn->error;
}

} else {    


    echo "<script> alert('Este correo o usario ya esta ocupado, ingrese otro');
    window.location = 'index.html'</script>";    
}

}
$conn->close();






function hashrr($hass256,$data){

    return hash($hass256, $data);


}





?>