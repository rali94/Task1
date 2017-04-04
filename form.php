<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<style>
@CHARSET "UTF-8";
.container{
	max-width:50%;
	margin: 0 auto;
}
.container h2{
	text-align:center;
}
</style>
<div class="container">
  <h2>My form</h2>
<form class="form-horizontal" action="form.php" method="post">
  <br/><?php $user = 'root';$pass = '';$db = 'myform';$conn = new mysqli('localhost', $user, $pass, $db);if ($conn->connect_error) {	die("Connection failed: " . $conn->connect_error);}$name = "";if(!empty($_GET)){				$user_id = (int)$_GET['id'];	$get_user = "SELECT * FROM users WHERE id =".$user_id;	$result = $conn->query($get_user);	if (!$result) {		echo 'There are no results for your search';	} else {		while($row = $result->fetch_assoc()) {			$name = $row["Name"];		}	}}else {	if (isset($_POST["name"]))	{		$name = $_POST["name"];	}}?>    <div class="form-group has-feedback">	<label class = "col-sm-4 control-label" for="name"><span class="glyphicon glyphicon-user"></span> User name: </label>	<div class="col-sm-8">		<input class="ob form-control" value="<?php echo $name?>" id="name" name="name" placeholder="Enter name"/>		<span class="glyphicon form-control-feedback"></span>	</div>  </div>			<?php if(isset($_POST['name'])){$name = $_POST['name'];	if(($name == "")){		?>		<div class="form-group alert alert-danger">			<div class = "col-sm-6">				<strong>No User Name!</strong>			</div>		</div>	<?php }}?>
  <div class="form-group has-feedback">
  <label class = "col-sm-4 control-label" for="second name"><span class="glyphicon glyphicon-user"></span> User second name: </label>	  <div class = "col-sm-8">
      <input class="form-control" id="second name" type="text" placeholder="Enter second name"/>
     </div>  </div>
  <div class="form-group has-feedback">
  <label class = "col-sm-4 control-label" for="surname"><span class="glyphicon glyphicon-user"></span> User surname: </label>	<div class = "col-sm-8">
      <input class="ob form-control" value="<?php echo (isset($_POST['surname'])?($_POST['surname']):"");?>" id="surname" name="surname" type="text" placeholder="Enter surname"/>      <span class="glyphicon form-control-feedback"></span>
     </div>  </div><?php if(isset($_POST['surname'])){$surname = $_POST['surname'];if(($surname == "")&&(isset($_POST['surname']))){	?>	<div class="form-group alert alert-danger">		<div class = "col-sm-6">			<strong>No User Surname!</strong>		</div>	</div>	<?php 	}}?>
  <div class="form-group has-feedback">
  <label class = "col-sm-4 control-label" for="phone number" ><span class="glyphicon glyphicon-phone-alt"></span> Phone number:</label>	  <div class = "col-sm-8">
      <input class="ob form-control" id="phone number" placeholder="Enter phone number"/>      <span class="glyphicon form-control-feedback"></span>
     </div></div>
   <div class="form-group has-feedback">
   <label class="col-sm-4 control-label" for="email"><span class="glyphicon glyphicon-envelope"></span> Email:</label>	  <div class="col-sm-8">
      <input class="ob form-control" name="email" value="<?php echo (isset($_POST['email'])?($_POST['email']):"");?>" id="email" placeholder="Enter Email">      <span class="glyphicon form-control-feedback"></span>	  </div>
   </div><?php if(isset($_POST['email'])){$email = $_POST['email'];if(($email == "")&&(isset($_POST['email']))){	?>	<div class="form-group alert alert-danger">		<div class = "col-sm-6">			<strong>No Email!</strong>		</div>	</div><?php }}?>
    <div class="form-group has-feedback">
    <label class = "col-sm-4 control-label" for="address"><span class="glyphicon glyphicon-home"></span> Address:</label>	  <div class="col-sm-8">
      <input class="form-control" id="address" placeholder="Enter address"/>	  </div>
    </div>
    <div class="form-group">
    <label class = "col-sm-4 control-label"><span class="glyphicon glyphicon-heart"></span> Choose sex: </label>
    <div class="col-sm-8">
		<label class="radio-inline"><input type="radio" name="male" value="male" <?php if (isset($_POST['male'])&&($_POST['male'] == 'male')){ echo 'checked';} ?>/> Male </label>
 		 <label class="radio-inline"><input type="radio" value="female" name="male" <?php if(isset($_POST['male'])&&($_POST['male'] == 'female')){ echo 'checked'; }?>/>Female</label>
		</div>
		</div>			<div class="form-group">				<label class = "control-label" for="sel1">Country:</label>		<select name="country" class="form-control" id="sel1"><?php 	$user = 'root';	$pass = '';	$db = 'myform';	$conn = new mysqli('localhost', $user, $pass, $db);	if ($conn->connect_error) {		die("Connection failed: " . $conn->connect_error);	}	$sql = mysqli_query($conn,"SELECT Name FROM countries");	$result = $conn->query($sql);			while($row = $sql->fetch_assoc()) {						echo "<option value=\"countries\">" . $row['Name'] . "</option>";				}$conn->close();?></select></div>
    <div class="form-group row">
      <label for="message">Message:</label>
      <br/>
      <textarea class="form-control" rows="2"  id="message"></textarea>
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Submit"/>        <?php     $user = 'root';    $pass = '';    $db = 'myform';        $conn = new mysqli('localhost', $user, $pass, $db);        if ($conn->connect_error) {    	die("Connection failed: " . $conn->connect_error);    }    if(!empty($_POST)){		$sql = "INSERT INTO users (Name, Surname, Email, Sex) VALUES ('".$_POST["name"]."','".$_POST["surname"]."','".$_POST["email"]."','".$_POST["male"]."')";	    if($conn->query($sql) === true){	    	echo "Records inserted successfully.";	    } else{	    	echo "ERROR: Could not able to execute $sql. " . $conn->error;	    }    }    $conn->close();        ?>
    </div>
    <br/>
    <br/>
<script type="text/javascript">
$(document).ready(function(){
	$(".ob").change(function(){
		if ($(this).val() != "")
		{
			$(this).parent().parent().addClass("has-success");
			$(this).parent().parent().removeClass("has-error");
			$(this).parent().find("span").addClass("glyphicon-ok");
			$(this).parent().find("span").removeClass("glyphicon-remove");
		}
		else
		{
			$(this).parent().parent().removeClass("has-success");
			$(this).parent().parent().addClass("has-error");
			$(this).parent().find(".glyphicon").addClass("glyphicon-remove");
			$(this).parent().find(".glyphicon").removeClass("glyphicon-ok");
		}
	});
});
</script>
  </form>
</div>
</body>
</html>
