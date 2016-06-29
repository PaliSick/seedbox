<?php if(!class_exists('raintpl')){exit;}?><?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("templates/head") . ( substr("templates/head",-1,1) != "/" ? "/" : "" ) . basename("templates/head") );?>

<style type="text/css">
    .borrar{clear: both !important;margin:0 !important; display: block;}
    .contenido {    direction: ltr;display: block;
    unicode-bidi: embed;}
    .final{}
</style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
         <?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("templates/menu") . ( substr("templates/menu",-1,1) != "/" ? "/" : "" ) . basename("templates/menu") );?>

        <!-- Fin menu -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bs-example" data-example-id="contextual-panels">  
                            <!-- /.panel-heading -->

                            <section class="panel panel-primary">
                                <a href="http://eefol.eu/seedbox/index/setEstado/<?php echo $Id;?>/1" class="btn btn-success setEstado">Quiero</a>
                                <a href="http://eefol.eu/seedbox/index/setEstado/<?php echo $Id;?>/0" class="btn btn-danger setEstado">Paso</a>
                                <a href="http://eefol.eu/seedbox/index/setEstado/<?php echo $Id;?>/5" class="btn btn-warning setEstado">Bajada</a>
                                <?php if( $Id_usuario==$usuario ){ ?><a href="http://eefol.eu/seedbox/index/borrar/<?php echo $Id;?>" class="btn btn-danger" id="borrar">Borrar</a><?php } ?>

                                <div class="panel-heading">
                                    <h3 class="panel-title"><?php echo $Pelicula;?> <span class="pull-right" style="font-size:11px;"><?php echo $Nombre;?> - <?php echo $Fecha;?></span></h3>
                                </div>
                                <section class="panel-body contenido"><?php echo $Descripcion;?></section>
                            </section> 
                             <div class="borrar"></div>
                              <div class="final">
                                <section class="well tooltip-demo">
                                    <h4> Usuarios que han querido:</h4>
                                    <?php $counter1=-1; if( isset($usuarios) && is_array($usuarios) && sizeof($usuarios) ) foreach( $usuarios as $key1 => $value1 ){ $counter1++; ?>

                                        <button class="btn btn-default" title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="<?php if( $value1["Estado"]==1 ){ ?> Descargando<?php }else{ ?> Bajada<?php } ?> "><?php echo $value1["Nombre"];?></button>
                                    <?php } ?>


                                </section>
                                 <div class="borrar"></div>
                                <!-- /Cometarios -->
                                <section class="panel panel-default ">
                                    <div class="panel-heading">
                                        Comentarios
                                    </div>
                                    <!-- .panel-heading -->
                                    <div class="panel-body">
                                        <div id="accordion" class="panel-group">
                                             <?php $final=$this->var['final']=(count($comentarios)-1);?>

                                            <?php $counter1=-1; if( isset($comentarios) && is_array($comentarios) && sizeof($comentarios) ) foreach( $comentarios as $key1 => $value1 ){ $counter1++; ?>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a href="http://eefol.eu/seedbox/#collapse<?php echo $key1;?>" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" class="collapsed"><?php echo $value1["Nombre"];?>      <span class="pull-right" style="font-size:11px;"> <?php echo $value1["Fecha"];?></span></a>
                                                    </h4>
                                                </div>
                                                <div  id="collapse<?php echo $key1;?>" <?php if( $final==$key1 ){ ?> class="panel-collapse collapse in" aria-expanded="true" style="height: 141px;" <?php }else{ ?> class="panel-collapse collapse" aria-expanded="false" <?php } ?> style="height: 0px;">
                                                    <div class="panel-body">
                                                     <?php echo $value1["Comentario"];?>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <!-- .panel-body -->
                                </section>
                            </div>
                            <!-- /Cometarios -->
                            <div class="col-md-2">
                                <div class="image-preview-holder">  
                                    <div class="form-group">
                                        <label>Subtitulo</label>
                                        <input type="text" name="Subtitulo_txt" id="Subtitulo_txt" >                                  
                                    
                                        <a href="http://eefol.eu/seedbox/#" class="btn btn-warning" id="select-img-subtitulo">Seleccionar Subtitulo</a>
                                    </div>
                                </div>

                                <div class="dataTable_wrapper">
                                    <table id="tabla_subtitulos" class="table table-striped table-bordered table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Descargar</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $counter1=-1; if( isset($subtitulos) && is_array($subtitulos) && sizeof($subtitulos) ) foreach( $subtitulos as $key1 => $value1 ){ $counter1++; ?>

                                            <tr class="<?php echo $value1["info"];?>">
                                                <td><a target="_blank" href="http://eefol.eu/seedbox/index/descargar/<?php echo $value1["Id"];?>"><?php echo $value1["Subtitulo"];?></a></td>
                                            </tr>

                                            <?php } ?>

                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                          
                            <section class="panel panel-info col-md-8">
                                <div class="panel-heading">
                                Agregar Comentario
                                </div>
                                <form role="form" action="http://eefol.eu/seedbox/index/submit_comentario" name="comentario-nuevo" id="comentario-nuevo" method="get" >
                                    <div class="panel-body">
                                        <label>Nuevo Comentario</label>
                                        <textarea rows="3" name="Comentario" id="Comentario" class="form-control"></textarea>
                                    </div>
                                    <div class="panel-footer">
                                       <input type="submit" id="submit-comentario" class="btn btn-success" value="Enviar Comentario" >  <?php if( $Tipo==1 ){ ?>   <input type="submit" id="submit-capitulo" class="btn btn-warning" value="Nuevo Capitulo" onclick="CambiaAction(1)"> <?php } ?>

                                    </div>
                                    <input type="hidden" name="ID_pelicula" id="ID_pelicula" value="<?php echo $Id;?>">
                                    <input type="hidden" name="Tipo" id="Tipo" value="0">
                                </form>
                            </section>  
                            <!-- /Nuevo Comentario -->  
                            <div class="alert alert-success col-md-12">
                              Para subir los subtítulos, antes de nada, deben ingresar el nombre, en el caso de una película no hay mucho problema, salvo que haya varias versiones, pero con las series lo mejor es en el nombre poner un detalle de que temporada y capítulo que corresponde, algo tipo <b>S02E05</b> o algo así. Luego le dan al botón "Seleccionar Subtitulo", lo eligen y autmáticamente se sube y les aparecerá un alert diciendo que se completó o falló. 
                            </div> 
                        </div>
 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- js -->
    <?php $tpl = new RainTPL;$tpl_dir_temp = self::$tpl_dir;$tpl->assign( $this->var );$tpl->draw( dirname("templates/js") . ( substr("templates/js",-1,1) != "/" ? "/" : "" ) . basename("templates/js") );?>


    <script type="text/javascript">
 // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]").popover();
        $(document).ready(function() {

            $('#Subtitulo').on

            $('#select-img-subtitulo').click(function(e) {
                e.preventDefault();
                $('#picture').click();
            });

            $('#picture').change(function(e) {
                uploaded = false;
                uploading = true;  
                 if($('input#Subtitulo_txt').val().length<=2){
                    alert('Poné algo más descriptivo!')
                    return;
                }      
                $('#msgs').echomsg('Subiendo Subtitulo...', 'info');
                $('#ajax_upload_from').submit();
            });

            $('.setEstado').click(function(e) {
                e.preventDefault();
                $l = $(this);

                $.get($l.attr('href'), function(data) {
                    if (data.status == 'ok') {
                         window.location = "<?php echo $base_path;?>/index/nuevas/alert/success/"+data.info;
                      
                    } else $('#info').echomsg(data.info, 'danger').slideDown()
                }, 'json');

            });

            $('#borrar').click(function(e) {
                if (!confirm('Si borra la película seleccionada no podrá recuperar los datos de esta .\nEstá seguro que desea continuar?')) return false;
                e.preventDefault();
                $l = $(this);

                $.get($l.attr('href'), function(data) {
                    if (data.status == 'ok') {
                         window.location = "<?php echo $base_path;?>/index/nuevas/alert/success/"+data.info;
                      
                    } else $('#info').echomsg(data.info, 'danger').slideDown()
                }, 'json');

            });            


            $('#comentario-nuevo').submit(function(e) {
               
                var $this = $(this);
                e.preventDefault();
                if($('textarea#Comentario').val().length<=2){
                    alert('Poné algo en el comentario chavón!')
                    return;
                }
                var  params = $this.serialize();

               
                $.post($this.attr('action'), params, function(data){
                    
                    if (data.status == 'ok') {
                        F=new Date();
                        $('#accordion').fadeIn(1000).append('<div class="panel panel-default">\
                                            <div class="panel-heading">\
                                                <h4 class="panel-title">\
                                                    <a href="http://eefol.eu/seedbox/#collapseN" data-parent="#accordion" data-toggle="collapse" aria-expanded="true" class="collapsed"><span class="pull-right" style="font-size:11px;">'+F.getDate()+'/'+(F.getMonth()+1)+'/'+F.getFullYear()+' </span></a>\
                                                </h4>\
                                            </div>\
                                            <div  id="collapseN"  class="panel-collapse collapse in" aria-expanded="true" style="height: 141px;">\
                                                <div class="panel-body">'+$('textarea#Comentario').val()+'</div>\
                                            </div>\
                                        </div>');
                        
                        $('#comentario-nuevo')[0].reset();
                        return;
                    } else {
                        $('#info').echomsg(data.info, 'danger').slideDown();
                    }

                }, 'json');
            });

        });

    function CambiaAction(id){
        
        $('#Tipo').val(id);
    };
    function finishUploadingSubtitulo(salida){
        uploading = false,
        uploaded = true;
        
        alert('Subtitulo cargado correctamente');
       $('#tabla_subtitulos tr:last').after('<tr><td>'+salida+'</td></tr>');
       

    }

    function errorSubtitulo(){
        alert('ocurrio un error');
    }

    $("#Subtitulo_txt").keyup(function () {
      var value = $(this).val();
      $("#Subtitulo").val(value);
    }).keyup();
    </script>

    <div class="hidden">
        <form action="http://eefol.eu/seedbox/<?php echo $controller;?>/submit-subtitulo" method="post" enctype="multipart/form-data" id="ajax_upload_from" target="ajax_upload_frame">
            <input type="file" name="picture" id="picture">
            <input type="hidden" name="Id_pelicula" id="Id_pelicula" value="<?php echo $Id;?>">
             <input type="hidden" name="Subtitulo" id="Subtitulo" value="">
        </form>
        <iframe src="about:blank" frameborder="0" id="ajax_upload_frame" name="ajax_upload_frame" ></iframe>
    </div>
</body>

</html>
