<!doctype HTML>
<html>
    <head>
        <title> História do PlayStation </title>
        <meta charset = "utf-8">
        <meta name="author" content="Leonardo, Pedro e Lucas">
        <link rel="stylesheet" type="text/css" href="css/arquivo.css.css"> 
        <style>
        
        </style>
    </head>
    
<body>
    <?php include "menu.php"; ?>
  <p id="demo">Clique no botão para obter sua localização:</p>

<button id="botao" onclick="getLocation()">Clique aqui</button>

<div id="mapholder"></div>

<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script>

var x=document.getElementById("demo");

function getLocation()

  {

  if (navigator.geolocation)

    {

    navigator.geolocation.getCurrentPosition(showPosition,showError);

    }

  else{x.innerHTML="Geolocalização não é suportada nesse browser.";}

  }

 

function showPosition(position)

  {

  lat=position.coords.latitude;

  lon=position.coords.longitude;

  latlon=new google.maps.LatLng(lat, lon)

  mapholder=document.getElementById('mapholder')

  mapholder.style.height='250px';

  mapholder.style.width='500px';

 

  var myOptions={

  center:latlon,zoom:14,

  mapTypeId:google.maps.MapTypeId.ROADMAP,

  mapTypeControl:false,

  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}

  };

  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);

  var marker=new google.maps.Marker({position:latlon,map:map,title:"Você está Aqui!"});

  }

 

function showError(error)

  {

  switch(error.code) 


    {

    case error.PERMISSION_DENIED:

      x.innerHTML="Usuário rejeitou a solicitação de Geolocalização."

      break;

    case error.POSITION_UNAVAILABLE:

      x.innerHTML="Localização indisponível."

      break;

    case error.TIMEOUT:

      x.innerHTML="O tempo da requisição expirou."

      break;

    case error.UNKNOWN_ERROR:

      x.innerHTML="Algum erro desconhecido aconteceu."

      break;

    }

  }

</script>


    <center><h1 id="titulop">Seja Bem-Vindo ao site: História do PlayStation!</h1></center>
    
    <p><center>Informar sobre a história e desenvolvimento do console, tratando desde a sua criação até a atualidade. Exibindo notícias e artigos de curiosidades, jogos de último lançamento, comparações de consoles e a evolução da empresa Sony.</center></p><br>
    <br>
    
    
    <iframe id="video" width="560" height="315" src="https://www.youtube.com/embed/5kuvrlLNzKk" frameborder="0" allowfullscreen></iframe>
    
    <a href="pagsecundarias/p4.html">
    <img id="tombhome" src="Imagens/tombraider.jpg" alt="tombraider">
        </a>
    <a href="pagsecundarias/p6.html">
    <center><img id="gta" src="Imagens/gta5.jpg" alt="gta5"></center>
        </a>
    
    <?php include "propaganda.php"; ?>

        <footer>
				<?php include "footer.php"; ?>
				</footer>
    
    </body>
    
    </html>

    