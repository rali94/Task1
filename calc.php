<?php
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<title>Calculator</title>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<div id="result"></div>
<style>
#result {
    display: block;
    font-family: sans-serif;
    width: 230px;
    height: 40px;
    margin: 10px auto;
    text-align: right;
    border: 0;
    background: pink;
    color: #fff;
    padding-top: 20px;
    font-size: 20px;
    margin-left: 25px;
    outline: none;
    overflow: hidden;
    letter-spacing: 4px;
    position: relative;
    top: 10px;
}
</style>
<table>
  <tr>
    <th><input class="number" type = "button" value = "1"></th>
    <th><input class="number" type = "button" value = "2"></th>
    <th><input class="number" type = "button" value = "3"></th>
    <th><input class="number" type = "button" value = "4"></th>
    <th><input class="number" type = "button" value = "5"></th>
    <th><input class="number" type = "button" value = "6"></th>
    <th><input class="number" type = "button" value = "7"></th>
    <th><input class="number" type = "button" value = "8"></th>
    <th><input class="number" type = "button" value = "9"></th>
    <th><input class="number" type = "button" value = "0"></th>
  </tr>
  <tr>
    <th><input class="action" type = "button" value = "+"></th>
    <th><input class="action" type = "button" value = "-"></th>
    <th><input class="action" type = "button" value = "*"></th>
    <th><input class="action" type = "button" value = "/"></th>
    <th><input id="del" type = "button" value = "Del"></th>
    <th><input id="ravno" type = "button" value = "="></th>
  </tr>
</table>
<script type="text/javascript">
$(document).ready(function(){
    $(".number").click(function(){
    		var display = $("#result").html();
    		if(($(this).val()===0)&&(display === "")){
    			res = "";
    		}else{
    			var res = display.concat($(this).val()); 
				$("#result").html(res);
    		}
    });
});
</script>
<script>
$(document).ready(function(){
	$(".action").click(function(){
		function2($(this).val());
	});
});
function function2(op){
		var display = $("#result").html();
		if((display!==0)&&(display.substr(display.length - 1)!==op)){
			var add1 = display;
			display = add1.concat(op);	
			$("#result").html(display);
	}
}
</script>
<script>
$(document).ready(function(){
	$("#ravno").click(function(){
		function3($(this).val());
	});
});
function function3(){
	var display = $("#result").html();
	var a = eval(display);
	$("#result").html(a);
}
$(document).ready(function(){
	$("#del").click(function(){
		function4($(this).val());
	});
});
function function4(){
	var display = $("#result").html();
	if(display!==0){
		display = display.slice(0, -1);
	}
	$("#result").html(display);
}

</script>
</body>
</html>