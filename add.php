<?php  require 'includes/session.php';
        if(!isset($_SESSION['user'])){
          header('location:login.php');
        }
 $pageName = "Add";
?>

<?php include 'header.php' ; ?>
  <!-- Main Sidebar Container -->
<?php include 'sidebar.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard CRM</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="http://localhost/CRM-PHP">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $pageName;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
<section class="content">
      <div class="container-fluid">
            <div class="row">
             <div class="col-md-12">
             <?php if(isset($_GET['err'])){ ?>
                        <div class="alert alert-danger">
                             <?php echo $_GET['err'];?>
                        </div>
                        <?php } ?>
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add User</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?php echo htmlspecialchars('includes/save-user.php');?>" enctype="multipart/form-data" id="user-form">
                            <div class="card-body">
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" class="form-control" id="" placeholder="User Name" name="username">
                            </div>
                            <div class="form-group">
                                <label for="">User Password</label>
                                <input type="text" class="form-control" id="" placeholder="User Password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" id="" placeholder="First Name" name="firstname">
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" id="" placeholder="Last Name" name="lastname">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                            </div>
                            
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="save">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
             </div>
         </div>
            <!-- /.row -->
        </div><!--/. container-fluid -->
     </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php' ; ?>

  