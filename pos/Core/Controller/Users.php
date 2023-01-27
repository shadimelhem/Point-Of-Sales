<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\User;

class Users extends Controller
{
        public function render()
        {
                if (!empty($this->view))
                        $this->view();
        }

        function __construct()
        {
                $this->auth();
                $this->admin_view(true);
        }

        /**
         * Gets all users
         *
         * @return array
         */
        public function index()
        {
               $this->permissions(['user:read']);
                $this->view = 'users.index';
                $user = new User; // new model item.
                $this->data['users'] = $user->get_all();
                $this->data['users_count'] = count($user->get_all());
        }

        public function single()
        {
               $this->permissions(['user:read']);
                $this->view = 'users.single';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Display the HTML form for item creation
         *
         * @return void
         */
        public function create()
        {
               $this->permissions(['user:create']);
                $this->view = 'users.create';
        }

        /**
         * Creates new item
         *
         * @return void
         */
        public function store()
        {
                $this->permissions(['user:create']);
                $user = new User();
                $_POST['password'] = \password_hash($_POST['password'], \PASSWORD_DEFAULT);
                if(!empty($_POST['display_name']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])){
                        $user->create($_POST);
                        Helper::redirect('/users');
                }else{
                        $_SESSION['error']="Please Fill Out All Input";
                        Helper::redirect('/users/create');
                }
        }

        /**
         * Display the HTML form for item update
         *
         * @return void
         */
        public function edit()
        {
                $this->permissions(['user:read', 'user:update']);
                $this->view = 'users.edit';
                $user = new User();
                $this->data['user'] = $user->get_by_id($_GET['id']);
        }

        /**
         * Updates the item
         *
         * @return void
         */
        public function update()
        {
               $this->permissions(['user:read', 'user:update']);
                $user = new User();
                // process role
                $permissions = null;
                switch ($_POST['role']) {
                        case 'admin':
                                $permissions = User::ADMIN;
                                break;

                        case 'seller':
                                $permissions = User::SELLER;
                                break;
                        case 'procurement':
                                $permissions = User::PROCUREMENT;
                                break;
                        case 'accountant':
                                $permissions = User::ACCOUNTANT;
                                 break;
                }
               
               
                $_POST['permissions'] = \serialize($permissions);
                $user->update($_POST);
                Helper::redirect('/user?id=' . $_POST['id']);
        }

        /**
         * Delete the item
         *
         * @return void
         */
        public function delete()
        {
               $this->permissions(['user:read', 'user:delete']);
                $user = new User();
                $user->delete($_GET['id']);
                Helper::redirect('/users');
        }
}
