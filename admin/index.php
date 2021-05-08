<?php require('includes/admin_header.php') ?>

    <div id="wrapper">

        <?php require('includes/admin_navigation.php'); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <?php boas_vindas_admin() ?>

                <?= mostra_cartoes_de_estatisticas() ?>

                <?= mostra_grafico_de_colunas() ?>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

<?php require('includes/admin_footer.php'); ?>