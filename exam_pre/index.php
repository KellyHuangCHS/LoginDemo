<?php
	$link = mysql_connect('localhost','root','') or die("Connect failed.");
	
	$query = 'CREATE DATABASE IF NOT EXISTS exam_619';
	$result = mysql_query($query);
	if($result){
		echo "Database create successfully.</br>";
	}else{
		echo "Database already exists.</br>";
	}
	
	$query = 'CREATE TABLE IF NOT EXISTS exam_619.myuser(
			id int(11) NOT NULL AUTO_INCREMENT,
			name varchar(50) NOT NULL,
			psw varchar(50) NOT NULL,
			PRIMARY KEY (id))';
	$result = mysql_query($query);
	if($result){
		echo "Table exam create successfully.</br>";
	}else{
		echo "Table exam already exists.</br>";
	}
	
	$query = 'SELECT * FROM exam_619.myuser WHERE id=1';
	$result = mysql_query($query);
	if(mysql_fetch_array($result)){
		echo "Admin already exists.</br>";
	}else{
		$query = "INSERT INTO exam_619.myuser(id,name,psw)
				VALUES(1,'admin','admin')";
		$result = mysql_query($query);
		if($result){
			echo "Admin inserts successfully.</br>";
		}else{
			echo "Admin inserts failed:".mysql_error()."</br>";
		}
	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
		<form action="checkLogin.php" method="post" onsubmit="return checkNull()">
		<label>Username:</label><br />
		<input type="text" name="username" id="username"/><br />
		<label>Password:</label><br />
		<input type="password" name="psw" id="psw"/><br />
		<img src="image.php"/><br />
		<input type="text" name="code" id="code"/><br />
		<input type="submit" name="sub" value="login"></input>
		<input type="submit" name="sub" value="regist"></input>
		</form>
		<div id="msg"></div>
		
		
		<script>
			function checkNull(){
				var name = document.getElementById("username").value;
				var psw = document.getElementById("psw").value;
				var code = document.getElementById("code").value;
				if(name==''||psw==''){
					renderMsg("用户名或密码为空");
					return false;
				}else if(code==''){
					renderMsg("验证码为空");
					return false;
				}else{
					return true;
				}
			}
			
			function renderMsg(msg){
				document.getElementById("msg").innerHTML = msg;
			}
			
		</script>

	</body>
</html>
