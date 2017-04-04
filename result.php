<!DOCTYPE html>
<html lang="en">
<head>
  <title>Form table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h2>Form table</h2>           
  <table class="table table-bordered"> 
  <thead>
  <tr>
  		<th>ID</th>
        <th>Name</th>
        <th>Second name</th>
        <th>Surname</th>
        <th>Phone number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Sex</th>
      </tr>
    </thead>
    <tbody>
 <?php 
 	$user = 'root';
	$pass = '';
	$db = 'myform';

	$conn = new mysqli('localhost', $user, $pass, $db);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "SELECT * FROM users";
	$result = $conn->query($sql);

	while($row = $result->fetch_assoc()) {
		$user_id = $row['ID'];
		$get_user = "SELECT * FROM users WHERE id = '$user_id'";
		$result_get_user = mysqli_query($conn, $get_user);
		$_SESSION['myform'] = mysqli_fetch_assoc($result_get_user);
?>
        <tr>
        	<th><?php echo $row['ID']; ?> </th>   
            <th><?php echo $row['Name']; ?> </th> 
            <th><?php echo $row['SecondName']; ?></th> 
            <th><?php echo $row['Surname']; ?></th> 
            <th><?php echo $row['PhoneNumber']; ?></th> 
            <th><?php echo $row['Email']; ?></th> 
            <th><?php echo $row['Address']; ?></th> 
            <th><?php echo $row['Sex']; ?></th> 
            <th> <a href="http://localhost/Task1/form.php?id=<?php echo $user_id;?>" class="btn btn-info" role="button">Edit</a>
        </tr> 
     
<?php 
	
	}
        $conn->close();
            ?> 
   </tbody>
  </table>
</div>
</body>
</html>
