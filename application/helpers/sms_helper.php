<?php
function sms($contact,$comments)
{  

$url="http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=niktecht&password=niktech@123&msisdn=".$contact."&sid=NIKTEC&msg=".urlencode($comments)."&fl=0&gwid=2";
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $output=curl_exec($ch);
    curl_close($ch);
}

function getAge($dob) {
	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	return $diff->format('%yYears, %mMonths, %dDays');
}

function highlightText($text, $keywords) {
	$color = "yellow";
	$background = "red";
	foreach($keywords as $keyword) {
		$highlightWord = "<strong style='background:".$background.";color:".$color."'>" . $keyword . "</strong>";
		$text = preg_replace ("/" . trim($keyword) . "/", $highlightWord, $text);
	}
	$keywords = array("Coding 4 Developers","Coding for developers");
	echo highlightText($text, $keywords);
	return $text;
}
?>
        





































//  <?php
// function sms($number,$msg)
// {  
// $url="http://bulksms.niktechsoftware.com/vendorsms/pushsms.aspx?user=jmdfinance&password=ghazipur@123&msisdn=".$number."&sid=JMDLTD&msg=".urlencode($msg)."&fl=0&gwid=2";
	
// 	$ch = curl_init();
// 	curl_setopt($ch,CURLOPT_URL,$url);
// 	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
// 	$output=curl_exec($ch);
// 	curl_close($ch);
// }
// function checkBalSms()
// { 
// $url = "http://bulksms.niktechsoftware.com/vendorsms/CheckBalance.aspx?user=jmdfinance&password=ghazipur";
// $ch = curl_init();
// curl_setopt($ch,CURLOPT_URL,$url);
// curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
// $output=curl_exec($ch);
// curl_close($ch);
// return $output;
// }




// function getAge($dob) {
// 	$today = date("Y-m-d");
// 	$diff = date_diff(date_create($dob), date_create($today));
// 	return $diff->format('%yYears, %mMonths, %dDays');
// }

// function highlightText($text, $keywords) {
// 	$color = "yellow";
// 	$background = "red";
// 	foreach($keywords as $keyword) {
// 		$highlightWord = "<strong style='background:".$background.";color:".$color."'>" . $keyword . "</strong>";
// 		$text = preg_replace ("/" . trim($keyword) . "/", $highlightWord, $text);
// 	}
// 	$keywords = array("Coding 4 Developers","Coding for developers");
// 	echo highlightText($text, $keywords);
// 	return $text;
// }


