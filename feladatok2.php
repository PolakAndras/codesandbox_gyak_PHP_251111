<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Feladatok2</h4>
    <hr>
    <p>1. feladat – Dinamikus lista létrehozása űrlap alapján <br>
Cél: Tömb feltöltése űrlapból.<br>
Használat:<br>
Felhasználók, teendők, hozzászólások, bejegyzések – bármilyen lista alapja az, hogy a felhasználó adatokat küld, amit tömbbe (vagy adatbázisba) tárolunk.
Ez az alapja minden CRUD (Create-Read-Update-Delete) típusú alkalmazásnak.</p>
<p>Feladat: <br>
Adj hozzá új elemeket egy $teendok tömbhöz és jelenítsd meg a listát a beküldés után.</p>

<?php 

$teendok = [
    "delelott" => [
        "setalas", "uszas", "biciklizes"
    ],
    "delutan" => [
        "olvasas", "tanulas", "munka"
    ],
    "este" => [
        "mozi", "film", "csucsu"
    ] 
];



if( isset( $_POST['kuldes'] ) ) {
//print('mukodik');

    if( isset( $_POST['delelotTask'] ) ) {
        $teendok["delelott"][] = $_POST['delelotTask'];
    };

    if( isset( $_POST['delutanTask'] ) ) {
        $teendok["delutan"][] = $_POST['delutanTask'];
    };

    if( isset( $_POST['esteTask'] ) ) {
        $teendok["este"][] = $_POST['esteTask'];
    };

};


foreach ($teendok as $kulcs => $tasks) {
    print($kulcs . ":<br>");
    foreach ($tasks as $task) {
        print("- " . $task . "<br>");
    }
};

?>


<p>Űrlapból lista készítése</p>

<form method="post">
  <label>Új teendő délelőttre: <input type="text" name="delelotTask"></label> <br>
  <label>Új teendő délutánra: <input type="text" name="delutanTask"></label> <br>
  <label>Új teendő estére: <input type="text" name="esteTask"></label> <br>
  <button type="submit" name="kuldes">Hozzáadás</button>
</form>

<div style="text-align: center; margin-top: 10px">
<b> ADATBÁZIS VAGY SESSION NÉLKÜL NEM FOG ELMENTŐDNI AZ OLDAL FRISSITÉSE VAGY KÜLDÉS UTÁN A TÖMBBE BEÍRT ADAT </b>
</div>
<hr>

<p>2. feladat – Egyszerű számológép

Cél: Űrlapadatok feldolgozása műveletekkel. <br>
Használat:<br>
Szinte minden webalkalmazásban van valamilyen logikai számítás (összeadás, árkalkuláció, átlag, pontszám).
Ez a feladat megmutatja, hogyan kezelhetők a bejövő számok biztonságosan.</p>
<p>Feladat: <br>
A két szám alapján végezd el a kiválasztott műveletet és jelenítsd meg az eredményt.</p>
<p>Számológép</p>

  <form method="post">
    <input type="number" name="a">
    <select name="muvelet">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
    </select>
    <input type="number" name="b">
    <button type="submit" name="szamol">Számol</button>
  </form>

<?php 

if ( isset( $_POST['szamol'] ) ) {
    //print($_POST['muvelet']);-->mukodik
    $muvelet = $_POST['muvelet']; 
    $eredmeny = 0;

    if($muvelet == "+") {
        $eredmeny = $_POST['a'] + $_POST['b'];
    } else if($muvelet == "-")  {
        $eredmeny = $_POST['a'] - $_POST['b'];
    } else if($muvelet == "*") {
        $eredmeny = $_POST['a'] * $_POST['b'];
    } else if($muvelet == "/"){
        if ($_POST['a'] == 0 || $_POST['b'] == 0) {
            print("0-val nem osztunk!");
            exit; //Ki kell léptetni!!!!!
    }
        $eredmeny = $_POST['a'] / $_POST['b'];
        } ;



    print($_POST['a'] . $muvelet . $_POST['b'] . "=" . $eredmeny );
};
?>
<hr>
<p>3. feladat – Tömb szűrése feltétel alapján<br>
Cél: foreach és if kombinálása. <br>
Használat:
Terméklista szűrés (pl. csak „akciós” termékek), felhasználók kor szerint, státusz alapján.<br>
Ez minden adatlistát kezelő rendszerben jelen van. </p>
<p>Feladat: <br>
Legyen egy $diakok tömb, amely minden diák nevét és pontszámát tartalmazza. <br>
Írasd ki csak azokat, akik 50 pont felett teljesítettek.</p>

<?php 

$diakok = [
    "Peti" => 40,
    "Gizi" => 24,
    "Julcsa" => 48,
    "Hedvig" => 11,
    "Elemér" => 6 
];

//print_r($diakok)

?>

<form method="post">
  <label>Add meg a pontszámot ami felett átment a diák:</label> 
  <input type="number" name="megadottPontszam"> 
  <button type="submit" name="atment">Küld</button>
</form>

<?php
$atmentdiak = [];

if ( isset( $_POST['atment'] ) ) {
foreach($diakok as $diak => $pontszam) {

    if( $pontszam >= $_POST['megadottPontszam'] ) {
        $atmentdiak[] =  $diak . " : " .  $pontszam;
    }
}

// print_r($atmentdiak);
// exit;
    if (!empty($atmentdiak)) {
        echo "<h3>Átment diákok:</h3>";
        echo "<ul>";
        foreach ($atmentdiak as $diak) {
            print ("<li>" . $diak . "</li>");
        }
        echo "</ul>";
    } else {
        print("Senki sem ment át.");
    }


}



?>
</body>
</html>