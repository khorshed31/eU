<!doctype html>
<html lang="en">

<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Departments | easyUniversity</title>
    

<body>
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
    <?php include("include/header.php"); ?>
   
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
                        <h2>Our Department</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Department</li>
                            </ol>
                        </nav>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== PAGE BANNER PART ENDS ======-->
   
    <!--====== COURSES PART START ======-->

    <?php 
        include("login/dbcon.php");          
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
                 ?>
    
    <section id="courses-part" class="pt-120 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="courses-top-search">
                        <ul class="nav float-left" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="courses-grid-tab" data-toggle="tab" href="#courses-grid" role="tab" aria-controls="courses-grid" aria-selected="true"><i class="fa fa-th-large"></i></a>
                            </li>
                            <li class="nav-item">
                                <a id="courses-list-tab" data-toggle="tab" href="#courses-list" role="tab" aria-controls="courses-list" aria-selected="false"><i class="fa fa-th-list"></i></a>
                            </li>
                            <li class="nav-item">Showning 4 0f 24 Results</li>
                        </ul> <!-- nav -->
                        
                        <div class="courses-search float-right">
                            <form action="#">
                                <input type="text" placeholder="Search">
                                <button type="button"><i class="fa fa-search"></i></button>
                            </form>
                        </div> <!-- courses search -->
                    </div> <!-- courses top search -->
                </div>
            </div> <!-- row -->
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="courses-grid" role="tabpanel" aria-labelledby="courses-grid-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                                <div class="thum">
                                    <div class="image">
                                        <img src="images/CSE.png" alt="department">
                                    </div>
                                    <div class="price">
                                        <span>Free</span>
                                    </div>
                                </div>
                                <div class="cont">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span>(20 Reviws)</span>
                                    <a href="cse.php"><h4>Computer Science and Engineering(CSE)</h4></a>
                                    <div class="course-teacher">
                                <!-- <div class="thum">
                                    <a href="#"><img src="images/course/teacher/t-1.jpg" alt="teacher"></a>
                                </div> -->
                                <div class="name">
                                    <a href="#"><h6>Admin</h6></a>
                                </div>
                                <div class="admin">
                                    <ul>
                                    <strong>Total Courses : <?php echo $row_users;?></strong>
                                    </ul>
                                </div>
                            </div>
                                </div>
                            </div> <!-- singel course -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                            <div class="thum">
                            <div class="image">
                                <img src="images/EEE.png" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                        </div>
                        <div class="cont">
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>(20 Reviws)</span>
                            <a href="eee.php"><h4>Electrical and Electronics Engineering(EEE)</h4></a>
                            <div class="course-teacher">
                                <!-- <div class="thum">
                                    <a href="#"><img src="images/course/teacher/t-2.jpg" alt="teacher"></a>
                                </div> -->
                                <div class="name">
                                    <a href="#"><h6>Admin</h6></a>
                                </div>
                                <div class="admin">
                                    <ul>
                                    <strong>Total Courses : <?php echo $row_users_eee;?></strong>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            </div> <!-- singel course -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="singel-course mt-30">
                            <div class="thum">
                            <div class="image">
                                <img src="images/CEN.png" alt="Course">
                            </div>
                            <div class="price">
                                <span>Free</span>
                            </div>
                        </div>
                        <div class="cont">
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                            </ul>
                            <span>(20 Reviws)</span>
                            <a href="cen.php"><h4>Civil Engineering(CEN)</h4></a>
                            <div class="course-teacher">
                                <!-- <div class="thum">
                                    <a href="#"><img src="images/course/teacher/t-3.jpg" alt="teacher"></a>
                                </div> -->
                                <div class="name">
                                    <a href="#"><h6>Admin</h6></a>
                                </div>
                                <div class="admin">
                                    <ul>
                                    <strong>Total Courses : <?php echo $row_users_cen;?></strong>
                                    </ul>
                                </div>
                            </div>
                        </div>
                            </div> <!-- singel course -->
                        </div>
                        
                    </div> <!-- row -->
                </div>
            </div> <!-- tab content -->
        </div> <!-- container -->
    </section>
    
    <!--====== COURSES PART ENDS ======-->
   
    <!--====== FOOTER PART START ======-->
    
    <?php include("include/footer.php"); ?>

</body>

</html>
