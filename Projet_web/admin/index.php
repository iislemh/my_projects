<?php $headTitle = "Admin - Connexion";?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?php echo $headTitle;?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link rel="apple-touch-icon" sizes="57x57" href="resources/imgs/layout/favicon-apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="resources/imgs/layout/favicon-apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="resources/imgs/layout/favicon-apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="resources/imgs/layout/favicon-apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="resources/imgs/layout/favicon-apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="resources/imgs/layout/favicon-apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="resources/imgs/layout/favicon-apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="resources/imgs/layout/favicon-apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="resources/imgs/layout/favicon-apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="resources/imgs/layout/favicon-android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="resources/imgs/layout/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="resources/imgs/layout/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="resources/imgs/layout/favicon-16x16.png">   
        <link rel="stylesheet" type="text/css" href="css/connection.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </head>
    <body>
        <div class="background">
        <div class="form">
            <div class="tab-content">
                <div id="logo"><img src="resources/imgs/layout/cw_logo.jpg" id="logo"></div> 
                <div id="frame"></div>
                <div id="login">  
                    <form action="php/queries/connection.php" method="post" autocomplete="off">
                        <div class="field-wrap">
                            <label>
                                Email Address<span class="req">*</span>
                            </label>
                            <input type="email"required autocomplete="off" name="email"/>
                        </div>
                        <div class="field-wrap">
                            <label>
                                Password<span class="req">*</span>
                            </label>
                            <input type="password"required autocomplete="off" name="password"/>
                        </div>
                        <button class="button button-block" name="connectionEmployee"/>Connexion</button>
                        <p class="forgot"><a href="#">Mot de passe oublié ?</a></p>
                    </form>
                </div>
                <div id="signup">   
                    <h1>Sign Up for Free</h1>
                    <form action="/" method="post">
                        <div class="top-row">
                            <div class="field-wrap">
                                <label>
                                    First Name<span class="req">*</span>
                                </label>
                                <input type="text" required autocomplete="off" />
                            </div>
                            <div class="field-wrap">
                                <label>
                                    Last Name<span class="req">*</span>
                                </label>
                                <input type="text"required autocomplete="off"/>
                            </div>
                        </div>
                        <div class="field-wrap">
                            <label>
                                Email Address<span class="req">*</span>
                            </label>
                            <input type="email"required autocomplete="off"/>
                        </div>
                        <div class="field-wrap">
                            <label>
                                Set A Password<span class="req">*</span>
                            </label>
                            <input type="password"required autocomplete="off"/>
                        </div>
                        <button type="submit" class="button button-block"/>Get Started</button>
                    </form>
                </div>
            </div><!-- tab-content -->
        </div> <!-- /form -->
        </div>
        <script type="text/javascript" src="js/connection.js"></script>
        <script>
        $('form,input,select,textarea').attr("autocomplete", "off");
        </script>
        
    </body>
</html>