<?php if(!class_exists('raintpl')){exit;}?>    <script src="http://eefol.eu/seedbox/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://eefol.eu/seedbox/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://eefol.eu/seedbox/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://eefol.eu/seedbox/dist/js/sb-admin-2.js"></script>

    <script type="text/javascript">

		(function($){
			var to = 0;
			$.fn.disable = function() {
				$(this).find("input, textarea, select").attr("disabled", "disabled").attr("readonly","readonly");
				$(this).find("input[type=submit], input[type=button]").addClass("disabled-button");

				return this;
			}

			$.fn.enable = function() {
				$(this).find("input, textarea, select").removeAttr("disabled").removeAttr("readonly");
				$(this).find("input[type=submit], input[type=button]").removeClass("disabled-button");
				return this;
			}

			$.fn.echomsg = function(msg, type) {
				var $this = $(this);
				$this.hide().html('<div class="alert alert-'+ type +'">'+ msg +'</div>').slideDown();
				clearTimeout(to);
				to = setTimeout(function() {
					$this.slideUp('fast');
				}, 3000);
				return this;
			}


		})(jQuery);


			  var registrarMensajes=function(){

			    $('#send').on("click", function(e){
			     	var data = $('#Mensaje').val();
			    	 $('#Mensaje').val('');
			        e.preventDefault();
			        $.ajax({
			            type: "POST",
			            url : "<?php echo $base_path;?>/index/guardaChat",
			            data: 'Mensaje='+data
			        });
			        cargaMensajes();

			    });
			};

        var cargaMensajes=function(){              
           
            $.ajax({
                type: "POST",
                url : "<?php echo $base_path;?>/index/cargaChat"
            }).done(function(info){
                $("#conversation").html(info);

            });
                          
        }

    </script>