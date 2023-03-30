<?php

include 'config.php';

$sql = "SELECT profile.client_id, profile.client_fullName, profile.client_gender, profile.client_dateOfBirth, profile.client_age, profile.client_weight, profile.client_height FROM profile";

//$sql = "SELECT students.id,students.first_name,students.last_name,students.city,class.class_name FROM students LEFT JOIN class ON class.cid = students.class";

$result = mysqli_query($conn, $sql) or die("SQL Failed");
$output = [];

if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){
    $output[] = $row;
  }
}else{
    $output['empty'] = ['empty'];
}

mysqli_close($conn);

echo json_encode($output);

?>