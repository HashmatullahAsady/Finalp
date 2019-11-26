<?php 
require("links.php");
require("connection.php"); 
?>

<!-- TO ACCES COMENTS THAT PEOPLE WRIT -->
<?php if(isset($_POST["comments"])){
    $comments=$_POST["comments"];
    $post_id = $_POST["post_id"];

    $comment_query=mysqli_query($conn,"INSERT INTO COMMENTS(description,post_id) VALUES('$comments',$post_id)");
} ?>
<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>SEVEN STASR</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body data-spy="scroll" data-target=".navbar-collapse">
        <header id="main_menu" class="header navbar-fixed-top">            
            <div class="main_menu_bg">
                <div class="container">
                    <div class="row">
                        <div class="nave_menu">
                            <nav class="navbar navbar-default" id="navmenu">
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="sr-only"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                      <img src="img/SST.png" height="100px" width="200px">
                                      <div><?php if (isset($_GET["post"]) and $_GET["post"]="troue"){ ?>
                                          <div style="width: auto; color: lightgreen;" class="alert alert-success form-control">
                                              new post is added : 
                                              <a href="#" class="close" data-dismiss="alert" aria-label="close" style="color: white" >&times;</a>
                                          </div>
                                      <?php } ?></div>
                                    </div>

                        



                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                                        <ul class="nav navbar-nav navbar-right">
                                            <li><a href="#ghome">Home</a></li>
                                            <li><a href="#about"> About us</a></li>
                                            <li><a href="#contact">Contact</a></li>
                                            <li><a href="add_post.php">new post</a></li>
                                            <li><a href="user_name.php">login</a></li>

                                            
                                            <li>
                                                <a href="#"  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <span class="glyphicon glyphicon-search"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <form class="navbar-form" role="search">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Search">
                                                            </div>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>

                                        
                                    </div>

                                </div>
                            </nav>
                        </div>	
                    </div>

                </div>

            </div>
        </header> 





        <section id="home" class="home" style="background-image: url('img/pic1.png');">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 ">
                            <div class="main_home_slider">
                                <div class="single_home_slider">
                                    <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                                        <h1>SEVEN STAR TECHNOLOGY</h1>


                                    </div>
                                </div>
                                <div class="single_home_slider">
                                    <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                                        <h1>ONE OF THE BEST COMPANY IN THE CITY</h1>

                                    </div>
                                </div>
                                <div class="single_home_slider">
                                    <div class="main_home wow fadeInUp" data-wow-duration="700ms">
                                        <h1>THE BEST SERVICE THAT WE PROVIDE </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <section id="service" class="service">
            <div class="container">
                <div class="row">
                    <div class="service_border_raund text-center"></div>
                    <div class="main_service_area sections text-center">
                        <div class="head_title text-center">
                            <h2>what we SELL</h2>
                            <div class="separator"></div>
                        </div>

                        <?php $query=mysqli_query($conn,"SELECT * FROM POST inner join comments  on post.post_id = comments.post_id");
                                $record=mysqli_fetch_assoc($query);
                                 $query2=mysqli_query($conn,"SELECT * FROM POST inner join photo on post.post_id =photo.post_id ");
                                 $record2=mysqli_fetch_assoc($query2);
                        ?>
                         <?php do{ ?>
                        <div class="col-sm-4">
                            <div class="single_service">
                                <div class="single_service_icon">
                                </div>
                                <!-- posts to be seen withe contents and descriptions  -->
                                
                                <h3><?php echo $record['content']; ?></h3>
                                 <img class="img img-circle" height="100px" width="100px" src="<?php echo $recor2['photo']; ?>">
                                <p><?php echo $record['descriotion']; ?></p>

                            </div>

                            <form method="post">
                                <input type="search" name="comments" placeholder="say somthing here">
                                <input type="hidden" name="post_id" value="<?php echo $record['post_id']; ?>" name="">
                                <input type="submit" name="" value="post" class="btn-primary" height="">
                            </form>
                            <div>
                                <p><?php echo $record["description"] ?></p>
                               <!--  this is for the cuments to be seen  -->
                                <div id="comments" style="height:auto; width:auto; text-align: center; color: black;">
                                 <?php do{ ?>
                                        <div >
                                            <?php echo $record["description"]; ?>
                                        </div>
                                        <?php } while ($record2=mysqli_fetch_assoc($query2)); ?>
                                        
                                </div>
                            </div>
                        </div>
                   <?php } while ($record=mysqli_fetch_assoc($query)); ?>
        <section id="portfolio" class="portfolio col-lg-12 col-md-9 col-sm-6 col-xs-12">
            <div class="container">
                <div class="row">
                    <div class="main_mix_content text-center sections">
                        <div class="head_title">
                            <h2>our sevices </h2>
                        </div>
                        <div class="main_mix_menu">
                            <ul>
                                <li class="btn btn-primary filter" data-filter="all">NEW TOOLS</li>
                                <li class="btn btn-primary filter" data-filter=".cat1">SECOND HAND TOOLS</li>
                    </div>                     
                </div>
            </div>
        </section> <!-- End of portfolio two Section -->        

      <?php require ("footer.php") ?>



        <!-- START SCROLL TO TOP  -->

        <div class="scrollup">
            <a href="#"><i class="fa fa-chevron-up"></i></a>
        </div>

        <?php require ("assets/js/vendor/script_links.php"); ?>

    </body>
</html>
