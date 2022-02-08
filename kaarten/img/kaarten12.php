<?php

//http://localhost/phpopdrachten/kaarten/img/kaarten12.php
?>
<pre>
<?php
$alles = scandir("back");
$alles = array_splice($alles, 2);
//print_r($alles);

?>
</pre>
<ul>
<?php
for ($j = 0; $j < count($alles); $j++) {
?>
<li>
<!--    <a href="--><?php //echo "back/".$alles[$j] ?><!--"  target="iframe_a">--><?php //echo "back/".$alles[$j] ?><!--</a>-->
    <a href="?source=<?php echo $alles[$j] ?>"><?php echo str_replace(".png","",str_replace("back_","",$alles[$j])) ?></a>
</li>
<?php
}
?>
</ul>
<?php
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['source'])){
        ?>
        <iframe style="width: 100%; height: 100%" src="<?php echo "back/".$_GET['source'] ?>" name="iframe_a" title="oefening"></iframe>

<?php
}
}
?>













