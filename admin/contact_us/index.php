<?php include('../include/header.php'); ?>
<?php include('../include/sidebar.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Contact Us
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Contact Us</li>
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
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile No.</th>
                  <th>Subject</th>
                  <th>Description</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
					$conn = new mysqli($servername, $username, $password, $dbname);
					if ($conn->connect_error) {
					  die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT * FROM contact_us WHERE is_deleted=1 ORDER BY id DESC";
					$result = $conn->query($sql);
					$id = 1;
					if ($result->num_rows > 0) {
					  while($row = $result->fetch_assoc()) { ?>
                <tr>
                  <td><?php echo $id++; ?></td>
                  <td><?php echo $row["name"]; ?></td>
                  <td><?php echo $row["email"]; ?></td>
                  <td><?php echo $row["mobile_no"]; ?></td>
                  <td><?php echo $row["subject"]; ?></td>
                  <td><?php echo $row["description"]; ?></td>
                  <td><?php echo $row["created_at"]; ?></td> 
                  <td>
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