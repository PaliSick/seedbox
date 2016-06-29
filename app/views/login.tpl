<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forms | Forms</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/favicon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/favicon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/favicon-114x114.png">
    <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">

</head>
    <body>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        Ingreso al sistema</div>
                    <div class="panel-body pan">
                        <form class="form-horizontal" action="index/login-submit" method="post">
                        <div class="form-body pal">
                            <div class="form-group">
                                <label for="inputName" class="col-md-3 control-label">
                                    Usuario</label>
                                <div class="col-md-9">
                                    <div class="input-icon right">
                                        <i class="fa fa-user"></i>
                                        <input id="usuario" name="usuario" type="text" placeholder="" class="form-control" /></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-md-3 control-label">
                                    Clave</label>
                                <div class="col-md-9">
                                    <div class="input-icon right">
                                        <i class="fa fa-lock"></i>
                                        <input id="password" name="password" type="text" placeholder="" class="form-control" /></div>
                                    
                                </div>
                            </div>
                            <div class="form-group mbn">
                                <div class="col-md-offset-3 col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input tabindex="5" type="checkbox" name="recordarme" id="recordarme" />&nbsp; Recordarme</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions pal">
                            <div class="form-group mbn">
                                <div class="col-md-offset-3 col-md-6">
                                    
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>