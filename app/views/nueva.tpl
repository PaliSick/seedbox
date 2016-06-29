{include="templates/head"}
<style type="text/css">
    #selectores{
    z-index: 1000;
    background-color: lightgrey;
    opacity: 0.6;
    pointer-events: none;
    width: 137px;
    }
    #conversation p{margin: 0 0 3px;}
</style>

</head>

<body>



{include="templates/header"}
<div id="wrapper">
{include="templates/menu"}
{include="templates/cabecera"}
               
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-8" id="info">
            {if="$msg"}
                {$msg|echomsg:$msgType}
            {/if}
            </div>
            <h1 class="page-header">Pelicula</h1>
            <form role="form" action="index/submit_pelicula" name="peli-nueva" id="peli-nueva" method="get" enctype="multipart/form-data">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Titulo</label>
                        <input class="form-control" name="Pelicula" id="Pelicula" value="{$Pelicula}"  placeholder="Título">
                    </div>
                    <div class="form-group">
                        <label>Marcar para Series</label>
                        <input type="checkbox" class="form-control" name="Tipo" id="Tipo" value="1"   placeholder="Tipo">
                    </div>


                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3">{$Descripcion}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="submit" class="btn btn-success" value="Guardar">
                        <input type="hidden" name="id" id="id" value={$Id}>
                    </div>

                </div>


            </form>
        </div>
        <!-- /.col-lg-12 -->
    </div>
{include="templates/footer"}        
<!-- js -->
{include="templates/js"}

<script type="text/javascript" src="tinymce/tinymce.min.js"></script>

    <script type="text/javascript">
        tinymce.init({
            selector: "#Descripcion",
            language: "es",
            height : 300
        });

        
        $(document).ready(function(e) {

            $('#peli-nueva').submit(function(e) {
                tinyMCE.triggerSave();
                var $this = $(this);
                e.preventDefault();
               
                var  params = $this.serialize();

               
                $.post($this.attr('action'), params, function(data){
                    
                    if (data.status == 'ok') {
                        window.location = "{$base_path}/index/quiero/alert/success/"+data.info;
                        
                        return;
                    } else {
                        $('#info').echomsg(data.info, 'danger').slideDown();
                    }

                }, 'json');
            });

        });

    </script>

</body>

</html>