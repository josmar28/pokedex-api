<script>
    $(document).ready(function()
    {
        fetchdata();
    });

    $('#add-pokemon-modal').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,textarea,select")
       .val('')
       .end()
    .find("input[type=checkbox], input[type=radio]")
       .prop("checked", "")
       .end();
    })

    function fetchdata() {
    	var loading = '<div class="text-center">'+
				        '<img src="{{ asset("public/img/load.gif")}}">'+
				        '<h3 class="text-primary">Loading Contents. . . . .</h3>'+
					  '</div>';
    	$('.pokemon-body').html(loading);
    	$('.loading').show();
    	var url = "{{url('/fetch-pokemon-lists')}}";
		$.ajax({
            url: url,
            type: 'GET',
            success : function(data){
            	$(".loading").hide();
            	$('.pokemon-body').html(data)
            },
            error: function (data) {
                $(".loading").hide();
                $.toast({
				    heading: 'Error',
				    text: 'Something went wrong, Please contact administrator',
				    showHideTransition: 'fade',
				    position: 'top-center',
				    icon: 'error'
				})
            },
        });
    }

    $('body').on('submit', '#add-pokemon-form', function(e) {
        e.preventDefault();
    	$('.loading').show();
    	var url = "{{url('api/submit-add-pokemon')}}";
        $(this).ajaxSubmit({
            url: url,
            type: 'POST',
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
    });


    $(".btn-info").click(function() {
        $("#myModalLabel").html('Add Pokemon');
});
</script>