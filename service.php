<?php
include "includes/head_include.php"
?>
<!-- page wrapper -->

<body>

    <div class="boxed_wrapper">
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <!--  <div class="preloader-close">Preloader Close</div>-->
            </div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>
        <?php
        include "includes/header_menu.php";
        include "includes/mobile_menu.php";
        ?>
<!------------------------------------------------------------->



        <!--Page Title-->
        <section class="page-title" style="background-image: url(assets/images/background/page-title-2.jpg);">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/pattern-35.png);"></div>
            <div class="auto-container">
                <div class="content-box">
                    <div class="title-box centred">
                        <h1>Services</h1>
                        <p>Our Team Moves Faster, Keeping you Current on What's Hot</p>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="index-2.html">Home</a></li>
                        <li>Services</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--End Page Title------------------------------------------------------------------------------------>










        <!------------------------------------------------------------------------------------------------------->
        <!-- service-section -->
        <section class="service-section service-page">
            <div class="anim-icon">
                <div class="icon-1" style="background-image: url(assets/images/icons/anim-icon-1.png);"></div>
                <div class="icon-2"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title centred">
                    <span class="top-title">Services We Provide</span>
                    <h2>What Can We Do For You?</h2>
                    <p>Here at Amiti Consulting we provide a multitude of IT related services including IT Consulting, Resource Augmentation, Application Development, and a variety of Offshore Services.</p>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 service-block">
                        <div class="service-block-one">
                            <div class="inner-box">
                                <figure class="image-box"><img src="assets/images/service/service-1.jpg" alt=""></figure>
                                <div class="lower-content">
                                    <div class="content-box">
                                        <div class="inner">
                                            <figure class="icon-box"><img src="assets/images/icons/icon4.png" alt=""></figure>
                                            <h4>Technologys</h4>
                                        </div>
                                        <div class="link" style="color: #87ceda;">
                                            <a href="Technology.php"> </a>
                                        </div>
                                    </div>
                                    <div class="overlay-content ">
                                        <p>Cloud<br> AWS Migration<br>IOT<br> Mobile & more</p>
                                        <a href="Technology.php "><i class="flaticon-right-arrow "></i>More details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 service-block ">
                        <div class="service-block-one ">
                            <div class="inner-box ">
                                <figure class="image-box "><img src="assets/images/service/service-3.jpg " alt=" "></figure>
                                <div class="lower-content ">
                                    <div class="content-box ">
                                        <div class="inner ">
                                            <figure class="icon-box "><img src="assets/images/icons/icon6.png " alt=" "></figure>
                                            <h4>Innovation</h4>
                                        </div>
                                        <div class="link " style="color: #87ceda;">
                                            <a href="innovation.php "></a>
                                        </div>
                                    </div>
                                    <div class="overlay-content ">
                                        <p>Pitch Club Series<br> Challeges<br> Product Development</p>
                                        <a href="innovation.php "><i class="flaticon-right-arrow "></i>More details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 service-block ">
                        <div class="service-block-one ">
                            <div class="inner-box ">
                                <figure class="image-box "><img src="assets/images/service/service-2.jpg " alt=" "></figure>
                                <div class="lower-content ">
                                    <div class="content-box ">
                                        <div class="inner ">
                                            <figure class="icon-box "><img src="assets/images/icons/icon5.png " alt=" "></figure>
                                            <h4>Workforce Management</h4>
                                        </div>
                                        <div class="link " style="color: #87ceda;">
                                            <a href="workforce.php"></a>
                                        </div>
                                    </div>
                                    <div class="overlay-content ">
                                        <p>Corporate Position<br> Client Position</p>
                                        <a href="workforce.php "><i class="flaticon-right-arrow "></i>More details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>






                </div>
            </div>
        </section>
        <!----------------- service-section end -------------------------------------------------------------->
        <!------------------------------------------------------------------------------------------------------->








             
   <!------------------------Footer------------------------------------------------------------------------>    
       
   <?php
        include "includes/footer.php"
        ?>

        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target " data-target="html "><i class="flaticon-up-arrow-1 "></i>Top</button>
    </div>

    <?php
    include "includes/scripts_include.php"
    ?>

</body>
<!-- End of .page_wrapper -->

</html>