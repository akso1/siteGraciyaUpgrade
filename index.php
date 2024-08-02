<?php
  
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <link rel="icon" href="images/fevicon/fevicon.png" type="image/gif" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Грация</title>


    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

</head>

<body>

    <div class="hero_area" id="start">
        <!-- header section strats -->
        <header class="header_section" id="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="index.html">
                        <div class="logo_main"></div>
                        <span>
                            Graciya
                        </span>
                    </a>

                    <button id="but_nav" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  ">
                            <li class="nav-item">
                                <a class="nav-link linkJa" href="#start">Начало <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link linkJa" href="#product">Волосы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link linkJa" href="#temo">Отзывы</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link linkJa" href="#contact">Контакты</a>
                            </li>
                        </ul>
                        <div class="user_optio_box">
                            <a onclick="hv_trash();">
                                <?php
                                include "shopCard.php";
                                print('<span id="itemCount">'.count($_SESSION['arrayID']).'</span>');
                                ?>
                                <span>&nbsp;|&nbsp;</span>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
       
        <!-- end header section -->
        <div class="div_background">
            <div class="dback_left">
                <div class="content_logo">
                    <div class="logo">
                        <h2>ГРАЦИЯ ЭТО ЛУЧШИЙ САЛОН
                            КРАСОТЫ</h2>
                        <span>Салон в котором ты можешь преобразить и полностью изменить свою внешность, до не узноваемости</span>
                    </div>
                    <a class="btn_start linkJa" href="#product">Посмотреть</a>
                </div>
            </div>
            <div class="dback_right">
                <div class="img_girl"></div>
            </div>
        </div>
    </div>

 <!-- trash -->
 <div class="right_trash" id="right_trash" style="visibility : hidden; right: -25vw;">
  <?php
    include "output_id_from_db.php";
    ?>
    </div>
