



<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/Database.php');

?>

<?php

class Order
{

    private $db;

    public function __construct()
    {

        $this->db = new Database();
    }

    public function getAllOrder()
    {

        $query = "SELECT *, tbl_order.id as oid FROM tbl_order join tbl_customer on tbl_customer.id = tbl_order.cmrId 
        join tbl_product on tbl_product.productId = tbl_order.productId order by tbl_order.id desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateOrder($id, $status)
    {
        // die('Id: ' . $id . ' status: ' . $status);
        $query = "UPDATE tbl_order SET status='$status' WHERE id=$id";
        // die($query);
        return $this->db->update($query);
    }
}

?>