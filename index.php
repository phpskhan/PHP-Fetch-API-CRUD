<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />
  <title>Fitbit API Data</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
      <h2>Fitbit API Data</h2>
      <div id="search-bar">
        <label>Search :</label>
        <input type="text" id="search" onkeyup="load_search()" autocomplete="off">
      </div>
    </div>
    
    <div id="table-data">
      <h3>All Records</h3>
      <button class="add_new" onclick="addNewModal()">Add New</button>
      <table border="1" width="100%" cellspacing="0" cellpadding="10px">
        <thead>
          <tr>
            <th width="60px">ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>DOB</th>
            <th>AGE</th>
            <th>Weight</th>
            <th>Height</th>
            <th width="90px">Edit</th>
            <th width="90px">Delete</th>
          </tr>
        </thead>
        <tbody id="tbody"></tbody>
      </table>
    </div>

    <div id="error-message"></div>
    <div id="success-message"></div>
  </div>


  <!-- modal for show add new -->
  <div id="addModal">
    <div id="modal-form" >
      <h2>Add New Form</h2>
<!--       <form method="POST" id="addModal-form">
 -->      <form method="POST" action="getapidata.php">
        <table cellpadding="10px" width="100%">
          <tr>
            <td width='90px'>Client ID</td>
            <td><input type='text' name="client_ids"></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="submit" name="submit">Save</button></td>
<!--             <td><button type="button" onclick='submit_data()' id='new-submit'>Save</button></td>
 -->          </tr>
        </table>
      </form>
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div>

  <!-- modal for show edit -->
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <form method="POST">
        <table cellpadding="10px" width="100%" id="edit-form">
          <tr>
            <td width='90px'>First Name</td>
            <td><input type='text' id='edit-fname' autocomplete="off">
                <input type='text' id='edit-id' hidden>
            </td>
          </tr>
          <tr>
            <td width='90px'>Last Name</td>
            <td><input type='text' id='edit-lname' autocomplete="off"></td>
          </tr>
          <tr>
            <td width='90px'>Class</td>
            <td>
              <select id='edit-class'></select>
            </td>
          </tr>
          <tr>
            <td width='90px'>City</td>
            <td><input type='text' id='edit-city' autocomplete="off"></td>
          </tr>
          <tr>
            <td></td>
            <td><button type="button" onclick='modify_data()' id='edit-submit'>Save</button></td>
          </tr>
        </table>
      </form>
      <div id="close-btn" onclick="hide_modal()">X</div>
    </div>
  </div>
  
<script type="text/javascript" src="js/fetch.js"></script>
</body>
</html>
