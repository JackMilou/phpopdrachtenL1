<link rel="stylesheet" href="styleindex.css" type="text/css">
<?php
//http://localhost/phpopdrachten/index.php
#fafad2
?>
<div class="textstyle">
    <ul>
        <il class="op123">
            <?php
            echo "Hallo World";
            echo "<br>";


            ?>
        </il>
        <il>
            <?php
            $mynumber = 8;
            $firstbool = true;
            if ($mynumber > 0) {
                echo "getal grooter dan 0";
                echo "<br>";
                echo $firstbool;
                echo "<br>";
            }
            ?>
        </il>
        <il>
            <?php
            if ($mynumber > 0 and $mynumber < 10) {
                echo "input valid";
                echo "<br>";

                if ($mynumber > 6) {
                    echo "voldoende";
                } else {
                    echo "onvoldoende";
                }
                echo "<br>";
            }
            ?>
        </il>
    </ul>
</div>
<?php
// was op 1 2 en 3


for ($i = 1; $i <= 10; $i) {
    echo $i;
    echo " ";
    $i = $i + 2;
}

echo "<br>";

$tafelgetal = 6;
for ($j = $tafelgetal; $j <= $tafelgetal * 10; $j) {
    echo $j;
    $j = $j + $tafelgetal;
    echo " ";
}
echo "<br>";

$n = 1;
$m = 1;
$p = 2;
echo $n . ", ";
echo $m . ", ";
for ($i = 1; $p < 1000; $i++) {
    echo $p . ", ";
    $m = $n;
    $n = $p;
    $p = $m + $n;
}
echo "<br>";
// was op 4 5 en 6

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['collorcode'])) {

        ?>
        <body style="background-color:<?php echo $_GET['collorcode']; ?>">';
        </body>
        <?php
    }
}
?>
<form method="get" action="index.php">
    collorcode: <input type="text" name="collorcode" title="Collorcode"><br>
    <input type="submit" value="Verzenden">
</form>
<br>
<br>


<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //print_r($_POST);
    for ($i = 0; $i < $_POST['age']; $i++) {
        print_r($_POST['name']);
        echo "<br>";
    }
}
?>
<form method="post" action="index.php">
    Name: <input type="text" name="name" title="name"><br>
    age: <input type="text" name="age" title="age"><br>
    <input type="submit" value="Verzenden">
</form>
<br>

<?php


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['tablecount'])) {
        for ($j = $_GET['tablecount']; $j <= $_GET['tablecount'] * 10; $j) {
            echo $j;
            $j = $j + $_GET['tablecount'];
            echo " ";
        }
    }
}
?>

<form method="get" action="index.php">
    tablecount: <input type="text" name="tablecount" title="tablecount"><br>
    <input type="submit" value="Verzenden">
</form>
<br>

<!--op 7 8 en 9-->

