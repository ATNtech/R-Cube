<!DOCTYPE html> <?php $ver = 3; ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hanty</title>
    <link rel="stylesheet" href="/adminlte3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/adminlte3/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="/dist/app.css?q=<?= $ver ?>">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body class="sidebar-mini hold-transition layout-fixed">
    <div class="wrapper hold-transition">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom-0">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="/" class="nav-link">Панель</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/profile" class="nav-link">Профиль</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/page" class="nav-link">Проект</a>
                </li> -->
            </ul>

            <!-- <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form> -->

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/user/logout" class="nav-link">Выйти</a>
                </li>
                <!-- <li class="nav-item"> -->
                    <!-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i class="fas fa-th-large"></i></a> -->
                <!-- </li> -->
            </ul>

        </nav>
        <?php
        $menu = [
            'profile' => ['Личный кабинет','fa fa-user'],
            'page' => ['Работа мечты','fa fa-chart-line'],
            'page2' => ['Курсы','fa fa-graduation-cap'],
            'page3' => ['Документы','fa fa-folder-open'],
            'page4' => ['Портфолио','fa fa-briefcase'],
        ];
        ?>
        <aside class="main-sidebar sidebar-dark-primary">
            <a href="/" class="brand-link">
                <img src="/logo.png" alt="Logo" class="brand-image w-100 m-0">
                <div class="brand-text font-weight-light"> </div>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php foreach ($menu as $url => $item) : ?>
                            <li class="nav-item">
                                <a href="/<?= $url ?>" class="nav-link <?= $url == $route['action'] ? 'active' : '' ?>">
                                <i class="nav-icon <?=$item[1]?> nav-icon"></i>
                                    <p><?= $item[0] ?></p>
                                </a>
                            </li>
                        <?php endforeach; ?>

                        <li class="nav-item"><a href="/" class="nav-link <?= 'index' == $route['action'] ? 'active' : '' ?>"><i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Дашборд работодателя</p>
                            </a></li>
                        <!-- <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Starter Pages
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Active Page</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Inactive Page</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Simple Link
                                <span class="right badge badge-danger">New</span>
                            </p>
                        </a>
                    </li>-->
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <!--<div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>-->

            <div class="content">
                <div class="container-fluid">
                    <?php if (isset($_SESSION['error'])) : ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error'];
                            unset($_SESSION['error']) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['success'])) : ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success'];
                            unset($_SESSION['success']) ?>
                        </div>
                    <?php endif; ?>

                    <?= $content ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>

        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
    </div>

    <?php
    $files =  scandir('/home/s/sanchozzz/gazprombank.sanchozzz.beget.tech/public_html/dist');

    foreach ($files as $file) {
        if (strpos($file, '.css') !== false) echo '<link rel="stylesheet" type="text/css" href="/dist/' . $file . '?q=' . $ver . '">';
        elseif (strpos($file, '.js') !== false) echo '<script src="/dist/' . $file . '?q=' . $ver . '"></script>';
    }
    ?>

<?php
    foreach ($scripts as $script) {
        echo $script;
    }
?>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover({
                container: 'body',
                sanitize: false
            })
        })
    </script>
</body>

</html>

<style>
    .highlight {
        background-color:#125372;
        color:#fff;
        padding:3px 6px;
    }
    .content-wrapper>.content {
        padding: .5rem;
    }

    .card-title {
        float: none;
    }

    .rounded {
        border-radius: 20px !important;
    }

    .chatbro_minimized_chat.chatbro_movable_chat.chatbro_header_rotare_to_bottom {
        right: inherit !important;
        bottom: 5px !important;
        left: 5px;
    }

    .chatbro_chat.chatbro_movable_chat.chatbro_opacity {
        top: inherit !important;
        bottom: 210px !important;
        left: 20px !important;
    }

    .menu-container {
        right: 60px;
        bottom: 90px;
        top: auto;
        position: fixed;
        z-index: 1085;
        width: 125px;
        height: 125px;
        box-shadow: none;
    }

    .menu-container2 {
        right: 20px;
        bottom: 20px;
        top: auto;
        position: fixed;
        z-index: 1085;
        width: 125px;
        height: 125px;
        box-shadow: none;
    }

    .menu-main-container {
        box-sizing: border-box;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        outline: none;
        margin: 0;
        padding: 0;
    }

    .menu-main,
    .menu-main2 {
        width: 150px;
        height: 150px;
        background: none;
        padding: 0;
        box-shadow: none;
        border: none;
        box-sizing: border-box;
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        outline: none;
        margin: 0;
        padding: 0;
    }

    .menu-1 {
        background-image: url(img/menu3.svg);
        width: 100%;
        height: 100%;
        background-size: cover;
        background-repeat: no-repeat;
    }

    /* .menu-main:hover .menu-1, .menu-main.active .menu-1 {
        background-image: url(img/menu-1a.svg);
    }

    .menu-2 {
        background-image: url(img/menu-2.svg);
        width: 100%;
        height: 100%;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .menu-main:hover .menu-2, .menu-main.active .menu-2 {
        background-image: url(img/menu-2a.svg);
    }*/

    .modal-backdrop {
        opacity: 0 !important;
    }

    /*.bot-menu menu-fix1*/
    path.par1 {
        fill: none;
    }
</style>