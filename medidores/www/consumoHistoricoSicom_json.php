<?php 
include_once("conexion.php");
$medidor = isset($_GET["medidor"])?$_GET["medidor"]:"0";
$datos = array();

mssql_select_db("SicomDivHistorico");
$sql = mssql_init("SicomDivHistorico.dbo.obtenHistoricoPorMedidor '".$medidor."'",$con); 
 
$res = mssql_execute($sql); 
while($row = mssql_fetch_assoc($res))
{
	$datos[] = $row; 
	 
}


header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');	
echo json_encode($datos);
?>