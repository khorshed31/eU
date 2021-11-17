<?php require("libs/fetch_data.php"); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!--====== <title><?php //getwebname("titles"); echo"|"; gettagline("titles");
                        ?></title> ======-->
    <title>easyUniversity | Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link id="browser_favicon" rel="shortcut icon" href="blogadmin/images/<?php geticon("titles"); ?>">
    <meta charset="utf-8" name="description" content="<?php getshortdescription("titles"); ?>">
    <meta name="keywords" content="<?php getkeywords("titles"); ?>" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/jquery.desoslide.css">
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
</head>

<body>
<!-- <div class="preloader">
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
    </div> -->
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
                                    <?php include("login/connect.php"); 
                                    $sql = "SELECT * from teacher WHERE id";
                                    $result = $conn-> query($sql);
                                    while($row = $result-> fetch_assoc()){
                                    ?>
    <section id="teachers-page" class="pt-90 pb-120 gray-bg">
        <div class="container ">
           <div class="row">
           <?php include("login/connect.php"); 
                                    $sql = "SELECT * from teacher WHERE id";
                                    $result = $conn-> query($sql);
                                    while($row = $result-> fetch_assoc()){
                                    ?>
               <div class="col-lg-3 col-sm-6">
                   <div class="singel-teachers mt-30 text-center ">
                        <div class="image">
                            <img src="login/admin/<?php echo $row['photo'];?>" alt="Teachers">
                        </div>
                        <div class="cont">
                            <h6><?php echo htmlentities($row['t_name']);?></h6>
                            <span><?php echo htmlentities($row['t_id']);?></span>
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