<?php

class Update extends Controller {
    public function index() {
        $this->render('index');
    }

    public function update() {
            $update = new User_DAO ;
            if($update->update($_POST)){
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