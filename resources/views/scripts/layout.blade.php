<script>
  @if(Session::get('action_made'))
    $.toast({
        heading: 'Save',
        text: "<?php echo Session::get("action_made");?>",
        position: 'top-center',
    })
    <?php
        Session::put("action_made",false);
    ?>
    @endif
    @if(Session::get('is_idle'))
    $('#idle-pass-modal').modal('show');
    @endif
  $(".preloader ").fadeOut();
  var idleTime = 0;
  $(document).ready(function () {
      // Increment the idle time counter every minute.
      // var idleInterval = setInterval(timerIncrement, 60000); // 1 minute
      // $(this).keypress(function (e) {
      //     idleTime = 0;
      // });
      // $(this).click(function (e) {
      //     idleTime = 0;
      // });
  });

  // function timerIncrement() {
  //     idleTime = idleTime + 1;
  //     if (idleTime > 5) {
  //       var url = "{{url('/set-idle')}}";
  //       $.ajax({
  //             url: url,
  //             type: 'GET',
  //             async: false,
  //             success : function(id){
  //               $('#idle-pass-modal').modal('show');
  //             },
  //             error: function (data) {
  //                 $(".loading").hide();
  //                 $.toast({
  //                     heading: 'Error',
  //                     text: 'Something went wrong, Please contact administrator',
  //                     showHideTransition: 'fade',
  //                     position: 'top-center',
  //                     icon: 'error'
  //                 })
  //             },
  //         });
  //     }
  // }
  Number.prototype.pad = function(n) {
    for (var r = this.toString(); r.length < n; r = 0 + r);
    return r;
  };

  function updateClock() {
    var now = new Date();
    var milli = now.getMilliseconds(),
      sec = now.getSeconds(),
      min = now.getMinutes(),
      hou = now.getHours(),
      mo = now.getMonth(),
      dy = now.getDate(),
      yr = now.getFullYear();
  var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var tags = ["mon", "d", "y", "h", "m", "s"],
      corr = [months[mo], dy, yr, hou.pad(2), min.pad(2), sec.pad(2), milli];
    for (var i = 0; i < tags.length; i++)
      document.getElementById(tags[i]).firstChild.nodeValue = corr[i];
  }

  function initClock() {
    updateClock();
    window.setInterval("updateClock()", 1);
  }
  var click = 1; 
  $( "#toggle-menu" ).click(function() {
    click++;
    if(click % 2 == 0) {
      document.getElementById("sidebarnavIgation").style.width = "0px";
      document.getElementById("main-content").style.marginLeft = "0px";
    } else {
      document.getElementById("sidebarnavIgation").style.width = "260px";
      document.getElementById("main-content").style.marginLeft = "260px";
    }
  });
  $('.con_password').keyup(function() {
      if($(this).val() != $('.def_pass').val()) {
          $(".invalid-feedback").removeClass("d-none");
          $(".con_password").addClass("is-invalid");
          $(".con_password").removeClass("is-valid");
      } else {
          $(".invalid-feedback").addClass("d-none");
          $(".con_password").addClass("is-valid");
          $(".con_password").removeClass("is-invalid");
      }
  });

  $('.def_pass').keyup(function() {
      $('.con_password').val('')
  });
  $('#account_form').on('submit',function(e){
        var url = "{{ url('update-account') }}";
        e.preventDefault();
        $(".loading").show();
        $.ajax({
            url: "{{url('/validate-username')}}",
            type: 'GET',
            async: false,
            data: {
                username: $("input[name=change_username]").val()
            },
            success : function(data){
                $(".loading").hide();
                if(data=='none') {
                    $.ajax({
                        url: "{{url('/validate-password')}}",
                        type: 'GET',
                        async: false,
                        data: {
                            password: $("input[name=oldpassword]").val(),
                            newpass: $("input[name=conpassword]").val(),
                            defpass: $(".def_pass").val()
                        },
                        success : function(data){
                            $(".loading").hide();
                            if(data=='valid' || data=='none') {
                              if($("#passnotmatch").hasClass("d-none")) {
                                 $('#account_form').ajaxSubmit({
                                      url:  url,
                                      type: "POST",
                                      success: function(data){
                                          $(".loading").hide();
                                          $("input[name=change_username]").val(data)
                                          $.toast({
                                              heading: 'Save',
                                              text: 'Successfully update account!',
                                              position: 'top-center',
                                          })
                                          $('#account-settings-modal').modal('hide')
                                      },
                                      error: function (data) {
                                        $(".loading").hide();
                                          $.toast({
                                              heading: 'Error',
                                              text: 'Something went wrong, Please contact administrator',
                                              showHideTransition: 'fade',
                                              icon: 'error'
                                          })
                                      },
                                  });                                
                              } else {
                                $(".loading").hide();
                                $.toast({
                                    heading: 'Error',
                                    text: 'New passsword do not match!',
                                    showHideTransition: 'fade',
                                    position: 'top-center',
                                    icon: 'error'
                                })
                              }
                            } else if(data=='pass') {
                              $.toast({
                                    heading: 'Error',
                                    text: 'Please enter your old password!',
                                    showHideTransition: 'fade',
                                    position: 'top-center',
                                    icon: 'error'
                                })
                            }
                            else {
                              $.toast({
                                  heading: 'Error',
                                  text: 'Old password is incorrect',
                                  showHideTransition: 'fade',
                                  position: 'top-center',
                                  icon: 'error'
                              })
                            }
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
                } else {
                  $.toast({
                      heading: 'Error',
                      text: 'Username already taken!',
                      showHideTransition: 'fade',
                      position: 'top-center',
                      icon: 'error'
                  })
                }
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
    });
    $('#barcode-modal').on('shown.bs.modal', function() {
      $('#pds_input').focus();
    });
    $('#pds_input').on('input',function() {
      $(".loading").show();
      var url = "{{url('/barcode-pds')}}";
      if($(this).val().length ==20) {
        $.ajax({
              url: url,
              type: 'GET',
              async: false,
              data: {
                pds: $(this).val(),
              },
              success : function(id){
                if(id != 'none') {
                  $(".loading").hide();
                  $.toast({
                      heading: '',
                      text: 'PDS FOUND, PROCEEDING TO NEW TAB',
                      showHideTransition: 'fade',
                      position: 'top-center',
                      icon: 'info'
                  })
                  $('#pds_input').val('')
                  $('#barcode-modal').modal('hide')
                      var win = window.open("{!!asset('view-pds')!!}/"+id, '_blank');
                  if (win) {
                      win.focus();
                  }
                } else {
                  $(".loading").hide();
                  $.toast({
                      heading: 'Error',
                      text: 'NO PDS FOUND',
                      showHideTransition: 'fade',
                      position: 'top-center',
                      icon: 'error'
                  })
                }
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
    });
    $('#idle_pass_form').on('submit',function(e){
        var url = "{{ url('idle-password') }}";
        e.preventDefault();
        $(".loading").show();
        $('#idle_pass_form').ajaxSubmit({
            url:  url,
            type: "POST",
            success: function(data){
              $(".loading").hide();
              if(data) {
                  $('#idle-pass-modal').modal('hide');
                    $('.idle-password').val('');
              } else {
                $.toast({
                    heading: 'Error',
                    text: 'Incorrect Password',
                    showHideTransition: 'fade',
                    position: 'top-center',
                    icon: 'error'
                })
              }
            },
            error: function (data) {
                $(".loading").hide();
                $('.btn-save-data').removeClass('d-none');
                $.toast({
                    heading: 'Error',
                    text: 'Session ended, Please refresh the page',
                    showHideTransition: 'fade',
                    icon: 'error'
                })
            },
        });
    });
</script>