<style>
#customers {
  /*font-family: Arial, Helvetica, sans-serif;*/
 /* font-family:Cambria;*/

  border-collapse: collapse;
  font-size: 12px;
  
}

#customers td  {
    width: 350px ;
  border: 1px solid #eee;
  padding: 8px;
  text-align: left;
  
  
  color:#000000;
}

#customers tr:nth-child(even){background-color: #1370B5;}
#customers tr:nth-child(odd){background-color: #FFFFFF;}
#customers tr:hover {background-color: #C6D3F3; color:whitesmoke;}
/*#customers tr:hover {background-color:#f1f1f1;}*/


#customers th {
    color:whitesmoke;
    border: 1px solid #eee;
  padding-top: 8px;
  padding-bottom: 8px;
  text-align: center;
  background-color:black;
  color: white;
  width: 150px;
  font-size: medium;
}
</style>



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


        <!----------------------------------------------------------------------------------------------->
        <!--------------------------------- service-details --------------------------------->
        <section class="service-details">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12">
                        <div class="service-details-content">
                            <div class="content-one">
                                <div class="sec-title">
                                    <span class="top-title"><span style="font-size: 22px;color: white;margin-left: -2px;">Di</span>gital Transformation</span>
                                </div>
                                <div class="text">
                                    <p style="text-align:justify;">In the current digital era, digital transformation is the focus for organizations across
                                         industries. Digital transformation is not just legacy system transformation to web, it 
                                         is increased customer engagements, it captures micro interactions and creates a great 
                                         customer experience. Most organizations agree that digital transformation is the key IT
                                          goal, but often needs guide in managing cost, quality and expert help in turn around time.</p>
                                </div><br>
                                
                                <div class="text">
                                    <h2 style="color:#0087D3">Why Amiti Tech</h2><br>
                                    <p style="text-align:justify;">We are a leader in digital transformation. With multiple successful implementations across
                                         the private industries and government entities, we have transformed the custom framework
                                          and the best implementation practices and processes. Our people, process and technology 
                                          goes beyond the need and creates solution which is highly responsive, interactive and 
                                          delivers a great user experience.</p>
                                    

                                   <br>
                                   
<!------------------------------------------------------------------------------------------------>
<!------------------------------------------------------------------------------------------------>
<!------------------------------------TABLE----------------------------------------------------->


                                        <center>
                                        <table id="customers" style="align-self: center;" >
                                        
                                        <tr>
                                            <th>PLAN</th>
                                            <td style="padding:15px;color:black;"><b>USER STORIES</b><br><br> All scenarios,pre-conditions,business rules,and results by user.
                                        </td>
                                            <td style="padding:15px;"><b>USER FLOW</b> <br><br>Document what user can see, act, access, update. </td>
                                            <td style="padding:15px;"><b>RED ROUTES </b><br><br>All exception scenarios, error messages, and user obstacles. </td>
                                            </td>
                                        
                                        </tr>
                                        <tr >
                                            <th>EXPLORE</th>
                                            <td style="padding:15px; color:white;"><b>BRAINSTORM AND SKETCH </b><br><br>Discussion/Ideas on Paper/White board for Screen mockups, user flows, scenarios. </td>
                                            <td style="padding:15px;color:white;"><b>WIREFRAME</b> <br><br>Details and Structure to ideas, UI pattern components on paper.</td>
                                            <td style="padding:15px;color:white;"><b>PROTOTYPE </b><br><br>Paper or HTML pages or static images of the potential UI Screen</td>
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <th>ACCESS</th>
                                            <td style="padding:15px;"><b>ACCESS ROLES</b><br><br> Different access levels, permission for read, delete, update data and screens.</td>
                                            <td style="padding:15px;"><b>STANDANDS</b> <br><br>Adherence to appropriate Accessibiity standards</td>
                                            <td style="padding:15px;"><b>508 COMPLIANCES</b><br><br>Adherence to American Disability Act.</td>
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <th>UX</th>
                                            <td style="padding:15px;color:white;"><b>BE FINDABLE</b><br><br> All scenarios,pre-conditions,business rules,and results by user.
                                        </td>
                                            <td style="padding:15px;color:white;"><b>BE CONTEXTUAL</b> <br><br>Document what user can see, act, access, update. </td>
                                            <td style="padding:15px;color:white;"><b>BE SUPPORTIVE</b><br><br>All exception scenarios, error messages, and user obstacles. </td>
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <th>CREATE</th>
                                            <td style="padding:15px;"><b>UI COMPOENTS</b><br><br> Develop UI Componets, Widgets for UI screen.                  </td>
                                            <td style="padding:15px;"><b>RESPONSIVENESS</b> <br><br>Integrations amoung UI components, binidng to user actions </td>
                                            <td style="padding:15px;"><b>DATA INTEGRATION</b><br><br>Integration for database create, read, update and delete</td>
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <th>FEEDBACK</th>
                                            <td style="padding:15px;color:white;"><b>WAITING TIMES</b><br><br> Tracking all waiting times per user story to minimize.                                       </td>
                                            <td style="padding:15px;color:white;"><b>ERRORS</b> <br><br>Review all error message per user story to minimize. </td>
                                            <td style="padding:15px;color:white;"><b>USER ACTIONS </b><br><br>Count and review all user actions to optimize.</td>
                                            </td>
                                        
                                        </tr>
                                        <tr>
                                            <th>CREATE</th>
                                            <td style="padding:15px;"><b>TRANSITION</b><br><br>Seamless U/X experience from workflow to another feather.                                       </td>
                                            <td style="padding:15px;"><b>MICRO INTERACTIONS</b> <br><br>Review and Optimize frequent micro interactions by users.</td>
                                            <td style="padding:15px;"><b>VISUAL IMPACT</b><br><br>Optimize presentation layer with image, font and colour hierarchy.</td>
                                            </td>
                                        
                                        </tr>
                                        
                                        
                                        
                                        </table>
                                        </center>
                                                                    
                                                                       
                                </div>
                                
                                
                            </div>
                           
                    </div>
                    </div>

                    <!------------------------------------------------------------------------------------------->
                    <!------------------------------------------------------------------------------------------->
    
            </div>
        </div>
    </section>
    <!-- service-details end ----------------------------------------------------------------------------->


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