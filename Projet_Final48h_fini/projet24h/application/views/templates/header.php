<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Energym</title>

<!-- slider stylesheet -->
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

   <!-- Add icon library -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('./assets/css/bootstrap.css'); ?>" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan|Dosis:400,600,700|Poppins:400,600,700&display=swap"
    rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('./assets/css/style.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('./assets/css/profil.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('./assets/css/proposition.css'); ?>" rel="stylesheet" />
  <!-- responsive style -->
  <link href="<?php echo base_url('./assets/css/responsive.css'); ?>" rel="stylesheet" />
 
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="<?php echo base_url('controller_events/Profile'); ?>">
            <img src="<?php echo base_url('./assets/images/logo.png'); ?>" alt="" />
            <span>
              Energym
            </span>
          </a>
          <div class="contact_nav" id="">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('controller_events/getSuggestion'); ?>">
                  <img src="<?php echo base_url('./assets/images/location1.png'); ?>" alt="" />
                  <span>Suggestion</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <img src="images/portfeuil.png" alt="" />
                  <span>Porte feuil</span>
                </a>
                <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('controller_events/getProfile_session'); ?>">
                  <img src="<?php echo base_url('./assets/images/profil.png'); ?>" alt="" />

                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Welcome/disconnect'); ?>">
                  <img src="images/envelope.png" alt="" />
                  <span>Déconnection</span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </div>

    </header>

