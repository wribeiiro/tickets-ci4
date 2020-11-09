<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Wellisson Ribeiro">
    <?= csrf_meta() ?>
    <link href="https://wribeiiro.com/tickets/assets/img/icon.png" rel="icon">
    <title><?=$title?></title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
    <link href="<?= base_url('')?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('')?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" rel="stylesheet" />

    <link href="<?= base_url('')?>/assets/css/ruang-admin.min.css" rel="stylesheet">
    
    <!-- App CSS -->
    <link href="<?=base_url('')?>/assets/css/app.css?v=<?=CSS_VERSION?>" rel="stylesheet">
    <!--<link href="<?=base_url('')?>/assets/build/css/stylesheet.min.css?v=<?=CSS_VERSION?>" rel="stylesheet">-->
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('')?>/assets/vendor/jquery/jquery.min.js"></script>

    <!-- highcharts -->
    <script src="<?= base_url('')?>/assets/vendor/highcharts/highcharts-gantt.js"></script>
    <script src="<?= base_url('')?>/assets/vendor/highcharts/highcharts-3d.js"></script>
    <script src="<?= base_url('')?>/assets/vendor/highcharts/highcharts-more.js"></script>
    <script src="<?= base_url('')?>/assets/vendor/highcharts/exporting.js"></script>

    <script>
        const BASE_URL = '<?=base_url()?>';
    </script>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">