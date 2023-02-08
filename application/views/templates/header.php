<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?> ">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fontawesome-free-6.1.2-web/css/all.css') ?> ">
    <title>home</title>
</head>

<body>

    <div class="header">
        <div class="lo"><a href="#" class="logo"><i class="fas fa-heart"></i></a></div>

        <nav class="navbar ">
            <a class="navlink " href="<?php echo base_url('Home/objets') ?>">Objets</a>
    </nav>

    <div class="info">
        <div class="box">
            <i></i><span><?php echo $_SESSION['connected']['email'] ?> </span>
        </div>
        <i class="fas fa-bars"></i>

    </div>

    <!-- not shown yet -->
    <div class="list-menu">

        <div class="box">
            <a href="<?php echo base_url('Authentification/deconnexion') ?>"><i class="fas fa-sign-out-alt "></i><span>log out</span></a>
        </div>


    </div>
    <!--  -->
    </div>

    <div class="page">