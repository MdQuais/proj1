<?php


if($_SERVER['REQUEST_METHOD']=='POST')
{

$id=$_POST['user'];
$mail=$_POST['mailid'];
$call=$_POST['num'];
$pas=$_POST['pass'];
if(!empty($id) && !empty($mail) && !empty($call) && !empty($pas) )
{
             $hostname="localhost";
              $username="root";
              $password="";
              $dbn="steganography";
              $varb=mysqli_connect($hostname,$username,$password,$dbn);
                mysqli_set_charset($varb,"utf8");
$que="INSERT INTO SECURITY(Name,email,mobile,password) VALUES ('$id','$mail','$call','$pas')";
mysqli_query($varb,$que); 


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

<h2 style="text-align:center;margin-top:40px"><a href="encrypt.php"><input type="submit" name="todo" value="Encrypt" ></input></a></h2><br />
<br /><br /><br />
<h2 style="text-align:center;margin-top:40px"><a href="decrypt.php"><input type="submit" name="todo" value="Decrypt" ></input></a></h2><br />
<br />
';

}
else{
	echo 'Plss input all the fields for registering!';
}


}
else{
	
	echo'No forms have been submitted!';
	
}





?>




