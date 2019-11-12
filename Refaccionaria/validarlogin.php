
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "refaccionaria";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) 
{
	die("No hay conexión: ".mysqli_connect_error());
}
$nombre = $_POST["usuario"];
$pass = $_POST["pass"];
$query = mysqli_query($conn,"SELECT * FROM empleado WHERE usuario = '".$nombre."' and password = '".$pass."'");
$nr = mysqli_fetch_array($query);
if ($nr > 0){
if($nr ["usuario"]== $nombre  and  $nr ["password"]==$pass  and $nr ["rol"]==1) {
header("Location: /Refaccionaria/Principal/menuAdministrador.php");
}else{
    header("Location:/Refaccionaria/Usuario/menuVendedor.php");	
}
}	
 else {
  header("Location: index.html");
	
}
?>