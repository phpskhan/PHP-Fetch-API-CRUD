<?php
mysqli_query($conn,"SET NAMES utf8");
$db_connect = mysqli_connect('localhost', 'root', '', 'test');
?>

<?php

include 'php/config.php';

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

$client_id = "123";
$client_fullName = $decode["client_fullName"];
$client_gender = $decode["client_gender"];
$client_dateOfBirth = $decode["client_dateOfBirth"];
$client_age = $decode["client_age"];
$client_height = $decode["client_height"];
$client_weight = $decode["client_weight"];


        // document.write(client_id);
        // document.write(client_fullName);
        // document.write(client_gender);
        // document.write(client_dateOfBirth);
        // document.write(client_age);
        // document.write(client_height);
        // document.write(client_weight);

echo $client_id;
echo $client_fullname;
echo $client_gender;
echo $client_dob;
echo $client_age;
echo $client_weight;
echo $client_height;


    // $query = mysqli_query($db_connect, "INSERT into profile set 

    //   client_id = '$client_id',
    //   client_fullName = '$client_fullName',
    //   client_gender = '$client_gender',
    //   client_dateOfBirth = '$client_dateOfBirth',
    //   client_age = '$client_age',
    //   client_height = '$client_height',

    //   client_weight = '$client_weight'

    //   ");


$sql = "INSERT INTO profile(client_id, client_fullName, client_gender, client_dateOfBirth, client_age, client_height, client_weight) VALUES ('{$client_id}',
'{$client_fullName}','{$client_gender}','{$client_dateOfBirth}','{$client_age}','{$client_height}','{$client_weight}')";

if(mysqli_query($conn,$sql)){
	echo json_encode(array('insert' => 'success'));
}else{
	echo json_encode(array('insert' => 'failed'));
}

?>
