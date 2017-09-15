
<body>
    <header>
        <h1 id="logo"><a href="home.php">Cinewax</a></h1>

        <nav class="cd-main-nav-wrapper">
            <ul class="cd-main-nav">
                <!--<li><a href="#0">About</a></li>-->
                <li><a href="deconnection.php">Déconnexion</a></li>

                <li>
                    <a href="#0" class="cd-subnav-trigger"><span><?php echo $_SESSION['auth']['firstname']; ?></span></a>

                    <ul>
                        <li class="go-back"><a href="#0">Menu</a></li>
                        <li><a href="#0">Profil</a></li>
                        <li><a href="#0">Historique</a></li>
                        <li><a href="#0" class="placeholder">Placeholder</a></li>
                    </ul>
                </li>
            </ul> <!-- .cd-main-nav -->
        </nav> <!-- .cd-main-nav-wrapper -->

        <a href="#0" class="cd-nav-trigger"><span></span></a>
    </header>
    <aside>
        <div id="dropZone">
            <div id="zone">
                <a href="http://cinewax-public.virgile-gouala.fr/" target="_blank"></a>
            </div>
        </div>
        <nav id="staffPanel">
            <ul>
                <li>MÉDIAS
                    <ul>
                        <li><a href="movies.php">Films
                                <span>
                                    <?php while ($result = $countMediasMovies->fetch()) {
                                        echo $result->count;
                                    } $countMediasMovies->closeCursor(); ?>
                                </span>
                            </a>
                        </li>
                        <li><a href="genres.php">Genres
                                <span>
<?php while ($result = $countMediasGenres->fetch()) {
    echo $result->count;
} $countMediasGenres->closeCursor(); ?>
                                </span>
                            </a>
                        </li>
                        <li><a href="countries.php">Pays
                                <span>
<?php while ($result = $countMediasCountries->fetch()) {
    echo $result->count;
} $countMediasCountries->closeCursor(); ?>
                                </span>
                            </a>
                        </li>
                        <li><a href="languages.php">Langues
                                <span>
<?php while ($result = $countMediasLanguages->fetch()) {
    echo $result->count;
} $countMediasLanguages->closeCursor(); ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>RESSOURCES HUMAINES
                    <ul>
                        <li><a href="memberships.php">Membres
                                <span>
<?php while ($result = $countHRMemberships->fetch()) {
    echo $result->count;
} $countHRMemberships->closeCursor(); ?>
                                </span>
                            </a>
                        </li>
                        <li><a href="employees.php">Employés <span>
                                    <?php while ($result = $countHREmployees->fetch()) {
                                        echo $result->count;
                                    } $countHREmployees->closeCursor(); ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>CINÉMA
                    <ul>
                        <li><a href="sessions.php">Programmation
                                <span>
<?php while ($result = $countCinemaSessions->fetch()) {
    echo $result->count;
} $countCinemaSessions->closeCursor(); ?>
                                </span>
                            </a>
                        </li>
                        <li><a href="theaters.php">Salles <span>
<?php while ($result = $countCinemaTheaters->fetch()) {
    echo $result->count;
} $countCinemaTheaters->closeCursor(); ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>OUTILS
                    <ul>
                        <li><a href=<?php
                        if ($_SESSION['auth']['job'] == 1 || $_SESSION['auth']['job'] == 6 || $_SESSION['auth']['job'] == 2){
                            echo "'caisse.php'";
                        }
                        else {
                            echo '"" class="strip"';
                        }?>>Caisse</a></li>
                        <li><a href="" class="strip">Newsletter</a></li>
                        <li><a href="" class="strip">Historique</a></li>
                        <li><a href="" class="strip">Cloud</a></li>
                        <li><a href=<?php 
                        if ($_SESSION['auth']['job'] == 1){
                            echo "'stats.php'";
                        }
                        else {
                            echo '"" class="strip"';
                        }
                        ?>>Statistiques</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </aside>