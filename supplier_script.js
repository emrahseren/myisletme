// READ records
function readRecords() {
    table = $('#table').DataTable({
		'ajax': 'supplier_controller.php?a=getList',
		'order': []
	});
}


// Add Record
function addRecord() {
    var name = $("#name").val();
    var exp = $("#exp").val();
    
    // Add record
    $.post("supplier_controller.php?a=add", {
        name: name,
        exp: exp,
    }, function (data, status) {
        // close the popup
        $("#add_modal").modal("hide");
        // clear fields from the popup
        $("#name").val("");
        $("#exp").val("");
    });
    table.ajax.reload(null, false);
}





function DeleteModalOpen(id){
    $("#hidden_id").val(id);
    $("#confirm_modal").modal("show");
}

function DeleteRecord() {  
    var id = $("#hidden_id").val();
    $.post("supplier_controller.php?a=delete", {
               id: id
        },
        function (data, status) {
        table.ajax.reload(null, false);	
        }
    );
    $("#confirm_modal").modal("hide");
}

function GetDetails(id) {
    $("#hidden_id").val(id);
    
    $.post("supplier_controller.php?a=getDetail", {
            id: id
        },
        function (data, status) {
            
            var data = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_name").val(data.name);
            $("#update_exp").val(data.exp);
        }
    );
    // Open modal popup
    $("#update_modal").modal("show");
}

function UpdateRecord() {
    // get values
    var name = $("#update_name").val();
    var exp = $("#update_exp").val();
    
    // get hidden field value
    var id = $("#hidden_id").val();
    // Update the details by requesting to the server using ajax
    $.post("supplier_controller.php?a=update", {
            id: id,
            name: name,
            exp: exp
        },
        function (data, status) {
            // hide modal popup
            $("#update_modal").modal("hide");
            table.ajax.reload(null, false);	        }
    );
}


function ChangeStatus(id, status) {

    $.post("supplier_controller.php?a=changeStatus", {
            id: id,
            status: status
        },
        function (data, status) {
            table.ajax.reload(null, false);	
        }
    );
    
}


// Export Excel --------------------------
function exportExcel() {
    $("#table").table2excel({
        exclude: ".noExl",
        name: "Excel Document Name",
        filename: "myCash_Excel_" + new Date().toISOString().replace(/[\-\:\.]/g, ""),
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
    });
}


$(document).ready(function () {
    // READ recods on page load
    readRecords(); // calling function
    
    setInterval(function(){
        table.ajax.reload(null, false);
    },10000);  // this will call your fetchData function for every 10 Sec.
    
});