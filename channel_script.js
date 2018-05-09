// --- CHANNEL --- //



// --- GET ALL RECORD ------------------------------------

function readRecords() {
    $.get("channel_controller.php?a=getAll", {}, function (data, status) {
        $(".channel_list").html(data);
    });
 
}



// --- ADD NEW RECORD --------------------------------------

function addChannel() {
    var add_name = $("#add_name").val();
    var add_exp = $("#add_exp").val();

    $.post("channel_controller.php?a=addChannel", {
        name: add_name,
        exp: add_exp
    }, function (data, status) {
        $("#addChannel").modal("hide");

        readRecords();
        
        $("#add_name").val("");
        $("#add_exp").val("");
    });
}



// --- GET RECORD BY ID -------------------------------------

function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_id1").val(id);
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
    $("#update_user_modal").modal("show");
}



// --- OPEN UPDATE RECORD MODAL -------------------------------

function updateModal(id){
    $("#update_hidden_id").val(id);
    
    $.post("channel_controller.php?a=getChannelById", {
            id: id
        },
        function (data, status) {
            var channel = JSON.parse(data);
            $("#update_name").val(channel.name);
            $("#update_exp").val(channel.exp);
        }
    );
    
    $("#updateModal").modal("show");
}


// --- UPDATE RECORD -------------------------------------

function updateChannel() {
    // get values
    var name = $("#update_name").val();
    var exp = $("#update_exp").val();
    
    // get hidden field value
    var id = $("#update_hidden_id").val();
    // Update the details by requesting to the server using ajax
    $.post("channel_controller.php?a=updateChannel", {
            id: id,
            name: name,
            exp: exp
        },
        function (data, status) {
            // hide modal popup
            $("#updateModal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}



// ---- DELETE RECORD -------------------------------------

function deleteModal(id){
    $("#hidden_id2").val(id);
    $("#confirmModalChannel").modal("show");
}
function deleteChannel() {  
    //var conf = confirm("Are you sure, do you really want to delete User?");
    var id = $("#hidden_id2").val();
    $.post("channel_controller.php?a=delete", {
            id: id
        },
        function (data, status) {
        // reload Users by using readRecords();    
        readRecords();
        }
    );
    $("#confirmModalChannel").modal("hide");
}



// --- CHANGE RECORD STATUS -------------------------------------

function changeStatus(id, status) {
    $.post("channel_controller.php?a=changeStatus", {
            id: id,
            status: status
        },
        function (data, status) {
           readRecords();
        }
    );
    
}



// --- LOAD PAGE SETUP ----------------------------------------

$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function    
});


