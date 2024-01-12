<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CV.GINBERS</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('assets/') ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('assets/') ?>css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid bg-primary text-white d-none d-lg-flex">
        <div class="container py-3">
            <div class="d-flex align-items-center">
                <a href="<?= base_url("Customer/index") ?>">
                    <h2 class="text-white fw-bold m-0">CV.GINBERS</h2>
                </a>
                <div class="ms-auto d-flex align-items-center">
                    <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>Talang Lakat, Batang Gangsal, Indragiri Hulu, Riau</small>
                    <small class="ms-4"><i class="fa fa-envelope me-3"></i>ginbers@gmail.com</small>
                    <small class="ms-4"><i class="fa fa-phone-alt me-3"></i>+62 823 3010 199</small>
                    <!-- <div class="ms-3 d-flex">
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
                <a href="<?= site_url("Auth")?>" class="navbar-brand d-lg-none">
                    <h1 class="fw-bold m-0">GINBERS</h1>
                </a>
                <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="<?= base_url("Customer/index") ?>" class="nav-item nav-link">Home</a>
                        <a class="nav-item nav-link" href="<?= base_url("Customer/tambah") ?>">Tukar Nota</a>
                        <a class="nav-item nav-link" href="<?= base_url("Customer/history") ?>">History</a>
                        <a class="nav-item nav-link" href="<?= site_url("Profil/index")?>">Profil</a>
                        <a class="nav-item nav-link" href="<?= site_url("Auth/logout")?>">logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->