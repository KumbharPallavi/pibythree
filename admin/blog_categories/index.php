<?php include('../include/header.php'); ?>
<?php include('../include/sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog Categories
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blog Categories</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<?php if(isset($_SESSION['success']) && !empty($_SESSION['success'])){?>
    	<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $_SESSION['success'];?>
       	</div>
       	<?php $_SESSION['success'] = '';} ?>
       	<?php if(isset($_SESSION['error']) && !empty($_SESSION['error'])){?>
    	<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $_SESSION['error'];?>
       	</div>
       	<?php $_SESSION['error'] = '';} ?>
      <div class="box">
            <div class="box-header">
              <a href="./add.php" class="btn btn-primary pull-right">New Entry</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
					  die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT * FROM blog_categories WHERE is_deleted=1";
					$result = $conn->query($sql);
					$id = 1;
					if ($result->num_rows > 0) {
					  while($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $id++; ?></td>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["created_at"]; ?></td>
                  <td><?php echo (!empty($row["updated_at"]))? $row["updated_at"]:'-'; ?></td>
                  <td>
                  	<?php if($row["status"]=='1'){?>
                  		<a href="./status_change.php?id=<?php echo base64_encode($row["id"]); ?>" class="btn btn-success btn-xs">Active</a>
                  	<?php }else{ ?>
                  		<a href="./status_change.php?id=<?php echo base64_encode($row["id"]); ?>" class="btn btn-danger btn-xs">Inactive</a>
                  	<?php } ?>
                  </td>
                  <td>
                  	<a href="./edit.php?id=<?php echo base64_encode($row["id"]); ?>"><i class="fa fa-edit"></i></a>
                  	<a href="./view.php?id=<?php echo base64_encode($row["id"]); ?>"><i class="fa fa-eye"></i></a>&nbsp;
                  	<a href="./delete.php?id=<?php echo base64_encode($row["id"]); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a>&nbsp;
                  </td>
                </tr>
	            <?php }} ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('../include/footer.php'); ?>