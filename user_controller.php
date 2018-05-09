<?php
// include Database connection file 
require_once 'core/db_connection.php';

$msg_success = "Operation Success.";
$msg_required = "Please Fill The Required Inputs!";

$a = "";
if(isset($_GET['a']))
    $a = $_GET['a'];

if($a == "addUser"){
	if($_POST['first_name'] != "" 
    && $_POST['last_name'] != "" 
    && $_POST['email'] != ""
    && $_POST['role_id'] != ""
    && $_POST['password'] != ""
      )
	{
        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
        $role_id = $_POST['role_id'];
		$password = md5($_POST['password']);
            
		$query = "INSERT INTO user(first_name, last_name, email, password, role_id, status) 
        VALUES('$first_name', '$last_name', '$email', '$password', '$role_id', '0')";
		if (!$result = mysql_query($query)) {
	        echo(mysql_error());
	    }else
	       echo $msg_success;
	}else
        echo $msg_required;
}

    
if($a == 'updateUser'){

    if($_POST['id'] != "" 
    && $_POST['first_name'] != "" 
    && $_POST['last_name'] != "" 
    && $_POST['email'] != ""
    && $_POST['role_id'] != "")
	{
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $role_id = $_POST['role_id'];
        $pass = md5($_POST['pass']);

        // Updaste User details
        $query = "UPDATE user SET first_name = '$first_name', last_name = '$last_name', email = '$email', role_id = '$role_id', password  = '$pass' WHERE id = '$id'";
        if (!$result = mysql_query($query)) {
            echo(mysql_error());
        }else
            echo $msg_success;
            
    }else
        echo $msg_required;
}

if($a == 'deleteUser'){
    if(isset($_POST['id']) != "")
    {
        // get user id
        $user_id = $_POST['id'];

        // delete User
        $query = "DELETE FROM user WHERE id = '$user_id'";
        if (!$result = mysql_query($query)) {
             echo(mysql_error());
        }
        else
            echo $msg_success;
    }else
        echo $msg_required;
   
}

// GET ALL RECORD
if($a == "getList"){
$sql = "SELECT * from user";
$dataList = mysql_query($sql);
    
    if(mysql_num_rows($dataList) > 0)
    {
        $roles[] = array();
        $q_roles = "SELECT id, name FROM role where status = 1";
        $d_roles = mysql_query($q_roles);
        if(mysql_num_rows($d_roles) > 0)
        {
            while($row = mysql_fetch_array($d_roles)){
              $roles[] = array("id"=>$row[0],"name"=>$row[1]);

            }        
        }
        
        $output = array('data' => array());
        while($row = mysql_fetch_array($dataList)){
            if($row['status'] == '1') {
                $status = "<label class='label label-success'>Available</label>";
            } else {
                $status = "<label class='label label-danger'>Not Available</label>";
            }
            $rid = $row['role_id'];
            if(!isset($roles[$rid]["name"]))
                $role_name = "---";
            else $role_name = $roles[$rid]["name"];
            
            $action = '<button onclick="ChangeUserStatus('.$row['id'].','.$row['status'].')" class="btn btn-info btn-xs">ChangeStatus</button>
                       <button onclick="GetUserDetails('.$row['id'].')" class="btn btn-warning btn-xs">Update</button>  
					   <button onclick="DeleteUserOpen('.$row['id'].')" class="btn btn-danger btn-xs">Delete</button>';

            
            $output['data'][] = array( 		
                $row['id'], 
                $row[1],
                $row[2],
                $row[3],
                $role_name,
                $status,
                $action
 		     ); 	
        }   
        echo json_encode($output); 
    }
}


if($a == 'getUserDetail'){
    
    if(isset($_POST['id']) && isset($_POST['id']) != "")
    {
        // get User ID
        $user_id = $_POST['id'];

        // Get User Details
        $query = "SELECT * FROM user WHERE id = '$user_id'";
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




if($a == 'changeUserStatus'){
    if($_POST['id'] != "")
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

        $query = "UPDATE user SET status = '$status' WHERE id = '$id'";
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
    }
}

function roleOptions(){
    
    $sql = "SELECT id, name FROM role WHERE status = 1";
    $result =mysql_query($sql); // $connect->query($sql);
    if(mysql_num_rows($result) > 0)
    {
        while($row = mysql_fetch_array($result)){
		echo "<option value='".$row[0]."'>".$row[1]."</option>";
        } //
    }
}
?>

