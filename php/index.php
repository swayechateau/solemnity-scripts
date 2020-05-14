<?php
function listFolderFiles($dir)
{
    $ffs = scandir($dir);
    $array = [];
    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1) {

        echo '<ol>';
        echo '<li>';
        echo 'No Files or Folders Found!';
        echo '</li>';
        echo '</ol>';
        return;
    }
    echo '<ol>';
    foreach ($ffs as $ff) {
        echo '<li>';
        if (is_dir($dir . '/' . $ff)) {
            echo $ff . ' (dir)';
            
            listFolderFiles($dir . '/' . $ff);
        } else {
            //readfile($ff);
            echo $ff . ' (file)';
        }
        echo '</li>';
    }
    echo '</ol>';
}


//rename('./folder/swaye', 'sway');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (empty($_POST["folder"])) {
        listFolderFiles('./folder');
    } else {
      mkdir($_POST["folder"]);   
    }
   
   listFolderFiles('./');
}
/*
echo '<ol>';
foreach($ffs as $ff){

echo '<li>'.$ff;
if(is_dir($dir.'/'.$ff)) listFolderFiles($dir.'/'.$ff);
echo '</li>';
}
echo '</ol>';
 */
?>
<form methof="GET" action="index.php">
<input name="folder" type="text" />
<input type="submit" />

</form>
