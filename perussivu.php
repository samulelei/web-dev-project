<!DOCTYPE HTML>
<html>
    <head>
        <title>Kontulan Huolto</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" /> <!--mikä tämä on?-->
        <meta name="keywords" content="huolto, palvelu" /> <!--näinkö avainsanoja?-->
        <link rel="icon" href="icons/ikoni.jpg"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/huoltostyle.css" />
        
    </head>

    <body>
<!--navipalkki-->
        <header> <!--tässä id header, ei toimi classina?-->
            <a class="logo" href="index.html"><i class="fa fa-home fa-2x "></i>
            <p class="hide-small">Etusivulle</p></a>
            <div class="center">
                    <img src="icons/ikoni.jpg" alt="logo" height="40px">
                    <strong class="hide-small center">Kontulan huolto</strong>
            </div>
            <a href="#" class="logo" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                <i class="fa fa-sign-in fa-2x"></i><p class="hide-small">Kirjaudu sisään</p></a>
        </header>
<!--henkilötiedot-->
        <section id="astietotausta">
            <div>
            <p class="astiedot">Mikki Hiiri<br />
            Paratiisitie 13 a 99, 2345667 Ankkala<br/>
            Roopen raha-asuntoyhtiö <a class="linkki" href="https://www.google.com/maps">(Kartta taloyhtiöön)</a></p>
            </div>
        </section>
<!--kirjoitettava osa-->
        <section class="tekstipohja">
<!--tämä header muille sivuille kuin indexiin-->
        <div>
            <h2>Sem turpis amet semper</h2>
            <p>In arcu accumsan arcu adipiscing accumsan orci ac. Felis id enim aliquet. Accumsan ac integer lobortis commodo ornare aliquet accumsan erat tempus amet porttitor.</p>
        </div>
            <div class="kuvakeasettelu">
            
            </div>
        </section>
           <!-- Footer -->
		<footer>
                        <div class="foot">
                        <p> Kontulan Huolto - <a href="https://kontulanhuolto.fi/yhteystiedot" title="Yhteystiedot" target="_blank">Yhteystiedot</a></p>
                        <p>2019</p>
                    </div>
                    
        </footer>
    

    </body>



</html>