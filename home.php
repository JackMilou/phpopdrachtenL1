<link rel="stylesheet" href="stylehome.css" type="text/css">
<?php
//http://localhost/phpopdrachten/home.php

//$contentF18 = file_get_contents('kaarten\img\kaarten18.php');
//print_r($contentF18);
$error = "";
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['folder'])) {
        $folder = $_GET['folder'];
        $error = checkFolder($folder);
        if ($error != "") {
//         echo $error;
            $folder = ".";
        }
    } else {
        $folder = ".";
    }

    if (isset($_GET['fileName'])) {
        $fileName = $_GET['fileName'];
    } else {
        $fileName = "";
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //echo "in post ";
    if (isset($_POST['folder'])) {
        $folder = $_POST['folder'];
        //echo "change folder ";
        //echo $folder;
        $error = checkFolder($folder);
        if ($error != "") {
//            echo $error;
            $folder = ".";
        }
    } else {
        $folder = ".";
    }

    if (isset($_POST['fileName'])) {
        $fileName = $_POST['fileName'];
        //echo "in post name ";
        //echo $fileName;
    } else {
        $fileName = "";
    }
    if ($error == "") {
        $fullFileName = $folder . "/" . $fileName;
        if (isset($_POST['filecontent'])) {
            file_put_contents($fullFileName, $_POST['filecontent']);
            //print_r("file created");
        }
    }
    unset($_POST);
    header("Location: " . $_SERVER['PHP_SELF'] . '?folder=' . $folder . '&fileName=' . $fileName);
}


$alles = scandir($folder, SCANDIR_SORT_NONE);
$alles = array_splice($alles, 1);

$folders = explode("/", $folder);
?>
</head>
<body>

<div class="container">
    <div class="grid-container">
        <div class="item1"><h1 class="colorRed">Home </h1>
            <h1> ></h1><?php
            $visitedfolders = ".";
            for ($i = 1; $i < count($folders); $i++) {
                $visitedfolders .= "/".$folders[$i];
                echo "<a href='home.php?folder=$visitedfolders'><h1 class='folder'>" . $folders[$i] . "</h1></a>";
                echo "<h1> > </h1>";
            } ?></div>
        <div class="item1b"><?php echo $error ?></div>
        <div class="item2"><h1>Mappen/Bestanden</h1>
            <div class="sub-grid-container">
                <div class="sub-grid-item1">
                    <div class="sub-grid-item2">
                        <ul>
                            <?php
                            for ($j = 0; $j < count($alles); $j++) {
                                mapRow($folder, $alles[$j]);
                            }
                            ?>
                        </ul>
                        <!--            <p><img class="icon-image" src="file-svgrepo-com.svg">index.php</p>-->
                        <!--            <p><img class="icon-image" src="folder-svgrepo-com.svg">kaarten</p>-->
                        <!--            <p><img class="icon-image" src="picture-files-and-folders-svgrepo-com.svg">img</p>-->

                    </div>
                </div>
            </div>
        </div>
        <div class="item5"><h1>Inhoud</h1>
            <?php
            inhoudFile($folder, $fileName);
            ?>

        </div>
    </div>
    <div>

</body>

<?php

function mapRow($folder, $fileName)
{
    if ($folder == "." && $fileName == "..") {
        return;
    }
    echo '<li>';
    //echo $folder. $fileName;
    $fullFileName = $folder . "/" . $fileName;


    $contentType = mime_content_type($fullFileName);


    $iconfile = "files-document-svgrepo-com.svg";
    if ($contentType == "directory") {
        $iconfile = "folder-svgrepo-com.svg";
        //echo $iconfile;
        if ($fileName == "..") {
            $lastpos = strrpos($folder, "/");
            $newfolder = substr($folder, 0, $lastpos);
            echo '<a href="?folder=' . $newfolder . '">';
        } else {
            echo '<a href="?folder=' . $folder . "/" . $fileName . '">';
        }
    }
    if (strpos($contentType, "image") !== false) {
        $iconfile = "picture-files-and-folders-svgrepo-com.svg";
        //echo $iconfile;
        echo '<a href="?folder=' . $folder . '&fileName=' . $fileName . '">';
    }
    if (strpos($contentType, "text") !== false) {
        $iconfile = "file-svgrepo-com.svg";
        //echo $iconfile;
        echo '<a href="?folder=' . $folder . '&fileName=' . $fileName . '">';
    }


    echo '<img class="icon-image" src="' . $iconfile . '">';
    echo "<span>" . $fileName . "</span>";
    echo '</a>';
    echo '</li>';


}

function inhoudFile($folder, $fileName)
{
    if ($fileName == "") {

    } else {
        $fullFileName = $folder . "/" . $fileName;

        $fileSize = filesize($fullFileName);
        //echo filetype($fullFileName);
        $contentType = mime_content_type($fullFileName);
        $fileTime = filemtime($fullFileName);

        if (is_writable($fullFileName)) {
            $writable = "Ja";
        } else {
            $writable = "Nee";
        }
        ?>
        <table class="opmaakTable">
            <tr>
                <td>
                    Bestand:
                </td>
                <td>
                    <?php echo $fileName ?>
                </td>
            </tr>
            <tr>
                <td>
                    Grote:
                </td>
                <td>
                    <?php echo humanFileSize($fileSize) ?>
                </td>
            </tr>
            <tr>
                <td>
                    Schrijfbaar:
                </td>
                <td>
                    <?php echo $writable ?>
                </td>
            </tr>
            <tr>
                <td>
                    Laatst aangepast:
                </td>
                <td>
                    <?php setlocale(LC_ALL, 'nld_nld');
                    echo strftime('%e %B %Y %X ', $fileTime); ?>
                </td>
            </tr>
        </table>
        <div class="content">
            <?php if (strpos($contentType, "text") !== false) {
                $content = file_get_contents($fullFileName);
                ?>
                <form method="post" action="home.php">
                    <input type="hidden" name="folder" value="<?php echo $folder ?>"/>
                    <input type="hidden" name="fileName" value="<?php echo $fileName ?>"/>
                    <textarea placeholder="" autofocus class="size17"
                              name="filecontent"><?php echo htmlentities($content) ?></textarea>
                    <input type="submit" value="submit">
                </form>
                <?php
            }
            if (strpos($contentType, "image") !== false) {
                ?>
                <div>
                    <img class="fileimage" src="<?php echo $fullFileName ?>">
                </div>
                <?php
            }
            ?>
        </div>

        <?php
    }
}

function humanFileSize($size, $unit = "")
{
    if ((!$unit && $size >= 1 << 30) || $unit == "GB")
        return number_format($size / (1 << 30), 2) . "gB";
    if ((!$unit && $size >= 1 << 20) || $unit == "MB")
        return number_format($size / (1 << 20), 2) . "mB";
    if ((!$unit && $size >= 1 << 10) || $unit == "KB")
        return number_format($size / (1 << 10), 2) . "kB";
    return number_format($size) . " bytes";
}

function checkFolder($folder)
{
    $folders = explode("/", $folder);
    if ($folders[0] != ".") {
        return "Fout pad ingevuld probeer opnieuw";
    } else {
        for ($i = 0; $i < count($folders); $i++) {
            if ($folders[$i] == "..") {
                return "Fout pad ingevuld probeer opnieuw";
            }
        }
    }
    if (is_dir($folder)) {
        return "";
    } else {
        return "Fout pad ingevuld probeer opnieuw";
    }
}

?>