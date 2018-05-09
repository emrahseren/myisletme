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
    <link rel="stylesheet" href="lib/custom.css">
</head>
<body>

<?PHP include_once('core/menu.php'); ?>

<!-- Content Section -->
<div class="container-fluid no-padding show-grid ">            
    <!--/panel 1-->
    <div class="row col-md-4" >
        <div class="panel panel-danger">
        <div class="panel-heading">
            <a href="#" style="text-decoration:none;color:black;">
            Table 1<span class="badge pull pull-right">10$</span>
            </a>
        </div>
        </div>
        <div class="panel panel-info">
        <div class="panel-heading">
            <a href="#" style="text-decoration:none;color:black;">
            Table 2<span class="badge pull pull-right">0$</span>
            </a>
        </div>
        </div>
        <div class="panel panel-danger">
        <div class="panel-heading">
            <a href="#" style="text-decoration:none;color:black;">
            Table 3<span class="badge pull pull-right">10$</span>
            </a>
        </div>
        </div>
        
    </div>
    
    <!--/panel 2-->
    <div class="row col-md-4" >
        <div class="panel panel-danger">
        <div class="panel-heading">
            <a href="#" style="text-decoration:none;color:black;">
            T1<span class="badge pull pull-right">10$</span>
            </a>
        </div>
        </div> <!--/panel-->
    </div>
    
    <!--/panel 3-->
    <div class="row col-md-4" >
        <div class="panel panel-danger">
        <div class="panel-heading">
            <a href="#" style="text-decoration:none;color:black;">
            T1<span class="badge pull pull-right">10$</span>
            </a>
        </div>
        </div> <!--/panel-->
    </div>
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
