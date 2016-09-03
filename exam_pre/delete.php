<?php
	header("Content-Type:Text/html;charset=utf-8");
	$name = $_GET['name'];
	
	$link = mysql_connect('localhost','root','')or die("Connect failed：".mysql_error());
	$query = "DELETE FROM exam_619.myuser
			  WHERE name='$name'";
	$result = mysql_query($query);
	
	if($result){
		echo "<div>";
		echo "删除成功，点击<a href='admin.php'>返回</a>";
		echo "</div>";
	}else{
		echo mysql_error();
	}
	
?>