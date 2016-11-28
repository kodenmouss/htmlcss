<!DOCTYPE html>
<html lang="en">
<head>
  <title>titre onglet</title>
  <meta charset="utf-8">
  <!-- voir les meta et avoir un menu en fonction du domaine du sujet par ex video ou electro et le titre de la page pour etre genere par php -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="Sons">
  <meta name="keywords" content="media">
  <!-- le link de la page css qui sera dans le mm dossier -->
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- au lieu d'utiliser un div, j'utilise header qui est censé etre mon en tete de page -->
  <header>
    <h1>BANIERE</h1>
  </header>
  <!-- louais a la base j'ai un nav class et ca colle le texte du content tout en ba s c pas normal -->
  <nav class="col-sm-2 nav">
    <?php
    include("index.php");
    ?>
  </nav>


    <div class="col-sm-10 content">
    <!-- le h1 devra etre mis en gros et au milieu de la page -->

<h1> titre page</h1>


<!-- <a href="h">site officiel </a> -->
<!-- <code> cela un code de dingue </code> -->
<!-- <img src="pic_mountain.jpg" alt="Mountain View" style="width:304px;height:228px;"> -->
<!-- <ol>
  <li> comme la </li>
  <li> et la </li>
</ol>  -->
<!-- list num <ul> <li> ... </li> </ul>  -->

<h2> description</h2>


<p>paragraphes </p>


  <h2>encore un titre</h2>

<p> blabla images des href
</p>



  <h3> un sous tire lege </h3>

  <p> encore un blabla ou on peut avoir des code </p>

</div>
  </div>
</div>
</body>
</html>
