<?PHP include("product_controller.php"); ?>

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






<!-- Modal - Add -->
<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Record</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control" >
                        <?php 
                            categoryOptions();
                        ?>
                    </select>  
                </div>

                <div class="form-group">
                    <label for="cod">Code</label>
                    <input type="text" id="cod" placeholder="Product Code" class="form-control" required />
                </div>
                
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="Product Name" class="form-control" required />
                </div>

                <div class="form-group">
                    <label for="exp">Description</label>
                    <input type="text" id="exp" placeholder="Product Description" class="form-control"/>
                </div>

                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" id="quantity" placeholder="Product Quantity" class="form-control"/>
                </div>
                
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" placeholder="Price " class="form-control"/>
                </div>
                
                <div class="form-group">
                    <label for="cost">Cost</label>
                    <input type="text" id="cost" placeholder="Price " class="form-control"/>
                </div>
                
                <div class="form-group">
                    <label for="supplier">Supplier</label>
                    <select id="supplier" name="supplier" class="form-control" >
                        <?php 
                            supplierOptions();
                        ?>
                    </select>  
                </div>
                
                
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" onclick="addRecord()">Add Record</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
    
    


    
    
