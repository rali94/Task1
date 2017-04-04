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
  <br/>
  <div class="form-group has-feedback">
  <label class = "col-sm-4 control-label" for="second name"><span class="glyphicon glyphicon-user"></span> User second name: </label>
      <input class="form-control" id="second name" type="text" placeholder="Enter second name"/>
     </div>
  <div class="form-group has-feedback">
  <label class = "col-sm-4 control-label" for="surname"><span class="glyphicon glyphicon-user"></span> User surname: </label>
      <input class="ob form-control" value="<?php echo (isset($_POST['surname'])?($_POST['surname']):"");?>" id="surname" name="surname" type="text" placeholder="Enter surname"/>
     </div>
  <div class="form-group has-feedback">
  <label class = "col-sm-4 control-label" for="phone number" ><span class="glyphicon glyphicon-phone-alt"></span> Phone number:</label>
      <input class="ob form-control" id="phone number" placeholder="Enter phone number"/>
     </div>
   <div class="form-group has-feedback">
   <label class="col-sm-4 control-label" for="email"><span class="glyphicon glyphicon-envelope"></span> Email:</label>
      <input class="ob form-control" name="email" value="<?php echo (isset($_POST['email'])?($_POST['email']):"");?>" id="email" placeholder="Enter Email">
   </div>
    <div class="form-group has-feedback">
    <label class = "col-sm-4 control-label" for="address"><span class="glyphicon glyphicon-home"></span> Address:</label>
      <input class="form-control" id="address" placeholder="Enter address"/>
    </div>
    <div class="form-group">
    <label class = "col-sm-4 control-label"><span class="glyphicon glyphicon-heart"></span> Choose sex: </label>
    <div class="col-sm-8">
		<label class="radio-inline"><input type="radio" name="male" value="male" <?php if (isset($_POST['male'])&&($_POST['male'] == 'male')){ echo 'checked';} ?>/> Male </label>
 		 <label class="radio-inline"><input type="radio" value="female" name="male" <?php if(isset($_POST['male'])&&($_POST['male'] == 'female')){ echo 'checked'; }?>/>Female</label>
		</div>
		</div>
    <div class="form-group row">
      <label for="message">Message:</label>
      <br/>
      <textarea class="form-control" rows="2"  id="message"></textarea>
    </div>
    <div class="form-group">
    <input class="btn btn-primary" type="submit" value="Submit"/>
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