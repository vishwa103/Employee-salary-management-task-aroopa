<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT `emp_detail`.*,`sal_detail`.* FROM `emp_detail` join `sal_detail` on `emp_detail`.emp_id=`sal_detail`.emp_id where `emp_detail`.emp_id=$id";
$result = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($result);
        $name = $row['name'];
        $dept = $row['dept'];
        $sex = $row['sex'];
        $status = $row['status'];
        $salary = $row['salary'];
        $address = $row['address'];

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $dept=$_POST['dept'];
    $sex=$_POST['sex'];
    $status=$_POST['status'];
    $salary = $_POST['salary'];
    $address = $_POST['address'];

    $sql = "update `emp_detail`,`sal_detail` set `emp_detail`.name='$name',`emp_detail`.dept='$dept',`emp_detail`.sex='$sex',`emp_detail`.status='$status',`sal_detail`.salary='$salary',`emp_detail`.address='$address' WHERE `emp_detail`.emp_id=`sal_detail`.emp_id AND `emp_detail`.emp_id=$id";
    $result = mysqli_query($con, $sql);
    if($result)
    {
        $sql = "insert into`sal_detail`(salary) values('$salary')";
        $result = mysqli_query($con, $sql);
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
        <form method="post" id="form" onsubmit="validateForm()">
            <div class="mb-3">
                <label>Employee Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter the name"
                    name="name" value=<?php echo $name;?> >
                    <div class="error"></div>
            </div>
            <div class="mb-3">
                <label>Department</label>
                <input type="text" class="form-control" id="dept" placeholder="Enter the department"
                    name="dept" autocomplete="off" value=<?php echo $dept;?>>
                    <div class="error"></div>
            </div>
            <div class="mb-3">
                <label>Sex</label><br>
                <input type="radio" class="form-check-input" name="sex" id="flexRadioDefault1" value="Male" required
                <?php
                if($sex=="Male")
                {
                    echo "checked";
                }
                ?>
                >
                <label class="form-check-label" for="flexRadioDefault1" value="Male">Male</label>
                <input type="radio" class="form-check-input" name="sex" id="flexRadioDefault2" value="Female" 
                <?php
                if($sex=="Female")
                {
                    echo "checked";
                }
                ?>>
                <label class="form-check-label" for="flexRadioDefault2" value="Female">Female</label>
                <div class="error"></div>
            </div>
            <div class="mb-3">
                <label>Marital Status</label>
                <select name="status"  id="status" class ="form-select" aria-label="Default select example" required >
                    <option selected><?php echo $status;?></option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                </select>
                <div class="error"></div>
            </div>
            <div class="mb-3">
                <label>Salary</label>
                <input id="salary"type="number" class="form-control" id="exampleInputEmail1"  
                    name="salary" placeholder="Enter the salary" autocomplete="off"  value=<?php echo $salary?> required >
                    <div class="error"></div>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input id="address" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter the address"
                    name="address" autocomplete="off" value=<?php echo $address?> required>
                    <div class="error"></div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>&nbsp; 
        </form>
    </div>
</body>

</html>
