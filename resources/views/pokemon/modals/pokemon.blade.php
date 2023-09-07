<div id="add-pokemon-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"></h4>
                <button type="button" class="close" data-dismiss="modal"
                aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form id="add-pokemon-form">
                {{csrf_field()}}
                <input type="hidden" class="form-control pokemon_id" name="id">
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
                        <div class="col-md-3">
                            <div class="form-group">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                               <label> Pokedex Number</label> 
                                <br />  
                                <input type="text" class="form-control pokedex_number" name="pokedex_number">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Select Type   </label> 
                                <br />  
                                <select name="type_id" class="form-control type_id" required>
                                    <option value ="">Select...</option>
                                        @foreach($type as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label> Select Move   </label> 
                                <br />  
                                <select name="moveset_id" class="form-control moveset_id" required>
                                    <option value ="">Select...</option>
                                        @foreach($move as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary td_section form-control">Save</button>
                </form>
        </div>
    </div>
</div>