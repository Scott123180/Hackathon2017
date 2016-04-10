<?php

function tweet($message){
    //require string from other php file so that can write

    //open and write to file
    $tweetText = fopen("text.txt", "w+") or die("Unable to open the file!");

    //change to other string in other php file
    $txt = "{$message}";
    fwrite($tweetText, $txt);
    fclose($tweetText);

    $cmd = "ruby sendTweet.rb";
    echo system($cmd);
}

?>
