<?php

function tweet($message){
    //require string from other php file so that can write

    //open and write to file
    $tweetText = fopen("text.txt", "w") or die("Unable to open the file!");

    //change to other string in other php file
    $txt = "can we do it, yes we can";
    fwrite($tweetText, $txt);
    fclose($tweetText);

    echo exec("ruby sendTweet.rb");
}



?>
//call ruby file