<?php
ob_start();
session_start();

if (!isset($_SESSION['user_role'])) {
    header('location: login');
}

// if (isset($_POST['branchIdSelected'])) {
//     $_SESSION['branch_id'] = $_POST['branchIdSelected'];
// }
?>
<?php
// ini_set("error_reporting", 1);
// header("Cache-Control:no-cache,no-store,must-revalidate,max-age=0");
// header("Cache-Control:pre-check=0,post-check=0", false);
// header("Pragma:no-cache");
// if ($_GET["rel"] != "page") {
// }
?>
<?php include('init.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SchoolSockect- Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <link href="css/loader.css" rel="stylesheet">
    <link href="js/toast/dist/jquery.toast.min.css" rel="stylesheet">
    <link href="js/dropify/dist/css/dropify.min.css" rel="stylesheet">
    <!-- <link href="js/select2/dist/css/select2.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css" integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="css/selectize.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- DataTables Buttons extension CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="fullcalendar/lib/main.min.css">
    <script src="fullcalendar/lib/main.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script> -->
    <link rel="stylesheet" href="css/cloudfare_fullcalender.css" />

    <!-- <script src="js/jspdf/jspdf.js"></script> -->
</head>