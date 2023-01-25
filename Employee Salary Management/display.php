<?php
include 'connect.php';
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee display</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
</head>

<body>
  <div class="container my-5">
  <h2>Employee Salary Management</h2>
    <button class="btn btn-primary my-5"><a href="index.php" class="text-light">
        Add Employee Details</a>
    </button>
    <div class="card-body">
      <div class="row">
        <div class="col md-7">
          <form action="" method="GET">
          <div class="input-group mb-3">
            <input name="search" value="<?php if (isset($_GET['search'])) {
              echo $_GET['search'];}?>" type="text" class="form-control" placeholder="Search data" autocomplete="off">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Employee ID</th>
          <th scope="col">Employee Name</th>
          <th scope="col">Department</th>
          <th scope="col">Sex</th>
          <th scope="col">Marital Status</th>
          <th scope="col">Salary</th>
          <th scope="col">Address</th>
          <th scope="col">Operation</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (!(isset($_GET['search']))) {
          $sql = "select * from `emp_detail` join `sal_detail` using (emp_id)";
          $result = mysqli_query($con, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['emp_id'];
              $name = $row['name'];
              $dept = $row['dept'];
              $sex = $row['sex'];
              $status = $row['status'];
              $salary = $row['salary'];
              $address = $row['address'];
              echo '<tr>
        <th scope="row">' . $id . '</th>
        <td>' . $name . '</td>
        <td>' . $dept . '</td>
        <td>' . $sex . '</td>
        <td>' . $status . '</td>
        <td>' . $salary . '</td>
        <td>' . $address . '</td>
        <td>
      <button class="btn btn-primary"><a href="update.php?
      updateid=' . $id . '" class="text-light">Edit</a></button>
      <button class="btn btn-danger"><a href="delete.php?
      deleteid=' . $id . '" class="text-light">Delete</a></button>
  </td>
      </tr>';
            }
          }
        }
      else if(isset($_GET['search']))
        {
          $filtervalues = $_GET['search'];
          $query = "SELECT * from `emp_detail` join `sal_detail`using (emp_id) where CONCAT(name,dept,status,address,salary) LIKE '%$filtervalues%'";
          $result = mysqli_query($con, $query);

          if((mysqli_num_rows($result) > 0))
          {
            
            foreach($result as $items)
            {
              
              $id = $items['emp_id'];
              $name = $items['name'];
              $dept = $items['dept'];
              $sex = $items['sex'];
              $status = $items['status'];
              $salary = $items['salary'];
              $address = $items['address'];
              echo '<tr>
          <th scope="row">' . $id . '</th>
          <td>' . $name . '</td>
          <td>' . $dept . '</td>
          <td>' . $sex . '</td>
          <td>' . $status . '</td>
          <td>' . $salary . '</td>
          <td>' . $address . '</td>
          <td>
        <button class="btn btn-primary"><a href="update.php?
        updateid=' . $id . '" class="text-light">Edit</a></button>
        <button class="btn btn-danger"><a href="delete.php?
        deleteid=' . $id . '" class="text-light">Delete</a></button>
    </td>
        </tr>';
            }
          }
          else{
            ?>
            <tr>
              <td colspan="4">No Record Found</td>
          </tr>
            <?php
            
          }
        }
     
        ?>
      </tbody>
    </table>
  </div>

</body>

</html>