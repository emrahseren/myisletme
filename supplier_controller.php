<?php
// include Database connection file 
include("core/db_connection.php");

$a = $_GET['a'];



// GET ALL RECORD
if($a == "getList"){
    //$sql = "SELECT * from supplier where status > -1 ";
    $sql = "SELECT * from supplier";
    $dataList = mysql_query($sql);
    
    if(mysql_num_rows($dataList) > 0)
    {
       
        $output = array('data' => array());
        while($row = mysql_fetch_array($dataList)){
            if($row['status'] == 1) {
                $status = "<label class='label label-success'>Available</label>";
            } else if($row['status'] == 0) {
                $status = "<label class='label label-danger'>Not Available</label>";
            } else if($row['status'] == -1) {
                $status = "<label class='label label-info'>Updated</label>";
            } else if($row['status'] == -2) {
                $status = "<label class='label label-danger'>DELETED</label>";
            }
            
            $action = '<button onclick="ChangeStatus('.$row['id'].','.$row['status'].')" class="btn btn-info btn-xs">ChangeStatus</button>
                       <button onclick="GetDetails('.$row['id'].')" class="btn btn-warning btn-xs">Update</button>  
					   <button onclick="DeleteModalOpen('.$row['id'].')" class="btn btn-danger btn-xs">Delete</button>';

            
            $output['data'][] = array( 		
                $row[0], 
                $row[1],
                $row[2],
                $status,
                $action
 		     ); 	
        }        
    }
    echo json_encode($output); 
}



if($a == "add"){
	if(isset($_POST['name']) && isset($_POST['exp']) )
	{
        $name = $_POST['name'];
		$exp = $_POST['exp'];
		
		$query = "INSERT INTO supplier(name, exp, status) VALUES('$name', '$exp', '0')";
		if (!$result = mysql_query($query)) {
	        //exit(mysql_error());
	    }
	    echo "1 Record Added!";
	}    
}

    

if($a == 'delete'){
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        // delete User
        //$query = "DELETE FROM supplier WHERE id = '$id'";
        $query = "UPDATE supplier SET status = '-2' WHERE id = '$id'";

        
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
    }
   
}


if($a == 'getDetail'){
    
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        // get User ID
        $id = $_POST['id'];

        // Get User Details
        $query = "SELECT * FROM supplier WHERE id = '$id'";
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
        $response = array();
        if(mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result)) {
                $response = $row;
            }
        }
        else
        {
            $response['status'] = 200;
            $response['message'] = "Data not found!";
        }
        // display JSON data
        echo json_encode($response);
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Invalid Request!";
    }
}

    
if($a == 'update'){

    if(isset($_POST))
    {
        // get values
        $id = $_POST['id'];
        $name = $_POST['name'];
        $exp = $_POST['exp'];
        
        // Updaste User details
        $query = "UPDATE supplier SET name = '$name', exp = '$exp', status = '-1' WHERE id = '$id'";
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
    }
}


if($a == 'changeStatus'){
    if(isset($_POST))
    {
        // get values
        $id = $_POST['id'];
        $status = $_POST['status'];

        if($status == '1')
            $status = '0';
        else if($status == '0')
            $status = '1';
        else
            $status = '0';

        $query = "UPDATE supplier SET status = '$status' WHERE id = '$id'";
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
    }
}


?>