<?php
error_reporting(0);
?>
<html>

<head>
</head>

<body>
<!--<img src="simple.png" alt="" width="200px" height="100px" />  -->


<h1>
Message encryption
</h1><br /><br />
<?php
echo '
<form action="" method="post" enctype="multipart/form-data">
Enter receiver id:<input type="number" name="user" ></input><br /><br />
Select the image:<input type="file" name="pic"></input><br /><br />


Type your message:<input type="text" name="msg">
</input><br />
<br />

<input type="submit" value="upload"> 
</form> ';

?>


</body>

</html>
<?php

echo '

';


if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$filename=$_FILES["pic"]["name"];
		$tempname = $_FILES["pic"]["tmp_name"];
		$folder="drawings/".$filename;
	$message=$_POST['msg'];
	$num=$_POST['user'];
	move_uploaded_file($tempname,$folder);
	if(!empty($folder) && !empty($message) && !empty($num))
	{
		$hostname="localhost";
              $username="root";
              $password="";
              $dbn="steganography";
              $var=mysqli_connect($hostname,$username,$password,$dbn);
                mysqli_set_charset($var,"utf8");
		
		//$varb="SELECT picture FROM encrypt WHERE info='".$message."'";
		if(!empty($folder))
			echo "<img src='$folder'  alt='' width='400px' height='200px'></img>";
		
		
		$secret_message=$message;
		//echo $secret_message;
		include('working.php');
		$converted_to_binary=toBinary($secret_message);
		$msg_size=strlen($secret_message);
		
		$source_to_image=$folder;
		$image=imagecreatefromjpeg($source_to_image);
		$iter=0;
		while($iter<$msg_size)
		{
			$temp=$iter;
			$rrggbb=imagecolorat($image,$iter,$temp);
			$red=($rrggbb >> 16) & 0xFF;
			$green=($rrggbb >> 8) & 0xFF;
			$blue=$rrggbb & 0xFF;
			
		   $changed_red=$red;
			$changed_green=$green;
		$changed_blue=toBinary($blue);
		
		$changed_blue[strlen($changed_blue)-1]=$converted_to_binary[$iter];
		
		$changed_blue=convert_to_String($changed_blue);
		
		
		
		$change_color=imagecolorallocate($image,$changed_red,$changed_green,$changed_blue);
			
			imagesetpixel($image,$iter,$temp,$change_color);
			
			$iter++;
			
		}
			
			//echo '<br /><br />'.$iter.'<br />';
			$random=rand(1,9999);
			imagepng($image,'final'.$random.'.png');
			echo '<h2>your message is successfully encoded!!!!!Now you can decode it anytime from below...</h2>';
			imagedestroy($image);	
		//completed encoding...
		echo '
		<style>

h2 a input{

background-color:green;
padding:10px;
border-radius:20px;
width:200px;
color:white;
font-family:Comic Sans Ms;
font-size:20px;
font-weight:bold;
}

h2 a:hover{

font-weight:bolder;
box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.9),0 8px 8px 0 rgba(0, 0, 0, 0.5),
0 8px 8px 0 rgba(0, 0, 0, 0.5);
}

</style><h2 style="text-align:center;margin-top:40px"><a href="decrypt.php"><input type="submit" name="todo" value="Decrypt" ></input></a></h2><br />
<br />';
		
		
		
		//decrypting message::
		
		

$fetch='final'.$random.'.png';
//echo $random;
$sketch=imagecreatefrompng($fetch);
$real=$secret_message;
$real_message=$real;;
//echo '<br />'.$real_message.'check<br /><br />';
$it=0;
list($width, $height, $type, $attr) = getimagesize($fetch); //get image size

while($it<40)
{
	$tem=$it;
	$rgb=imagecolorat($sketch,$it,$tem);
	
	$rr= ($rgb>> 16) & 0xFF;
	$gg= ($rgb>> 8) & 0xFF;
	$bb= $rgb & 0xFF;
	
	
	$changeblueto = toBinary($bb);
	
	$real_message.= $changeblueto[strlen($changeblueto)-1];
	
	$it++;
	
}
$real_message=convert_to_String($real_message);
$real_message=convert__string($real_message,$real);
//echo '<br /><br /><h2>Decoded Message::'.$real_message.'</h2>';

mysqli_query($var,"INSERT INTO encrypt(info,picture,id,decodedmsg) VALUES ('$message','$folder','$num','$real_message')");

die;

		
		
		
		//completed decoding...
	}
	else{
		
		echo 'Plss input all fields';
		
	}
	

}
else{
	
	
}

?>


