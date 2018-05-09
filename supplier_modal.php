<?PHP include("core/db_connection.php"); ?>

<!-- Modal confirmModal -->
<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" >Delete</h4>
            </div>
            <div class="modal-body" id="confirmMessage">
                Do you want to delete this record?
            </div>
            <div class="modal-footer">
                <input type="hidden" id="hidden_id">
                <button type="button" class="btn btn-default" onclick="DeleteRecord()">Yes, Sure!</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update_user_modal -->    
<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Update</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_name">Name</label>
                    <input type="text" id="update_name" placeholder="Supplier Name" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="update_exp">Explanation</label>
                    <input type="text" id="update_exp" placeholder="Supplier Explanation" class="form-control"/>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" id="hidden_user_id">
                <button type="button" class="btn btn-primary" onclick="UpdateRecord()" >Update Changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>






<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="Supplier Name" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="exp">Explanation</label>
                    <input type="text" id="exp" placeholder="Last Name" class="form-control"/>
                </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
    
    


    
    
