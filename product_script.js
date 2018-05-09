// READ records
function readRecords() {
    table = $('#table').DataTable({
		'ajax': 'product_controller.php?a=getList',
		'order': []
	});
}


// Add Record
function addRecord() {
    var cod = $("#cod").val();
    var name = $("#name").val();
    var exp = $("#exp").val();
    var quantity = $("#quantity").val();
    var price = $("#price").val();
    var cost = $("#cost").val();
    var category = $("#category").val();
    var supplier = $("#supplier").val();
    // Add record
    $.post("product_controller.php?a=add", {
        cod: cod,
        name: name,
        exp: exp,
        quantity:quantity,
        price:price,
        cost:cost,
        category:category,
        supplier:supplier
        
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
    $.post("product_controller.php?a=delete", {
               id: id
        },
        function (data, status) {
        table.ajax.reload(null, false);	
        }
    );
    $("#confirm_modal").modal("hide");
}

function CopyRecord(id) {  
    $.post("product_controller.php?a=copy", {
               id: id
        },
        function (data, status) {
        table.ajax.reload(null, false);	
        }
    );
    //$("#confirm_modal").modal("hide");
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
    $.post("product_controller.php?a=changeStatus", {
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
    
});