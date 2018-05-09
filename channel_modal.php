<?PHP include("core/db_connection.php"); ?>



<!-- Modal - Add New Record -->
<div class="modal fade" id="addChannel" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Add New Record</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="add_name">Name</label>
                    <input type="text" id="add_name" placeholder="Channel Name" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="add_exp">Explanation</label>
                    <input type="text" id="add_exp" placeholder="Channel Explanation" class="form-control"/>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="addChannel()">Add Record</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
<!-- // Modal -->
    
    
    
   
<!-- Modal confirmModal -->
<div class="modal fade" id="confirmModalChannel" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body" id="confirmMessage">
                Do you want to delete this record?
            </div>
            <div class="modal-footer">
                <input type="hidden" id="hidden_id2">
                <button type="button" class="btn btn-default" onclick="deleteChannel()">Yes, Sure!</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>



    
    
    

<!-- Modal - Update Channel -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel1">Add New Record</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="update_name">Name</label>
                    <input type="text" id="update_name" placeholder="Channel Name" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="update_exp">Description</label>
                    <input type="text" id="update_exp" placeholder="Channel Description" class="form-control"/>
                </div>

                <div class="modal-footer">
                    <input type="hidden" id="update_hidden_id">
                    <button type="button" class="btn btn-primary" onclick="updateChannel()">Update Record</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
    
    

    
    
