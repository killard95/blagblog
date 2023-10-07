<?php
session_start();
include('Header_tpl.php') ;


echo "<h1>Dashboard de ".$_SESSION['nickname']."</h1><br>";
?>
<form method="POST" action="/Signout/signout">
    <button class="btn btn-danger btn-sm">Sign Out</button>
</form>



<form method="POST" action="/Blague/insertBlague">
    <label for="blague">Veuillez écrire une blague (marrante de préférence)</label>
    <textarea class="form-control border border-primary" name="blague"></textarea><br>
    <button class="btn btn-primary btn-sm">Post</button>
</form><br>


<a href="/Blague/get">Voir mes blagues</a><br>

<form method="POST" action="/Update/update">
    <input type="hidden" name="action" value="<?php $_SESSION['id_user']?>">
    <label>firstname : </label><input class="input" type="text" name="firstname" >
    <label>lastname : </label><input class="input" type="text" name="lastname" >
    <label>nickname : </label><input class="input" type="text" name="nickname" >
    <label>password : </label><input class="input" type="password" name="password" >
    <button class="btn btn-primary btn-sm" type="submit">Update</button>
</form>




<?php
include('Footer_tpl.php') ;
?>