<?php

if (isset($_POST['submit'])) {

session_start();

  $client_id =$_POST['client_ids'];
  $_SESSION['client_id'] = $_POST['client_ids'];


header("location: https://www.fitbit.com/oauth2/authorize?response_type=token&client_id=$client_id&redirect_uri=http%3A%2F%2Flocalhost%2Fphp-fetch-crud%2Fgetapidata.php%2F&scope=activity%20heartrate%20location%20nutrition%20profile%20settings%20sleep%20social%20weight%20oxygen_saturation%20respiratory_rate%20temperature&expires_in=604800");


}

?>

<script type="text/javascript">
  // get the url

// location.reload(true);
var url = window.location.href;
console.log(url);
//getting the access token from url
var access_token;

access_token = url.split("#")[1].split("=")[1].split("&")[0];
// get the userid
var userId = url.split("#")[1].split("=")[2].split("&")[0];
console.log(access_token);
console.log(userId);


    url = "https://api.fitbit.com/1/user/-/profile.json";
    fetch (url, {
    method: "GET",
    headers: {"Authorization": "Bearer " + access_token}
    })

    .then((response) => response.json())
    .then((userData) => {
        console.log(userData);

            var tr = '';
        for (var x in userData){

            var client_fullName = `${userData[x].fullName}`;
            var client_gender = `${userData[x].gender}`;
            var client_dateOfBirth = `${userData[x].dateOfBirth}`;
            var client_age = `${userData[x].age}`;
            var client_height = `${userData[x].height}`;
            var client_weight = `${userData[x].weight}`;

            // var client_fullName = `<input value="${userData[x].fullName}"`;
            // var client_gender = `<input value="${userData[x].gender}"`;
            // var client_dateOfBirth = `<input value="${userData[x].dateOfBirth}"`;
            // var client_age = `<input value="${userData[x].age}"`;
            // var client_height = `<input value="${userData[x].height}"`;
            // var client_weight = `<input value="${userData[x].weight}"`;

        document.write(client_fullName);
        document.write(client_gender);
        document.write(client_dateOfBirth);
        document.write(client_age);
        document.write(client_height);
        document.write(client_weight);

    var formdata = {
      'client_fullName' : client_fullName,
      'client_gender' : client_gender,
      'client_dateOfBirth' : client_dateOfBirth,
      'client_age' : client_age,
      'client_height' : client_height,
      'client_weight' : client_weight
    }

    jsondata = JSON.stringify(formdata);


    fetch('',{
      method : 'POST',
      body : jsondata,
      headers: {
        'Content-type' : 'application/json',
      }
    })
    .then((response) => response.json())
    .then((result)=>{
        // if(result.insert == 'success'){
        //   show_message('success','Data Inserted Successfully.');
        //   loadTable();
        //   hide_modal();
        //   document.getElementById('addModal-form').reset();
        // }else{
        //   alert('error',"Data Can't Inserted.");
        //   hide_modal();
        // }
    })
    .catch((error) => {
      alert("Data Inserted Successfully.");
    });
    }
})

</script>

<?php
mysqli_query($conn,"SET NAMES utf8");
$db_connect = mysqli_connect('localhost', 'root', '', 'test');

$input = file_get_contents('php://input');
$decode = json_decode($input, true);

$client_fullName = $decode["client_fullName"];
$client_gender = $decode["client_gender"];
$client_dateOfBirth = $decode["client_dateOfBirth"];
$client_age = $decode["client_age"];
$client_height = $decode["client_height"];
$client_weight = $decode["client_weight"];





  $query_select = mysqli_query($db_connect, "SELECT * from profile where client_fullName = '$client_fullName' AND adm_lname = '$client_id' ");

  $checkpoint = mysqli_num_rows($query_select);

  if ($checkpoint == 0) {


if (!empty($client_fullName)){
session_start();


  $client_id = $_SESSION['client_id'];


    $query = mysqli_query($db_connect, "INSERT into profile set 

      client_id = '$client_id',
      client_fullName = '$client_fullName',
      client_gender = '$client_gender',
      client_dateOfBirth = '$client_dateOfBirth',
      client_age = '$client_age',
      client_height = '$client_height',

      client_weight = '$client_weight'

      ");  
}
}

?>
