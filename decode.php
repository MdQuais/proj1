<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$find=$_POST['userid'];
	if(!empty($find))
	{
		$hostname="localhost";
              $username="root";
              $password="";
              $dbn="steganography";
              $var=mysqli_connect($hostname,$username,$password,$dbn);
                mysqli_set_charset($var,"utf8");
		
		$get="SELECT * FROM encrypt WHERE id='$find'";
		$catch=mysqli_query($var,$get);
		$row=mysqli_num_rows($catch);
		if($row!=0)
		{
			while($r=mysqli_fetch_array($catch))
							  {
								  $getid=$r['id'];
								    $getmsg=$r['decodedmsg'];
							  }
							  
							  if($getid==$find)
							  {
								  //echo $getid;
								  echo '<h2>The decoded message is '.$getmsg.'</h2>';
								  
							}
							  
							  
			
			
		}
		
		
		else{
			echo "You haven't encoded any message to decode!!!!";
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

</style>

<h2 style="text-align:center;margin-top:40px"><a href="encrypt.php"><input type="submit" name="todo" value="Plss send your msg here" ></input></a></h2><br />
<br /><br /><br />

';
			
		}
		
		
		
		
		
	}
	
	else{
		echo 'Please provide the userid to see the decoded message';
	}
	
	
	
	
	
	
		
	
}

else{
	
	
}

?>