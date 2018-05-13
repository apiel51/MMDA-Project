<?php
//$filename = 'https://www.w3schools.com/html/mov_bbb.mp4';

//get the current working directory and add the getID3 path
$cwd = getcwd();
require_once($cwd.'\getID3-master\getid3\getid3.php');


// Copy remote file locally to scan with getID3()
$remotefilename = 'https://tutorialehtml.com/assets_tutorials/media/Loreena_Mckennitt_Snow_56bit.mp3';
if ($fp_remote = fopen($remotefilename, 'rb')) {
    @$localtempfilename = tempnam('/tmp', 'getID3');
    if ($fp_local = fopen($localtempfilename, 'wb')) {
        while ($buffer = fread($fp_remote, 8192)) {
            fwrite($fp_local, $buffer);
        }
        fclose($fp_local);
        // Initialize getID3 engine
        $getID3 = new getID3;
        $fileinfo = $getID3->analyze($localtempfilename);
        unlink($localtempfilename);
    }
    fclose($fp_remote);
  }

 ?>
