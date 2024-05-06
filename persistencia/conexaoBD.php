<?php
//endereço
//nome do bd
//usuario
//senha

$endereço = 'localhost'
$banco = 'marcaai'
$usuario = 'postgres'
$senha = 'admin'
 
try{
	$pdo = new PDO("pgsql:host=$endereço;port=5432;dbname=$banco, $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXECEPTION]):
     
     echo "Conectado!"	 
	
} catch (PDOException $e){
	echo "Falha!!"
	die($e->getMessage());
	
	
	
	
	
	
}







?>