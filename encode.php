<html>

<head>

</head>




<body>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$picture=$_POST['pic'];
	$message=$_POST['msg'];
	if(!empty($picture) && !empty($message))
	{
		$hostname="localhost";
              $username="root";
              $password="";
              $dbn="steganography";
              $var=mysqli_connect($hostname,$username,$password,$dbn);
                mysqli_set_charset($var,"utf8");
		mysqli_query($var,"INSERT INTO security(msgtohide,image) VALUES ('$message','pic')");
		$varb="SELECT image FROM security WHERE msgtohide='".$message."'";
		echo '<img src=$picture alt="" width="400px" height="200px"></img>';
		
		$file=$_FILES["pic"]["name"];
		$tempname = $_FILES["pic"]["tmp_name"];
		$folder="drawings/".$file;
		echo $folder;
		move_uploaded_file($tempname,$folder);
		
	}
	else{
		
		echo 'Plss input all fields';
		
	}
	
	
	
	
}
else{
	
	
}
?>


</body>
</html>