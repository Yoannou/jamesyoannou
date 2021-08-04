<!DOCTYPE html>

<?php
    // Initialization and validation:
    $message_sent = false;
    $errors = [];
    if (isset($_POST['submit']) && !empty($_POST)) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        if (empty($name)) {
            $errors[] = 'Name is empty';
        }
        if (empty($email)) {
            $errors[] = 'Email is empty';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Invalid email address';
        }
        if (empty($subject)) {
            $errors[] = 'Subject is empty';
        }
        if (empty($message)) {
            $errors[] = 'Message is empty';
        }

        // If there are errors, message_sent remains false and we notify user
        if (!empty($errors)) {
            $allErrors = join('. ', $errors);
            echo '<script>alert(\'EMAIL NOT SENT: \n\n'.$allErrors.'\')</script>';
            $message_sent = false;
        }

        // No errors, this page gets reloaded with message_sent flag true
        else {
            $message_sent = true;
            $mailTo = "jamesyoannou@gmail.com";
            $headers = "From: ".$email;
            $txt = "You have received an email from ".$name."\n\n".$message;
            mail($mailTo, $subject, $txt, $headers);

            echo '<script>alert(\'Email sent. Thanks!\')</script>';
        }
    }
?>

<html lang="en">
    <head>
        <title>James Yoannou</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:image" content="http://www.jamesyoannou.com/resources2/img/compressedpng/holo3-min.png">
        <meta property="og:site_name" content="James Yoannou">
        <meta property="og:url" content="http://jamesyoannou.com">
        <meta property="og:title" content="James Yoannou">
        <meta property="og:type" content="website">
        <meta property="og:description" content="Website and Shopify developer.">

        <link rel="stylesheet" href="vendors/css/reset.css">
        <link rel="stylesheet" href="resources2/css/general.css">
        <link rel="stylesheet" href="resources2/css/style.css">
        <link rel="stylesheet" href="resources2/css/queries.css">
        <link rel="stylesheet" href="https://use.typekit.net/yom0nhp.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="vendors/js/jquery.waypoints.min.js"></script>
    </head>


    <body>
        <div id="global-wrapper">
            <audio id="background-music" preload="auto" loop>
                <source src="vendors/audio/Practice Arena.mp3">
            </audio>

            <!-- NAV -->
            <nav id="nav" class="nav-hidden">
                <div class="nav-link">
                    <a id="sound-toggle-button" title="Chill vibes" href="#">
                        <img src="resources2/img/pixel art/website_music_v1.png">
                        <div class="nav-link-name"><p style="color: lightblue;">chill vibes</p></div>
                    </a>
                </div>
                <div class="nav-link">
                    <a id="portfolio-link" class="jq--scroll-to-portfolio" title="Portfolio" href="#">
                        <img ig="portfolio-icon" src="resources2/img/pixel art/website_portfolio_v1.png">
                        <div class="nav-link-name"><p>My portfolio</p></div>
                    </a>
                </div>
                <div class="nav-link">
                    <a id="about-link" class="jq--scroll-to-about" title="About" href="#">
                        <img id="about-icon" src="resources2/img/pixel art/website_face_v1.png">
                        <div class="nav-link-name"><p>About me</p></div>
                    </a>
                </div>
                <div class="nav-link">
                    <a id="contact-link" class="jq--scroll-to-contact" title="Contact" href="#">
                        <img id="contact-icon" src="resources2/img/pixel art/website_contact_v1.png">
                        <div class="nav-link-name"><p>Contact</p></div>
                    </a>
                </div>
                <div>
                    <a id="light-switch-container" href="#">
                        <img id="light-switch" src="resources2/img/pixel art/lightbulb_on.png">
                    </a>
                </div>
            </nav>
            <div id="nav-toggle-display">
                <div class="burger-bar burger-top"></div>
                <div class="burger-bar burger-middle"></div>
                <div class="burger-bar burger-bottom"></div>
            </div>


            <!-- HEADER -->
            <header id="section-header" class="section jq--section-header waypoint-header" data-section-name="Header">
                <canvas id="canvas-header"></canvas>
                <div class="header-wrapper">
                    <div class="name-wrapper"></div>
                    <h4 class="web-developer-wrapper"><span class="web-developer">/* web development */</span></h4>
                </div>
            </header>


            <!-- PORTFOLIO -->
            <section id="section-portfolio" class="section section-portfolio jq--section-portfolio waypoint-portfolio" data-section-name="Portfolio">
                <div class="portfolio-wrapper">
                    <h1 class="portfolio-heading">Developer Portfolio</h1>
                    <div class="portfolio-grid">
                        <div id="projects" class="portfolio-grid-item">
                            <div class="portfolio-item-heading-container">
                                <h2 class="portfolio-item-heading">Projects</h2>
                                <div class="icon-box"></div>
                                <div class="expand-box">+</div>
                            </div>
                            <div class="portfolio-item-content">
                                <a id="github-button" href="https://github.com/Yoannou" target="blank">
                                    <p>Github</p>
                                    <img src="vendors/img/GitHub-Mark-Light-64px.png">
                                </a>
                                <h4>Websites for clients:</h4>
                                <ul>
                                    <li class="outer-li">
                                        <a href="https://muddycrops.com" target="_blank">Muddy Crops OFC Ltd.</a>
                                        <ul>
                                            <li class="inner-li">&bull; Lead shopify developer</li>
                                            <li class="inner-li">&bull; Worked closley with designer and merchant to bring their ideas to the site</li>
                                            <li class="inner-li">&bull; Created custom schemas to grant client control over their storefront</li>
                                        </ul>
                                    </li>
                                </ul>
                                <h4>Side-projects:</h4>
                                <ul>
                                    <li class="outer-li">
                                        <a href="./projects/shopitabs/shopitabs.php">Shopitabs</a>
                                        <ul>
                                            <li class="inner-li">&bull; Shopify section that allows merchant to create tabs</li>
                                            <li class="inner-li">&bull; Highly customizable and responsive</li>
                                        </ul>
                                    </li>
                                    <!--
                                    <li class="outer-li">
                                        <a href="#">Shopify fade-in navigation</a>
                                        <ul>
                                            <li class="inner-li">&bull; Applies changes to site nav on-hover</li>
                                            <li class="inner-li">&bull; Can be toggled on and off via Theme Settings</li>
                                            <li class="inner-li">&bull; Currently being optimized to add more custom features</li>
                                        </ul>
                                    </li>
                                    -->
                                    <li class="outer-li">
                                        <a href="./projects/arduino/arduino.php">Arduino microcontroller projects</a>
                                        <ul>
                                            <li class="inner-li">&bull; Programs designed for electronic microcontrollers and robotics</li>
                                            <li class="inner-li">&bull; Coded in C</li>
                                            <li class="inner-li">&bull; Includes a theremin!</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="skillset" class="portfolio-grid-item waypoint-skillset">
                            <div class="portfolio-item-heading-container">
                                <h2 class="portfolio-item-heading">Skillset</h2>
                                <div class="icon-box"></div>
                                <div class="expand-box">+</div>
                            </div>
                            <div class="portfolio-item-content">
                                <!--In the future, generate this whole UL out of a Javascript array of objects with a skill and percentage-->
                                <ul>
                                    <li class="skill-li">
                                        <p>HTML</p>
                                        <div class="bar-outer">
                                            <div id="skill-html" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>CSS</p>
                                        <div class="bar-outer">
                                            <div id="skill-css" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>Javascript</p>
                                        <div class="bar-outer">
                                            <div id="skill-javascript" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>JQuery</p>
                                        <div class="bar-outer">
                                            <div id="skill-jquery" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>React</p>
                                        <div class="bar-outer">
                                            <div id="skill-react" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>Ruby on Rails</p>
                                        <div class="bar-outer">
                                            <div id="skill-ruby" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>PHP</p>
                                        <div class="bar-outer">
                                            <div id="skill-php" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>MySQL</p>
                                        <div class="bar-outer">
                                            <div id="skill-mysql" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>Jasmine</p>
                                        <div class="bar-outer">
                                            <div id="skill-jasmine" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>Shopify Liquid</p>
                                        <div class="bar-outer">
                                            <div id="skill-liquid" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>Git</p>
                                        <div class="bar-outer">
                                            <div id="skill-git" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>Command Line (Unix)</p>
                                        <div class="bar-outer">
                                            <div id="skill-unix" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>C</p>
                                        <div class="bar-outer">
                                            <div id="skill-c" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>C++</p>
                                        <div class="bar-outer">
                                            <div id="skill-cpp" class="bar-inner"></div>
                                        </div>
                                    </li>
                                    <li class="skill-li">
                                        <p>Java</p>
                                        <div class="bar-outer">
                                            <div id="skill-java" class="bar-inner"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="education" class="portfolio-grid-item">
                            <div class="portfolio-item-heading-container">
                                <h2 class="portfolio-item-heading">Education</h2>
                                <div class="icon-box"></div>
                                <div class="expand-box">+</div>
                                </div>
                            <div class="portfolio-item-content">
                                <h4>Schooling:</h4>
                                <ul>
                                    <li class="outer-li">
                                        <p class="school">University of Toronto</p>
                                        <ul>
                                            <li class="inner-li">&bull; BA for Linguistics (4 years)</li>
                                        </ul>
                                    </li>
                                    <li class="outer-li">
                                        <p class="school">Ryerson University Chang School</p>
                                        <ul>
                                            <li class="inner-li">&bull; Certificate in Computer Science (2 years)</li>
                                        </ul>
                                    </li>
                                    <li class="outer-li">
                                        <p class="school">Lighthouse Labs</p>
                                        <ul>
                                            <li class="inner-li">&bull; Crash course web development bootcamp</li>
                                        </ul>
                                    </li>
                                </ul>
                                <h4>Online Learning:</h4>
                                <ul>
                                    <li class="outer-li">
                                        <p class="school">Build Responsive Real World Websites (Udemy)</p>
                                        <ul>
                                            <li class="inner-li">&bull; By Jonas Schmedtmann</li>
                                            <li class="inner-li">&bull; Provides fundamental knowlege on front-end principles</li>
                                        </ul>
                                    </li>
                                    <li class="outer-li">
                                        <p class="school">Eloquent Javascript</p>
                                        <ul>
                                            <li class="inner-li">&bull; By Marijn Haverbeke</li>
                                            <li class="inner-li">&bull; A deep-dive into Vanilla Javascript essentials</li>
                                        </ul>
                                    </li>
                                    <li class="outer-li">
                                        <p class="school">The Odin Project</p>
                                        <ul>
                                            <li class="inner-li">&bull; Open Source</li>
                                            <li class="inner-li">&bull; A comprehensive guide to web development, particularly using Github to manage projects</li>
                                        </ul>
                                    </li>
                                    <li class="outer-li">
                                        <p class="school">React - The Complete Guide (Udemy) (in progress)</p>
                                        <ul>
                                            <li class="inner-li">&bull; By Academind</li>
                                            <li class="inner-li">&bull; Hands-on learning with React, Hooks, Redux, etc.</li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- ABOUT -->
            <section name="about" id="section-about" class="section jq--section-about waypoint-about" data-section-name="About">
                <div class="background-filter"></div>
                <div class="about-wrapper">
                    <div class="about-left">
                    </div>
                    <div class="about-right">
                        <div class="about-description">
                            <h1 class="about-heading">About</h1>
                            <p>Hello! <br><br>
                                I'm James, a web developer based in Toronto.<br><br>
                                With three years of coding experience under my belt in a variety of languages,
                                I am passionate, curious, highly social, and always striving to learn new technologies and better my skillset.<br><br>
                                Beyond the code, I'm also into 35mm photography &#128247;, music &#127928;, videogames &#128126;, and red wine &#127863;<br><br>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-panel-left off-screen">
                    <div class="face-container">
                        <img class="my-face" src="resources2/img/compressedpng/holo3-min.png">
                    </div>
                </div>
                <div class="about-panel-right off-screen"></div>
            </section>


            <!-- CONTACT -->
            <section id="section-contact" class="section jq--section-contact waypoint-contact" data-section-name="Contact">
            <!--<div class="background-filter"></div>-->
                <h1 class="contact-heading">Contact</h1>
                <p>
                    If you would like to contact me, please send me an email via the form below, or drop me a call.
                </p>
                <div class="contact-container">
                    <form id="contact-form" class="contact-form" action="./index.php?mailsent" method="post">
                        <h3>Shoot me an email!</h3>
                        <label for="name-in">
                            <input id="name-in" type="text" name="name" placeholder="Full name">
                        </label>
                        <label for="email-in">
                            <input id="email-in" type="text" name="email" placeholder="Your email">
                        </label>
                        <label for="subject-in">
                            <input id="subject-in" type="text" name="subject" placeholder="Subject">
                        </label>
                        <label for="message-in">
                            <textarea id="message-in" name="message" placeholder="Message" cols="50" rows="50"></textarea>
                        </label>
                        <button id="email-submit-btn" type="submit" name="submit">SEND MAIL</button>
                    </form>
                </div>
            </section>


            <!-- FOOTER -->
            <footer id="section-footer">
                <div class="footer-tab jq--back-to-top">
                    <a href="#" class="footer-link jq--scroll-to-header">
                        <img src="resources2/img/pixel art/website_face_v1.png">
                    </a>
                </div>
                <div class="footer-tab">
                    <a href="mailto:me@jamesyoannou.com">me@jamesyoannou.com</a>
                </div>
                <div class="footer-tab">
                    <p>(647) 998-5899</p>
                </div>
                <div class="footer-tab">
                    <a href="https://www.linkedin.com/in/james-yoannou-812b7b1a4/" target="_blank" class="footer-link">
                        <img src="vendors/img/LIsimple.png">
                    </a>
                </div>
                <div class="footer-tab">
                    <a href="https://github.com/Yoannou" target="_blank" class="footer-link">
                        <img src="vendors/img/GitHub-Mark-Light-64px.png">
                    </a>
                </div>
            </footer>

            <div id="scroll-button-container">
                <div id="scroll-button" class="scroll-button">
                  <img class="scroll-arrow scroll-arrow-down" src="./resources2/img/pixel art/scroll_down.png">
                  <img class="scroll-arrow scroll-arrow-up" src="./resources2/img/pixel art/scroll_up.png">
                </div>
                    <audio id="scroll-hover" src="vendors/audio/zapsplat_office_electronic_typewriter_single_button_press_beep_brother_ax_450_33756.mp3"></audio>
                    <audio id="scroll-click" src="vendors/audio/tspt_message_notification_alert_02_053.mp3"></audio>
                </div>
            </div>

        <script src="resources2/js/animations.js"></script>
        <script src="resources2/js/canvas.js"></script>
        <script src="resources2/js/audio.js"></script>
        
        <!-- The JS library for client-side form validation (from a CDN) - may be better to download to server -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
        <!-- Implementation of that package: -->
        <script>
            const constraints = {
                name: {
                    presence: { allowEmpty: false }
                },
                email: {
                    presence: { allowEmpty: false },
                    email: true
                },
                subject: {
                    presence: { allowEmpty: false },
                },
                message: {
                    presence: { allowEmpty: false }
                }
            };

            const form = document.getElementById('contact-form');

            form.addEventListener('submit', function (event) {
                const formValues = {
                    name: form.elements.name.value,
                    email: form.elements.email.value,
                    subject: form.elements.subject.value,
                    message: form.elements.message.value
                };

                const errors = validate(formValues, constraints);

                if (errors) {
                event.preventDefault();
                const errorMessage = Object
                    .values(errors)
                    .map(function (fieldValues) { return fieldValues.join(', ')})
                    .join("\n");

                alert('Error: \n\n' + errorMessage);
                }
            }, false);
        </script>
    </body>
</html>