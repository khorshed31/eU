<!doctype html>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title> Events | easyUniversity</title>

    <style>
        marquee{
            background-color: #FFC600;
            color: #07294D;
            padding: 10px;
            border-radius: 5px;
        
        }
    </style>
    
    <!--====== Favicon Icon ======-->
    <?php include('include/header.php') ?>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>
    
    <!--====== SEARCH BOX PART ENDS ======-->

<!--====== PAGE BANNER PART START ======-->
    
<section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-3.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Events</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Events</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->

  <!--====== EVENTS PART START ======-->
    
  <section id="event-page" class="pt-90 pb-120 gray-bg">
  <?php
  include('login/dbcon.php');
                  $query = mysqli_query($conn,"SELECT * FROM `event` ORDER BY `event`.`event_id` DESC limit 2");
                  while($row1 = $query-> fetch_assoc()){
					?>
        <div class="container">

        <marquee><b><?php echo $row1['event_title']; ?></b></marquee>
        <?php } ?>
           <div class="row">
               <?php 
                include('login/dbcon.php');
                  $query = mysqli_query($conn,"SELECT * FROM `event` ORDER BY `event`.`event_id` DESC");
                  while($row = $query-> fetch_assoc()){ 
                  
                ?>
               <div class="col-lg-6">
                   <div class="singel-event-list mt-30">
                       <div class="event-cont">
                           <span><i class="fa fa-calendar"></i> Start: <?php echo $row['date_start']; ?></span>
                           <h4><?php echo $row['event_title']; ?></h4>
                            <!-- <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                            <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                            <p>Nam nec tellus a odio tincidunt auctor a ornare odionon mauris itae erat conuat</p> -->
                       </div>
                   </div>
               </div><?php } ?>
               
           </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== EVENTS PART ENDS ======-->

    <?php include('include/footer.php'); ?>
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TP PART ENDS ======-->