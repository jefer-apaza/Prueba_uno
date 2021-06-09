<?php 

    require "conexion.php";
    session_start();
    $nombre= $_SESSION['nombre'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Comentarios</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            
        <img class="p-2"src="assets/img/logo.png" alt="logo" width="180" height="70" style="vertical-align:top"> </a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre;?><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Configuracion</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.php">Cerrar Sesion</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="principal.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Principal
                            </a>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Modificar Notas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="comentarios.php">Comentarios</a>
                                    <a class="nav-link" href="calificar.php">Calificar Desempeño</a>
                                </nav>
                            </div>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"><a>Ingresaste Como: </a><?php echo $nombre;?></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Comentarios</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="principal.php">Principal</a></li>
                            <li class="breadcrumb-item active">Comentarios</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-0">
                                    En esta pagina usted como docente podra realizar algunos comentarios para el alumno
                                </p>
                            </div>
                        </div>
                        <form id="formulario" action="comentar.php" method="post">
                            <h5>Nombre de Usuario: <b class="text-info"><?php echo $nombre;?></b></h5>
                            <h5> Comentar:</h5>
                            <textarea name="comentario" id="comentario" cols="150" rows="5" placeholder="Escriba su comentario"></textarea>     
                            <br /><br />
                            <input class="btn btn-info" id="enviar" type="button" value="Envia tu Comentario"/>           
                        </form>
                        <br />
                        <br />
                        <div class="container-fluid p-3 my-3 border">
                            <?php
                                    $resultado = mysqli_query($mysqli, 'SELECT * FROM comentarios');
                                    while($comentario = mysqli_fetch_object($resultado)){
                                        ?>
                                            <b class="card-header p-3 my-3 bg-dark text-light"><?php echo ($comentario->comen_nombre);?></b><?php ($comentario -> fecha);?> 
                                            <br />
                                            <p class="card-body p-3 my-3 border" ><?php echo ($comentario->comentario);?></p>
                                            <br />
                                            <br />
                                        <?php
                                    }
                            ?>
                        </div>
                    </div>  
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Derechos reservados 2021</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
    <script languaje="javascript">
        $("#enviar").click(function(){
            var nombre = $('#nombre').val();
            var comentario = $('#comentario').val();

            if (comentario==""){
                alert('Debe escribir un comentario');
                return;
            }
            $('#formulario').submit();
        })
    </script>
</html>
