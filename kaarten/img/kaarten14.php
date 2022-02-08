<link rel="stylesheet" href="stylekaarten.css" type="text/css">
<?php

//http://localhost/phpopdrachten/kaarten/img/kaarten14.php

$content = file_get_contents("content.txt");
//$replacedcontent = str_replace(".png","",$content);
//print_r($replacedcontent);

?>
<textarea class="size" disabled><?php echo $content ?></textarea>

<!--htmlentities()-->



<!--<input class="size" type="text" name="Rcontent" disabled value="--><?php //echo $content ?><!--">-->


<?php
//if ($_SERVER['REQUEST_METHOD'] == "GET") {
//    if (isset($_GET['source'])){
//        ?>
<!--        <iframe style="width: 100%; height: 100%" src="--><?php //echo "back/".$_GET['source'] ?><!--" name="iframe_a" title="oefening"></iframe>-->
<!---->
<!--        --><?php
//    }
//}
//?>



