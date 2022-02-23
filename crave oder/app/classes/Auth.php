<?php


namespace App\classes;


class Auth
{
    protected $email;
    protected $password;
    protected $authEmail;
    protected $authPassword;

    public function __construct($post=null)
    {
        if ($post)
        {
            $this->email = $post['email'];
            $this->password = $post['password'];
        }
    }

    public function login()
    {
        $this->authEmail = 'iqbalmunna01@gmail.com';
        $this->authPassword = '1234';

        if ($this->email == $this->authEmail && $this->password == $this->authPassword)
        {
            session_start();
            $_SESSION['id'] = rand(10, 1000);
            header('Location: action.php?pages=food-upload');
        } else {
            return 'Sorry..Try Again';
        }
    }

    public function logout ()
    {
        session_start();
        unset($_SESSION['id']);
        header('Location: action.php?pages=home');
    }

}