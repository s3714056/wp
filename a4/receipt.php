<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Finishing the assignment 2 alone is really hard work, but I indeed learnt a lot.">
    <meta name="keywords" content="HTML & CSS work, cinema information">
    <title>Assignment 4</title>

    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
    <script src='../wireframe.js'></script>
    <style>
        table,table tr th, table tr td { border:2px solid   #000000; }
          
    </style>
</head>

<!-- this is the header area for business name and the image(logo)-->

<body>
    <?php
        include 'tools.php';
        $total=0;
        $tickets=[];
        //session_start();
        if(empty($_SESSION['name'])){
            header( "Location: index.php" );
        }else{
            $num=0;

            foreach($ticketTypeList as $type){
                echo $type;
                if(empty($_SESSION[$type])){
                    $num=0;
                    echo $num;
                }else{
                    $num=(int)$_SESSION[$type];
                    echo $num;
                }
                $time=$_SESSION['time'];
                if (in_array( $time,["Monday - 6pm","Monday - 12pm","Tuesday - 12pm","Wednesday - 12pm","Wednesday - 9pm","Wednesday - 6pm","Saturday - 12pm","Sunday - 12pm","Monday - 12pm","Thursday - 12pm","Friday - 12pm"])){
                    $index=0;
                }
                for($i=0; $i<$num; $i++){
                    $_price=sprintf("%.2f",$prices[$type][$index]);
                    
                    array_push($tickets,array("movie"=>$_SESSION['movie'],"time"=>$time,"price"=>$_price,"type"=>$type));
                } 
            }
            $total=calculate_price();
            $_POST = array();
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


    <!--this is the main area includs articles and sections-->
    <main>

        <div id="order">
            <legend style="color:white;font-size: 20px">Your Order</legend>
            <fieldset>
                <fieldset>
                    <legend style="color:white"><?php echo ("Movie:  ".$_SESSION['movie']."/Time:  ".$_SESSION['time']);?></legend>
                    <div  class="prices">
                        <table>
                          <tr>
                            <td>Type</td>
                            <td>Num</td>
                            <td>Price</td>
                            <td>Subtotal</td>
                          </tr>
                          <tr>
                            <td>Standard Adult</td>
                            <td><?php echo ($_SESSION['STA']);?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['STA'][$index]));?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['STA'][$index]*$_SESSION['STA']));?></td>
                          </tr>
                          <tr>
                            <td>Standard Concession</td>
                            <td><?php echo ($_SESSION['STP']);?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['STP'][$index]));?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['STP'][$index]*$_SESSION['STP']));?></td>
                          </tr>
                          <tr>
                            <td>Standard Child</td>
                            <td><?php echo ($_SESSION['STC']);?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['STC'][$index]));?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['STC'][$index]*$_SESSION['STC']));?></td>
                          </tr>
                          <tr>
                            <td>First Class Adult</td>
                            <td><?php echo ($_SESSION['FCA']);?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['FCA'][$index]));?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['FCA'][$index]*$_SESSION['FCA']));?></td>
                          </tr>
                          <tr>
                            <td>First Class Concession</td>
                            <td><?php echo ($_SESSION['FCP']);?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['FCP'][$index]));?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['FCP'][$index]*$_SESSION['FCP']));?></td>
                          </tr>
                          <tr>
                            <td>First Class Child</td>
                            <td><?php echo ($_SESSION['FCC']);?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['FCC'][$index]));?></td>
                            <td><?php echo ("$  ".sprintf("%.2f",$prices['FCC'][$index]*$_SESSION['FCC']));?></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td><?php echo ("$  ".$total);?></td>
                          </tr>
                        </table>
                    </div>
                </fieldset>
                <fieldset>
                    <legend style="color:white">Customer Information</legend>
                    <div  class="prices">
                        <table>
                          <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Mobile</td>
                            <td>Card</td>
                            <td>Expiry</td>
                          </tr>
                          <tr>
                            <td><?php echo ($_SESSION['name']);?></td>
                            <td><?php echo ($_SESSION['email']);?></td>
                            <td><?php echo ($_SESSION['mobile']);?></td>
                            <td><?php echo ($_SESSION['card']);?></td>
                            <td><?php echo ($_SESSION['expiry']);?></td>

                          </tr>
                        </table>
                    </div>
                </fieldset>
            </fieldset>
        </div>
        <div id="ticket-individual">
            <legend style="color:white;font-size: 20px">Your Tickets</legend>
            <fieldset>
                <?php
                    foreach ($tickets as $ticket) {
                        $item="<fieldset style=\"background-color:white;padding: 5px\"><div style=\"border:2px dashed;padding: 2px\">";
                        $item=$item."<p>Movie:".$ticket['movie']."</p>";
                        $item=$item."<p>Time:".$ticket['time']."</p>";
                        $item=$item."<p>".$typeList[$ticket['type']]."  $  ".$ticket['price']."</p>";
                        $item=$item."</div></fieldset><br>";
                        echo $item;
                        }
                ?>

            </fieldset>
        </div>

       
    </main>
    <div >
        <fieldset >
            <legend  style="color:aquamarine">Debug</legend>
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

   
</body>

</html>