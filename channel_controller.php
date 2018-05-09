<?php
// include Database connection file 
include("core/db_connection.php");

$a = $_GET['a'];



if($a == "addChannel"){
    
    	// get values 
        $name = $_POST['name'];
		$exp = $_POST['exp'];
		
    	$query = "INSERT INTO channel (name, exp, status) VALUES ('$name', '$exp', '1')";
		if (!$result = mysql_query($query)) {
	        //exit(mysql_error());
	    }
	   
}



// GET ALL RECORD
if($a == "getAll"){
	// Design initial table header 
	$data = '<table class="table table-bordered table-striped">
						<tr>
							<th>No</th>
							<th>Name</th>
                            <th>Explanation</th>
                            <th>Status</th>
                            <th>Action</th>
						</tr>';

	$query = "SELECT * FROM channel";

	if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }

    // if query results contains rows then featch those rows 
    if(mysql_num_rows($result) > 0)
    {
    	$number = 1;
    	while($row = mysql_fetch_array($result))
    	{
           
            if($row['status'])
                $status = "Active";
            else
                $status = "Passive";
            
    		$data .= '<tr>
				<td>'.$row['id'].'</td>
				<td>'.$row['name'].'</td>
                <td>'.$row['exp'].'</td>
				<td>'.$row['status'].'-'.$status.'</td>
                <td class="pull-right">';
                if($status)
                $data .= '<button onclick="changeStatus('.$row['id'].','.$row['status'].')" class="btn btn-info">ChangeStatus</button>
                    <button onclick="updateModal('.$row['id'].')" class="btn btn-warning">Update</button>  
					<button onclick="deleteModal('.$row['id'].')" class="btn btn-danger">Delete</button>

    		</tr>';
                
    	}
    }
    else
    {
    	// records now found 
    	$data .= '<tr><td colspan="5">Records not found!</td></tr>';
    }

    $data .= '</table>';
    echo $data;
}


if($a == 'delete'){
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        // get user id
        $id = $_POST['id'];

        // delete User
        $query = "DELETE FROM channel WHERE id = '$id'";
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
    }
   
}


if($a == 'getChannelById'){
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        // get user id
        $id = $_POST['id'];

        // delete User
        $query = "SELECT * FROM channel WHERE id = '$id'";
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
        $response = array();
        if(mysql_num_rows($result) > 0) {
            while ($row = mysql_fetch_array($result)) {
                $response = $row;
            }
        }
        echo json_encode($response);
    }
   
}
    
if($a == 'updateChannel'){
        
        $id = $_POST['id'];
        $name = $_POST['name'];
        $exp = $_POST['exp'];
        
        // Updaste User details
        //UPDATE `test`.`channel` SET `name` = 'Cafe1' WHERE `channel`.`id` = 1;
        $query = "UPDATE channel SET name = '$name', exp = '$exp' WHERE id = '$id'";
        
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
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

        $query = "UPDATE channel SET status = '$status' WHERE id = '$id'";
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
    }
}



?>