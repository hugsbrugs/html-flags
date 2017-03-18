<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Country Flags</title>
    <link href="flags/flags.css" rel="stylesheet">
</head>
<body>

<style type="text/css">
    .flag-margin{
        margin: 10px; 
    }
</style>

<h1>Country Flags</h1>

<h2>Flag by Flag</h2>

<?php

$flag_folder = __DIR__ . DIRECTORY_SEPARATOR . "flags32";

$flag_list = scandir_h($flag_folder, "png");

foreach ($flag_list as $key => $flag)
{
    echo '<img src="flags32/'.$flag.'" alt="'.$flag.'" class="flag-margin">';
}

function scandir_h($directory, $file_extension = null)
{
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));

    if($file_extension !== null && count($scanned_directory) > 0)
    {
        $restricted_scan = array();
        foreach ($scanned_directory as $key => $file)
        {
            // If file extension match
            if(file_extension($file) === $file_extension)
            {
                array_push($restricted_scan, $file);
            }
        }
        $scanned_directory = $restricted_scan;
    }
    return $scanned_directory;
}

function file_extension($filename)
{
    $file_extension = "";
    $file_parts = explode(".", $filename);
    if(count($file_parts) > 0)
    {
        $file_extension = $file_parts[count($file_parts)-1];
    }
    return $file_extension;
}

?>

<h2>All Flags in a sprite</h2>

<h3>Sprite</h3>
<img src="flags/flags.png" alt="country flag sprite"><br><br>

<h3>Usage</h3>
<pre><div class="flag flag-bo"></div></pre>
<div class="flag flag-bo"></div>

</body>
</html>