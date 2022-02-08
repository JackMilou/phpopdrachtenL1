<link rel="stylesheet" href="stylekaarten.css" type="text/css">
<?php

//http://localhost/phpopdrachten/kaarten/img/kaarten15.php

$content = file_get_contents("kaarten15.php");
//$replacedcontent = str_replace(".png","",$content);
//print_r($replacedcontent);

?>
<textarea class="size15" disabled><?php echo $content ?></textarea>

<!--htmlentities()-->



<!--<input class="size" type="text" name="Rcontent" disabled value="--><?php //echo $content ?><!--">-->





