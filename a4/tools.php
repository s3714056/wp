<?php
    session_start();
    $index=1;
    $timeList=["","Monday - 12pm","Tuesday - 12pm","Wednesday - 6pm","Saturday - 12pm","Sunday - 12pm"];
    $movieList=["","Avengers: Endgame","Top End Wedding","Dumbo","The Happy Prince"];

    $prices=[
        "STA" => [14.0,19.8],
        "STP" => [12.5,17.5],
        "STC" => [11.0,15.3],
        "FCA" => [24.0,30.0],
        "FCP" => [22.5,27.0],
        "FCC" => [21.0,24.0]
    ];
    $ticketTypeList=["STA","STP","STC","FCA","FCP","FCC"];
    $typeList=["STA"=>"Standard Adult","STP"=>"Standard Concession","STC"=>"Standard Child","FCA"=>"First Class Adult","FCP"=>"First Class Concession","FCC"=>"First Class Child"];
    $allOK=true;
    $movie=$time="";
    $STA=$STP=$STC=$FCA=$FCP=$FCC=0;
    $name = $email = $mobile = $card =  $expiry="";
    $movieErr =$timeErr =$ticketErr =$nameErr = $emailErr = $mobileErr = $cardErr =  $expiryErr="";
    function calculate_price(){
        global $prices,$index;
        $total=0;
        $time=$_SESSION['time'];
            /*
            foreach ( $_SESSION as $key => $value )
            {
              echo "$key : $value <br>";
            }
            */
            if (in_array( $time,["Monday - 12pm","Tuesday - 12pm","Wednesday - 6pm","Saturday - 12pm","Sunday - 12pm"])){
                $index=0;
            }
            $total+= $prices['STA'][$index]*$_SESSION['STA'];
            $total+= $prices['STP'][$index]*$_SESSION['STP'];
            $total+= $prices['STC'][$index]*$_SESSION['STC'];
            $total+= $prices['FCA'][$index]*$_SESSION['FCA'];
            $total+= $prices['FCP'][$index]*$_SESSION['FCP'];
            $total+= $prices['FCC'][$index]*$_SESSION['FCC'];
            $total=sprintf("%.2f",$total);
            return $total;
    }
    function debug(){
            foreach ( $_POST as $key => $value )
            {
              echo "$key : $value <br>";
            }
    }

    function parse_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    }
    function printMyTicket($type,$price,$time,$movie,$name,$email,$mobile,$card,$expiry) {
        $lines = file($_SERVER['SCRIPT_FILENAME']);
        echo "<pre class='mycode'><ol>";
        foreach ($lines as $line)
        echo '<li>'.rtrim(htmlentities($line)).'</li>';
        echo '</ol></pre>';

    }
    function preShow( $arr, $returnAsString=false ) {
        $ret = '<pre  style="color:white">' . print_r($arr, true) . '</pre>';
        if ($returnAsString){
            return $ret;
        }else{
            echo $ret;
        }
    }
    

    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }

// Put your PHP functions and modules here

?>