<?php
session_start();


use Core\Model\User;
use Core\Router;



spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'Core') === false)
        return;
    $class_name = str_replace("\\", '/', $class_name); // \\ = \
    $file_path = __DIR__ . "/" . $class_name . ".php";
    require_once $file_path;
});



Router::get('/', "authentication.login"); 
Router::get('/logout', "authentication.logout"); 
Router::post('/authenticate', "authentication.validate"); 
Router::get('/dashboard', "admin.index");
Router::get('/items', "items.index");
Router::get('/item', "items.single");
Router::get('/items/create', "items.create"); 
Router::post('/items/store', "items.store");
Router::get('/items/edit', "items.edit"); 
Router::post('/items/update', "items.update"); 
Router::get('/items/delete', "items.delete"); 
Router::get('/users', "users.index"); 
Router::get('/user', "users.single"); 
Router::get('/users/create', "users.create"); 
Router::post('/users/store', "users.store");
Router::get('/users/edit', "users.edit"); 
Router::post('/users/update', "users.update"); 
Router::get('/users/delete', "users.delete");
Router::get('/selling', "sellings.index"); 
Router::post('/selling/create', "sellings.store");
Router::post('/selling/update', "sellings.update");
Router::get('/transaction', "transactions.index");
Router::get('/transaction/delete', "transactions.delete");

Router::redirect();
