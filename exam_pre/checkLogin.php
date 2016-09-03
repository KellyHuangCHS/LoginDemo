<?php
	header("Content-Type:Text/html;charset=utf-8");
	date_default_timezone_set("Asia/Shanghai");
	session_start();
	
	$sub = $_POST['sub'];
	$name = $_POST['username'];
	$psw = $_POST['psw'];
	$code = $_POST['code'];
	
	$t = date("y-m-d h:i:s",time());
	$ip = $_SERVER['REMOTE_ADDR'];
	
	$_SESSION['name'] = $name;
	$_SESSION['psw'] = md5($psw); 
	$_SESSION['time'] = $t;
	$_SESSION['ip'] = $ip;
	$realcode = $_SESSION['code'];

	$link = mysql_connect('localhost','root','') or die("Connect failed.");
	
	if($code==$realcode){
		if($sub=='login'){
			$query = "SELECT * FROM exam_619.myuser WHERE name='$name' AND psw='$psw'";
			$result = mysql_query($query);
			if(mysql_fetch_array($result)){
				updateData($ip, $name);
				($name=='admin') ? ($url = 'admin.php'):($url = 'normal.php');
				gotoPage($url);
				
			}else{
				echo "用户名或密码错误，或用户名不存在";
			}
		}else if($sub=='regist'){
			$query = "SELECT * FROM exam_619.myuser WHERE name='$name'";
			$result = mysql_query($query);
			if(mysql_fetch_array($result)){
				echo "用户名已经存在,请返回重新输入";
			}else{
				$query = "INSERT INTO exam_619.myuser(id,name,psw)
					VALUES('','$name','$psw')";
				$result = mysql_query($query);
				if($result){
					updateData($ip, $name);
					$url = 'normal.php';
					gotoPage($url);
				}else{
					echo "Insert data failed:".mysql_error()."<br />";
				}
			}
		}
	}else{
		echo "<div>";
		echo "验证码不正确，点击<a href='index.php'>返回</a>";
		echo "</div>";
	}
	
	
	function updateData($ip,$name){
		$query = "UPDATE exam_619.myuser
				  SET ip='$ip',time=now()
				  WHERE name='$name'";
		mysql_query($query);
	}
	
	function gotoPage($url){
		echo "<script>";
		echo 	"window.location.href = '$url'";
		echo "</script>";
	}
	
?>