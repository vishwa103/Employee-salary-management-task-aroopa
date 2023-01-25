<?php

$con = new mysqli('localhost', 'root', '', 'emp_salary');

if(!$con){

   die(mysqli_error($con));
}
?>