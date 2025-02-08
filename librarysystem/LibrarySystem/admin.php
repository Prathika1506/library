<!DOCTYPE html>
<?php
	require_once 'valid.php';
?>	
<html lang = "eng">
	<head>
		<title>Library System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
	</head>
	<body style = "background-color:#d3d3d3;">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/logo.png" width = "50px" height = "50px" />
					<h4 class = "navbar-text navbar-right">Library System</h4>
				</div>
			</div>
		</nav>
		<div class = "container-fluid">
			<div class = "col-lg-2 well" style = "margin-top:60px;">
				<div class = "container-fluid" style = "word-wrap:break-word;">
					<img src = "images/user.png" width = "50px" height = "50px"/>
					<br />
					<br />
					<label class = "text-muted"><?php require'account.php'; echo $name;?></label>
				</div>
				<hr style = "border:1px dotted #d3d3d3;"/>
				<ul id = "menu" class = "nav menu">
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "home.php"><i class = "glyphicon glyphicon-home"></i> Home</a></li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-tasks"></i> Accounts</a>
						<ul style = "list-style-type:none;">
							<li><a href = "admin.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Admin</a></li>
							<li><a href = "student.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-user"></i> Student</a></li>
						</ul>
					</li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "book.php"><i class = "glyphicon glyphicon-book"></i> Books</a></li>
					<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-th"></i> Transaction</a>
						<ul style = "list-style-type:none;">
							<li><a href = "borrowing.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Borrowing</a></li>
							<li><a href = "returning.php" style = "font-size:15px;"><i class = "glyphicon glyphicon-random"></i> Returning</a></li>
						</ul>
					</li>
					<li><a  style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = ""><i class = "glyphicon glyphicon-cog"></i> Settings</a>
						<ul style = "list-style-type:none;">
							<li><a style = "font-size:15px;" href = "logout.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<div class = "col-lg-1"></div>
			<div class = "col-lg-9 well" style = "margin-top:60px;">
				<div class = "alert alert-info">Accounts / Admin</div>
					<button id = "add_admin" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add new</button>
					<button id = "show_admin" type = "button" style = "display:none;" class = "btn btn-success"><span class = "glyphicon glyphicon-circle-arrow-left"></span> Back</button>
					<br />
					<br />
					<div id = "admin_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>Username</th>
									<th>Password</th>
									<th>Firstname</th>
									<th>Middlename</th>
									<th>Lastname</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							<?php
								$q_admin = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
								while($f_admin = $q_admin->fetch_array()){
									
							?>	
								<tr class = "target">
									<td><?php echo $f_admin['username']?></td>
									<td><?php echo md5($f_admin['password'])?></td>
									<td><?php echo $f_admin['firstname']?></td>
									<td><?php echo $f_admin['middlename']?></td>
									<td><?php echo $f_admin['lastname']?></td>
									<td><a href = "#" class = "btn btn-danger deladmin_id" value = "<?php echo $f_admin['admin_id']?>"><span class = "glyphicon glyphicon-remove"></span> Delete</a> <a href = "#" class = "btn btn-warning eadmin_id" value = "<?php echo $f_admin['admin_id']?>"><span class = "glyphicon glyphicon-edit"></span> Edit</a></td>
								</tr>
							<?php
								}
							?>	
							</tbody>
						</table>
					</div>
					<div id = "edit_form"></div>
					<div id = "admin_form" style = "display:none;">
						<div class = "col-lg-3"></div>
						<div class = "col-lg-6">
							<form method = "POST" action = "save_admin_query.php" enctype = "multipart/form-data">
								<div class = "form-group">
									<label>Username:</label>
									<input type = "text" required = "required" name = "username" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Password:</label>
									<input type = "password" maxlength = "12" name = "password" required = "required" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Firstname:</label>
									<input type = "text" name = "firstname" required = "required" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Middlename:</label>
									<input type = "text" name = "middlename" placeholder = "(Optional)" class = "form-control" />
								</div>	
								<div class = "form-group">	
									<label>Lastname:</label>
									<input type = "text" required = "required" name = "lastname" class = "form-control" />
								</div>
								<div class = "form-group">	
									<button class = "btn btn-primary" name = "save_admin"><span class = "glyphicon glyphicon-save"></span> Submit</button>
								</div>
							</form>		
						</div>	
					</div>
			</div>
		</div>
		<br />
		<br />
		<br />
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid">
				<label class = "navbar-text pull-right">Library System &copy; All rights reserved 2016</label>
			</div>
		</nav>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#add_admin').click(function(){
				$(this).hide();
				$('#show_admin').show();
				$('#admin_table').slideUp();
				$('#admin_form').slideDown();
				$('#show_admin').click(function(){
					$(this).hide();
					$('#add_admin').show();
					$('#admin_table').slideDown();
					$('#admin_form').slideUp();
				});
			});
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Deleting...</label></center>');
			$('.deladmin_id').click(function(){
				$admin_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.deladmin_id').attr('disabled', 'disabled');
				$('.eadmin_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_admin.php?admin_id=' + $admin_id;
				}, 1000);
			});
			$('.eadmin_id').click(function(){
				$admin_id = $(this).attr('value');
				$('#show_admin').show();
				$('#show_admin').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#admin_table').show();
					$('#add_admin').show();
				});
				$('#admin_table').fadeOut();
				$('#add_admin').hide();
				$('#edit_form').load('load_admin.php?admin_id=' + $admin_id);
			});
		});
	</script>
</html>