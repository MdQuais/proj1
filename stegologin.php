<html>
<head>
<title></title>
<style>

</style>
</head>
<body style="">

<div class="header">


</div>
</div>

<div class="main">
<?php
      

	  if($_SERVER['REQUEST_METHOD'] == 'POST')
		  
          {	
                 $user_id=$_POST['user'];
				 $user_pass=$_POST['pass'];

                      if(!empty($user_id) && !empty($user_pass))
					  {

                           $hostname="localhost";
                          $username="root";
                            $password="";
                            $dbn="steganography";
                          $varc=mysqli_connect($hostname,$username,$password,$dbn);
                                mysqli_set_charset($varc,"utf8");

                             $que=mysqli_query($varc,"SELECT * FROM security WHERE email='".$user_id."'");
                          $r=mysqli_num_rows($que);
						  if($r!=0)
						  {
							  while($row=mysqli_fetch_array($que))
							  {
								  $id=$row['email'];
								  $passc=$row['password'];
								  
							  }
							  if($id==$user_id)
							  {
								 if($passc==$user_pass){
									 echo '<h1 style="font-family:Comic Sans MS;font-weight:bolder;text-align:center;margin-top:100px">You have successfully logged into your account</h1>';
									 echo '<h3 style="text-align:center"><br /><a href="projhome.php">Go to Home</h3>';
								 } 
								  else{
									  echo '<h1 style="font-family:Comic Sans MS;font-weight:bolder;text-align:center;margin-top:100px;">Please check your password!!</h1>';
									  echo '<h3 style="text-align:center"><br /><a href="stegolog.php">Login again!</a></h3>';
								  }
								  
							  }
							  else{
								  
								  echo '<h1 style="text-align:center;font-family:verdana;margin-top:100px">Please enter a valid email_id</h1>';
								  echo '<h3 style="text-align:center;text-decoration:none"><a href="stegolog.php">Login again!</a></h3>';
							  }
							    
						  }
						  else{
							  
							 echo '<h2 style="text-align:center;font-family:verdana;margin-top:100px"> You have not been registered yet!!</h2>'; 
							  echo '<h3 style="text-align:center;text-decoration:none"><a href="register1.php">Pls register here</a></h3>';
							  
						  }

					  }
                      else{
						  echo '<h2 style="text-align:center;font-family:verdana;margin-top:100px;">Please input all the fields!!!<br /><a href="stegolog.php" />Login again</a></h2>';
						  
						  
					  }

		  }
     else{
		 
		 echo '<h3>You have not submitted your response</h3>';
	 }


?>
</div>

<div class="footer">
</div>

</body>



















</html>