<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Finishing the assignment 2 alone is really hard work, but I indeed learnt a lot.">
    <meta name="keywords" content="HTML & CSS work, cinema information">
    <title>Assignment 4-Index</title>

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
            alert("You have not completed the Information Form!");
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
                <li><a href="#booking">Now Booking</a></li>
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
        <br>
        <article id="booking">
            <h1 style='color: whitesmoke;text-align: center;font-family: "Beaufort for LOL";font-weight: 400;font-size: 30px;'>Now Booking...</h1>
            <hr>
            <!-- form -->
            <div>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" style="height:100%;color:red">
              
                <div class="wrapper">
                    <div class="left">
                        <fieldset>
                            <legend>Movie & Time</legend>
                            <!-- Movie -->
                            <div class="form-content">
                                <label for="choose-movie">Movie </label>
                                <select id="choose-movie" name="movie" >
                                    <?php
                                        foreach ($movieList as $movie) {
                                            $item="<option value=\"". strval($movie)."\" ";
                                            $postVal="";
                                            $postVal=$_POST["movie"];
                                            if(strval($postVal)==strval($movie)){
                                                    $item=$item." selected "; 
                                            }  
                                            if($movie==""){
                                                $item=$item." >"."Please Select Time"."</option>";
                                            }else{  
                                                $item=$item." >".strval($movie)."</option>";
                                            }
                                            echo $item;
                                        }
                                    ?>
                                </select>
                                <span class="error">* <?php echo $movieErr;?></span>
                            </div>

                            <!-- Time -->
                            <div class="form-content">
                                <label for="choose-time">Time </label>
                                <select id="choose-time" name="time">
                                    <?php
                                        foreach ($timeList as $time) {
                                            $item="<option value=\"". strval($time)."\" ";
                                            $postVal="";
                                            $postVal=$_POST["time"];
                                            if(strval($postVal)==strval($time)){
                                                    $item=$item." selected "; 
                                            }  
                                            if($time==""){
                                                $item=$item." >"."Please Select Time"."</option>";
                                            }else{  
                                                $item=$item." >".strval($time)."</option>";
                                            }
                                            echo $item;
                                        }
                                    ?>
                                </select>
                                <span class="error">* <?php echo $timeErr;?></span>
                            </div>
                        </fieldset>
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
                        <div class="form-content move-order">
                            <button type="submit" name="submit" value="Submit">Order</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>

        </article>

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

</body>

</html>