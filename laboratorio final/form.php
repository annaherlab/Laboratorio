<?php


if($_POST){
	$nombre = $_POST['nombre'] ?? '';
	$apellido1 = $_POST['apellido1'] ?? '';
	$apellido2 = $_POST['apellido2']?? '';
	$email = $_POST['email'] ?? '';
	$login = $_POST['login'] ?? '';
	$password = $_POST['passwd'] ?? '';

$servername = "localhost";
$username = "root";
$passwd = "";
$dbname = "formulario";


if(empty($nombre) || empty($apellido1) || empty($apellido2) || empty($email) || empty($login) || empty($password))
{
	echo "Faltan campos por completar.";
}

$conn = new mysqli($servername, $username, $passwd, $dbname);

if($conn->connect_error)
	die("Fallo en la conexión a la base de datos" . $conn->connect_error);
$emailExists = false;
$comprobarEmail = "SELECT * from usuario where email='$email'";
$resultSQL = $conn->query($comprobarEmail);
if($resultSQL->num_rows > 0)
	$emailExists = true;
if($emailExists){
	echo "Usuario ya existente";
}else{
	$sql = "INSERT INTO usuario (Nombre, Apellido1, Apellido2, Email, Login, Password) VALUES ('$nombre', '$apellido1', '$apellido2', '$email', '$login', '$password')";

	if($conn->query($sql) === TRUE){
		echo "Se ha insertado el usuario correctamente";
		$sql = "SELECT * from usuario";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    echo "<table border='1'>";
		    echo "<tr>";
		    echo "<th>Nombre</th>";
		    echo "<th>Apellido 1</th>";
		    echo "<th>Apellido 2</th>";
		    echo "<th>Email</th>";
		    echo "<th>Login</th>";
		    echo "<th>Contraseña</th>";
		    echo "</tr>";
		 	 while ($row = $result->fetch_assoc()) {
		        echo "<tr>";
		        echo "<td>" . $row['Nombre'] . "</td>";
		        echo "<td>" . $row['Apellido1'] . "</td>";
		        echo "<td>" . $row['Apellido2'] . "</td>";
		        echo "<td>" . $row['Email'] . "</td>";
		        echo "<td>" . $row['Login'] . "</td>";
		        echo "<td>" . $row['Password'] . "</td>";
		        echo "</tr>";
    }
		}
	}else{
		echo "Error: " . $conn->error;
	}
}

$conn->close();


}
?>