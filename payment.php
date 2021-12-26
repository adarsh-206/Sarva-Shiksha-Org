<?php

include('db.php');

if(isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['amount']) && isset($_POST['pay_id'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $amount = $_POST['amount'];
    $pay_id = $_POST['pay_id'];
    
    $query = "INSERT into razorpay (name,phone,email,amount,pay_id) VALUES('" . $name . "','" . $phone . "','" . $email . "','" . $amount . "','" . $pay_id . "')";
    mysqli_query($con, $query);
}
?>

