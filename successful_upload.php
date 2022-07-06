<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Angeluz Backup System</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--    Icons     -->
    <link href="vendor/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="azure" data-background-color="white">
            <div class="logo">

            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active  ">
                        <a class="nav-link" href="#">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <p>Panel de control</p>
                        </a>
                    </li>
                    <li class="nav-item active-pro ">
                        <a class="nav-link" target="_blank" href="https://api.whatsapp.com/send?phone=+584128620300&text=Hola%20Henry!,%20El%20sistema%20necesita%20soporte%20t%C3%A9cnico!">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            <p>Soporte Tecnico</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#">Panel de control</a>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <a href="upload.php">
                                <div class="card card-stats">
                                    &nbsp;
                                    <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon">
                                            <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="card-title">Realizar carga</h3>
                                    </div>
                                    &nbsp;
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <a href="download.php">
                                <div class="card card-stats">
                                    &nbsp;
                                    <div class="card-header card-header-primary card-header-icon">
                                        <div class="card-icon">
                                            <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="card-title">Descargar Respaldo</h3>
                                    </div>
                                    &nbsp;
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="copyright float-center">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script> made by
                        <a href="#" target="_blank">Arturo Ruiz</a>.
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

<script src="vendor/sweet-alert/sweetalert2.all.min.js"></script>

<script>
    Swal.fire(
        'Carga Realizada Correctamente!',
        'Sus archivos han sido respaldados en La nube!',
        'success'
    )
</script>

</html>