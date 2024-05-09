<?php
// esta url es despues de poner el comando curl en la terminal , se copeea del enlace git
const API_URL = "https://whenisthenextmcufilm.com/api";
#inicialisar una nue sesion  de cURL; ch = cURL handle  
$ch = curl_init(API_URL);
// INDICAR  que queremos reibir el resltado de la peticion  y no mostrala por pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* ejecutar la peticion
y guardamos el resultado
*/
$result = curl_exec($ch); 

// una alternativa seria utilizar file_get_contents
//$result = file_get_contents(API_URL); // si solo quieres hacer un get  de la api


$data = json_decode($result, true);

curl_close($ch);


?> 

<head>
    <meta charset="UTF-8"/>
    <title>la proxima pelicula de marvel</title>
    <meta name="description" content="la proxima pelicula marvel"/>
    <meta name ="viewport" content ="width=device-width, initial-scale=1.0" />
<!-- Centered viewport --> 
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"/>

  </head>
<main>
    <section> 
    <img 
    src ="<?= $data["poster_url"]; ?>" width=" 200" alt="Poster de <?= $data["title"]; ?>"
    style ="border-radius: 20px"/>
    </section>
  <hgroup>
    <h3><?= $data["title"]; ?> se estrena en <?= $data["days_until"]; ?>dias</h3>
    <p>fecha de estreno: <?= $data["release_date"]; ?></p>
    <p>la siguiente pelicula es : <?= $data["following_production"]["title"];?></p>
</hgroup>
</main>

<style>
    :root {
        color-scheme: light dark;
    }
    body {
        display: grid;
        place-content: center;
        background-color: black;
        color:blue;
    }   
</style>