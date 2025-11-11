<html>

<head>
    <title>PHP Starter</title>
</head>

<body>
<p>1. feladat – Egyszerű kiíratás és változók</p>

<p>Cél: PHP bevezetés, változók és echo használata.
 Használat: Szövegek, számok, és változók kiíratása HTML-ben – minden PHP projekt alapja. <hr>
Feladat:
Hozz létre három változót ($nev, $kor, $varos) és írasd ki őket egy mondatban, pl.:
“Sziasztok, András vagyok, 28 éves és Budapesten élek.”</p> 
<!-- 1_feladat.php -->
<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
  <p>1 és 2. Megoldás</p>

  <?php
  $nev = "András";
  $kor = 28;
  $varos = "Budapest";

  $adatokAssoc = [
    "nev" => "András",
    "kor" => 28,
    "varos" => "Budapest"
  ]; 

  echo('Sziasztok, ' . $nev . ' vagyok, ' . $kor . ' éves és ' . $varos . ' élek!');
  ?> <br>   
  <?php
  print_r($adatokAssoc); ?> <br> <?php
  print('Hali, ' . $adatokAssoc['nev'] . ' vagyok, ' . $adatokAssoc['kor']  . ' éves és ' . $adatokAssoc['varos'] . ' élek!')
  ?>
<hr>
<p>3. feladat – Egyszerű űrlap (GET) <br>
Cél: $_GET tömb használata. <br>
 Használat: Adatbekérés URL-ből, keresőmezők, szűrők alapja. <br>
Írasd ki a felhasználó nevét az űrlap beküldése után. <br>
Pl.: „Helló, András!”</p>

<p>GET űrlap gyakorlása</p>

  <form method="get">
    <label>Név: <input type="text" name="nev3"></label>
    <button type="submit">Küldés</button>
  </form>

  <?php
  $get = $_GET;

  if ( isset($get['nev3']) ) {
    print('Helló ' . $nev . ' látod az url-ben hogy ott vagy? Remek!');
  } else {
    print('Kérlek írj valamit a Név mezőbe és küld el');
  }
  ?>

</body>
</html>
</body>

</html>