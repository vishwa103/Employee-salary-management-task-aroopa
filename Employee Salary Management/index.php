<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $dept=$_POST['dept'];
    $sex=$_POST['sex'];
    $status=$_POST['status'];
    $salary = $_POST['salary'];
    $address = $_POST['address'];
    

    $sql = "insert into `emp_detail` (name,dept,sex,status,address)
    values('$name','$dept','$sex','$status','$address')";
   
    $result = mysqli_query($con, ($sql));
    if($result)
    {
        $sql = "insert into`sal_detail`(salary) values('$salary')";
        $result = mysqli_query($con, ($sql));
        if($result)
        {
            header('location:display.php');
        }
        
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
</head>
<body>
<div class="container my-5">
    <h2>Employee Salary Management</h2>
        <form method="post" id="form" class="contact-form">
            <div class="mb-3">
                <label>Employee Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter the name"
                    name="name" autocomplete="off" required>
                    <div class="invalid-feedback">
                        Enter the Employee name
                    </div>
            </div>
            <div class="mb-3">
                <label>Department</label>
                <input type="text" class="form-control" id="dept" placeholder="Enter the department"
                    name="dept" autocomplete="off" required>
                    <div class="invalid-feedback">
                        Enter the Employee department
                    </div>
            </div>
            <div class="mb-3">
                <label>Sex</label><br>
                <input type="radio" class="form-check-input" name="sex" id="flexRadioDefault1" value="Male" required>
                <label class="form-check-label" for="flexRadioDefault1" value="Male">Male</label>
                <input type="radio" class="form-check-input" name="sex" id="flexRadioDefault2" value="Female" >
                <label class="form-check-label" for="flexRadioDefault2" value="Female">Female</label>
                <div class="error"></div>
            </div>
            <div class="mb-3">
                <label id="result" >Marital Status</label>
                <select name="status" id="status" class ="form-select" aria-label="Default select example">
                    <option selected >--SELECT--</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                </select>
                <div class="error"></div>
            </div>
            <div class="mb-3">
                <label>Salary</label>
                <input id="salary"type="number" class="form-control" id="exampleInputEmail1"  
                    name="salary" placeholder="Enter the salary" autocomplete="off" required>
                    <div class="invalid-feedback">
                        Enter the Employee salary
                    </div>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input id="address" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter the address"
                    name="address" autocomplete="off" required>
                    <div class="invalid-feedback">
                        Enter the Employee address
                    </div>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" id="submit" value="Submit">&nbsp; 
            <button class="btn btn-success"><a href="display.php" type="button" class="text-light" name="view">View</a></button>&nbsp;
            <button class="btn btn-danger" type="reset" class="text-light" name="cancel">Cancel</button>
        </form>
    </div>
    
</body>
</html>
