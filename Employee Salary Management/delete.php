<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "delete `emp_detail`,`sal_detail` from `emp_detail`inner join `sal_detail` on `emp_detail`.emp_id=`sal_detail`.emp_id where `emp_detail`.emp_id=$id";
    $result = mysqli_query($con, $sql);
    if($result)
    {
        header('location:display.php');
    }
    else{
        die(mysqli_error($con));
    }
}

?>