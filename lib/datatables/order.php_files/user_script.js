// Add Record
function addRecord() {
    // get values
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var email = $("#email").val();
    var role_id = $("#role_id").val();

    // Add record
    $.post("user_controller.php?a=addUser", {
        first_name: first_name,
        last_name: last_name,
        email: email,
        role_id: role_id
    }, function (data, status) {
        userTable.ajax.reload(null, false);
        // clear fields from the popup
        $("#first_name").val("");
        $("#last_name").val("");
        $("#email").val("");
        $("#role_id").val("");
        
        $('.add_mm').html('<div class="alert alert-warning">'+data+'</div>');            
        $('.add_mm').delay(300).show(10, function() {
                    $(this).delay(2000).hide(10);}); // /.alert
        
    });
}

// Export Excel --------------------------
function exportExcel() {
    $("#userTable").table2excel({
        exclude: ".noExl",
        name: "Excel Document Name",
        filename: "myCash_Excel_" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
    });
}


function toggle(){
    if($('#btnDisable').attr('disabled')) {
        $("#btnDisable").removeAttr('disabled');    
    }else{
        $("#btnDisable").attr('disabled','true');
    }

}

// READ records
function readRecords() {
    userTable = $('#userTable').DataTable({
		'ajax': 'user_controller.php?a=getList',
		'order': []
	});
    /*
    $.get("user_controller.php?a=getAll", {}, function (data, status) {
        $(".records_content").html(data);
    });
    */
 
}

function DeleteUserOpen(id){
    $("#hidden_user_id").val(id);
    $("#delete_modal").modal("show");
}

function DeleteUser() {  
    //var conf = confirm("Are you sure, do you really want to delete User?");
    var id = $("#hidden_user_id").val();
    $.post("user_controller.php?a=deleteUser", {
               id: id
        },
        function (data, status) {
        userTable.ajax.reload(null, false);	
        }
    );
    $("#delete_modal").modal("hide");
}

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    
    $.post("user_controller.php?a=getUserDetail", {
            id: id
        },
        function (data, status) {
            
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_email").val(user.email);
            $("#update_role_id").val(user.role_id);
        
        }
    );
    // Open modal popup
    $("#update_modal").modal("show");
}

function UpdateUserDetails() {
    // get values
    var first_name = $("#update_first_name").val();
    var last_name = $("#update_last_name").val();
    var email = $("#update_email").val();
    var role_id = $("#update_role_id").val();
    
    // get hidden field value
    var id = $("#hidden_user_id").val();
    // Update the details by requesting to the server using ajax
    $.post("user_controller.php?a=updateUser", {
            id: id,
            first_name: first_name,
            last_name: last_name,
            email: email,
            role_id:role_id
        },
        function (data, status) {
            // hide modal popup
            userTable.ajax.reload(null, false);	        
            //$("#update_user_modal").modal("hide");
        
        
            $('.update_mm').html('<div class="alert alert-warning">'+data+'</div>');            
            $(".update_mm").delay(300).show(10, function() {
                    $(this).delay(2000).hide(10);}); // /.alert
        }
    );
}


function ChangeUserStatus(id, status) {

    $.post("user_controller.php?a=changeUserStatus", {
            id: id,
            status: status
        },
        function (data, status) {
            userTable.ajax.reload(null, false);	
        }
    );
    
}


$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
    
});