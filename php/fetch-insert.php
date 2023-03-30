<?php

include 'config.php';

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

$client_id = $decode["client_id"];
$client_fullname = $decode["client_fullname"];
$client_gender = $decode["client_gender"];
$client_dob = $decode["client_dob"];
$client_age = $decode["client_age"];
$client_weight = $decode["client_weight"];
$client_height = $decode["client_height"];


echo $client_id;
echo $client_fullname;
echo $client_gender;
echo $client_dob;
echo $client_age;
echo $client_weight;
echo $client_height;


exit



$sql = "INSERT INTO profile(client_id, client_name, client_gender, client_fullname, client_dob, client_age, client_weight, client_height) VALUES ('{$client_id}',
'{$client_fullname}','{$client_gender}','{$client_dob}','{$client_age}','{$client_weight}','{$client_height}')";

if(mysqli_query($conn,$sql)){
	echo json_encode(array('insert' => 'success'));
}else{
	echo json_encode(array('insert' => 'failed'));
}

?>
