<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Landing Page</title>

    <style>
        html, body{
            scroll-behavior: smooth;
        }
        body {
            font-family: 'Merriweather', serif;
        }
        #nav a:hover {
            font-weight: bold;
        }
        #home{
            position: fixed;
            z-index: 10000;
            background-color: white;
            width: 100%;
        }
        .carousel::after {
            background-image: linear-gradient(to top, rgb(162, 162, 255) 0%, rgba(0,0,0,0));
            bottom: 0;
            content: "";
            height: 60%;
            left: 0;
            position: absolute;
            right: 0;
        }
        .carousel-caption{
            z-index: 999;
        }
       
        .row p{
            text-align: justify;
        }
        img.card-img-top{
            width: 100px;
            height: 100px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
        }
        h5.card-title{
            text-align: center;
        }

        .fitur {
            background-color: #8BBCCC;
            height: auto;
            position: relative;
            text-align: center;
        }
        .fitur::after{
            bottom: 0;
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
        }
        p.card-text{
            text-align: center;
        }
        h1.sisima{
            text-align: center;
        }
        p.deskripsi{
            text-align: center;
        }
        @media screen and (max-width: 579px){
            .fitur .container{
                position: relative;
                z-index: 999;
                margin-left:0 !important;
            }
            .features .row .col-sm-12{
                margin-bottom: 20px;
            }
        }
        @media screen and (max-width: 575px){
            footer{
                justify-content: center;
            }
        }
        .fitur .container{
            position: relative;
            z-index: 999;
        }
        .features{
            height: auto;
            background-color: aliceblue;
            border-radius: 20px;
            padding-top:20px;
            padding-bottom:20px;
            position: relative;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light" id="home">
        <div class="container">
            <a href="/">
                <img src="images/logosisima.png" style="width: 160px; height:50px" alt="...">
            </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav" id="nav">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                <a class="nav-link" href="#about">About</a>
                <a class="nav-link" href="#features">Features</a>
                <a class="nav-link" href="/login"><i class="bi bi-box-arrow-right"></i> Login</a>
            </div>
            </div>
        </div>
    </nav>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img src="images/skripsi.jpg" style="width: 1820px; height:620px" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h2>SISIMA Informatika</h2>  
            <p>Sistem Informasi Skripsi Mahasiswa Informatika Universitas Udayana</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="images/perpus.jpg" style="width: 1820px; height:620px"alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h2>Fitur yang tersedia</h2>
            <p>Pengguna dapat memanfaatkan fitur Browsing dan Searching</p>
        </div>
        </div>
        <div class="carousel-item">
        <img src="images/skripsi.jpg" style="width: 1820px; height:620px" alt="...">
        <div class="carousel-caption d-none d-md-block">
            <h2>Easy to Find Information</h2>
            <p>Sistem ini dapat memudahkan anda dalam pencarian informasi skripsi mahasiswa</p>
        </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    <div class="container pt-4" style="margin-bottom: 100px; margin-top:50px;" id="about">
        <div class="row">
                <h1 class="sisima fw-bold fst-italic mt-5 mb-3">SISIMA Informatika</b></h1>
               <p class="deskripsi">SISIMA Informatika (Sistem Informasi Skripsi Mahasiswa Informatika) merupakan sebuah sistem yang dapat memberikan informasi mengenai skripsi mahasiswa dari Program Studi Informatik Universitas Udayana. Fitur yang terdapat dari sistem ini yaitu Browsing (penelusuran) dan Searching (pencarian). Diharapkan sistem ini dapat mempermudah mahasiswa Informatika dalam melakukan pencarian informasi mengenai skripsi mahasiswa seelumnya.</p>
                <div class="d-flex justify-content-center">
                     <a class="btn btn-primary" href="/dashboard" role="button">Kunjungi</a></div>
                </div>
        </div>
    <div class="fitur">
        <div class="container">
            <div class="row">
                <h1 class="text-white text-center mt-4 mb-2" id="features">Features</h1>
                <div class="features mt-3 mb-5">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 ">
                            <div class="card">
                                <img src="images/browsing.png" class="card-img-top"  alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Browsing</b></h5>
                                    <p class="card-text">
                                        Fitur browsing yang memungkinkan pengguna sistem untuk menelusuri informasi mengenai
                                        skripsi mahasiswa yang tersedia melalui salah satu kriteria yang tersedia
                                        </p>
                                    <a href="/browsing" class="btn btn-primary">Kunjungi</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="card">
                                <img src="images/searching.png" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><b>Searching</b></h5>
                                    <p class="card-text">Fitur searching merupakan fitur utama dari sistem ini. Dimana pengguna dapat melakukan pencarian 
                                        sebuah informasi skripsi mahasiswa melalui pencarian secara sfesifik dari beberapa kriteria yang tersedia</p>
                                    <a href="/searching" class="btn btn-primary">Kunjungi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container shadow-lg pb-1">
        <footer class="m-2">
            <p class="mb-0 text-muted" style="text-align: center">&copy; SISIMA Informatika.2022</p>
        </footer>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>