<!DOCTYPE html prefix="og: http://ogp.me/ns#">
<html>
    <head>
        <title>Shopitabs</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta property="og:type" content="website">
        <meta property='og:image' content='http://wwww.jamesyoannou.com/resources1/img/pixel art/bg-test-3.png'/>
        <meta property='og:title' content='James Yoannou'/>
        <meta property='og:url' content='//www.jamesyoannou.com'/>

        <link rel="stylesheet" href="../../vendors/css/reset.css">
        <link rel="stylesheet" href="../../resources1/css/general.css">
        <link rel="stylesheet" href="main1.css">
        <link rel="stylesheet" href="https://use.typekit.net/yom0nhp.css">
    </head>
    <body>
        <header>
            <div class="name-wrapper">
                <h1 id="page-title">Shopitabs</h1>
            </div>
        </header>
        <main id="main">
            <div class="mid">
                <div class="shopitabs-container" style="padding: {{section.settings.section_height}}px 0px; background-color: {{section.settings.background_color}};">
                    <h3 class="shopitabs-title">A shopify section to create your own interactive tabs.</h3>
                    <div class="shopitabs-list" style="width: 80%;">
                        <div class="shopitab-button">
                            <div class="shopitab-name"><h3>Click me</h3></div>
                            <div class="shopitab-image-container">
                                <img class="shopitab-image" style="width: 64px;" src="../../resources1/img/pixel art/website_face_v1.png">
                            </div>
                        </div>
                        <div class="shopitab-button">
                            <div class="shopitab-name"><h3>Or me.</h3></div>
                            <div class="shopitab-image-container">
                                <img class="shopitab-image" style="width: 64px;" src="../../resources1/img/pixel art/website_face_v1.png">
                            </div>
                        </div>
                        <div class="shopitab-button">
                            <div class="shopitab-name"><h3>Or me?</h3></div>
                            <div class="shopitab-image-container">
                                <img class="shopitab-image" style="width: 64px;" src="../../resources1/img/pixel art/website_face_v1.png">
                            </div>
                        </div>
                        <div class="shopitab-button">
                            <div class="shopitab-name"><h3>Or me!</h3></div>
                            <div class="shopitab-image-container">
                                <img class="shopitab-image" style="width: 64px;" src="../../resources1/img/pixel art/website_face_v1.png">
                            </div>
                        </div>
                    </div>
                    <div class="shopitab-content-container">
                        <div class="shopitab-content hidden">
                            <div class="shopitab-content-description">Hi there.</div>
                            <!-- Image can go below: Notes the 700x700!
                            <div class="shopitab-content-image-container">
                                <img class="shopitab-content-image" src="{{ block.settings.inner_image | img_url: '700x700' }}">
                            </div>
                            -->
                        </div>
                        <div class="shopitab-content hidden">
                            <div class="shopitab-content-description"><br><br><br><br><br><br><br><br><br>Do you like tabs?</div>
                        </div>
                        <div class="shopitab-content hidden">
                            <div class="shopitab-content-description"><br><br><br><br><br><br>I love tabs.</div>
                        </div>
                        <div class="shopitab-content hidden">
                            <div class="shopitab-content-description"><br><br><br>Who doesn't love a nice tab?!</div>
                        </div>
                    </div>
                </div>
                <div class="description">
                    <p>Shopitabs is a shopify section that allows merchants to add toggleable tabs to their webpages.</p>
                    <p>The tabs are evenly spaced depending on how many are created. 
                        On smaller displays, the tabs are reorganized vertically.
                    </p>
                    <p>Shopitabs was designed to be extremely customizable. It was also designed to be simple to get up-and-running - 
                        just follow the instructions below to have some sweet tabs on your storefront today!
                    </p>
                    <p></p>
                </div>
            </div>
            <section class="instructions">
                <h3 style="padding-left: 20px; padding-top: 20px;">To get:</h3>
                <ul class="instructions-list">
                    <li id="step-1" class="instruction">
                        <div class="ls">
                            <h4>1</h4>
                            <p>Add the <code>.liquid</code> file to your Sections folder.</p>
                        </div>
                        <div class="rs">
                            <img src="media/sections 1-1.png">
                            <img src="media/sections 2.png">
                        </div>
                    </li>
                    <li id="step-2" class="instruction">
                        <div class="ls">
                            <h4>2</h4>
                            <p>Add the <code>.js</code> file to you Assets folder.</p>
                        </div>
                        <div class="rs">
                            <img src="media/assets 1-1.png">
                        </div>
                    </li>
                    <li id="step-3" class="instruction">
                        <div class="ls">
                            <h4>3</h4>
                            <p>Link the javascript file to your website by adding this line of code to
                                your <code>theme.liquid</code> file, just above the closing <code>body</code> tag:</p>
                            <div class="source-code-wrapper">
                                <pre>&lt;script src="{{ 'shopitabs.js' | asset_url }}"&gt;&lt;/script&gt;</pre>
                            </div>
                        </div>
                        <div class="rs">
                            <img src="media/theme 1.png">
                            <img src="media/theme 2.png">
                        </div>
                    </li>
                    <li id="step-4" class="instruction">
                        <div class="ls">
                            <h4>4</h4>
                            <p>Tabs can now be selected and customized in the section manager under 'TEXT'.<br>
                        If you would like to add the tabs system to a page other than the landing page, you will
                        have to go into that page's template file and add the section via the liquid notation:
                        <code>{% section 'tabs' %}</code></p>
                        </div>
                        <div class="rs">
                            <img src="media/add section.png">
                            <img src="media/add-section-2.png">
                        </div>
                    </li>
                </ul>
            </section>
            <div class="small file-downloads">
                <h4>Files:</h4>
                <a href="./files/shopitabs.liquid" download>shopitabs.liquid</a>
                <a href="./files/shopitabs.js" download>shopitabs.js</a>
            </div>
            <div class="small github">
                <h4>View project on Github:</h4>
                <p>(Going open-source soon)</p>
            </div>
            <div class="small bug-warning">
                Warning: BUGS - if images are different sizes, the tab buttons will not be aligned.
                I am working to fix this issue.
            </div>
        </main>
        <div class="bottom">
            <a href="/index.php" class="btn">To main website</a>
        </div>
        <footer>
            <div class="footer-tab">
                James Yoannou 2021. All rights reserved.
            </div>
        </footer>
        <script>
            document.getElementById('page-title').style="top: 0;";
        </script>
        <script src="files/shopitabs.js"></script>
    </body>
</html>