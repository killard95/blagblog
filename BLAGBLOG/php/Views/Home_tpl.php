<?php
include('Header_tpl.php') ;
?>

<div class="container-fluid">
    <div class="container-header bg">
        <form method="POST" action="Signin/checkUser">
            <input class="input" type="text" name="nickname" placeholder="nickname" autocomplete="on">
            <input class="input" type="password" name="password" placeholder="password">
            <button class="btn btn-primary btn-sm">Log in</button>
        </form>
        <a href="/Signin" class="link-dark">Sign in</a>

        <input class="input" type="search" name="search" placeholder="Mots-clés" autocomplete="on">
        <button class="btn btn-primary btn-sm">Search</button>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-4">
                <h3>Column 1</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
                <h3>Column 2</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
            <div class="col-sm-4">
                <h3>Column 3</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
            </div>
        </div>
    </div>
</div> <?php
include('Footer_tpl.php') ;
?>