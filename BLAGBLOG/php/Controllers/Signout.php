<?php

class Signout extends Controller {

     public function index() {
        $this->render('index') ;
    }

    public function signout(){
        $signout = new User_DAO ;
        if($signout->signout($_SESSION['id_user'])){
            // $info['message'] = ['msg' => 'Welcome back!'] ;
            // $this->set($info) ;
            // $this->render('Dashboard_tpl');
            // header("Location:/Views/Assets/Dashboard_tpl.php") ;
            // exit() ;
        } else {
            echo " Pwoblem " ;
        }
    }
}