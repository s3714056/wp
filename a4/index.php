<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Finishing the assignment 2 alone is really hard work, but I indeed learnt a lot.">
    <meta name="keywords" content="HTML & CSS work, cinema information">
    <title>Assignment 4</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
    <script src='wireframe.js'></script>
</head>

<!-- this is the header area for business name and the image(logo)-->

<body>
    <?php
        //session_start();
        include 'tools.php';
        debug();
        if (!empty($_POST)){
            //debug module 
            //check
            if (empty($_POST["movie"])){
                $allOK=false;
                $movieErr ="Movie is a must!";
                
            }else{
                $movie = parse_input($_POST["movie"]);
            }
            if (empty($_POST["time"])){
                $allOK=false;
                $timeErr ="Time is a must!";
                
            }else{
                $time = parse_input($_POST["time"]);
            }
            if (empty($_POST["STA"]) and empty($_POST["STP"]) and empty($_POST["STC"]) and empty($_POST["FCA"]) and empty($_POST["FCP"]) and empty($_POST["FCC"])){
                $allOK=false;
                $ticketErr ="Ticket is a must!At least one!";
                
            }else{
                $STA=(int)$_POST["STA"];
                $STP=(int)$_POST["STP"];
                $STC=(int)$_POST["STC"];
                $FCA=(int)$_POST["FCA"];
                $FCP=(int)$_POST["FCP"];
                $FCC=(int)$_POST["FCC"];
                
            }

            if (empty($_POST["name"])){
                $allOK=false;
                $nameErr ="Name is a must!";
                
            }else{
                $name = parse_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]{1,100}$/",$name)) {
                  $nameErr = "Name formatting error!";
                  
                  $allOK=false;
                }
            }

            if (empty($_POST["email"])){
                $allOK=false;
                $emailErr ="Email is a must!";
                
            }else{
                $email = parse_input($_POST["email"]);
                if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
                    $emailErr = "Email formatting error!";
                    
                    $allOK=false;
                }
            }

            if (empty($_POST["mobile"])){
                $allOK=false;
                $mobileErr ="Mobile is a must!";
               
            }else{
                $mobile = parse_input($_POST["mobile"]);
                if (!preg_match("/^(\(04\)|04|\+614)( ?\d){8}$/",$mobile)) {
                  $mobileErr = "Mobile formatting error!";
                  
                  $allOK=false;
                }
            }

            if (empty($_POST["card"])){
                $allOK=false;
                $cardErr ="Card is a must!";
                
            }else{
                $card = parse_input($_POST["card"]);
                if (!preg_match("/^((4|5)( ?\d){12}(?:( ?\d){3})?)$/",$card)) {
                  $cardErr = "Card formatting error!";
                  
                  $allOK=false;
                }
            }

            if (empty($_POST["expiry"])){
                $allOK=false;
                $expiryErr ="Expiry is a must!";
                
            }else{
                $expiry = parse_input($_POST["expiry"]);
                //expiry date cannot be within 30 days of the purchase date 
                $now=date('Y-m-d');
                if(strtotime("$now +30 day")>strtotime($expiry)){
                     $expiryErr="Expiry is not available,choose a later one!";
   
                     $allOK=false;
                }
            }                        
        }else{
            
            $allOK=false;
        }
        if($allOK){
            echo "check pass";
            $_SESSION['name']=$name;
            $_SESSION['email']=$email;
            $_SESSION['mobile']=$mobile;
            $_SESSION['card']=$card;
            $_SESSION['expiry']=$expiry;
            $_SESSION['movie']=$movie;
            $_SESSION['time']=$time;      
            $_SESSION['STA']=$STA;
            $_SESSION['STP']=$STP;
            $_SESSION['STC']=$STC;
            $_SESSION['FCA']=$FCA;
            $_SESSION['FCP']=$FCP;
            $_SESSION['FCC']=$FCC;  
            
            header( "Location: receipt.php" );
        }else{
            if(!empty($_POST)){
                alert("You have not completed the Information Form!");
            }
            /*
            if(isset($_SESSION['count']))
            {
                $_SESSION['count']+=1;
            }else
            {
                $_SESSION['count']=0;
            }

            */
        }

    ?>
    <header>
        <div>
            <a class="logo" href="../../media/Capture.png" target="_blank">
                <img src='../../media/Capture.png' alt="My Logo">
            </a>
            <p>Lunardo Cinema</p>
        </div>
    </header>

    <!-- this is the navigation area for the website, contains 3 parts and below the header -->
    <div class="mainNavBar">
        <nav>
            <ul id="mainNavBar">
                <!-- 链接以及在新的网页打开此链接-->
                <li><a href="#AboutUs">About us</a></li>
                <li><a href="#prices">Prices</a></li>
                <li><a href="#showing">Now Showing</a></li>
                
            </ul>
        </nav>
    </div>
    <br>

    <!--this is the main area includs articles and sections-->
    <main>
