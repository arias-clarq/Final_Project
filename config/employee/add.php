<?php
session_start();
include '../db_conn.php';

$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$login_role_id = $conn->real_escape_string($_POST['login_role_id']);

$sql = "INSERT 
INTO `tbl_employee_account`(`username`, `password`, `login_role_id`) 
VALUES ('$username','$password','$login_role_id')";

$result = $conn->query($sql);

if(!$result){
    echo 'Failed to create account' . $conn->error;
}else{
    $_SESSION['confirm_msg'] = "Successfuly Add New User";
    header('location: ../../dashboard/employee_mgt.php');
}