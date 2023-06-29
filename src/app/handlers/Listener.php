<?php
namespace handler\Listener;

use Phalcon\Di\Injectable;

class Listener extends injectable
{

    public function afterLogin()
    {
        $this->session->set('email', $_POST['email']);
        $this->session->set('password', $_POST['password']);
    }

    public function autoFill() {
        $_POST['email'] = $this->session->get('email');
        $_POST['password'] = $this->session->get('password');
    }
}
