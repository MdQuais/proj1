<?php


echo 'Register here<br /><br />';

echo '
<style>

p{
width:100%;

}
p input{

border-color:blue;
border-radius:10px;

}

</style>
<form action="upload.php" method="POST">
<p>Name:<input type="text" name="user" ></input><br /></p>
<p>Email-id:<input type="email" name="mailid" ></input><br /></p>
<p>Contact:<input type="longint" name="num" ></input><br /></p>
<p>Password:<input type="password" name="pass"></input><br /></p>



<p><input type="submit" value="Submit"></input></p>



</form>

';



?>