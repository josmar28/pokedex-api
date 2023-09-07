<div id="add-move-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="add-move-form">
                {{csrf_field()}}
                <input type="hidden" class="form-control move_id" name="id">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Name</label> 
                                <br />  
                                <input type="text" class="form-control name" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               <label> Description</label> 
                                <br />  
                                <input type="text" class="form-control description" name="description">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Power</label> 
                                <br />  
                                <input type="text" class="form-control power" name="power">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               <label> Accuracy</label> 
                                <br />  
                                <input type="text" class="form-control accuracy" name="accuracy">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Effect</label> 
                                <br />  
                                <textarea type="text" class="form-control effect" name="effect"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary td_section form-control">Save</button>
                </form>
        </div>
    </div>
</div>