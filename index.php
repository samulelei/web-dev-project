<!DOCTYPE HTML>
<?php
    require_once('script/https.php');
    include("script/config.php");
    session_start(); 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        require_once('script/login.php');
        }
?>
<html lang="fi">
    <head>
        <title>Kontulan Huolto</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="" /> <!--mikä tämä on?-->
        <meta name="keywords" content="huolto, palvelu" /> <!--näinkö avainsanoja?-->
        <link rel="icon" href="icons/ikoni.jpg"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/huoltostyle.css">
        <link rel="stylesheet" href="css/login.css">
        <style>
        <?php
            if ($_SESSION['user'] != 'notlogged'){?>
                .modal {display: none;}
        <?php
            } else {?>
            .modal {display: block;}
            p.hidden {display: block;}
            <?php $_SESSION['user'] = '';}
        ?>
    </style>
    </head>
    

<body>
<!--navipalkki-->
    <header> 
        <a class="logo" href="index.php"><i class="fa fa-home fa-2x "></i><span class="hide-small">  Etusivulle</span></a>
        <div class="center">
            <img src="icons/ikoni.jpg" alt="logo" style="height: 40px">
            <strong class="hide-small center">Kontulan huolto</strong>
        </div>
<?php
    if ($_SESSION['user'] != '' & $_SESSION['user'] != 'notlogged') {?>
        <a href="script/logout.php" class="logo" style="width:auto;">
        <span class="hide-small">Kirjaudu ulos</span><i class="fa fa-sign-out fa-2x"></i></a>
<?php
    }else{?>
        <a href="#" class="logo" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
        <span class="hide-small">Kirjaudu sisään</span><i class="fa fa-user fa-2x"></i></a>
        <?php
    }
?>
    </header>
<!--henkilötiedot-->
<div id="astietotausta">
    <div class="tietopalkki">
    <p class="astiedot">
<?php
    if ($_SESSION['user'] != '' & $_SESSION['user'] != 'notlogged') {?> 
        <?php echo $_SESSION['firstname'] . " ". $_SESSION['lastname']; ?><br>
        <?php echo $_SESSION['address'] . " " . $_SESSION['apartment'];?><br>
        <?php echo $_SESSION['estatename']; ?></p>
    </div>
    <div class="tietopalkki">
        <p class="uustiedote"><i class="fa fa-exclamation-triangle"></i>Uusin tiedoite<br>
        <?php echo $_SESSION['uusintiedote']; ?></p></div>
<?php
    }else{?>
        Kirjaudu sisään nähdäksesi lisätietoja <i class="fa fa-arrow-up hide-icon"></i></p></div>
<?php
    }
?>  
</div>  
<!--kirjoitettava osa-->
        <div class="tekstipohja">
<!--tämä header muille sivuille kuin indexiin
        <header class="special">
            <h2>Sem turpis amet semper</h2>
            <p>In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer lobortis commodo ornare aliquet accumsan erat tempus amet porttitor.</p>
        </header> -->
        <div class="iconialue">
            <div class="content">
                <a href="infoajanvaraus.php"><img class="kuvake" src="icons/kalenterit1.png" alt="Taloyhtiön yhteisten tilojen varaaminen">
                <p class="icontext">Tilojen varaus </p></a>
            </div>
            <div class="content">
                <a href="lisapalvelut.php"><img class="kuvake" src="icons/lisäpalvelut1.png" alt="Apu ja remonttipalveluiden tilaus">
                <p class="icontext">Lisäpalvelut</p></a>
            </div>
            <div class="content">
                <a href="tiedotteet.php"><img class="kuvake" src="icons/tiedotteet1.png" alt="Taloyhtiön yhteisten tilojen varaaminen">
                <p class="icontext">Tiedotteet</p></a>
            </div>
            <div class="content">
                <a href="http://isannointi.tampuuri.fi/nettilomake/kontulanhuoltooy/sahkoinenilmoitus.aspx" target="_blank"><img class="kuvake" src="icons/vikailmoitus1.png" alt="Vikailmoitus">
                <p class="icontext">Vikailmoitus</p></a>
            </div>
            <div class="content">
                <a href="contact.php"><img class="kuvake" src="icons/yhteydenotto1.png" alt="Yhteydenottolomake">
                <p class="icontext">Ota yhteyttä</p></a>
            </div>
            <div class="content">
                    <a href="yhteystiedot.php"><img class="kuvake" src="icons/yhteystieto1.png" alt="Puhelinnumerot">
                    <p class="icontext">Yhteystiedot</p></a>
            </div>    
            </div> 
        </div>
           <!-- Footer -->
		<footer>
                        <!--<div class="content">
                            <section>
                                <h4>Sem turpis amet semper</h4>
                                <ul class="alt">
                                    <li><a href="#">Dolor pulvinar sed etiam.</a></li>
                                    <li><a href="#">Etiam vel lorem sed amet.</a></li>
                                    <li><a href="#">Felis enim feugiat viverra.</a></li>
                                    <li><a href="#">Dolor pulvinar magna etiam.</a></li>
                                </ul>
                            </section>
                            <section>
                                <ul class="plain">
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Instagram</a></li>
                                    <li><a href="#">>Github</a></li>
                                </ul>
                            </section>
                        </div>-->
                        <div class="foot">
                        <p> Kontulan Huolto - <a href="https://kontulanhuolto.fi/yhteystiedot" title="Yhteystiedot" target="_blank">Yhteystiedot</a></p>
                        <p>2019</p>
                    </div>
                    
        </footer>
    
<div id="id01" class="modal">
    <form class="modal-content animate" action="index.php" method="post">
    <div class="imgcontainer">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    <img src="icons/loginavatar.png" alt="Avatar" class="avatar">
    </div>
    <div class="logincontainerhidden">
    <p class="hidden">Väärä käyttäjänimi tai salasana!</p>
    </div>
    <div class="logincontainer">
    <label for="uname"><b>Käyttäjänimi</b></label>
    <input type="text" placeholder="Syötä käyttäjänimi" id="uname" name="username" required>

    <label for="psw"><b>Salasana</b></label>
    <input type="password" placeholder="Syötä salasana" id="psw" name="password" required>

    <button type="submit">Kirjaudu sisään</button>
    </div>

    <div class="logincontainer" style="background-color:#f1f1f1">
    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Peruuta</button>
    </div>
    </form>
</div>

<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
        modal.style.display = "none";
        }
    }
</script>
    
</body>
</html>