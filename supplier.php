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
    <div class="row">
        <div class="col-md-12">
            <h1>Suppliers</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#add_modal">Add New Record</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped" id="table">
                <thead>
                    <tr>
				        <th>ID</th>
						<th>Name</th>
                        <th>Explanation</th>
                        <th>Status</th>
                        <th>Action</th>
				    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <button class="btn btn-info btn-xs" onclick="exportExcel()">Export Excel</button>
            </div>
        </div>
    </div>
        
</div>
<!-- /Content Section -->


<!-- Modals -->
<?php include_once('supplier_modal.php'); ?>
<!-- // Modal -->

    
<!-- Jquery JS file -->
<script type="text/javascript" src="lib/js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="lib/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<!-- DataTable JS file -->    
<script type="text/javascript" src="lib/datatables/jquery.dataTables.min.js"></script>
    
<script type="text/javascript" src="lib/jquery.table2excel.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="supplier_script.js"></script>
    
</body>
</html>
