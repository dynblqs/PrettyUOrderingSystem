<!DOCTYPE html>  
 <html>  
      <head>  
           <title>PrettyU: Login</title> 
           <link rel="shortcut icon" type="image/x-icon" href="logo.jpg"/>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
           <link href="css/bootstrap.min.css" rel="stylesheet"> 
           <script src="js/bootstrap.min.js"></script> 
             <style type="text/css">
                html,body {
                  height:100%;
                  background:url(bg.jpg);
                  background-position: center;
                  background-repeat: no-repeat;
                  background-size: cover;
                }
            </style>  
      </head>  
      <body>  
           <br />  
           <div id="a" class="container" style="width:35%;">
               <div id="c" class="col-md-12">
                    <div id="d" class="jumbotron" style="background-color: #FFC0CB;" >
                         <center><h2 align="">PrettyU</h2>
                              <a href="logo.jpg" style="pointer-events: none;"><img src="logo.png" alt="Picture of a logo" class="img-circle" width="60%" height=""></a>
                               <form action="login.php" method="post">
                                
                                <?php if (isset($_GET['error'])) {?> <p class="error"><?php echo $_GET['error']; ?></p><?php } ?>

                                   <label>Username</label>
                                   <input type="text" name="uname" class="form-control" placeholder="Email"/>  
                                   <br />  
                                   <label>Password</label>
                                   <input type="password" name="password" class="form-control" placeholder="Password"/>  
                                   <br>  
                                <button type="submit">Login</button>
                          </form>

              <a href="#" data-toggle="modal" data-target="#myModal" class="forgot-password">
                Dummy Account
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->
  </div>
</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Account List</h4>
        </div>
        <div class="modal-body">
          <div class="list-group">
            <div href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Admin</h4>
              <p class="list-group-item-text">
                <dl class="dl-horizontal">
                  <dt>Email</dt>
                  <!-- <dd>admin@hypers.com.my</dd> -->
                  <dd>the8_minghao@prettyu.com</dd>
                  <dt>Password</dt>
                  <dd>1234</dd>
                </dl>
              </p>
            </div>

            <div href="#" class="list-group-item">
              <h4 class="list-group-item-heading">Normal Staff</h4>
              <p class="list-group-item-text">
                <dl class="dl-horizontal">
                  <dt>Email</dt>
                  <!-- <dd>staff@hypers.com.my</dd> -->
                  <dd>krishna.pavan@prettyu.com</dd>
                  <dt>Password</dt>
                  <dd>6789</dd>
                </dl>
              </p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
                        

          <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
          <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="js/bootstrap.min.js"></script>
          <script src="login.js"></script>  
</body>  
 </html>  