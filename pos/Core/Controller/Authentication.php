<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Authentication extends Controller
{
        private $user = null;

        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                $this->admin_view(false);
                if (isset($_SESSION['user']))
                        Helper::redirect('/dashboard');
        }

        /**
         * Displays login form
         *
         * @return void
         */
        public function login()
        {
                $this->view = 'login';
        }

        /**
         * Login Validation
         *
         * @return void
         */
        public function validate()
        {

                // if user doesn't exists, do not authenticate 
                $user = new User();
                $logged_in_user = $user->check_username($_POST['username']);


                if (!$logged_in_user) {
                
                        $this->invalid_redirect();
                        
                }

        
                if (!\password_verify($_POST['password'], $logged_in_user->password)) {
                        
                        $this->invalid_redirect();
                        
                }





                $_SESSION['user'] = array(
                        'username' => $logged_in_user->username,
                        'display_name' => $logged_in_user->display_name,
                        'user_id' => $logged_in_user->id,
                        'role'=>$logged_in_user->role,
                        'is_admin_view' => true
                );

                if($_SESSION['user']['role']=='admin'){
                        Helper::redirect('/dashboard');
                }elseif ($_SESSION['user']['role']=='seller') {
                        Helper::redirect('/selling');
                }elseif ($_SESSION['user']['role']=='procurement') {
                        Helper::redirect('/items');
                }elseif ($_SESSION['user']['role']=='accountant') {
                        Helper::redirect('/transaction');
                }
                
               
        }

        public function logout()
        {
                \session_destroy();
                \session_unset();
                \setcookie('user_id', '', time() - 3600);
                Helper::redirect('/');
        }

        private function invalid_redirect()
        {
                $_SESSION['error'] = "Invalid Username or Password";
                Helper::redirect('/');
                exit();
        }
}
