<?php

namespace Core\Controller;
use Core\Model\Item;
use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Selling;
use Core\Model\Transaction;


class Sellings extends Controller
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
                
               $this->permissions(['transaction:create']);
                $this->view = 'sellings.index';
                $item = new item; 
                $this->data['items'] = $item->get_all();
                $this->data['user_id'] =$_SESSION['user']['user_id'];
                $selling=new Selling;
                $this->data['all_transactions']= $selling->get_transactions_logged_in_user($_SESSION['user']['user_id']);
               
        }

     

    
        

        /**
         * Creates new item
         *
         * @return void
         */
        public function store()
        {

                
                $values= explode(",",$_POST['values']);
                $_POST['item_name']= $values[0];
                $_POST['selling_price']= (int)$values[1];
                $_POST['item_id']=(int)$values[2];
                unset($_POST['values']);
                if(empty($_POST)){
                        Helper::redirect('/selling');
                        exit;
                }else{
                        $item = new Item();
                        $id=$_POST['item_id'];
                        $selected_item= $item->get_by_id($_POST['item_id']);
                        $stock_quantity=$selected_item->quantity;
                        $new_quantitiy=$_POST['quantity'];
                       
                       
                        }
                        $updated_quantity=$stock_quantity-$new_quantitiy;
                        
                        $new_quantitiy=$stock_quantity;
                        $selling = new Selling();
                        $Transaction = new Transaction();
                        $_POST['total']= (int)$_POST['selling_price']*(int)$_POST['quantity'];
                        $selling->create($_POST); 
 
                       $Transaction_id = $selling->get_by_id($selling->connection->insert_id);
                       $Transaction_id = $Transaction_id->id; 
                       $user_id = $_SESSION['user']['user_id'];
                       $Transaction->connection->query("INSERT INTO transactions (selling_id, user_id) VALUES ($Transaction_id ,$user_id)");
                       $item->connection->query("UPDATE items SET quantity=$updated_quantity WHERE id=$id");
                       Helper::redirect('/selling');
                }
                
             
         
        


        /**
         * Delete the item
         *
         * @return void
         */
        public function delete()
        {
                $this->permissions(['transaction:create']);
                $selling = new Selling();
               
               $selling->delete($_GET["id"]);
               Helper::redirect('/selling');
        }
}
