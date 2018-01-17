<html>
<head>
	<title>fetching images</title>
	<style>
		#container{
			
			width: 100%;
		}
		.ori{
			height: 200px;
		}
		.dummy{
			height: 200px;
		}
	</style>
</head>
	<body>
		<div id="container">
			<img src="asus-zenfone-max-back.jpg" class="ori" onClick="myFunction()">
		</div>
	
 <?php
 $con = new mysqli("localhost","root","","usr");
 if($con->connect_error)
 {
	 die("connection failed".$con->connect_error);
 }
 $sql = "select * from images";
 $result = $con->query($sql);
 $i = 1;
echo "<script>
	var type = 'dummy';
	var i = 1;
	var j = 1;
	var n = 5;
	
	var images = [];";
 if($result->num_rows > 0)
 {
	while($row = $result->fetch_assoc())
	{
		echo "images[$i] = '$row[path]';";
		$i = $i + 1;
	}
 }
 echo "function myFunction() {
	if (i <= n) 
	{
		var x = document.createElement('IMG');
		x.setAttribute('id', type.concat(i));
		x.setAttribute('src', images[i]);
		x.setAttribute('onclick','myFunction()');
		x.setAttribute('display', 'inline-block');
		x.setAttribute('class', 'dummy');
		x.setAttribute('alt', 'asus');
		document.getElementById('container').appendChild(x);
		i = i + 1;
	}
	else
	{
		while(j <= n)
		{
			var eleid = type.concat(j);
			var divOne = document.getElementById(eleid);
			divOne.style.display='none';
			j = j + 1;
			document.location.reload();
		}
		
	}
}

</script> ";
$con->close();	
?>
</body>
</html>