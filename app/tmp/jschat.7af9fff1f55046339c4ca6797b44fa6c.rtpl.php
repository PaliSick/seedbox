<?php if(!class_exists('raintpl')){exit;}?>	re

	$('#ocultar').on( "click", function() {	 
    	$('#chat').toggle(600);
    });

  var registrarMensajes=function(){
    var data = $('#formChat').serialize();
    $('#send').on("click", function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url : "<?php echo $base_path;?>/index/guardaChat",
            data: data
        });
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