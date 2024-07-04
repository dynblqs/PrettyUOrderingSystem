<?php
  include_once 'staffs_crud.php';
  

 if (isset($_SESSION['fld_staff_role']) && $_SESSION['fld_staff_role'] =='Normal Staff') {
         header("Location: index.php?");
         exit();

    }
    if (isset($_SESSION['fld_staff_role']) && $_SESSION['fld_staff_role'] =='Admin') {
?>




<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
                html,body {
                  
                  background:url(wp.jpg) center/cover;
                  ;
                }
            </style>  
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
 
  <title>PrettyU : Staffs</title>
   <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="icon.ico">
 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
   <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">

     
</head>
<body>
  <?php include_once 'index.html'; ?>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
        <h2>Add New Staff</h2>
      </div>

    <form action="staffs.php" method="post">
       <div class="form-group">
          <label for="staffid" class="col-sm-3 control-label">Staff ID</label>
          <div class="col-sm-9">
     <input name="sid" type="text" class="form-control" id="staffid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_num']; ?>" required>
 
 
 
       </div>
        </div>
      <div class="form-group">
         <label for="staffname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9"> 
            <input name="name" type="text" class="form-control" id="staffname" placeholder="Staff Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_fname']; ?>"required>
 
 
  
     
</div>
        </div>
     <div class="form-group">
      <label for="Email" class="col-sm-3 control-label">Email</label>
      <div class="col-sm-9">
      <input name="email" type="text" class="form-control" id="email" placeholder="Email" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>" required>
      


</div>
        </div>
     <div class="form-group">
      <label for="password" class="col-sm-3 control-label">Password</label>
      <div class="col-sm-9">
      <input name="password" type="password" class="form-control" id="password" placeholder="Password" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_password']; ?>" required>
      

</div>
        </div>

      <div class="form-group">
      <label for="role" class="col-sm-3 control-label">Role</label>
      <div class="col-sm-9">
      <div class="radio">
      <label>
      <input name="role" type="radio" id="role" value="Normal Staff" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_role']=="Normal Staff") echo "checked"; ?> required> Normal Staff
        </label>
          </div>
          <div class="radio">
            <label>
        <input name="role" type="radio" id="role" value="Admin" <?php if(isset($_GET['edit'])) if($editrow['fld_staff_role']=="Admin") echo "checked"; ?>> Admin 
        </label>
       

 
     </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
  <?php if (isset($_GET['edit'])) { ?>
      <input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">


      


      <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
 
      <?php } else { ?>
      <?php
           if (isset($_SESSION['fld_staff_role']) && $_SESSION['fld_staff_role'] =='Admin'){
            ?>
      
     <button class="btn btn-default btn-success" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
 
       <?php } ?>
     <button class="btn btn-default btn-danger" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
 <?php } ?>
     
    </div>
      </div>
    </form>
    </div>
  </div>
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Staff List</h2>
      </div>
      <style type="text/css">
  table#example {
    background-color: #F8F8FF; /* Replace with your desired color */
  }
</style>
      <table id="example" class="table table-striped table-bordered">
    <hr>
    <thead>
      <tr>
          <th>Staff ID</th>
          <th>Staff Name</th>
          <th>Staff Email</th>
        
          <th></th>
        </tr>
      </thead>
      <tbody>
     <?php
      // Read
     
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $stmt = $conn->prepare("select * from tbl_staffs_a188124");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>
      <tr>
        <td><?php echo $readrow['fld_staff_num']; ?></td>
        <td><?php echo $readrow['fld_staff_fname']; ?></td>
        <td><?php echo $readrow['fld_staff_email']; ?></td>

        <td>
             <?php
           if (isset($_SESSION['fld_staff_role']) && $_SESSION['fld_staff_role'] =='Admin'){
            ?>
          
          <a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
          <a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
          <?php
        }
          ?>
        </td>
      </tr>
      <?php
      }
      $conn = null;
      ?>
    </tbody>
    </table>
     </div>
  </div>
   

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
      $('#example').DataTable({
      "aLengthMenu": [[5, 10, 20, -1], [5, 10, 20, "All"]],
    "pageLength": 5
    }
      );
    


});
</script>
</body>

</html>
<?php
}else
{
    header("Location: index.php");
    exit();
}
?>
