<?php

function show($stuff){

    echo"<pre>";
    print_r($stuff);
    echo"<pre>";
}

function pages($file){

    return "..\pages\\".$file.".php";
}

?>