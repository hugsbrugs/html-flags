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

<h3>Usage</h3>
Insert image tag with desired country code
<pre>&lt;img src="flags32/fr.png"></pre>
Displays <img src="flags32/fr.png"><br><br>

All Flags<br><br>

<?php

$flag_folder = __DIR__ . DIRECTORY_SEPARATOR . "flags32";

$flag_list = scandir_h($flag_folder, "png");

foreach ($flag_list as $key => $flag)
{
    echo '<img src="flags32/'.$flag.'" alt="'.$flag.'" class="flag-margin">';
}

/**
 *
 */
function scandir_h($directory, $file_extension = null)
{
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));

    if($file_extension !== null && count($scanned_directory) > 0)
    {
        $restricted_scan = [];
        foreach ($scanned_directory as $key => $file)
        {
            // If file extension match
            if(pathinfo($file, PATHINFO_EXTENSION) === $file_extension)
            {
                $restricted_scan[] = $file;
            }
        }
        $scanned_directory = $restricted_scan;
    }
    return $scanned_directory;
}

?>

<h2>All Flags in a sprite</h2>

<h3>Sprite</h3>
In your HTML code, load library
<pre>&lt;link href="flags/flags.css" rel="stylesheet"></pre>
Then use it with desired country code 
<pre>&lt;div class="flag flag-fr"></div></pre>
That renders to
<div class="flag flag-fr"></div>

Here is the sprite used<br>
<img src="flags/flags.png" alt="country flag sprite"><br><br>



</body>
</html>