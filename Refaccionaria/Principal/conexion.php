 <?php
 
$serverName="localhost";
$bd="refaccionaria";
$pass="";
$user="root";
$conexion=mysqli_connect($serverName,$user,'')or die("No se ha podido encotrar usuario");
$db=mysqli_select_db($conexion,$bd)or die("No se ha podido conectar a la bd");

?>