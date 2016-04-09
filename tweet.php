<?php

function tweet($message){
    //require string from other php file so that can write

    //open and write to file
    $tweetText = fopen("text.txt", "w") or die("Unable to open the file!");

    $tweetText = "test tweet text 1234";
    //change to other string in other php file
    $txt = "can we do it, yes we can";
    fwrite($tweetText, $txt);
    fclose($tweetText);

    system("ruby /ruby/sendTweet.rb");
}

?>
