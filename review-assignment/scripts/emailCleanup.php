<?php
//create array
$emails = ["a@b.com", null, "ab.com", "   a@c.com", "b@c.com  ", "", "d@e .com", "f@g.com", "yahoo.com", "g@h.com"]; 

//Remove elements that are empty (null or empty strings)
$emails = array_filter($emails);

//Remove elements that do not have an '@' character
foreach($emails as $key => $value){
    if(!str_contains($value, "@")) {
        unset($emails[$key]);
    }
}

//Update email strings that have extra spaces at the beginning, middle, or end by trimming them (removing spaces from email string not removing elements from array)
foreach($emails as $key => $value){
    $emails[$key] = str_replace(" ", "", $emails[$key]);
}

//sort the emails in ascending order
sort($emails);

//Print the array to see the results
foreach($emails as $email) {
    echo $email . "\n";
}
?>