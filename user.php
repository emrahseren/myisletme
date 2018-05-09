<?php require_once 'core/control.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.5-dist/css/bootstrap.css"/>
    	
		<link rel="stylesheet" href="lib/datatables/jquery.dataTables.min.css">
	<link rel="stylesheet" href="lib/datatables/buttons.dataTables.min.css">

</head>
<body>

<?PHP include_once('core/menu.php'); ?>

<!-- Content Section -->
<div class="container">
    
	<div class="panel panel-primary ">
			<div class="panel-heading">
				<div class="page-heading">
                    <h4><i class="glyphicon glyphicon-eye-open"></i> User List </h2>

                </div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

            <div class="remove-messages"></div>
                
            <div class="div-action pull pull-right" style="padding-bottom:20px;">
			     <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_modal">Add New Record</button>
            </div> <!-- /div-action -->				
			
            <table class="table table-bordered table-striped" id="userTable">
                <thead>
                    <tr>
				        <th>ID</th>
						<th>First Name</th>
                        <th>Last Name</th>
                        <th>EMail</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Action</th>
				    </tr>
                </thead>
            </table>
            </div> <!-- /panel-body -->
            <div class="panel-footer">
                <button class="btn btn-info btn-xs" onclick="exportExcel()">Export Excel</button>
            </div>
            
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->
 
        
</div>
<!-- /Content Section -->


<!-- Modals -->
<?php include_once('user_modal.php'); ?>
<!-- // Modal -->

    
<!-- Jquery JS file -->
<script type="text/javascript" src="lib/js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="lib/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<!-- DataTable JS file -->    
<script type="text/javascript" src="lib/datatables/jquery.dataTables.min.js"></script>
    
<script type="text/javascript" src="lib/jquery.table2excel.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="user_script.js"></script>
    
</body>
</html>
