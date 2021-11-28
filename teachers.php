<!doctype html>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Teachers | easyUniversity</title>
    
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
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Our Teachers</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Teacher</li>
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
                                    $sql = "SELECT * from teacher ";
                                    $result = $conn-> query($sql);
                                    while($row = $result-> fetch_assoc()){
                                    ?>
    <section id="teachers-page" class="pt-90 pb-120 gray-bg">
        <div class="container ">
           <div class="row">
           <?php include("login/dbcon.php"); 
                                    $sql = "SELECT * from teacher";
                                    $result = $conn-> query($sql);
                                    while($row = $result-> fetch_assoc()){
                                    ?>
               <div class="col-lg-3 col-sm-6">
                   <div class="singel-teachers mt-30 text-center ">
                        <div class="image">
                            <img src="login/admin/<?php echo $row['location'];?>" alt="Teachers">
                        </div>
                        <div class="cont">
                            <h6><?php echo ($row['firstname']);?> <?php echo ($row['lastname']);?></h6>
                            <span><?php echo($row['username']);?></span><br>
                            <span><?php echo($row['dept_id']);?></span><br>
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