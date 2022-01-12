<!doctype html>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Electrical and Electronic Engineering(EEE)</title>

    <style>
        th{
            background-color: #f2bf07;
            color:white;
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
    
    <section id="page-banner" class="pt-105 pb-110 bg_cover" data-overlay="8" style="background-image: url(images/page-banner-2.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2>Electrical and Electronic Engineering(EEE)</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Department</a></li>
                                <li class="breadcrumb-item active" aria-current="page">EEE</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
    
    <!--====== COURSES SINGEl PART START ======-->
    
    <section id="corses-singel" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="corses-singel-left mt-30">
                        <div class="title">
                            <h3>Electrical and Electronic Engineering(EEE)</h3>
                        </div> <!-- title -->
                        
                        <div class="corses-singel-image pt-50">
                            <img src="images/EEE.png" alt="Courses">
                        </div> <!-- corses singel image -->
                        
                        <div class="corses-tab mt-30">
                            
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                    <div class="overview-description">
                                        <div class="singel-description pt-40">
                                            <h6>Summery</h6>
                                            <p> <b>Electrical and Electronic Engineering(EEE)</b> ,deals with the engineering problems, opportunities and needs of electrical, electronics, computer, telecommunication systems and related industries. This branch provides students with a wide range of fundamental knowledge in core disciplines such as communications, control systems, signal processing, radio frequency design, micro-processors, micro-electronics, power generation and electrical machines. The discipline focuses on design and manufacture of electrical, electronic devised, computers and their component parts, as well as on the integration of components into complex systems.</p>
                                        </div>
                                    </div> <!-- overview description -->
                                </div>
                            <h4 class="badge-warning rounded-circle text-center">Courses Are: </h4><hr>
                            <table class="table table-hover table-dark">
                                    <tr>
                                        <th>Course Code</th>
                                        <th>Course Name</th>
                                        <th>Price</th>
                                        
                                    </tr>
                            <?php include("login/dbcon.php"); 
                                    $sql = "SELECT * from subject WHERE dept_id='EEE'";
                                    $result = $conn-> query($sql);
                                    if($result-> num_rows >0){
                                        while($row = $result-> fetch_assoc()){
                                            echo "<tr><td>". $row["subject_code"] . "</td><td>" . $row["subject_title"] . "</td><td>" . $row["price"]
                                            . "</td></tr>";
                                        }
                                        echo"</table>";
                                    }
                                    else{
                                        echo "No data here" ."<br>";
                                    }
                                    ?>
                            </div>
                            <a href="login/index.php" class="main-btn">Enroll Now</a> <!-- tab content -->
                        </div>
                    </div> <!-- corses singel left -->
                    <?php 
                 
    $query = "SELECT * FROM subject where dept_id = 'CSE'"; 
       $result = mysqli_query($conn, $query); 
      
    if ($result) 
    { 
        // it return number of rows in the table. 
        $row_users = mysqli_num_rows($result); 
          
    }                   
                 $query = "SELECT * FROM subject where dept_id = 'EEE'"; 
                    $result = mysqli_query($conn, $query); 
                   
                 if ($result) 
                 { 
                     // it return number of rows in the table. 
                     $row_users_eee = mysqli_num_rows($result); 
                       
                 }  
                 $query = "SELECT * FROM subject where dept_id = 'CEN'"; 
                    $result = mysqli_query($conn, $query); 
                   
                 if ($result) 
                 { 
                     // it return number of rows in the table. 
                     $row_users_cen = mysqli_num_rows($result); 
                       
                 } 
                 
                 $query = "SELECT * FROM teacher where dept_id = 'EEE'"; 
                 $result = mysqli_query($conn, $query); 
                
              if ($result) 
              { 
                  // it return number of rows in the table. 
                  $row_users_t = mysqli_num_rows($result); 
                    
              } 
                 ?>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="course-features mt-30">
                               <h4>Course Features </h4>
                               <ul>
                                    <li><i class="fa fa-clock-o"></i>Total Courses : <span><?php echo $row_users_eee;?></span></li>
                                    <li><i class="fa fa-clone"></i>Teachers : <span><?php echo $row_users_t;?></span></li>
                                </ul>
                                <div class="price-button pt-10">
                                    <!-- <span>Price : <b>$25</b></span> -->
                                    <a href="login/index.php" class="main-btn">Enroll Now</a>
                                </div>
                            </div> <!-- course features -->
                        </div>
                        <!-- <div class="col-lg-12 col-md-6">
                            <div class="You-makelike mt-30">
                                <h4>You make like </h4> 
                                <div class="singel-makelike mt-20">
                                    <div class="image">
                                        <img src="images/your-make/y-1.jpg" alt="Image">
                                    </div>
                                    <div class="cont">
                                        <a href="#"><h4>Introduction to machine languages</h4></a>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                            <li>$50</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="singel-makelike mt-20">
                                    <div class="image">
                                        <img src="images/your-make/y-1.jpg" alt="Image">
                                    </div>
                                    <div class="cont">
                                        <a href="#"><h4>How to build a basis game with java </h4></a>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                            <li>$50</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="singel-makelike mt-20">
                                    <div class="image">
                                        <img src="images/your-make/y-1.jpg" alt="Image">
                                    </div>
                                    <div class="cont">
                                        <a href="#"><h4>Basic accounting from primary</h4></a>
                                        <ul>
                                            <li><a href="#"><i class="fa fa-user"></i>31</a></li>
                                            <li>$50</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="releted-courses pt-95">
                        <div class="title">
                            <h3>Releted Courses</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="singel-course mt-30">
                                    <div class="thum">
                                        <div class="image">
                                            <img src="images/CSE.png" alt="Course">
                                        </div>
                                    
                                    </div>
                                    <div class="cont">
                                        <strong>Courses</strong>
                                        <span><?php echo $row_users;?></span>
                                        <a href="cse.php"><h4>Computer Science And Engineering(CSE)</h4></a>
                                    </div>
                                </div> <!-- singel course -->
                            </div>
                            <div class="col-md-6">
                                <div class="singel-course mt-30">
                                    <div class="thum">
                                        <div class="image">
                                            <img src="images/CEN.png" alt="Course">
                                        </div>
                                    
                                    </div>
                                    <div class="cont">
                                        <strong>Courses</strong>
                                        <span><?php echo $row_users_cen;?></span>
                                        <a href="cen.php"><h4>Civil Engineering(CEN)</h4></a>
                                    </div>
                                </div> <!-- singel course -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- releted courses -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== COURSES SINGEl PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
    
    <?php include('include/footer.php'); ?>
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TP PART ENDS ======-->
   

</body>
</html>
