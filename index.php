<!DOCTYPE html>

<?php
    /*
    This needs to be moved into its own file to stop website from slowing down.
    If I do that, I can't send the user confirmation that their email went through
    because, when redirecting them from the other file back to this one with the header() function,
    I lose the ability to alert them. Figure this out.
    */

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
            $mailTo = "me@jamesyoannou.com";
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
                        <div class="nav-link-name"><p>my portfolio</p></div>
                    </a>
                </div>
                <div class="nav-link">
                    <a id="about-link" class="jq--scroll-to-about" title="About" href="#">
                        <img id="about-icon" src="resources2/img/pixel art/website_face_v1.png">
                        <div class="nav-link-name"><p>about me</p></div>
                    </a>
                </div>
                <div class="nav-link">
                    <a id="contact-link" class="jq--scroll-to-contact" title="Contact" href="#">
                        <img id="contact-icon" src="resources2/img/pixel art/website_contact_v1.png">
                        <div class="nav-link-name"><p>contact</p></div>
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
                    <div class="portfolio-upper">
                        <div id="projects" class="portfolio-grid-item">
                            <div class="portfolio-item-heading-container">
                                <h2 class="portfolio-item-heading">Projects</h2>
                                <div class="icon-box"></div>
                            </div>
                            <div class="portfolio-item-content project-boxes">
                                <a href="https://www.muddycrops.com" target="_blank" class="project-box">
                                    <figure class="project-box-inner">
                                        <img class="project-image" src="./resources2/img/project images/farmer-sticker.png" alt="Muddy Crops landing page">
                                        <figcaption>
                                            <h3>Muddy Crops</h3>
                                            <ul>
                                                <li class="inner-li">&bull; Lead <strong style="color: #BAD586">Shopify Liquid</strong> developer for local e-commerce website</li>
                                                <li class="inner-li">&bull; Created custom <strong style="color: #DDD">JSON</strong> schemas to grant client control over their storefront</li>
                                                <li class="inner-li">&bull; Worked closley with designer and merchant to bring their ideas to the site</li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <div class="project-caption">
                                            <span class="project-caption-header">Muddy Crops</span>
                                            <ul>
                                                <li class="inner-li">&bull; Lead <strong style="color: #6C8934">Shopify Liquid</strong> developer for local e-commerce website</li>
                                                <li class="inner-li">&bull; Created custom <strong style="color: #333">JSON</strong> schemas to grant client control over their storefront</li>
                                                <li class="inner-li">&bull; Worked closley with designer and merchant to bring their ideas to the site</li>
                                            </ul>
                                    </div>
                                </a>
                                <a href="./projects/arduino/arduino.php" class="project-box">
                                    <figure class="project-box-inner">
                                        <img class="project-image" src="./resources2/img/project images/romeo.jpg" alt="Microcontroller projects">
                                        <figcaption>
                                            <h3>Microcontroller Projects</h3>
                                            <ul>
                                            <li class="inner-li">&bull; Programs designed for electronic microcontrollers and robotics</li>
                                            <li class="inner-li">&bull; Coded in <strong style="color: #7E9FD4">C</strong> using bitwise operations</li>
                                            <li class="inner-li">&bull; Includes a theremin!</li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <div class="project-caption">
                                            <span class="project-caption-header">Microcontroller Projects</span>
                                            <ul>
                                            <li class="inner-li">&bull; Programs designed for electronic microcontrollers and robotics</li>
                                            <li class="inner-li">&bull; Coded in <strong style="color: #0645ad">C</strong> using bitwise operations</li>
                                            <li class="inner-li">&bull; Includes a theremin!</li>
                                            </ul>
                                    </div>
                                </a>
                                <a href="https://net-zero-now.ca" target="_blank" class="project-box">
                                    <figure class="project-box-inner">
                                        <img class="project-image" style="background-color: #fafafa;" src="./resources2/img/project images/net-zero-now.png" alt="Shopitabs project">
                                        <figcaption>
                                            <h3>Net Zero Now</h3>
                                            <ul>
                                                <li class="inner-li">&bull; Freelance <strong style="color: #FD8A92">Wordpress</strong> work for Canadian clean energy startup</li>
                                                <li class="inner-li">&bull; Used additonal <strong style="color: #777BB3">PHP</strong> and <strong style="color: #2965f1">CSS</strong> to go beyond the standard theme presets</li>
                                                <li class="inner-li">&bull; Implemented advanced plug-ins and best practice web development strategies</li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <div class="project-caption">
                                        <span class="project-caption-header">Net Zero Now</span>
                                        <ul>
                                          <li class="inner-li">&bull; Freelance <strong style="color: #BB666C">Wordpress</strong> work for Canadian clean energy startup</li>
                                          <li class="inner-li">&bull; Used additonal <strong style="color: #484C89">PHP</strong> and <strong style="color: #264de4">CSS</strong> to go beyond the standard theme presets</li>
                                          <li class="inner-li">&bull; Implemented advanced plug-ins and best practice web development strategies</li>
                                        </ul>
                                    </div>
                                </a>
                                <a href="https://yoannou.github.io" target="_blank" class="project-box">
                                    <figure class="project-box-inner">
                                        <img class="project-image" src="./resources2/img/project images/mars.png" alt="Shopitabs project">
                                        <figcaption>
                                            <h3>Spacetagram</h3>
                                            <ul>
                                                <li class="inner-li">&bull; <strong style="color: #61dbfb">React</strong> project that pulls data from NASA rover <strong style="color: #DDD">API</strong></li>
                                                <li class="inner-li">&bull; Allows users to scroll through the "feed" of Earth and Mars</li>
                                                <li class="inner-li">&bull; Made for an internship application challenge</li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <div class="project-caption">
                                        <span class="project-caption-header">Spacetagram</span>
                                        <ul>
                                          <li class="inner-li">&bull; <strong style="color: #469DB4">React</strong> project that pulls data from NASA rover <strong style="color: #333">API</strong></li>
                                          <li class="inner-li">&bull; Allows users to scroll through the "feed" of Earth and Mars</li>
                                          <li class="inner-li">&bull; Made for an internship application challenge</li>
                                        </ul>
                                    </div>
                                </a>
                                <a href="http://www.metricalories.com" target="_blank" class="project-box">
                                    <figure class="project-box-inner">
                                        <img class="project-image" src="./resources2/img/project images/metrics2.png" alt="Metrics project">
                                        <figcaption>
                                            <h3>Cook Assistant</h3>
                                            <ul>
                                                <li class="inner-li">&bull; Webapp designed to instantly convert different metric units</li>
                                                <li class="inner-li">&bull; Programmed in <strong style="color: #61dbfb">React</strong>!</li>
                                                <li class="inner-li">&bull; Will be incorporated into larger calorie-tracking application</li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <div class="project-caption">
                                        <span class="project-caption-header">Cook Assistant</span>
                                            <ul>
                                                <li class="inner-li">&bull; Webapp designed to instantly convert different metric units</li>
                                                <li class="inner-li">&bull; Programmed in <strong style="color: #469DB4">React</strong>!</li>
                                                <li class="inner-li">&bull; Will be incorporated into larger calorie-tracking application</li>
                                            </ul>
                                    </div>
                                </a>
                                <a href="./projects/shopitabs/shopitabs.php" class="project-box">
                                    <figure class="project-box-inner">
                                        <img class="project-image" src="./resources2/img/project images/shopitabs1.png" alt="Shopitabs project">
                                        <figcaption>
                                            <h3>Shopitabs</h3>
                                            <ul>
                                                <li class="inner-li">&bull; <strong style="color: #FBED82">Javascript</strong>-heavy <strong style="color: #BAD586">Shopify</strong> section that allows merchant to create tabs</li>
                                                <li class="inner-li">&bull; Includes a <strong style="color: #DDD">JSON</strong> schema so that users can customize it in the dashboard</li>
                                                <li class="inner-li">&bull; Highly customizable and responsive</li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                    <div class="project-caption">
                                        <span class="project-caption-header">Shopitabs</span>
                                        <ul>
                                            <li class="inner-li">&bull; <strong style="color: #C7B318">Javascript</strong>-heavy <strong style="color: #6C8934">Shopify</strong> section that allows merchants to create tabs</li>
                                            <li class="inner-li">&bull; Includes a <strong style="color: #333">JSON</strong> schema so that users can customize it in the dashboard</li>
                                            <li class="inner-li">&bull; Highly customizable and responsive</li>
                                        </ul>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="portfolio-lower">
                        <div>
                            <div id="skillset" class="portfolio-grid-item waypoint-skillset">
                              <div class="portfolio-item-heading-container">
                                <h2 class="portfolio-item-heading">Skillset</h2>
                                <div class="icon-box"></div>
                              </div>
                              <div class="portfolio-item-content">
                                <div class="tech-logo-grid">
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" style="max-width: 90px" src="./resources2/img/tech/html5.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>HTML</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/css3.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>CSS</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/js.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>Javascript</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/react.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>React</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/chakra.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>Chakra UI</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/tailwind.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>Tailwind CSS</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/jquery.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>JQuery</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/ruby.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>Ruby</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/php.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>PHP</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/mysql.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>MySQL</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/jasmine.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>Jasmine</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/shopify.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>Shopify Liquid</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/git.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>Git</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/bash.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>Bash</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/c.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>C</p>
                                  </div>
                                  <div class="tech-logo-wrapper">
                                    <img class="tech-logo-icon" src="./resources2/img/tech/java.svg">
                                    <div class="tech-logo-spacer"></div>
                                    <p>Java</p>
                                  </div>
                                </div>
                                <a id="github-button" href="https://github.com/Yoannou" target="blank">
                                  <p>Github</p>
                                  <img src="vendors/img/GitHub-Mark-Light-64px.png">
                                </a>
                              </div>
                            </div>
                        </div>
                        <div>
                            <div id="education" class="portfolio-grid-item">
                                <div class="portfolio-item-heading-container">
                                    <h2 class="portfolio-item-heading">Education</h2>
                                    <div class="icon-box"></div>
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
                                I'm James, an aspiring web developer based in Toronto.<br><br>
                                With four years of coding experience under my belt in a variety of languages,
                                I am passionate, curious, highly social, and always striving to learn new technologies and better my skillset.<br><br>
                                I seek a career in front-end web development and programming applications. I believe that between my knowledge,
                                optimistic attitude, work ethic, teamwork-driven personality, and constant desire to learn and improve, 
                                I would be a valuable asset to any company or project.<br><br>
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
