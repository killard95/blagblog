<?php

class Signin extends Controller {

    public function index() {
        $this->render('Signin_tpl') ;
    }

    public function record(){
      
        $newUser = new User_DAO ;
        // $newUser->insert($_POST) ;

        if($newUser->insert($_POST)){
            // $info['message'] = ['msg' => 'User bien créé'] ;
            // $this->set($info) ;
            // $this->render('Dashboard_tpl');
            // header("Location:/Views/Assets/Dashboard_tpl.php") ;
            // exit() ;
        }
    }

    public function checkUser(){
        $checkUser = new User_DAO ;
        if($checkUser->verify($_POST)){
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