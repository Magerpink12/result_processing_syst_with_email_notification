<?php

class Session
{
    public $signed_in;
    public $message;
    public $user_id;
    public $user = array([]);

    function __construct()
    {
        session_start();
        $this->check_login();
        $this->check_message();
    }

    private function check_message()
    {
        if (isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = '';
        }
    }
    private function check_login()
    {
        if (isset($_SESSION['user_id'])) {

            $this->user = $_SESSION;
            $this->signed_in = true;
        } else {
            unset($this->user);
            $this->signed_in = false;
        }
    }

    public function is_signed_in()
    {
        return $this->signed_in;
    }

    public function message($msg = '')
    {
        if (!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    public function login($user)
    {
        $this->user_id = $_SESSION['user_id'] = $user->id;
        $this->signed_in = true;
    }
}

$session = new Session();
$session->message();