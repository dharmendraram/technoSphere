<?php
include '../classess/Order.php';

$status = $_POST['orderItemStatus'];
$id = $_POST['id'];
$order = new Order();

// die('Id: ' . $id . ' status: ' . $status);

if ($order->updateOrder($id, $status)) {
    header('location:sliderlist.php?msg=status changed');
}
