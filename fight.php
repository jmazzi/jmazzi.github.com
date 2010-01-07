<?php
/*
Author: Justin Mazzi <jmazzi __a_t__ gmail d0t com>
Site: http://r00tshell.com
*/

/* Make this your screen name */
$me = "hisnameislinux";
if(isset($_GET['ss'])) {
    $return = show_source('fight.php', true);
    $return = str_replace($me,  "REMOVED", $return);
    print $return;
    exit();
}
$them = str_replace(" ", "", $_GET['j']);
if(empty($_GET['j'])) exit();
$ch = curl_init("http://aimfight.com/getFight.php?name1=$me&name2=$them");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
$output = ltrim($output, "&");
$parts = explode("&", $output);
foreach($parts as $part) {
    $test = explode("=", $part);
    $values[$test['0']] = $test['1'];
}
if($values['success'] == "1") {
    if($values['score1'] > $values['score2']) {
        print "I WIN!!<br><br>";
        print "Me: " . $values['score1'] . "<br>\n";
        print "You: " . $values['score2'] . "<br>\n";
    }
    elseif($values['score1'] == $values['score2']) {
        print "Its a tie!!<br><br>";
        print "Me: " . $values['score1'] . "<br>\n";
        print "You: " . $values['score2'] . "<br>\n";
    }
    else {
        print "YOU WIN!!<br><br>";
        print "You: " . $values['score2'] . "<br>\n";
        print "Me: " . $values['score1'] . "<br>\n";
    }
}
else {
    print "ScreenName does not exist!";
}
print "<br><br>Source for <a href=\"fight.php?ss=1\">fight.php</a>";
?>
