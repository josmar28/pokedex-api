<link href="{{ asset('public/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered no-wrap move-list-table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>NAME</th>
                                <th>DESCRIPTION</th>
                                <th>POWER</th>
                                <th>ACCURACY</th>
                                <th>EFFECT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $em)
                            <tr>
                                <td style="width: 5%;">
                                    <div class="btn-group">
                                        <button type="button" class="btn dropdown-toggle"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item btn_move_delete" type="button" data-id="{{$em->id}}" id=""><i class="far fa-trash-alt" ></i> Delete</button>
                                            <button class="dropdown-item btn_move_edit" type="button" data-id="{{$em->id}}" data-toggle="modal" data-target="#add-move-modal"><i class="far fa-edit"></i> Edit</button>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$em->name}}</td>
                                <td>{{$em->description}}</td>
                                <td>{{$em->power}}</td>
                                <td>{{$em->accuracy}}</td>
                                <td>{{$em->effect}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('public/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('public/dist/js/pages/datatable/datatable-basic.init.js')}}"></script>
<script>
$(".btn_move_edit").click(function() {
    var url = "{{url('api/submit-edit-move')}}";
    $(this).ajaxSubmit({
            url: url,
            type: 'POST',
            data: {
                id : $(this).data('id'),
                "_token" : "<?php echo csrf_token(); ?>"
            },
            success: function(data){ 
                $("#myModalLabel").html('Edit Move');
                $('.move_id').val(data.id);
                $('.name').val(data.name);
                $('.description').val(data.description);
                $('.power').val(data.power);
                $('.accuracy').val(data.accuracy);
                $('.effect').val(data.effect);
            },
            error: function(){
            $.toast({
                    heading: 'Error',
                    text: 'Something went wrong, Please contact administrator',
                    showHideTransition: 'fade',
                    position: 'top-center',
                    icon: 'error'
                })
            }
    });
});

$(".btn_move_delete").click(function() {
  if (  confirm('Are you want to proceed this action?')) {
    	var url = "{{url('api/submit-delete-move')}}";
        $(this).ajaxSubmit({
            url: url,
            type: 'POST',
            data: {
                id : $(this).data('id')
            },
            success: function(data){
                $(".loading").hide();
                setTimeout(function(){
                    window.location.reload(false);
                },500);
            },
            error: function(){
            $.toast({
                    heading: 'Error',
                    text: 'Something went wrong, Please contact administrator',
                    showHideTransition: 'fade',
                    position: 'top-center',
                    icon: 'error'
                })
            }
        });
    } else {
   
    }

});
</script>
