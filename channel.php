<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>

    <!-- Bootstrap CSS File  -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap-3.3.5-dist/css/bootstrap.css"/>
</head>
<body>

<?PHP include_once('core/menu.php'); ?>

<!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Category</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#addChannel">Add New Record</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="channel_list"></div>
        </div>
    </div>
        
</div>
<!-- /Content Section -->


<!-- Bootstrap Modals -->

<!-- Modals -->
<?php
    include_once('channel_modal.php');
?>
<!-- // Modal -->

<!-- Jquery JS file -->
<script type="text/javascript" src="lib/js/jquery-1.11.3.min.js"></script>

<!-- Bootstrap JS file -->
<script type="text/javascript" src="lib/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<!-- Custom JS file -->
<script type="text/javascript" src="channel_script.js"></script>
</body>
</html>
