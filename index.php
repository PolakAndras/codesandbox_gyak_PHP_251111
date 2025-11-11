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
    print('Helló ' . $get['nev3'] . ' látod az url-ben hogy ott vagy? Remek!');
  } else {
    print('Kérlek írj valamit a Név mezőbe és küld el');
  }
  ?>
<hr>
<p>4. feladat – POST űrlap <br>

Cél: $_POST használata. <br>
Használat: Adatbekérés biztonságos módon (pl. bejelentkezés, regisztráció).</p>
<p>Beküldés után írasd ki, hogy a megadott email címmel próbált bejelentkezni.</p>
</body>

<form method="post">
    <label>Email: <input type="email" name="email"></label><br>
    <label>Jelszó: <input type="password" name="jelszo"></label><br>
    <button type="submit">Bejelentkezés</button>
  </form>

  <?php
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   $keys = ['email', 'jelszo'];

    foreach( $keys as $item ) {
       $$item = $_POST[$item];
    }

    $errors = false;

    if( !filter_var($email, FILTER_VALIDATE_EMAIL)  ) {
      print ("Az email cím formátuma nem megfelelő!");
    } 

    if ( mb_strlen($jelszo) < 3 && mb_strlen($jelszo) > 10 ) {
      print ("A jelszavaknak 3 és 10 karakter között kell lennie");
    }

      print ("Az email címed: " . $email);
      print ("A jelszavad: " . $jelszo);
    
  }


  ?>

</html>