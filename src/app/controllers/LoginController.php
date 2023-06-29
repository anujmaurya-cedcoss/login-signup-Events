<?php
use Phalcon\Mvc\Controller;

session_start();
class LoginController extends Controller
{
    public function IndexAction()
    {
        // redirected to view
        $this->autoFill;
    }
    public function loginAction()
    {
        $user = new Users();
        $user->assign(
            $this->request->getPost(),
            [
                'email',
                'password',
            ]
        );
        // query to find the user by name and email
        $query = $this->modelsManager->createQuery(
            'SELECT * FROM Users WHERE password = :password: AND email = :email:'
        );
        $usr = $query->execute([
            'password' => $user->password,
            'email' => $user->email
        ]);
        if (isset($usr[0])) {
            // trigger the event to save data in session
            $this->customEvent;
            echo "<h3>Logged in successfully</h3>";
            echo "<a href = '/index/'>Go home</a>";
        } else {
            echo "Invalid Credentials";
        }
        die;
    }
}
