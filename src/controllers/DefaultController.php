<?php

use App\Repository\SetRepository;

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index(){
        session_start();

        $this->render('index-page', []);
    }
    public function login(){
        $this->render('login-page', []);
    }
    public function register(){
        $this->render('register-page', []);
    }
    public function output(){
        $this->render('output-page', []);
    }
    public function editSet(){
        session_start();
        if (!isset($_SESSION['user_id'])) {
            $this->render('login-page', []);
            exit;
        }
        $this->render('edit-set-page', []);
    }
    public function addSet(){
        session_start();

        if (!isset($_SESSION['user_id'])) {
            $this->render('login-page', []);
            exit;
        }
        $this->render('create-set-page', []);
    }
    public function changePassword(){
        session_start();

        if (!isset($_SESSION['user_id'])) {
            $this->render('login-page', []);
            exit;
        }
        $this->render('change-password-page', []);
    }
    public function myAccount(){
        session_start();
        if (!isset($_SESSION['user_id'])) {
            $this->render('login-page', []);
            exit;
        }
        $this->render('my-account-page', []);
    }


}