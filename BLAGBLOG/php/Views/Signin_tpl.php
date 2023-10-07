

<?php
include('Header_tpl.php') ;
?>

        <form method="post" action="Signin/record"> 
            <input class="input" type="text" name="firstname" placeholder="firstname">
            <input class="input" type="text" name="lastname" placeholder="lastname">
            <input class="input" type="text" name="nickname" placeholder="nickname"> 
            <input class="input" type="password" name="password" placeholder="password"> 
            <button class="input btn btn-primary btn-sm" type="submit">Sign In</button>
        </form>

        <?php
include('Footer_tpl.php') ;
?>