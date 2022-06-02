<?php 
include 'config.php';

session_start();
$user = $_SESSION['username'];

$db = new Database();
$db->select('options','site_name',null,null,null,null);
$site_name = $db->getResult();


// $response = json_decode($response);
// $_SSESSION['TID'] = $response->payment_request->id;
$params1 = [
    'item_number' => $_POST['product_id'],
    // 'txn_id' => $_POST['pay_req_id'],
    // 'txn_id' => $response->payment_request->id,
    'payment_gross' => $_POST['product_total'],
    'payment_status' => 'cash',
];
$params2 = [
    'product_id' => $_POST['product_id'],
    'product_qty' => $_POST['product_qty'],
    'total_amount' => $_POST['product_total'],
    'product_user' => $_SESSION['user_id'],
    'order_date' => date('Y-m-d'),
    // 'pay_req_id' => $_POST['pay_req_id'],
    // 'pay_req_id' => $response->payment_request->id
];
$db = new Database();
$db->insert('payments',$params1);
$db->insert('order_products',$params2);
$db->getResult();
// echo"we will contact you";

// header('Location: '.$response->payment_request->longurl);

?>
<div class="contack" style="background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  contain-align:center;">
    <h1>order successfully, we will contact you</h1>
</div>
<div class="wecontact">
<a href="index.php">
    <input style="color:red;" type="button" value="back to shopping">
</a>
</div>
