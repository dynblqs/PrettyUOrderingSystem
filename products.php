<?php
  include_once 'products_crud.php';
    session_start();

   if(isset($_SESSION['fld_staff_num']) && isset($_SESSION['fld_staff_email'])) {
 
?>
 
<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
                html,body {
                  
                  background:url(wp.jpg)center/cover;
                  ;
                }
            </style>  
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>PrettyU Ordering System : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="icon.ico">

 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap.min.css">

</head>
<body>
   
  <?php include_once 'index.html'; ?>
 
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">



        <h2>Create New Product</h2>
      </div>

    <form action="products.php" method="post" class="form-horizontal"> 
        <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">Product ID</label>
          <div class="col-sm-9">
      <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_num']; ?>"required>


      </div>
        </div>
      <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
         <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>"required>


         </div>
        </div>
        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Price</label>
          <div class="col-sm-9">
        <input name="price" type="text" class="form-control" id="productprice" placeholder="Product Price" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>"required>

      </div>
        </div>
      <div class="form-group">
          <label for="productbrand" class="col-sm-3 control-label">Brand</label>
          <div class="col-sm-9">
      <select name="brand" class="form-control" id="productbrand" required>
        <option value="">Please select</option>
        <option value="Maybelline"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Maybelline") echo "selected"; ?>>Maybelline</option>
        <option value="Rimmel"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Rimmel") echo "selected"; ?>>Rimmel</option>
        <option value="IN2IT"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="IN2IT") echo "selected"; ?>>IN2IT</option>
        <option value="Silkygirl"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Silkygirl") echo "selected"; ?>>Silkygirl</option>
        <option value="Wardah"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Wardah") echo "selected"; ?>>Wardah</option>
        <option value="SimplySiti"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="SimplySiti") echo "selected"; ?>>SimplySiti</option>
        <option value="Wet n Wild"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Wet n Wild") echo "selected"; ?>>Wet n Wild</option>
        <option value="Y.O.U"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Y.O.U") echo "selected"; ?>>Y.O.U</option>
        <option value="Revlon"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Revlon") echo "selected"; ?>>Revlon</option>
        <option value="Emina"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Emina") echo "selected"; ?>>Emina</option>
        <option value="Dazzle Me"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Dazzle Me") echo "selected"; ?>>Dazzle Me</option>
        <option value="Etude House"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Etude House") echo "selected"; ?>>Etude House</option>
        <option value="Essence"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="Essence") echo "selected"; ?>>Essence</option>
        <option value="16Brand"<?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="16Brand") echo "selected"; ?>>16Brand</option>
      </select> 
       </div>
        </div>


        <div class="form-group">
          <label for="productcode" class="col-sm-3 control-label">Code/Shade</label>
          <div class="col-sm-9">
      <input name="code" type="text" class="form-control" id="productcode" placeholder="Product Code" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_code']; ?>" required> 
      </div>
        </div>

        <div class="form-group">
          <label for="productweight" class="col-sm-3 control-label">Shipping Weight</label>
          <div class="col-sm-9">
      <input name="weight" type="number" class="form-control" id="productweight" placeholder="Product Weight" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_weight']; ?>" min="0.0" step="0.001" required> 
      </div>
          </div>


      <div class="form-group">
          <label for="producttype" class="col-sm-3 control-label">Type of Products</label>
          <div class="col-sm-9">
      <select name="type" class="form-control" id="producttype" required>
        <option value="">Please select</option>
        <option value="Blusher"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Blusher") echo "selected"; ?>>Blusher</option>
        <option value="Concealer"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Concealer") echo "selected"; ?>>Concealer</option>
        <option value="Eyebrow"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Eyebrow") echo "selected"; ?>>Eyebrow</option>
        <option value="Eyeliner"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Eyeliner") echo "selected"; ?>>Eyeliner</option> 
        <option value="Eyeshadow"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Eyeshadow") echo "selected"; ?>>Eyeshadow</option>
        <option value="Face Powder"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Face Powder") echo "selected"; ?>>Face Powder</option>
        <option value="Foundation"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Foundation") echo "selected"; ?>>Foundation</option>
        <option value="Lip Products"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Lip Products") echo "selected"; ?>>Lip Products</option>       
        <option value="Makeup Remover"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Makeup Remover") echo "selected"; ?>>Makeup Remover</option>
        <option value="Mascara"<?php if(isset($_GET['edit'])) if($editrow['fld_product_type']=="Mascara") echo "selected"; ?>>Mascara</option>
      </select>  
      </div>
        </div> 

        <div class="form-group">
          <label for="productq" class="col-sm-3 control-label">Quantity</label>
          <div class="col-sm-9">
          <input name="quantity" type="number" class="form-control" id="productq" placeholder="Product Quantity" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_quantity']; ?>"  min="0" required>
        </div>
        </div>


        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>

            <?php
            if (isset($_SESSION['fld_staff_role']) && $_SESSION['fld_staff_role'] =='Admin'){
             ?>
          <button class="btn btn-default btn-success" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
           <?php
            if (isset($_SESSION['fld_staff_role']) && $_SESSION['fld_staff_role'] =='Admin'){
             ?>
          <button class="btn btn-default btn-danger" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
           <?php } ?>
            <?php } ?>
        </div>
      </div>
    </form>
    </div>
  </div>
 
  <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
        <h2>Products List</h2>
      </div>
      <style type="text/css">
  table#example {
    background-color: #F8F8FF; /* Replace with your desired color */
  }
</style>
      <table id="example" class="table table-striped table-bordered">
        <thead>
        <tr>
          <th>Product ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Brand</th>
          <th>Code/Shade</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <?php
      // Read
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_products_a188124 ");
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?> 
      <tr>
        <td><?php echo $readrow['fld_product_num']; ?></td>
        <td><?php echo $readrow['fld_product_name']; ?></td>
        <td><?php echo $readrow['fld_product_price']; ?></td>
        <td><?php echo $readrow['fld_product_brand']; ?></td>
        <td><?php echo $readrow['fld_product_code']; ?></td>




        <td>
         <button type="button" role="button" class="btn btn-warning btn-xs modalbtn" data-toggle="modal" data-target="#myModal" data-href="products_details.php?pid=<?php echo $readrow['fld_product_num'];?>">
 
  Details
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Product Details</h4>
      </div>
      <div class="modal-body">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>

          <?php
           if (isset($_SESSION['fld_staff_role']) && $_SESSION['fld_staff_role'] =='Admin'){
            ?>

          <a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>

          <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="returnconfirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
           
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
          order: [[1, "asc"]],
          pageLength : 5,
          lengthMenu: [[5, 10, 20, 30, -1],[5, 10, 20, 30,'All']],
          columnDefs: [{"searchable": false, "targets":2}]
    });

});
  </script>
 </body>
<script>  
    $(document).ready(function(){
   $("body").on("click", ".modalbtn", function(event){ 
     
     var dataURL = $(this).attr( "data-href" )
     $('.modal-body').load(dataURL,function(){
      $('#myModal').modal({show:true});
      $('#myModal').on('hidden.bs.modal', function () {
        
      })
    });
   });
  });

    </script>


</html>
<?php
}else
{
    header("Location: index.php");
    exit();
}
?>
