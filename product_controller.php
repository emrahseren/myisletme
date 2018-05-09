<?php
// include Database connection file 
include("core/db_connection.php");

$a = "";
if(isset($_GET['a']))
    $a = $_GET['a'];


// GET ALL RECORD
if($a == "getList"){
    //$sql = "SELECT * from supplier where status > -1 ";
    $sql = "SELECT product.id, product.cod, product.name, product.exp, product.quantity, product.price, product.cost, channel.name category, supplier.name supplier, product.status FROM product  INNER JOIN channel ON channel.id=product.category inner join supplier ON product.supplier = supplier.id";
    $dataList = mysql_query($sql);
    
    if(mysql_num_rows($dataList) > 0)
    {
        
            
       
        $output = array('data' => array());
        while($row = mysql_fetch_array($dataList)){
            if($row['status'] == 1) {
                $status = "<label class='label label-success'>Ok</label>";
            } else if($row['status'] == 0) {
                $status = "<label class='label label-danger'>No</label>";
            } else if($row['status'] == -1) {
                $status = "<label class='label label-info'>Updated</label>";
            } else if($row['status'] == -2) {
                $status = "<label class='label label-danger'>DELETED</label>";
            }
            
            $action = '<input type="hidden" id="hidden_id" value="'.$row['id'].'">
                       <button onclick="ChangeStatus('.$row['id'].','.$row['status'].')" class="btn btn-info btn-xs">Status</button>
                       <button onclick="GetDetails('.$row['id'].')" class="btn btn-warning btn-xs">Update</button>  
					   <button onclick="DeleteModalOpen('.$row['id'].')" class="btn btn-danger btn-xs">Delete</button>
                       <button onclick="CopyRecord('.$row['id'].')" class="btn btn-success btn-xs">Copy</button>';

            $profit = $row['price'] - $row['cost'];
            $output['data'][] = array( 		
                $row['id'], 
                $row['cod'],
                $row['name'],
                $row['exp'],
                $row['quantity'],
                $row['price'],
                $row['cost'],
                $profit,
                $row['category'],
                $row['supplier'],
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
        $cod = $_POST['cod'];
		$name = $_POST['name'];
        $exp = $_POST['exp'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $cost = $_POST['cost'];
        $category = $_POST['category'];
        $supplier = $_POST['supplier'];
        
		
		$query = "INSERT INTO product(cod, name, exp, quantity, price, cost, category, supplier, status) 
        VALUES('$cod', '$name', '$exp', '$quantity', '$price', '$cost', '$category', '$supplier', '0')";
        

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
        if($delete)
            $query = "DELETE FROM product WHERE id = '$id'";        
        else
            $query = "UPDATE product SET status = '-2' WHERE id = '$id'";

        
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
    }
   
}


if($a == 'copy'){
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        // delete User
        //$query = "DELETE FROM supplier WHERE id = '$id'";
        $query = "INSERT INTO product (cod, name, exp, quantity, price, cost, category, supplier, status) 
        SELECT cod, name, exp, quantity, price, cost, category, supplier, status FROM product where id = '$id'";

        
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

        $query = "UPDATE product SET status = '$status' WHERE id = '$id'";
        if (!$result = mysql_query($query)) {
            exit(mysql_error());
        }
    }
}



function categoryOptions(){
    $sql = "SELECT * FROM channel WHERE status = 1";
    $result =mysql_query($sql); // $connect->query($sql);
    if(mysql_num_rows($result) > 0)
    {
        while($row = mysql_fetch_array($result)){
		echo "<option value='".$row[0]."'>".$row[1]."</option>";
        } //
    }
}

function supplierOptions(){
    $sql = "SELECT * FROM supplier WHERE status = 1";
    $result =mysql_query($sql); // $connect->query($sql);
    if(mysql_num_rows($result) > 0)
    {
        while($row = mysql_fetch_array($result)){
		echo "<option value='".$row[0]."'>".$row[1]."</option>";
        } //
    }
}

?>