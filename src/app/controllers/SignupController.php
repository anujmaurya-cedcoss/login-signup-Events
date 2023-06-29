<?php
use Phalcon\Mvc\Controller;
class SignupController extends Controller
{
    public function IndexAction()
    {
        // nothing here
    }

    public function registerAction()
    {
        // creating a new user, with name and email obtained by post method
        $user = new Users();
        
        $user->assign(
            $_POST,
            [
                'email',
                'password',
            ]
        );
        // if the user details is saved, then return success
        $success = $user->save();
        if ($success) {
            $this->response->redirect('/login/');
        } else {
            echo "Not Register due to following reason: <br>" . implode(
                "<br>", $user->getMessages()
            );
            die;
        }
    }
}
