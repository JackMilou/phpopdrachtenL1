<link rel="stylesheet" href="stylekaarten.css" type="text/css">
<?php

//http://localhost/phpopdrachten/kaarten/img/kaarten18.php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['filecontent'])) {
        file_put_contents('opdracht17.txt', $_POST['filecontent']);
        print_r("file created");
    }
}
$content = file_get_contents('opdracht17.txt');
?>
<form method="post" action="kaarten18.php">
    <textarea placeholder="Type the filecontent" autofocus class="size17" name="filecontent"><?php echo $content ?></textarea>
    <input type="submit" value="submit">
</form>











