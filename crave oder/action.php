<?php

require_once 'vendor/autoload.php';

use App\classes\FoodUpload;
use App\classes\Auth;

if (isset($_GET['pages']))
{
    if ($_GET['pages'] == 'food-upload')
    {
        include 'pages/foodUpload.php';
    } elseif ($_GET['pages'] == 'home')
    {
        $foodUpload = new FoodUpload();
        $students = $foodUpload->getAllStudentInfo();
        include 'pages/home.php';
    }elseif ($_GET['pages'] == 'login')
    {
        include 'pages/login.php';
    }elseif ($_GET['pages'] == 'logout')
    {
        $auth = new Auth();
        $auth->logout();
    }
} elseif (isset($_POST['btn']))
{
    $fileUpload = new FoodUpload($_FILES, $_POST);
    $message = $fileUpload->index();
    include 'pages/foodUpload.php';
} elseif (isset($_POST['loginBtn']))
{
    $auth = new Auth($_POST);
    $message = $auth->login();
    include 'pages/login.php';
}