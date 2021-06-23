<!DOCTYPE html>

<html>
    <head>
        <title>James Yoannou</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="vendors/css/reset.css">
        <link rel="stylesheet" href="resources/css/style.css">
        <link rel="stylesheet" href="resources/css/queries.css">
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;800&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600&display=swap" rel="stylesheet"> 
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
                        <img src="resources/img/pixel art/website_music_v1.png">
                        <div class="nav-link-name"><p style="color: lightblue;">chill vibes</p></div>
                    </a>
                </div>
                <div class="nav-link">
                    <a id="about-link" class="jq--scroll-to-about" title="About" href="#">
                        <img id="about-icon" src="resources/img/pixel art/website_face_v1.png">
                        <div class="nav-link-name"><p>About me</p></div>
                    </a>
                </div>
                <div class="nav-link">
                    <a id="portfolio-link" class="jq--scroll-to-portfolio" title="Portfolio" href="#">
                        <img ig="portfolio-icon" src="resources/img/pixel art/website_portfolio_v1.png">
                        <div class="nav-link-name"><p>My portfolio</p></div>
                    </a>
                </div>
                <div class="nav-link">
                    <a id="contact-link" class="jq--scroll-to-contact" title="Contact" href="#">
                        <img id="contact-icon" src="resources/img/pixel art/website_contact_v1.png">
                        <div class="nav-link-name"><p>Contact</p></div>
                    </a>
                </div>
            </nav>
            <div id="nav-toggle-display">
                <div class="burger-bar burger-top"></div>
                <div class="burger-bar burger-middle"></div>
                <div class="burger-bar burger-bottom"></div>
            </div>


            <!-- HEADER -->
            <header id="section-header" class="section jq--section-header" data-section-name="Header">
                <canvas class="canvas-header"></canvas>
                <div class="header-wrapper">
                    <div class="name-wrapper"></div>
                    <h4 class="web-developer-wrapper"><span class="web-developer">/* web development&nbsp;&nbsp;&nbsp;//&nbsp;&nbsp;&nbsp;photography */</span></h4>
                </div>
            </header>


            <!-- ABOUT -->
            <section name="about" id="section-about" class="section jq--section-about waypoint-about" data-section-name="About">
                <div class="background-filter"></div>
                <div class="about-wrapper">
                    <div class="about-left">
                        <p>name: james</p>
                        <p>age: 26</p>
                        <p>height: 5'11"</p>
                        <p>weight: 170lbs</p>
                    </div>
                    <div class="about-right">
                        <div class="about-description">
                            <h1 class="about-heading">About</h1>
                            <p>Hello! <br><br> 
                                I'm a fledgling front-end web developer looking to find employment in the Toronto area.<br><br>
                                With three years of coding experience under my belt in a variety of languages, 
                                you will find me to be passionate, curious, highly social, and always striving to learn new technologies and better my skillset.<br><br>
                                Beyond this, I am very interested in 35mm photography, music, and videogames.<br><br>
                                I hope you enjoy your stay on this little spaceship I threw together!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="about-panel-left off-screen">
                    <div class="face-container">
                        <img class="my-face" src="resources/img/compressedpng/holo3-min.png">
                    </div>
                </div>
                <div class="about-panel-right off-screen"></div>
            </section>


            <!-- PORTFOLIO -->
            <section id="section-portfolio" class="section jq--section-portfolio waypoint-portfolio" data-section-name="Portfolio">
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
                                    <li class="outer-li">
                                        <a href="#">Shopify fade-in navigation</a>
                                        <ul>
                                            <li class="inner-li">&bull; Applies changes to site nav on-hover</li>
                                            <li class="inner-li">&bull; Can be toggled on and off via Theme Settings</li>
                                            <li class="inner-li">&bull; Currently being optimized to add more custom features</li>
                                        </ul>
                                    </li>
                                    <li class="outer-li">
                                        <a href="./arduino">Arduino projects, coded in C</a>
                                        <ul>
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
                                        <p>React (in progress)</p>
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
                                            <li class="inner-li">&bull; BA for Linguistics</li>
                                        </ul>
                                    </li>
                                    <li class="outer-li">
                                        <p class="school">Ryerson University Chang School</p>
                                        <ul>
                                            <li class="inner-li">&bull; Certificate in Computer Science</li>
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
                                            <li class="inner-li">&bull; Provides fundamental knowlege on front end principles</li>
                                        </ul>
                                    </li>                                    
                                    <li class="outer-li">
                                        <p class="school">Eloquent Javascript</p>
                                        <ul>
                                            <li class="inner-li">&bull; By Marijn Haverbeke</li>
                                            <li class="inner-li">&bull; Provides a deep-dive into Vanilla Javascript essentials</li>
                                        </ul>
                                    </li>
                                    <li class="outer-li">
                                        <p class="school">React - The Complete Guide (Udemy) (in progress)</p>
                                        <ul>
                                            <li class="inner-li">&bull; By Academind</li>
                                            <li class="inner-li">&bull; Provides hands-on learning with React, Hooks, Redux, etc.</li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- CONTACT -->
            <section id="section-contact" class="section jq--section-contact" data-section-name="Contact">
            <!--<div class="background-filter"></div>-->
                <h1 class="contact-heading">Contact</h1>
                <p>
                    If you would like to contact me, please send me an email via the form below, or drop me a call.
                </p>
                <div class="contact-container">
                    <form class="contact-form" action="./php/contactform.php" method="post">
                        <h3>Shoot me an email!</h3>
                        <label for="name-in">
                            <input id="name-in" type="text" name="name" placeholder="Full name">
                        </label>
                        <label for="email-in">
                            <input id="email-in" type="text" name="mail" placeholder="Your email">
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
            <footer id="footer">
                <div class="footer-tab">
                    <a href="#" class="footer-link jq--scroll-to-header">
                        <img src="resources/img/pixel art/website_face_v1.png">
                    </a>
                </div>
                <div class="footer-tab">
                    <p>me@jamesyoannou.com</p>
                </div>
                <div class="footer-tab">
                    <p>(647)998-5899</p>
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
            <div id="scroll-button" style="display: none;">
                <div id="scroll-down-button"><ion-icon name="chevron-down-outline"></ion-icon></div>
                <audio id="scroll-hover" src="vendors/audio/zapsplat_office_electronic_typewriter_single_button_press_beep_brother_ax_450_33756.mp3"></audio>
                <audio id="scroll-click" src="vendors/audio/tspt_message_notification_alert_02_053.mp3"></audio>
            </div>
        </div>
        <script src="resources/js/animations.js"></script>
        <script src="resources/js/audio.js"></script>
    </body>
</html>
