<?php

	
    $u_name=$_POST["name"];
	$u_num=$_POST["number"]; 
	$d = date_create()->format('Y-m-d H:i:s');

    if (isset($_POST["name"]) && isset($_POST["number"])){

	$host="localhost";
	$user="u0760142_default";
	$password="!0B7c0uH";
	$db="u0760142_orders";
	$usertable="orders";
	
	$link = mysqli_connect($host, $user, $password, $db) 
    or die("Ошибка " . mysqli_error($link));
	mysqli_set_charset($link, 'utf8');
	

    
    $d = date_create()->format('Y-m-d H:i:s');
	# Проверка наличия записи
    $query ="INSERT INTO orders VALUES('$u_name','$u_num','$d')";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
	mysqli_close($link);
	
	}
	$message = "Поступила заявка от человека по имени $u_name, с указанным номером: $u_num. Заявка поступила в $d.";
	mail ("kotov.unispring@gmail.com","заявка",$message);

	header('Location: index.html');
?>