<!doctype html>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Courses | easyUniversity</title>
    
    <!--====== Favicon Icon ======-->
    <?php include('include/header.php') ?>
    
    <!--====== HEADER PART ENDS ======-->
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
   
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
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Our Courses</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Courses</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== TEACHERS PART START ======-->
                                    <?php include("login/dbcon.php"); 
                                    $sql = "SELECT * from subject ";
                                    $result = $conn-> query($sql);
                                    while($row = $result-> fetch_assoc()){
                                    ?>
    <section id="teachers-page" class="pt-90 pb-120 gray-bg">
        <div class="container ">
           <div class="row">
           <?php include("login/dbcon.php"); 
                                    $sql = "SELECT * from subject";
                                    $result = $conn-> query($sql);
                                    while($row = $result-> fetch_assoc()){
                                    ?>
               <div class="col-lg-3 col-sm-6">
                   <div class="singel-course mt-30 ">
                   <div class="thum">
                        <div class="image">
                            <img src="images/courses.png" alt="courses">
                        </div>
                        <div class="price">
                               <span>&#2547;<?php echo ($row['price']);?></span>
                        </div>
                   </div>
                        <div class="cont">
                            <h6><?php echo ($row['subject_title']);?></h6>
                            <span><?php echo($row['subject_code']);?></span><br>
                            <span><?php echo($row['dept_id']);?></span><br>
                        </div>
                        <div class="price-button">
                                    <a href="login/index.php" class="main-btn m-2">Enroll Now</a>
                                </div>
                    </div>
                     <!-- singel teachers -->
               </div>
               <?php } ?>
               </div>
        </div>
        
    </section>
    
    <!--====== TEACHERS PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
    
    <?php include("include/footer.php"); ?>

</body>

</html>
<?php } ?>