<?php

//http://localhost/phpopdrachten/kaarten/img/kaarten10.php
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
<li>    <a href="<?php echo "back/".$alles[$j] ?>"  target="iframe_a"><?php echo "back/".$alles[$j] ?></a></li>
<?php
}
?>
</ul>

<iframe style="width: 100%; height: 100%" src="<?php echo "back/".$alles[0] ?>" name="iframe_a" title="oefening"></iframe>







