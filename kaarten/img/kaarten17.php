<link rel="stylesheet" href="stylekaarten.css" type="text/css">
<?php

//http://localhost/phpopdrachten/kaarten/img/kaarten17.php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['filecontent'])) {
        file_put_contents('opdracht17.txt', $_POST['filecontent']);
        print_r("file created");
    }
}
?>
<form method="post" action="kaarten17.php">
    <textarea placeholder="Type the filecontent" autofocus class="size17" name="filecontent"></textarea>
    <input type="submit" value="submit">
</form>











