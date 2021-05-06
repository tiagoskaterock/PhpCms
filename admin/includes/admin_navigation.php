        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/cms/admin">Administrador</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="../">SITE</a></li>



                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>

                        <?php

                            if (isset($_SESSION['first_name'])) {
                                echo $_SESSION['first_name'] . " " . $_SESSION['last_name'];
                            }

                        ?>

                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i>Perfil</a>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <a href="includes/logout"><i class="fa fa-fw fa-power-off"></i>Sair</a>
                        </li>
                    </ul>
                </li>


            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">




                	<!-- DASHBOARD -->
                    <li>
                        <a href="/cms/admin"><i class="fa fa-fw fa-dashboard"></i> Início</a>
                    </li>
                    <!-- END DASHBOARD -->





                    <!-- POSTS -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#posts_drop_down"><i class="fa fa-fw fa-arrows-v"></i> Postagens <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="posts_drop_down" class="collapse">
                            <li>
                                <a href="posts">Ver Postagens</a>
                            </li>
                            <li>
                                <a href="posts?source=add_post">Nova Postagem</a>
                            </li>
                        </ul>
                    </li>
                    <!-- END POSTS -->

                    




                    <!-- CATEGORIES -->
                    <li>
                        <a href="categories"><i class="fa fa-fw fa-wrench"></i> Categorias</a>
                    </li>
                    <!-- END CATEGORIES -->


                    


                    <!-- COMMENTS -->
                    <li class="">
                        <a href="comments"><i class="fa fa-fw fa-file"></i> Comentários</a>
                    </li>
                    <!-- END COMMENTS -->





                    <!-- USERS -->
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users_drop_down"><i class="fa fa-fw fa-arrows-v"></i> Usuários <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users_drop_down" class="collapse">
                            <li>
                                <a href="users">Todos Usuários</a>
                            </li>
                            <li>
                                <a href="users?source=add_user">Adicionar Usuário</a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USERS -->




                    <!-- PROFILE -->
                    <li>
                        <a href="profile"><i class="fa fa-fw fa-dashboard"></i>Perfil</a>
                    </li>
                    <!-- END PROFILE -->



                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>