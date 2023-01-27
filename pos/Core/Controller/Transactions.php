<?php

namespace Core\Controller;
use Core\Model\item;
use Core\Base\Controller;
use Core\Helpers\Helper;
use Core\Model\Transaction;
use Core\Model\Selling;


class Transactions extends Controller
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
                

               $this->permissions(['transaction:read']);
                $this->view = 'transactions.index';
                 $transaction= new transaction; // new model item.
        
                 $stmt = $transaction->connection->prepare('SELECT users.display_name,sellings.id,sellings.item_name, sellings.quantity,sellings.total,sellings.created_at,sellings.updated_at, transactions.*

        FROM transactions

        JOIN sellings ON transactions.selling_id = sellings.id

        JOIN users ON transactions.user_id = users.id

        ORDER BY sellings.id');
         
                 $stmt->execute();
         
                 $result = $stmt->get_result();
         
                 $stmt->close();
         
                 $transactions_info = array();
         
                 if ($result->num_rows > 0) {
         
                     while ($row = $result->fetch_object()) {
         
                         $transactions_info[] = $row;
         
                     }
         
                 }
         
         
         
                 $this->data['transaction_info'] = $transactions_info;
         
                 $this->data['transaction_count'] = count($transaction->get_all());
              
        }


        /**
         * Delete the item
         *
         * @return void
         */
        public function delete()
        {
                $this->permissions(['transaction:delete']);
                $tran = new transaction();
               
                $tran->delete($_GET["id"]);
               
                Helper::redirect('/transaction');
        }
}
