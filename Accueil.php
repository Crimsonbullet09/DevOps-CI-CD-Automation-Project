<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
        background-image: url('bg3.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
        .navbar {
            background-color: transparent;
            padding: 10px 0;
        }

        .navbar-brand img {
            width: 150px;
        }

        .navbar-nav .nav-link {
            color: #007bff;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #0056b3;
        }

        .carousel-inner img {
            max-height: 500px;
            width: 100%;
            object-fit: cover;
        }

        .carousel-caption {
            background-color: transparent;
            color: #000;
            padding: 10px;
            border-radius: 5px;
        }

        .carousel-caption h3,
        .carousel-caption p {
            margin: 0;
        }

        .carousel {
            margin: 0 auto;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            color: #000; /* Couleur noire pour les flèches de navigation */
            font-size: 24px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            filter: invert(100%); /* Pour rendre les flèches en noir */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="im/3.png" alt="Logo">
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#" style="color: #007bff;">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://menaraprefa.ma/menara-prefa.php" class="nav-link" href="Inscription.php" style="color: #007bff;">Ménara Préfa</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://menaraprefa.ma/contact.php" class="nav-link" href="Inscription.php" style="color: #007bff;">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Connect.php" style="color: #007bff;">Se Connecter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img style="width: 100%; height: 100%; object-fit: contain;" src="slides/image1.png" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption d-none d-md-block">
                    <h3>B-TR</h3>
                    <p>BORDURE RONDIN</p>
                </div>
            </div>
            <div class="carousel-item">
                <img style="width: 100%; height: 100%; object-fit: contain;" src="slides/image2.png" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption d-none d-md-block">
                    <h3>B-TJC</h3>
                    <p>BORDURE JARDINIERE COURT</p>
                </div>
            </div>
            <div class="carousel-item">
                <img style="width: 100%; height: 100%; object-fit: contain;" src="slides/images4.png" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption d-none d-md-block">
                    <h3>PV MENARA</h3>
                    <p>Menara</p>
                </div>
            </div>
            <div class="carousel-item">
                <img style="width: 100%; height: 100%; object-fit: contain;" src="slides/images3.png" class="d-block w-100" alt="Slide 4">
                <div class="carousel-caption d-none d-md-block">
                    <h3>B-T4</h3>
                    <p>BORDURE T4-30X20X100</p>
                </div>
            </div>
            <div class="carousel-item">
                <img style="width: 100%; height: 100%; object-fit: contain;" src="slides/images5.png" class="d-block w-100" alt="Slide 5">
                <div class="carousel-caption d-none d-md-block">
                    <h3>PV MARRAKEC</h3>
                    <p>Marrakech</p>
                </div>
            </div>
            <div class="carousel-item">
                <img style="width: 100%; height: 100%; object-fit: contain;" src="slides/img1.png" class="d-block w-100" alt="Slide 6">
                <div class="carousel-caption d-none d-md-block">
                    <h3>AG25</h3>
                    <p>AGGLOS 25X20X50</p>
                </div>
            </div>
            <div class="carousel-item">
                <img style="width: 100%; height: 100%; object-fit: contain;" src="slides/img2.png" class="d-block w-100" alt="Slide 7">
                <div class="carousel-caption d-none d-md-block">
                    <h3>AG15</h3>
                    <p>AGGLOS 15X20X50</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
