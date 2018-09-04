<header class="main-header">

    <!--=====================================
    =             LOGOTIPO           =
    ======================================-->
    <a href="inicio" class="logo">

        <!--logomini-->
        <span class="logo-mini">
            
            

            <img src="vistas\img\plantilla\icono-blanco.png" class="img-responsive" style="padding: 10px;">

        </span>
        <!--logomi normal-->
        <span class="logo-lg">
            
            <h1 class="img-responsive" style="padding: -200px 0px; margin: 5px 0px;">ServiText</h1>

            <!--<img src="vistas\img\plantilla\logo-blanco-lineal.png" class="img-responsive" style="padding: 10px 0px;">-->

        </span>
    </a>


    <!--=====================================
    =             BARRA DE NAVEGACION           =
    ======================================-->

    <nav class="navbar navbar-static-top" role="navigation">
        <!--Bonton de navegacion-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <!--Bonton de navegacion-->
        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <!--Perfil de Usauario-->

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <?php
                        if ($_SESSION["foto"] != "") {
                            
                            echo ' <img src="' . $_SESSION["foto"] . '" class="user-image">';
                            
                        } else {
                            
                            echo '<img src="vistas\img\usuarios\default\anonymous.png" class="user-image">
';
                        }
                        ?>


                        <span class="hidden-xs"><?php echo $_SESSION["nombre"]; ?></span>
                    </a>

                    <!--DROPDOWN TOOGLE-->
                    <ul class="dropdown-menu">
                        <li class="user-body">

                            <div class="pull-right">
                                <a href="salir" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>

                    </ul>

                </li>

            </ul>
        </div>

    </nav>
</header>