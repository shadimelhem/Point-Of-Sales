<?php

namespace Core\Model;

use Core\Base\Model;

class Selling extends Model
{
    public function get_transactions_logged_in_user($id): array
    {
        $data = array();
        $result = $this->connection->query("SELECT * FROM $this->table WHERE user_id=$id AND created_at >= CURDATE()" );

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
