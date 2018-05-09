<?PHP include("user_controller.php"); ?>

<!-- Modal ADD  -->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                
                <div class="form-group">
                    <div class="col-sm-6">
                        <span class="label label-default">First Name</span>
                        <input type="text" class="form-control" id="first_name" placeholder="First Name">
                    </div>
                    <div class="col-sm-6">
                        <span class="label label-default">Last Name</span>
                        <input type="text" class="form-control" id="last_name" placeholder="Last Name">
                    </div>
                </div>
                    
                <div class="form-group">
                    <div class="col-sm-6">
                        <span class="label label-default">Email</span>
                        <input type="text" class="col-sm-8 form-control" id="email" placeholder="EMail Address">
                    </div>
                    <div class="col-sm-6">
                        <span class="label label-default">Password</span>
                        <input type="text" class="col-sm-8 form-control" id="password" placeholder="Login Password">
                    </div>
                    <div class="col-sm-6">
                        <span class="label label-default">Role</span>
                        <select id="role_id" name="role_id" class="form-control" >
                        <?php 
                            roleOptions();
                        ?>
                        </select>  
                    </div>
                </div>
            
                </form>                      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <div class="add_mm"></div>
        </div>
    </div>
</div>
<!-- // Modal -->
    
    


<!-- Modal UPDATE  -->    
<div class="modal fade" id="update_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Update</h4>
            </div>
            <div class="modal-body">
                
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <span class="label label-default">First Name</span>
                            <input type="text" class="form-control" id="update_first_name" placeholder="First Name">
                        </div>
                        <div class="col-sm-6">
                            <span class="label label-default">Last Name</span>
                            <input type="text" class="form-control" id="update_last_name" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-6">
                            <span class="label label-default">Email</span>
                            <input type="text" class="col-sm-8 form-control" id="update_email" placeholder="EMail Address">
                        </div>
                        <div class="col-sm-6">
                            <span class="label label-default">Role</span>
                            <select id="update_role_id" class="form-control" >
                            <?php 
                                roleOptions();
                            ?>
                            </select>  
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-6">
                            <span class="label label-default">Password</span>
                            <input type="text" class="col-sm-8 form-control" id="update_password1" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <span class="label label-default">Password</span>
                            <input type="text" class="col-sm-8 form-control" id="update_password2" placeholder="Again">
                        </div>
                        
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="hidden_user_id">
                <button type="button" class="btn btn-primary" onclick="UpdateUserDetails()" >Save Changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <div class="update_mm"></div>
        </div>
    </div>
</div>



<!-- Modal DELETE Confirm -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
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
                <input type="hidden" id="hidden_user_id">
                <button type="button" class="btn btn-default" onclick="DeleteUser()">Yes, Sure!</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
            <div class="delete_mm"></div>
        </div>
    </div>
</div>


