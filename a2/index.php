<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 2</title>
    <!-- Keep wireframe.css for debugging, add your css to style.css -->
    <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
    <link id='stylecss' type="text/css" rel="stylesheet" href="style.css">
    <script src='../wireframe.js'></script>
</head>

<body>
    <header class='header-top'>
        <div>
            <a id="header-image" href="#"><img src="../../media/cinema-log.jpg"></a> Lunardo
        </div>
    </header>
    <nav class='nav-top'>
        <ul>
            <li><a href="#about">About</a></li>
            <li><a href="#price">Prices</a></li>
            <li><a href="#showing">Showing</a></li>
        </ul>
    </nav>
    <main>
        <!-- <article id='Website Under Construction'> -->
        <!-- Creative Commons image sourced from https://pixabay.com/en/maintenance-under-construction-2422173/ and used for educational purposes only -->
        <!-- <img src='../../media/website-under-construction.png' alt='Website Under Construction' />
      </article> -->
        <!-- about us -->
        <section id="about" class="about-area">
            <div class="about-text">
                <h2>About Cinema</h2>
                <p>The cinema has reopened after extensive improvements and renovations.</p>
                <p>There are new seats: standard seats and reclinable first class seats.</p>
                <p>The projection and sound systems are upgraded with 3D Dolby Vision projection and Dolby Atmos
                    sound. See <a href="https://www.dolby.com/us/en/cinema">https://www.dolby.com/us/en/cinema</a> for more information.</p>
            </div>
            <div>
                <img src="../../media/seat1.jpg">
                <img src="../../media/seat2.png">
            </div>
        </section>
        <!-- end of about us -->
        <!-- Prices -->
        <section id="price" class="price-area">
            <h2>Prices</h2>
            <table border=1 width=80% height=80% bordercolor="#f3f3f3">
                <tr>
                    <td>Seat Type</td>
                    <td>Seat Code</td>
                    <td>All day Monday and Wednesday AND 12pm on Weekdays</td>
                    <td>All other times</td>
                </tr>
                <tr>
                    <td>Standard Adult</td>
                    <td>STA</td>
                    <td>14.00</td>
                    <td>19.80</td>
                </tr>
                <tr>
                    <td>Standard Concession</td>
                    <td>STP</td>
                    <td>12.50</td>
                    <td>17.50</td>
                </tr>
                <tr>
                    <td>Standard Child</td>
                    <td>STC</td>
                    <td>11.00</td>
                    <td>15.30</td>
                </tr>
                <tr>
                    <td>First Class Adult</td>
                    <td>FCA</td>
                    <td>24.00</td>
                    <td>30.00</td>
                </tr>
                <tr>
                    <td>First Class Concession</td>
                    <td>FCP</td>
                    <td>22.50</td>
                    <td>27.00</td>
                </tr>
                <tr>
                    <td>First Class Child</td>
                    <td>FCC</td>
                    <td>21.00</td>
                    <td>24.00</td>
                </tr>
            </table>
        </section>
        <!-- end of Prices -->
        <!-- Now Showing -->
        <section id="showing" class="showing-area">
            <div class="panel">
                <img src="../../media/1endgame.jpg">
                <div class="panel-text">
                    <h4>Avengers: Endgame</h4>
                    <p>Wed - Fri: 9pm (T21)</p>
                    <p>Sat - Sun: 6pm (T18)</p>
                    <p></p>
                </div>
            </div>
            <div class="panel">
                <img src="../../media/2wedding.jpg">
                <div class="panel-text">
                    <h4>Top End Wedding</h4>
                    <p>Mon - Tue: 6pm (T18)</p>
                    <!-- <p>Wed - Fri: 9pm (T21)</p> -->
                    <p>Sat - Sun: 3pm (T15)</p>
                </div>
            </div>
            <div class="panel">
                <img src="../../media/3dumbo.jpg">
                <div class="panel-text">
                    <h4>Dumbo</h4>
                    <p>Mon - Tue: 12pm (T12)</p>
                    <p>Wed - Fri: 6pm (T18)</p>
                    <p>Sat - Sun: 12pm (T12)</p>
                </div>
            </div>
            <div class="panel">
                <img src="../../media/4prince.jpg">
                <div class="panel-text">
                    <h4>The Happy Prince</h4>
                    <!-- <p>Mon - Tue: 6pm (T18)</p> -->
                    <p>Wed - Fri: 12pm (T12)</p>
                    <p>Sat - Sun: 9pm (T21)</p>
                </div>
            </div>
        </section>
        <!-- end of Now Showing -->
        <!-- Synopsis -->
        <section id="synopsis" class="synopsis-area">
            <div class="about-text">
                <h2>Avengers: Endgame</h2>
                <br>
                <h4>Description</h4>
                <p>After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.</p>
                <p>Directors: Anthony Russo, Joe Russo</p>
            </div>
            <div>
                <!-- <object>
                    <embed src="../../media/endgame.mp4" autoplay="False"/>
                </object> -->
                <video controls="controls">
                    <source src="../../media/endgame.mp4" type="video/mp4" />
                </video>
            </div>
            <div class="booking">
                <h4>Make a Booking</h4>
                <button type="button">Wed - Fri: 9pm (T21)</button>
                <button type="button">Sat - Sun: 6pm (T18)</button>
            </div>
        </section>
        <!-- end of Synopsis -->
        <!-- Booking -->
        <section id="booking" class="about-area">
            <div class="about-text">
                <h2>Booking</h2>
                <br>
                <p>under construction</p>
            </div>
        </section>
        <!-- end of Booking -->
    </main>
    <footer>
        <div>&copy;
            <script>
            document.write(new Date().getFullYear());
            </script>
             Put your name(s), student number(s) and group name here. Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.
        </div>
        <p> Contact Information: <a href="someone@example.com">someone@example.com</a>, 18933344955, 2025 M Street, Northwest, Washington </p>
        <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</div>
        <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
    </footer>
</body>

</html>