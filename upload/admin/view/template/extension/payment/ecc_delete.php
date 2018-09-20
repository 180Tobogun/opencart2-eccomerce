<?php

if (isset($_SERVER['HTTP_REFERER'])) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    echo "An Error";
}


if (isset($_POST['delete'])) {
    $files = [
        "../../../../controller/extension/payment/New Text Document.txt",            //  controller/extension/payment/ecc.php
        "../../../../language/en-gb/extension/payment/New Text Document (2).txt",    //  language/en-gb/extension/payment/ecc.php
        "New Text Document (3).txt",                                                 //  view/template/extension/payment/ecc.tpl

    ];

    foreach ($files as $file)
        if (!unlink($file)) {
            echo("Error deleting $file");
        } else {
            echo("Deleted $file.</br>");
        }
}