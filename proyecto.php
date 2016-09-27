<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>
<body>
<?php
if(isset ($_POST['entrar'])){
	
$id_usuario=$_POST['usu'];
$nombre_usuario=$_POST['nom'];
/*
$usuario= 'aqui va tu usuario';
$pass = 'aqui va tu contraseña';
, 'UID'=>$usuario, 'PWD'=>$pass

*/

$servidor = '192.168.1.70,1433'; 
$usuario= 'sa';
$pass = '1234';
$basedatos = 'prueba';

$info = array('Database'=>$basedatos,'UID'=>$usuario,'PWD'=>$pass); 
$conexion = sqlsrv_connect($servidor, $info);  


if(!$conexion){

 die( print_r( sqlsrv_errors(), true));

 }


$query ="INSERT INTO usuarios(id_usuario,nombre_usuario)
values('$id_usuario','$nombre_usuario')";
$registros = sqlsrv_query($conexion,$query);

if($registros)	

echo "registro insertado rifas mell";

$con2=mysql_connect("192.168.1.68:3306","root","1234")or die(mysql_error());
mysql_select_db("prueba",$con2) or die(mysql_error());;
$conulta="INSERT INTO usuarios(id_usuario,nombre_usuario)
values('$id_usuario','$nombre_usuario')";
$resul=mysql_query($conulta);
if($resul==1)
	


	



  
// Create connection to Oracle 
$user="system";
$pas="123";
$db="169.254.104.46:1521/XE"; 
$conn=OCILogon($user,$pas,$db);
 
if (!$conn){
		echo "Conexion es invalida" . var_dump ( OCIError() );
		die();
	}
 $query=OCIParse($conn,"INSERT INTO usuarios values(:dato1,:dato2)");
 OCIBindByName($query, ":dato1",$id_usuario );
	OCIBindByName($query, ":dato2",$nombre_usuario);
	OCIExecute($query, OCI_DEFAULT);
	
	OCICommit($conn);
	OCILogoff($conn);
// Close the Oracle connection 

echo "DATOS GUARDADOS rifas";

}



else{
?>
<form id="form1" name="form1" method="post" action="proyecto.php">
  <div align="center">
    <table width="320" height="159" border="1">
      <tr>
        <td>practica</td>
      </tr>
      <tr>
        <td><label for="usu">ID usuario</label>
        <input type="text" name="usu" id="usu" /></td>
      </tr>
      <tr>
        <td><label for="pas">Nombre</label>
        <input type="text" name="nom" id="nom" /></td>
      </tr>
      <tr>
        <td><div align="center">
          <input type="submit" name="entrar" id="entrar" value="entrar" />
        </div></td>
      </tr>
    </table>
  </div>
</form>
<?php

}
?>
</body>


</html>
