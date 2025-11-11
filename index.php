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
  

  <?php
  $nev = "András";
  $kor = 28;
  $varos = "Budapest";

  $adatokAssoc = [
    "nev" => "András",
    "kor" => 28,
    "varos" => "Budapest"
  ]; 

  echo('Sziasztok, ' . $nev . ' vagyok, ' . $kor . ' éves és ' . $varos . '-en élek!');
  ?> <br>   
  <?php
  print_r($adatokAssoc); ?> <br> <?php
  print('Hali, ' . $adatokAssoc['nev'] . ' vagyok, ' . $adatokAssoc['kor']  . ' éves és ' . $adatokAssoc['varos'] . '-en élek!')
  ?>
<hr>
<p>2. feladat – Egyszerű űrlap (GET) <br>
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
    print('Helló ' . $get['nev3'] . ' látod az url-ben hogy ott vagy? Remek!');
  } else {
    print('Kérlek írj valamit a Név mezőbe és küld el');
  }
  ?>
<hr>
<p>3. feladat POST űrlap <br>

Cél: $_POST használata. <br>
Használat: Adatbekérés biztonságos módon (pl. bejelentkezés, regisztráció).</p>
<p>Beküldés után írasd ki, hogy a megadott email címmel próbált bejelentkezni.</p>




  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $keys = ['email', 'jelszo'];

    foreach( $keys as $item ) {
       $$item = $_POST[$item];
    }

    $errors = [];

    //if( !filter_var($email, FILTER_VALIDATE_EMAIL)  ) {
      if (mb_strlen($email) < 10 || mb_strlen($email) > 10) { //csak tesztelés miatt, hogy benne marad-e az érték
      $errors['email'] = "Az email cím formátuma nem megfelelő!";
    } 

    if ( mb_strlen($jelszo) < 3 || mb_strlen($jelszo) > 10 ) {
      $errors['password'] = "A jelszavaknak 3 és 10 karakter között kell lennie";
    }

    if ( !empty($errors) ){
        echo("<ul>");
        foreach( $errors as $kulcs => $error) {
          echo("<li>");
          print_r($error);
          echo("</li>");
        } 
        echo("</ul>");
         } else {
        print ("Az email címed: " . $email);
        echo("<br>");
        print ("A jelszavad: " . $jelszo);
    }
  }
  ?>

<form method="post">
    <label>Email: <input type="email" name="email" value="<?php print $email ?? ""; ?>"></label><br>
    <label>Jelszó: <input type="password" name="jelszo"></label><br>
    <button type="submit">Bejelentkezés</button>
  </form>
  <hr>

  <p>4. feladat – Tömb + űrlap kombináció <br>

 Tömb adatok megjelenítése felhasználói választás alapján. <br>
 Használat: Szűrők, választók, termékkategóriák listázása.</p>
 <p>Feladat:
Ha a felhasználó választ egy gyümölcsöt, jeleníts meg róla egy mondatot (pl. „A banán sárga.”).</p>
  

<?php

$mondat = [
  "alma" => "Az alma piros",
  "banan" => "A banán sárga",
  "narancs" => "A narancs narancssárga",
  "szilva" => "A szilva lila"
];

//print_r($mondat["banán"]);
//print($mondat['szilva'])
?>


<form method="get">
    <label>Válassz gyümölcsöt:
      <select name="valasztott">
        <option value="alma">Alma</option>
        <option value="banan">Banán</option>
        <option value="szilva">Szilva</option>
        <option value="narancs">Narancs</option>
      </select>
    </label>
    <button type="submit" name="elkuldve">Mutasd</button>
  </form>

<?php 
if ( isset($_GET['elkuldve']) ) {
  //print("hali"); -> mukodik
  //print ($_GET['valasztott']); //--> kiirja a kivaslztott options
  print("Amit kiválasztottál az a ". $_GET['valasztott'] . ", és a mondat: "  . $mondat[$_GET['valasztott']]);
}
?>
<hr>
<p>5. feladat – Tömb feldolgozása függvénnyel <br>
Cél: Tömbök és függvények kombinálása. <br>
Használat: Adatok feldolgozása, szűrés, összegzés.</p>
<p>Írj egy függvényt, ami egy számokat tartalmazó tömböt kap, és visszaadja az összegüket.
Írasd ki az eredményt.</p>

<?php 

$tomb1 = [4,12,11,10];


function osszeg($tomb) {
  $result = 0;
  foreach($tomb as $tombelem) {
    $result += $tombelem ;
  }
  print($result);
}

osszeg($tomb1);
echo("<br>");
osszeg([3,12]);
?>


</body>
</html>