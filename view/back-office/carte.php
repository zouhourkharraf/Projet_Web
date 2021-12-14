<?php

$lieu='hammamet';

if(isset($_GET['lieu']))
{
    $lieu=$_GET['lieu'];
}

if($lieu=='hammamet')
        {$lat=36.4;
            $lng=10.616;}
         if($lieu=='tunis')
         {$lat=36.818;
             $lng=10.165;}
         if($lieu=='tabarka')
         {$lat=36.954;
              $lng=8.757;}

        if($lieu=='Béja')
        {$lat=36.715;
            $lng=9.201;}

        if($lieu=='Sousse')
        {$lat=35.802;
            $lng=10.663;}

        if($lieu=='jendouba')
        {$lat=36.484;
            $lng=8.789;}

        if($lieu=='aindrahem')
        {$lat=36.773;
            $lng=8.696;}
        if($lieu=='Nabeul')
        {$lat=36.452;
            $lng=10.729;}
        if($lieu=='kef')
        {$lat=36.171;
            $lng=10.746;}

        /////////////////////////////////////////////////////////////////
        if($lieu=='monastir')
        {$lat="35.739";
            $lng="10.798";}
        if($lieu=='kelibia')
        {$lat=36.879;
            $lng=11.004;}
          if($lieu=='korba')
          {$lat=36.605;
              $lng=10.798;}
           if($lieu=='Sfax')
           {$lat=34.723;
              $lng=10.335;}

           if($lieu=='mahdia')
           {$lat=35.487;
               $lng=10.962;}

        if($lieu=='tozeur')
        {$lat=33.913;
            $lng=8.111;}

        if($lieu=='tataouine')
        {$lat=31.731;
            $lng=9.770;}

        if($lieu=='jerba')
        {$lat=33.773;
            $lng=10.885;}

        if($lieu=='bizerte')
        {$lat=37.274;
            $lng=9.873;}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
    <style type="text/css">
        #map{ /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            height:530px;
        }
    </style>
    <title>Carte</title>
</head>
<body>
<div id="map">
    <!-- Ici s'affichera la carte -->
</div>

<!-- Fichiers Javascript -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>

<script type="text/javascript">
    // On initialise la latitude et la longitude
    var lati = 36.4;
    var longi = 10.616;
    var macarte = null;

        lati =<?php echo $lat ?>    //GetParam('lat');
        longi =<?php echo $lng ?>//('lng');
        macarte = L.map('map').setView([lati, longi], 11);
        // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
        L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            // Il est toujours bien de laisser le lien vers la source des données
            attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
            minZoom: 1,
            maxZoom: 20
        }).addTo(macarte);
        var marker = L.marker([lati, longi]).addTo(macarte);


</script>
</body>
</html>