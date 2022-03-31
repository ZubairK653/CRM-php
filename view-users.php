 
<?php   session_start();
        require 'includes/connection.php';
        if(!isset($_SESSION['user'])){
          header('location:login.php');
        }

        $pageName = "View Users";
        if(isset($_GET['id'])){
        $id = $_GET['id']
        }
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
              <li class="ml-3"><a href="add.php" class="btn btn-primary text-center">Add User</a></li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
 <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><?php echo $pageName;?></h3>
               
              <div class="card-tools">
              
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                      <i class="fas fa-search"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>User Role</th>
                    <th>Status</th>
                    <th>Added On</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                    $query = "SELECT * FROM tblusers where user_role = 'user'";
                    $result = mysqli_query($conn, $query);
                    $i = 1;
                    while($row = mysqli_fetch_array($result)){
                      
                ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row['first_name']. " " .$row['last_name'];?></td>
                    <td><?php echo $row['user_name'];?></td>
                    <td><?php echo $row['user_role'];?></td>
                    <td> <?php if ($row['user_status'] == 1 ) {?><span class="badge badge-success">Approved</span> <?php } else {?> <span class="badge badge-danager">Not Approved</span> <?php } ?> </td>
                    <td> <?php $addedon = $row['added_on'];
                    $pieces = explode(" ", $addedon);
                    echo $pieces[0]
                    
                    ?></td>
                    <td> <a href="?id=<?php echo $row['user_id'];?>" class="btn btn-sm btn-primary">Edit</a> <a href="?id=<?php echo $row['user_id'];?>" class="btn btn-sm btn-danger">Delete</a></td>
                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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