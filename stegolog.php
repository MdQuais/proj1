<?php

echo '

<script >

alert("Pls register first!!");
</script>
<style>

p{
width:100%;

}
p input{

border-color:blue;
border-radius:10px;

}

</style>
<div style="text-align:center">
<form action="stegologin.php" method="POST">
<p>User-id:<input type="email" name="user"></input><br /></p>
<p>Password:<input type="password" name="pass"></input><br /></p>

<p><input type="submit" value="Login"></input><br /></p>

</form>
<h2>New User<a href="register1.php">Register here!!</a></h2>

</div>

';



?>