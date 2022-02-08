<link rel="stylesheet" href="stylekaarten.css" type="text/css">
<?php

//http://localhost/phpopdrachten/kaarten/img/kaarten16.php

$content = file_get_contents("content.txt");
file_put_contents("kopie.txt", $content);
//$replacedcontent = str_replace(".png","",$content);
//print_r($replacedcontent);

echo "kopie.txt created"
?>
<!--<textarea class="size15" disabled>--><?php //echo $content ?><!--</textarea>-->