<!-- end trash -->






    <!-- product section -->

    <section class="product_section " id="product">
        <div class="container">
            <div class="product_heading">
                <h2>
                    Волосы
                </h2>
            </div>
            <div class="product_container">
                <!--  -->
            <?php
            include "card_date.php";
            $k=0;
            while($cardname = $conn->fetch_assoc()){
            $k++;
            print('<div class="box">
                    <div class="box-content" style="background-image: url(../images/tovar/'.$cardname['link'].');">
                        <div class="detail-box">
                            <div class="text">
                                <h6>
                                    Волосы
                                </h6>
                                <h5>
                                    '.$cardname['sell'].'<span>₽</span>
                                </h5>
                            </div>
                            <div class="like">
                                <h6>
                                    Цвет
                                </h6>
                                <span>'.$cardname['color'].'</span>
                            </div>
                        </div>
                    </div>
                    <div class="btn-box">
                        <a id="'.$cardname['id'].'" onclick="trashcard('.$cardname['id'].')">
                            В корзину
                        </a>
                    </div>
                </div>');
            }
            ?>
               
                <!--  -->
                </div>
            </div>
        </div>
    </section>

    <!-- end product section -->

    <!-- end product section -->

    <!-- contact section -->
    <section class="contact_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Свяжитесь с нами
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <form action="">
                            <div>
                                <input type="text" placeholder="Ваше имя" />
                            </div>
                            <div>
                                <input type="text" placeholder="Номер телефона" />
                            </div>
                            <div>
                                <input type="email" placeholder="Почта" />
                            </div>
                            <div>
                                <input type="text" class="message-box" placeholder="Сообщение" />
                            </div>
                            <div class="btn_box">
                                <button>
                                    Отправить
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="map_container">
                        <div class="map">
                            <div id="googleMap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact section -->


    <!-- client section -->
    <section class="client_section layout_padding-bottom" id="temo">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Отзывы
                </h2>
            </div>
        </div>
        <div id="customCarousel2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="images/client.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <div class="client_info">
                                            <div class="client_name">
                                                <h5>
                                                    Дмитрий
                                                </h5>
                                                <h6>
                                                    Пользователь
                                                </h6>
                                            </div>
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                        </div>
                                        <p>
                                            Для клиента очень важно знать о его потребностях, но в то же время происходит то же самое.
                                            с упорным трудом
                                            и
                                            с какой-то сильной болью. Ибо позвольте мне перейти к мельчайшим подробностям: никто не должен заниматься никакой работой, кроме той,
                                            что-то из этого полезно. Сомнения или неприятная боль при упреках в удовольствии хотят быть
                                            волосы
                                            убежать от боли
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="images/client.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <div class="client_info">
                                            <div class="client_name">
                                                <h5>
                                                    Дмитрий
                                                </h5>
                                                <h6>
                                                    Пользователь
                                                </h6>
                                            </div>
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                        </div>
                                        <p>
                                            Для клиента очень важно знать о его потребностях, но в то же время происходит то же самое.
                                            с упорным трудом
                                            и
                                            с какой-то сильной болью. Ибо позвольте мне перейти к мельчайшим подробностям: никто не должен заниматься никакой работой, кроме той,
                                            что-то из этого полезно. Сомнения или неприятная боль при упреках в удовольствии хотят быть
                                            волосы
                                            убежать от боли
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="images/client.jpg" alt="">
                                    </div>
                                    <div class="detail-box">
                                        <div class="client_info">
                                            <div class="client_name">
                                                <h5>
                                                    Дмитрий
                                                </h5>
                                                <h6>
                                                    Пользователь
                                                </h6>
                                            </div>
                                            <i class="fa fa-quote-left" aria-hidden="true"></i>
                                        </div>
                                        <p>
                                            Для клиента очень важно знать о его потребностях, но в то же время происходит то же самое.
                                            с упорным трудом
                                            и
                                            с какой-то сильной болью. Ибо позвольте мне перейти к мельчайшим подробностям: никто не должен заниматься никакой работой, кроме той,
                                            что-то из этого полезно. Сомнения или неприятная боль при упреках в удовольствии хотят быть
                                            волосы
                                            убежать от боли
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#customCarousel2" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel2" data-slide-to="1"></li>
                <li data-target="#customCarousel2" data-slide-to="2"></li>
            </ol>
        </div>
    </section>
    <!-- end client section -->


    <!-- info section -->
    <section class="info_section layout_padding2" id="contact">
        <div class="container">
            <div class="info_logo">
                <h2>
                    Грация
                </h2>
            </div>
            <div class="row">

                <div class="col-md-3">
                    <div class="info_contact">
                        <h5>
                            О нас
                        </h5>
                        <div>
                            <div class="img-box">
                                <img src="images/location-white.png" width="18px" alt="">
                            </div>
                            <p>
                                Ул. Энтузиастов 31
                            </p>
                        </div>
                        <div>
                            <div class="img-box">
                                <img src="images/telephone-white.png" width="12px" alt="">
                            </div>
                            <p>
                                +7(995)664-23-23
                            </p>
                        </div>
                        <div>
                            <div class="img-box">
                                <img src="images/envelope-white.png" width="18px" alt="">
                            </div>
                            <p>
                                graciya@gmail.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="info_info">
                        <h5>
                            Информация
                        </h5>
                        <p id="timeOpenP">
                            Время работы: с 8:00 - 19:00 
                        </p>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="info_form ">
                        <h5>
                            Новости
                        </h5>
                        <div class="social_box">
                            <a href="">
                                <div class="socim s1"></div>
                            </a>
                            <a href="">
                                <div class="socim s2"></div>
                            </a>
                            <a href="">
                                <div class="socim s3"></div>
                            </a>
                            <a href="">
                                <div class="socim s4"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end info_section -->

    <!-- footer section -->
    <section class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> Все права защищены
                <a>«Грация»</a>
            </p>
        </div>
    </section>
    <!-- footer section -->

    <!-- jQery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>