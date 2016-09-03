<?php
	header("Content-Type:Text/html;charset=utf-8");
	$link = mysql_connect('localhost','root','') or die("Connect failed.");
	ob_clean();
	$query = "SELECT * FROM exam_619.myuser";
	$result = mysql_query($query);
	
	$sql = "SELECT substring(`time`,12,2) as `hour`,count(*) as `total`
			FROM exam_619.myuser
			GROUP BY `hour`";
	$rs = mysql_query($sql);
	
	function renderUser($name,$ip,$time){
		echo "<tr>";
		echo 	"<td>$name</td>";
		echo 	"<td>$ip</td>";
		echo 	"<td>$time</td>";
		echo 	"<td><button type='button'><a href='delete.php?name=$name'>删除</a></button></td>";
		echo 	"<td><button type='button'><a href='reset.php?name=$name'>重设</a></button></td>";
		echo "<tr/>";
	}
	
	function renderText($hour,$total){
		echo "<p>最后登陆时间为".$hour."的有".$total."人；</p>";
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>管理员页面</title>
		<style>
			*{
				box-sizing: border-box;
			}
			
			.bg{
				position: relative;
				background: #d8d8d8;
				width: 540px;
				height: 140px;
			}
			
			.table{
				position: relative;
				background: #eee;
				width: 500px;
				height: 100px;
				left: 20px;
				top:20px;
				border-bottom: 2px solid #232323;
			}
			
			.block{
				position: absolute;
				bottom: 0px;
				width: 10px;
				/*height: 20px;*/
				background-color: #232323;
				margin-left: 5px;
				margin-right: 5px;
			}
			.text{
				position: absolute;
				font-size: 12px;
				bottom: 5px;
				left: 20px;
			}
			
			span{
				margin-left: 3px;
			}
			
		</style>
	</head>
	<body>
		<table>
			<tr>
				<td>用户名</td>
				<td>IP地址</td>
				<td>时间</td>
				<td>删除</td>
				<td>重设</td>
			</tr>
			<?php
				while($row = mysql_fetch_array($result)){
					renderUser($row['name'], $row['ip'], $row['time']);
				}
			?>
		</table>
		<div id="text">
			<h4>不同时段登陆人数统计</h4>
			<?php
				while($row = mysql_fetch_array($rs)){
					renderText($row['hour'], $row['total']);
				}
			?>
		</div>
		
		<div class="bg">
			<div class="table">
				<div class="block" id="01"></div>
				<div class="block" id="02"></div>
				<div class="block" id="03"></div>
				<div class="block" id="04"></div>
				<div class="block" id="05"></div>
				<div class="block" id="06"></div>
				<div class="block" id="07"></div>
				<div class="block" id="08"></div>
				<div class="block" id="09"></div>
				<div class="block" id="10"></div>
				<div class="block" id="11"></div>
				<div class="block" id="12"></div>
				<div class="block" id="13"></div>
				<div class="block" id="14"></div>
				<div class="block" id="15"></div>
				<div class="block" id="16"></div>
				<div class="block" id="17"></div>
				<div class="block" id="18"></div>
				<div class="block" id="19"></div>
				<div class="block" id="20"></div>
				<div class="block" id="21"></div>
				<div class="block" id="22"></div>
				<div class="block" id="23"></div>
				<div class="block" id="24"></div>
			</div>
			<div class="text">
				<span>01</span>
				<span>02</span>
				<span>03</span>
				<span>04</span>
				<span>05</span>
				<span>06</span>
				<span>07</span>
				<span>08</span>
				<span>09</span>
				<span>10</span>
				<span>11</span>
				<span>12</span>
				<span>13</span>
				<span>14</span>
				<span>15</span>
				<span>16</span>
				<span>17</span>
				<span>18</span>
				<span>19</span>
				<span>20</span>
				<span>21</span>
				<span>22</span>
				<span>23</span>
				<span>24</span>
			</div>
		</div>
		
		<script>
			function setHeight(){
				for(var i=1;i<=24;i++){
					if(i<10){
						var item = document.getElementById('0'+i);
					}else{
						var item = document.getElementById(i);
					}
					item.style.left = (i-1)*20+i+"px";
				}
			}
			
			function renderImage(hour,total){
				var item = document.getElementById(hour);
				item.style.height = total*10+"px";
			}
			
			setHeight();
			<?php
				$sql1 = "SELECT substring(`time`,12,2) as `hour`,count(*) as `total`
						FROM exam_619.myuser
						GROUP BY `hour`";
				$rs1 = mysql_query($sql1);
				while($row1 = mysql_fetch_array($rs1)){
				}
			?>
			
		</script>
		
	</body>
</html>