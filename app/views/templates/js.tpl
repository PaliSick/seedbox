    <script src="script/jquery-1.10.2.min.js"></script>
    <script src="script/jquery-migrate-1.2.1.min.js"></script>
    <script src="script/jquery-ui.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/bootstrap-hover-dropdown.js"></script>
    <script src="script/html5shiv.js"></script>
    <script src="script/respond.min.js"></script>
    <script src="script/jquery.metisMenu.js"></script>
    <script src="script/jquery.slimscroll.js"></script>
    <script src="script/jquery.cookie.js"></script>
    <script src="script/icheck.min.js"></script>
    <script src="script/custom.min.js"></script>

    <script src="script/jquery.menu.js"></script>

    <script src="script/responsive-tabs.js"></script>

   
    
    <script src="script/main.js"></script>

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
			            url : "{$base_path}/index/guardaChat",
			            data: 'Mensaje='+data
			        });
			        cargaMensajes();

			    });
			};

        var cargaMensajes=function(){              
           
            $.ajax({
                type: "POST",
                url : "{$base_path}/index/cargaChat"
            }).done(function(info){
                $("#conversation").html(info);

            });
                          
        }

    </script>