<!--prices-->
        <article id='AboutUs'>
            <!--thins updated of the cinema-->
            <div class="notification">
                <h1>About us</h1>
                <hr>
                <p>We are glad that you can come back or take a look here. It has been several months ago. To provide a
                    better viewing experience we closed our cinema for several months, decorated our cinema and built
                    more planes for the client. Hope you can enjoy the new changes.</p>
            </div>
            <!--chairs-->
            <section id="upgrade">
                <div>
                    <div class="chair">
                        <h1>Dance Tune Zone!</h1>
                        <hr>
                        <p>We eliminated the normal seat which is not soft and provide two new styles. The standard one
                            and the First-class one. Enjoying your watching journey!
                        </p>
                    </div>
                    <div class="chair">
                        <img src="../../media/standard.jpg" alt="Standard Chair">
                        <img src="../../media/standard2.jpg" alt="Standard Chair">
                        <img src="../../media/standard3.jpg" alt="Standard Chair">
                        <h2>Standard</h2>
                        <p>The standard seat is simple and beautiful with a cupholder on each handrail so you can put
                            your drinks or snacks in it and release your hand, sit comfortably.</p>
                    </div>
                    <div class="chair">
                        <img src="../../media/first-class.png" alt="first-class Chair">
                        <img src="../../media/first-class2.png" alt="first-class Chair">
                        <img src="../../media/first-class3.png" alt="first-class Chair">
                        <h2>First Class</h2>
                        <P>The first-class is set for VIP users, it is a fully reclining luxurious cinema seat with
                            luxurious aesthetic, fully reclining seat, two individual motors, central processor,
                            footrest sensor option, easy lift system, underseat lighting and autoreturn footrest option.
                            Available in a single seat, a twin seat or linked seat with shared armrests. Which provides
                            the most comfortable viewing experience </P>
                    </div>
                    <div class="soundSystem">
                        <p>We also upgraded the sound system, the better auditory shock and shock is coming to you. The
                            projection and sound systems are upgraded with 3D Dolby Vision projection and Dolby Atmos
                            sound.</p>
                        <a class="button" href="https://www.dolby.com/us/en/cinema" target="_blank">See more here.</a>
                    </div>
                </div>
            </section>
        </article>
        <br>
        <article id="prices">
            <div class="prices">
                <table>
                    <thead>
                        <tr>
                            <th>Seat Type</th>
                            <th>Seat Code</th>
                            <th>All-day Monday and Wednesday AND 12 pm(midnight) on Weekdays</th>
                            <th>All other times</th>
                        </tr>
                        <tr>
                            <th>Standard Adult</th>
                            <th>STA</th>
                            <th>14.00$</th>
                            <th>19.80$</th>
                        </tr>
                        <tr>
                            <th>Standard Concession</th>
                            <th>STP</th>
                            <th>12.50$</th>
                            <th>17.50$</th>
                        </tr>
                        <tr>
                            <th>Standard Child</th>
                            <th>STC</th>
                            <th>11.00$</th>
                            <th>15.30$</th>
                        </tr>
                        <tr>
                            <th>First Class Adult</th>
                            <th>FCA</th>
                            <th>24.00$</th>
                            <th>30.00$</th>
                        </tr>
                        <tr>
                            <th>First Class Concession</th>
                            <th>FCP</th>
                            <th>22.50$</th>
                            <th>27.00$</th>
                        </tr>
                        <tr>
                            <th>First Class Child</th>
                            <th>FCC</th>
                            <th>21.00$</th>
                            <th>24.00$</th>
                        </tr>
                    </thead>
                </table>
                <h1>Note:</h1>
                <p> The Cinema offers discounted pricing weekday afternoons (ie weekday matinée sessions) and all day on
                    Mondays and Wednesdays. </p>
            </div>
        </article>
        <br>

        <article id="showing">
            <h1>Now Showing...</h1>
            <hr>
            <div class="nowShowingParts">
                <div class="posts" id="moviePanelACT">
                    <div class="post">
                        <a href="#synopsisACT">
                        <img src='../../media/AvengersEndgame.jpg' alt='Avengers: Endgame poster'>
                        </a>
                            </div>
                    <div class="post">
                        <h2> Avengers: Endgame </h2>
                        <p>Monday - _</p>
                        <p>Tuesday - _</p>
                        <p>Wednesday - 9pm</p>
                        <p>Thursday - 9pm</p>
                        <p>Friday - 9pm</p>
                        <p>Saturday - 6pm</p>
                        <p>Sunday - 6pm</p>
                    </div>
                </div>

                <div class="posts" id="moviePanelAHF">
                    <div class="post">
                        <a href="#synopsisAHF">
                           <img src='../../media/TopEndWedding.jpg' alt='TopEndWedding poster'></a>
                    </div>
                    <div class="post">
                        <h2> Top End Wedding </h2>
                        <p>Monday - 6pm</p>
                        <p>Tuesday - 6pm</p>
                        <p>Wednesday - _</p>
                        <p>Thursday - _</p>
                        <p>Friday - _</p>
                        <p>Saturday - 3pm</p>
                        <p>Sunday - 3pm</p>
                    </div>
                </div>
            </div>

            <div class="nowShowingParts">
                <div class="posts" id="moviePanelANM">
                    <div class="post">
                        <a href="#synopsisANM">
                            <img src='../../media/Dumbo.jpg' alt='Dumbo poster'></a>
                    </div>
                    <div class="post">
                        <h2> Dumbo </h2>
                        <p>Monday - 12pm</p>
                        <p>Tuesday - 12pm</p>
                        <p>Wednesday - 6pm</p>
                        <p>Thursday - 6pm</p>
                        <p>Friday - 6pm</p>
                        <p>Saturday - 12pm</p>
                        <p>Sunday - 12pm</p>
                    </div>
                </div>

                <div class="posts" id="moviePanelRMC">
                    <div class="post">
                        <a href="#synopsisRMC">
                            <img src='../../media/The Happy Prince.jpg' alt='The Happy Prince poster'></a>
                    </div>
                    <div class="post">
                        <h2> The Happy Prince </h2>
                        <p>Monday - _</p>
                        <p>Tuesday - _</p>
                        <p>Wednesday - 12pm</p>
                        <p>Thursday - 12pm</p>
                        <p>Friday - 12pm</p>
                        <p>Saturday - 9pm</p>
                        <p>Sunday - 9pm</p>
                    </div>
                </div>
            </div>
            <br>
        </article>
      
        <!--Synopsis Area-->
        <article id="SynopsisAndBooking">
            <div id="synopsisACT" style="<?php if($_POST['movie']=="Avengers: Endgame"){echo "display: block;";}else{echo "display: none;";}?>">
                <div class="synopsisAreas">
                    <h1>Synopsis</h1>
                    <div class="synopsisArea">
                        <h2>Avengers: Endgame</h2>
                        <p>Adrift in space with no food or water, Tony Stark sends a message to Pepper Potts as his
                            oxygen supply starts to dwindle. Meanwhile, the remaining Avengers -- Thor, Black Widow,
                            Captain America and Bruce Banner -- must figure out a way to bring back their vanquished
                            allies for an epic showdown with Thanos -- the evil demigod who decimated the planet and the
                            universe.</p>
                    </div>
                </div>

                <!-- video-->
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/TcMBFSGVi1c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div calss="bookingArea">
                    <h1>Booking it now!</h1>
                    <div class="button" id="bookingACT">
                        <button>Wednesday - 9pm</button>
                        <button>Thursday - 9pm</button>
                        <button>Friday - 9pm</button>
                        <button>Saturday - 6pm</button>
                        <button>Sunday - 6pm</button>
                    </div>
                </div>
            </div>
            <!-- <br> -->

            <div id="synopsisAHF" style="<?php if($_POST['movie']=="Top End Wedding"){echo "display: block;";}else{echo "display: none;";}?>">
                <!-- Top End Wedding -->
                <div class="synopsisArea">
                    <h2>Top End Wedding</h2>
                    <p>Lauren and Ned have 10 days to find Lauren's mother who has gone AWOL in the remote far north of
                        Australia so that they can reunite her parents and pull off their dream wedding.</p>
                </div>

                <!-- video-->
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/uoDBvGF9pPU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div calss="bookingArea">
                    <h1>Booking it now!</h1>
                    <div class="button" id="bookingAHF">
                        <button>Monday - 6pm</button>
                        <button>Tuesday - 6pm</button>
                        <button>Saturday - 3pm</button>
                        <button>Sunday - 3pm</button>
                    </div>
                </div>
            </div>
            <!-- <br> -->

            <div id="synopsisANM" style="<?php if($_POST['movie']=="Dumbo"){echo "display: block;";}else{echo "display: none;";}?>">
                <!-- Dumbo -->
                <div class="synopsisArea">
                    <h2>Dumbo</h2>
                    <p>Struggling circus owner Max Medici enlists a former star and his two children to care for Dumbo,
                        a baby elephant born with oversized ears. When the family discovers that the animal can fly, it
                        soon becomes the main attraction -- bringing in huge audiences and revitalizing the run-down
                        circus. The elephant's magical ability also draws the attention of V.A. Vandevere, an
                        entrepreneur who wants to showcase Dumbo in his latest, larger-than-life entertainment venture.
                    </p>
                </div>

                <!-- video-->
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/7NiYVoqBt-8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>

                <div calss="bookingArea">
                    <h1>Booking it now!</h1>
                    <div class="button" id="bookingANM">
                        <button>Monday - 12pm</button>
                        <button>Tuesday - 12pm</button>
                        <button>Wednesday - 6pm</button>
                        <button>Thursday - 6pm</button>
                        <button>Friday - 6pm</button>
                        <button>Saturday - 12pm</button>
                        <button>Sunday - 12pm</button>
                    </div>
                </div>
            </div>
            <!-- <br> -->

            <div id="synopsisRMC" style="<?php if($_POST['movie']=="The Happy Prince"){echo "display: block;";}else{echo "display: none;";}?>">
                <!-- The Happy Prince -->
                <div class="synopsisArea">
                    <h2>The Happy Prince</h2>
                    <p>His body ailing, Oscar Wilde lives out his last days in exile, observing the difficulties and
                        failures surrounding him with ironic detachment, humour, and the wit that defined his life.</p>
                </div>

                <!-- video-->
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/4HmN9r1Fcr8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>


                <!--Booking Area-->
                <div calss="bookingArea">
                    <h1>Booking it now!</h1>
                    <div class="button" id="bookingRMC">
                        <button>Wednesday - 12pm</button>
                        <button>Thursday - 12pm</button>
                        <button>Friday - 12pm</button>
                        <button>Saturday - 9pm</button>
                        <button>Sunday - 9pm</button>
                    </div>
                </div>
            </div>
        </article>

        <!-- form -->
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>"  id="form"  style="height:100%;color:red;background: white;padding:5px;<?php if(empty($_POST['time']) or empty($_POST['movie'])){echo "display: none;";} ?>">
            <h3 id="movie-title">Movie Title - Day - Time</h3>
            <input value="<?php if($_POST){echo $_POST['movie'];}?>" type="hidden" name="movie" id="movie-movie">
            <input value="<?php if($_POST){echo $_POST['time'];}?>" type="hidden" name="time" id="movie-time">
            <div class="wrapper">
                <div class="left">
                    <fieldset>
                        <legend>Ticket-Standard</legend>

                        <!-- Adults -->
                        <div class="form-content">
                            <label for="seats-STA">Adults </label>
                            <select id="seats-STA" name="STA">
                                <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                        
                                        $item="<option value=\"". strval($i)."\" ";
                                        $postVal="";
                                        $postVal=$_POST["STA"];
                                        if(empty($postVal)){
                                            $postVal="0";
                                        }
                                        if(strval($postVal)==strval($i)){
                                            $item=$item." selected ";
                                        }
                                        $item=$item." >".strval($i)."</option>";
                                        echo $item;
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Concession -->
                        <div class="form-content">
                            <label for="seats-STP">Concession </label>
                            <select id="seats-STP" name="STP">
                                <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                        
                                        $item="<option value=\"". strval($i)."\" ";
                                        $postVal="";
                                        $postVal=$_POST["STP"];
                                        if(empty($postVal)){
                                            $postVal="0";
                                        }
                                        if(strval($postVal)==strval($i)){
                                            $item=$item." selected ";
                                        }
                                        $item=$item." >".strval($i)."</option>";
                                        echo $item;
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- children -->
                        <div class="form-content">
                            <label for="seats-STC">Children </label>
                            <select id="seats-STC" name="STC">
                                <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                        
                                        $item="<option value=\"". strval($i)."\" ";
                                        $postVal="";
                                        $postVal=$_POST["STC"];
                                        if(empty($postVal)){
                                            $postVal="0";
                                        }
                                        if(strval($postVal)==strval($i)){
                                            $item=$item." selected ";
                                        }
                                        $item=$item." >".strval($i)."</option>";
                                        echo $item;
                                    }
                                ?>
                            </select>
                        </div>
                        <span class="error"><?php echo $ticketErr;?></span>
                    </fieldset>
                    <fieldset>
                        <legend>Ticket-First Class</legend>

                        <!-- Adults -->
                        <div class="form-content">
                            <label for="seats-FCA">Adults </label>
                            <select id="seats-FCA" name="FCA">
                                <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                        
                                        $item="<option value=\"". strval($i)."\" ";
                                        $postVal="";
                                        $postVal=$_POST["FCA"];
                                        if(empty($postVal)){
                                            $postVal="0";
                                        }
                                        if(strval($postVal)==strval($i)){
                                            $item=$item." selected ";
                                        }
                                        $item=$item." >".strval($i)."</option>";
                                        echo $item;
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Concession -->
                        <div class="form-content">
                            <label for="seats-FCP">Concession </label>
                            <select id="seats-FCP" name="FCP">
                                <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                        
                                        $item="<option value=\"". strval($i)."\" ";
                                        $postVal="";
                                        $postVal=$_POST["FCP"];
                                        if(empty($postVal)){
                                            $postVal="0";
                                        }
                                        if(strval($postVal)==strval($i)){
                                            $item=$item." selected ";
                                        }
                                        $item=$item." >".strval($i)."</option>";
                                        echo $item;
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- children -->
                        <div class="form-content">
                            <label for="seats-FCC">Children </label>
                            <select id="seats-FCC" name="FCC">
                                <?php
                                    for ($i=0; $i<=10; $i++)
                                    {
                                        
                                        $item="<option value=\"". strval($i)."\" ";
                                        $postVal="";
                                        $postVal=$_POST["FCC"];
                                        if(empty($postVal)){
                                            $postVal="0";
                                        }
                                        if(strval($postVal)==strval($i)){
                                            $item=$item." selected ";
                                        }
                                        $item=$item." >".strval($i)."</option>";
                                        echo $item;
                                    }
                                ?>
                            </select>
                        </div>
                        <span class="error"><?php echo $ticketErr;?></span>
                    </fieldset>
                    <div class="form-content move">
                        <label for="total">Total $ </label>
                        <div id="total">0</div>
                    </div>

                </div>
                <div class="right">
                    <div class="form-content">
                        <label for="cust-name">Name </label>
                        <input type="text" id="cust-name" name="name" placeholder="eg: Jason" value="<?php echo $name ?>">
                        <span class="error">* <?php echo $nameErr;?></span>
                    </div>
                    <div class="form-content">
                        <label for="cust-email">Email </label>
                        <input type="email" id="cust-email" name="email" placeholder="eg: 123456789@gmail.com" value="<?php echo $email ?>">
                        <span class="error">* <?php echo $emailErr;?></span>
                    </div>
                    <div class="form-content">
                        <label for="cust-mobile">Mobile </label>
                        <input type="tel" id="cust-mobile" name="mobile" placeholder="eg: 0412 123 123" value="<?php echo $mobile ?>">
                        <span class="error">* <?php echo $mobileErr;?></span>
                    </div>
                    <div class="form-content">
                        <label for="cust-card">Credit Card </label>
                        <input type="text" id="cust-card" name="card" placeholder="eg: 4123 1234 1234 1234" value="<?php echo $card ?>">
                        <span class="error">* <?php echo $cardErr;?></span>
                    </div>
                    <div class="form-content">
                        <label for="cust-expiry">Expiry </label>
                        <input type="month" id="cust-expiry" name="expiry" value="<?php echo $expiry ?>">
                        <span class="error">* <?php echo $expiryErr;?></span>
                    </div>
                    <div class="form-content">
                        <button type="submit" name="submit" value="Submit">Order</button>
                    </div>
                </div>
            </div>
        </form>
        


    </main>
    <div >
        <fieldset >
            <legend  style="color:white">Debug</legend>
            <p style="color:white">POST:</p>
            <?php
                preShow($_POST);
            ?>
            <p style="color:white">SESSION:</p>
            <?php
                preShow($_SESSION);
            ?>
        </fieldset>
    </div>
       

    <!--this is the footer area includs some author information and the link to github repository-->
    <footer>
        <div>Copyright&copy;
            <script>
                document.write(new Date().getFullYear());
            </script>Junhao Zhang, s3714056, Wenjie Fan, s3649505. Last modified
            <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.</div>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
            Programming course at RMIT University in Melbourne, Australia.</div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
    <script type="text/javascript">
        onload = function() {

        }
    </script>
    <script src="script.js"></script>
</body>

</html>
