<aside class="main-sidebar">

    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="active">

                <a href="inicio">
                    <i class="fa fa-home"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <?php
            if ($_SESSION["perfil"] == "Administrador") {

                echo '<li>

                <a href="usuarios">
                    <i class="fa fa-user"></i>
                    <span>Usuario</span>
                </a>
            </li>

            <li>

          
               <a href = "categorias">
                    <i class = "fa fa-th"></i>
                    <span>Categorias</span>
                </a>
            </li>

            <li>

                <a href = "incidencias ">
                    <i class = "fa fa-product-hunt"></i>
                    <span>Servicios</span>
                </a>
            </li>';
            }
         
            
            if ($_SESSION["perfil"] == "Call Center" || $_SESSION["perfil"] == "Administrador") {


           

           echo ' <li>

                <a href="clientes">
                    <i class="fa fa-user"></i>
                    <span>Clientes</span>
                </a>
            </li>

            <li class="treeview" >

                <a href="#">
                    <i class="fa fa-list-ul"></i>
                    <span>Incidencias</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>

                </a>

                <ul class="treeview-menu">

                    <li>
                        <a href="servicios">
                            <i class="fa fa-circle-o "></i>
                            <span>Administrador Incidencias </span>
                        </a>
                    </li>

                    <li>
                        <a href="crear-servicios">
                            <i class="fa fa-circle-o "></i>
                            <span>Crear Incidencia </span>
                        </a>
                    </li>

                    <li>
                        <a href="reportes-servicios">
                            <i class="fa fa-circle-o "></i>
                            <span>Reporte Incidencia </span>
                        </a>
                    </li>

                </ul>
            </li>';
           
            }
            
            if ($_SESSION["perfil"] == "Tecnico Redes" || $_SESSION["perfil"] == "Tecnico Seguridad"
                    || $_SESSION["perfil"] == "Tecnico Mantenimiento" || $_SESSION["perfil"] == "Administrador" ) {

           echo ' <li class="treeview" >

                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Hoja De Vida</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>

                </a>

                <ul class="treeview-menu">

                    <li>
                        <a href="hojaDeVida">
                            <i class="fa fa-circle-o "></i>
                            <span>Administracion Hoja  Vida </span>
                        </a>
                    </li>

                    <li>
                        <a href="crear-hoja">
                            <i class="fa fa-circle-o "></i>
                            <span>Crear Hoja De Vida </span>
                        </a>
                    </li>



                </ul>
            </li>

        </ul>';
                    
                             }
                    
       ?>

    </section>
</aside>