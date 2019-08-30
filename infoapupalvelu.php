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
<div class="tekstipohja2">
    <div class="palkki">
        <a href="lisapalvelut.php" class="backbutton"><i class="fa fa-arrow-circle-left 2x"></i> Takaisin</a>
    </div>
<!--tämä header muille sivuille kuin indexiin-->
        <div>
            <h2>Arjen apupalvelut</h2>
        </div>
        <div class="container">
            <div class=tekstialue>
                <p>Arki vaatii joskus apua, sen takia Kontulan Huolta auttaa arjen askareissa. Arjen apupalvelut tuovat helpotusta pienissä asioissa, kuten lamppujen vaihtaminen.</p>
            </div>
            
            <h3>Hinnasto</h3>
<table>
  <tr>
    <th>Lisäpalvelu</th>
    <th>Hinta</th>
    <th>Lisätietoja</th>
  </tr>
  <tr>
    <td>Kodin siivoaminen</td>
    <td>10 euroa/tunti</td>
    <td>Kontulan Huollon ammattisiivoojat auttavat sinua siivouksessa.</td>
  </tr>
  <tr>
    <td>Hyllynkokoaminen</td>
    <td>10 euroa</td>
    <td>Huonekalujen kokoamiseen auttavia käsiä.</td>
  </tr>
  <tr>
    <td>Koiran ulkoiluttaminen</td>
    <td>10 euroa/kerta</td>
    <td>Lemmikkisi pääsee lenkille.</td>
  </tr>
  </table>

  <form action="apupalvelu.php">
    <br><br>
    <input type="submit" value="Tilaa arjen apupalvelu!">
</form>
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