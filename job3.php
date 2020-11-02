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


        <!------------------------ job-details -------------------------------------------------->
        <section class="job-details">
            <div class="auto-container" style="padding-left: 250px;">
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                        <div class="job-details-content">
                            <div class="upper-box">
                                <div class="inner-box" style="padding-left: 100px;">
                                    <!---->
                                    <div class="inner">

                                        <h2 style="text-align: center;">Data Analyst</h2>


                                    </div>
                                </div>
                                <div class="text">
                                    <h2>Job Description</h2>
                                    <p>Seeking qualified Data Analyst with Master’s Degree or foreign equivalent in CS or IT along with 6 months of related work experience to Architect and design the data marts to store the data brought in from AURA Data
                                        Source. Analyze unstructured data from a new source system . Perform data analysis and data profiling using complex SQL on various sources systems.</p>
                                    <h3>Responsibilities</h3>
                                    <ul class="list clearfix" style="color:#555555 ;">
                                        <li>Create source to target mapping documents to map all the fields in the data source to business fields.</li>
                                        <li>
                                            Create a data model to ensure all the fields are modeled to ensure the enterprise data warehouse standards are met using SCD type 2 modeling.
                                        </li>
                                        <liCreate complex fact and dimensions to support reporting requirement. Create reports in drill down and graphical reports using Power Bl. Involved in Performance Tuning of reports by identifying the indexes required on the backend tables</li>
                                    </ul>
                                    <h3>Requirements</h3>
                                    <ul class="list clearfix">
                                        <li><span>Age</span>:</li>
                                        <li><span>Pronoun</span>:</li>
                                        <li><span>Education</span>: </li>
                                        <li><span>Experience</span>: </li>
                                        <li><span>Skills</span>: </li>
                                    </ul>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>
    </div>
    </section>
    <!-- job-details end ------------------------------------------------------->
    <!--------------------                                   -->











      
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