<?php

namespace Core\Controller;

use Core\Base\Controller;
use Core\Base\View;
use Core\Helpers\Helper;
use Core\Helpers\Tests;
use Core\Model\item;


class Items extends Controller
{

    use Tests;

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
     * 
     *
     * @return array
     */
    public function index()
    {
        $this->permissions(['item:read']);
        $this->view = 'items.index';
        $item = new item; // new model item.
        $this->data['items'] = $item->get_all();
        $this->data['items_count'] = count($item->get_all());
    }

    public function single()
    {

        self::check_if_exists(isset($_GET['id']), "Please make sure the id is exists");

       $this->permissions(['item:read']);
        $this->view = 'items.single';
        $item = new item();
        $this->data['item'] = $item->get_by_id($_GET['id']);
    }

    /**
     *
     *
     * @return void
     */
    public function create()
    {
        $this->permissions(['item:create']);
        $this->view = 'items.create';
    }

    /**
     * Creates new item
     *
     * @return void
     */
    public function store()
    {
       
        
        $this->permissions(['item:create']);
        $item = new item();
        if(!empty($_POST['item_name']) && !empty($_POST['cost']) && !empty($_POST['selling_price']) && !empty($_POST['quantity'])){
            $item->create($_POST);
            Helper::redirect('/items');
        }else{
            $_SESSION['error']="Please Fill Out All Input";
            Helper::redirect('/items/create');
        }
    }

    /**
     * Display the HTML form for item update
     *
     * @return void
     */
    public function edit()
    {
        $this->permissions(['item:read', 'item:update']);
        $this->view = 'items.edit';
        $item = new item();
        
        $selected_item = $item->get_by_id($_GET['id']);
        $this->data['item'] = $selected_item;
    }

    /**
     * Updates the item
     *
     * @return void
     */
    public function update()
    {
       $this->permissions(['item:read', 'item:update']);
        $item = new item();

        // Handle items_tags relations
        $item_id = $_POST['id'];
        
        $item->update($_POST);
        Helper::redirect('/item?id=' . $_POST['id']);
    }

    /**
     * Delete the item
     *
     * @return void
     */
    public function delete()
    {
        $this->permissions(['item:read', 'item:delete']);
        $item = new item();
        $item->delete($_GET['id']);
        Helper::redirect('/items');
    }
}
