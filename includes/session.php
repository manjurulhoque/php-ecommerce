<?php

class Session
{
    private $signed_in;
    private $admin_signed_in;
    public $user_id;
    public $admin_user_id;
    public $count;

    function __construct()
    {
        session_start();
        $this->check_the_admin_login();
        $this->check_the_login();
    }

    public function is_signed_in()
    {
        return $this->signed_in;
    }

    public function admin_signed_in()
    {
        return $this->admin_signed_in;
    }

    public function get_user()
    {
        return $_SESSION['user'];
    }

    public function get_admin()
    {
        return $_SESSION['admin'];
    }

    public function login_admin($user)
    {
        if ($user) {
            $_SESSION['admin'] = $user;
            $this->admin_user_id = $_SESSION['admin_user_id'] = $user->id;
            $this->admin_signed_in = true;
        }
    }

    public function login($user)
    {
        if ($user) {
            $_SESSION['user'] = $user;
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;
        }
    }

    public function visitor_count()
    {
        if (isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }

    public function logout_admin()
    {
        unset($_SESSION['admin_user_id']);
        unset($this->admin_user_id);
        $this->admin_signed_in = false;
    }

    private function check_the_admin_login()
    {
        if (isset($_SESSION['admin_user_id'])) {
            $this->admin_user_id = $_SESSION['admin_user_id'];
            $this->admin_signed_in = true;
        } else {
            unset($this->admin_user_id);
            $this->admin_signed_in = false;
        }
    }

    private function check_the_login()
    {
        if (isset($_SESSION['user_id'])) {
            $this->user_id = $_SESSION['user_id'];
            $this->signed_in = true;
        } else {
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
}

$session = new Session();