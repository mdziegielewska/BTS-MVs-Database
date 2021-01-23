<?php
	$reaction = $_GET["reaction"];
	$member = $_GET["member"];
	
	if(!empty($reaction) && !empty($member)) {
		if ($member == "rm") {
			$i = 0;
		} else if ($member == "jin") {
			$i = 1;
		} else if ($member == "suga") {
			$i = 2;
		} else if ($member == "jhope") {
			$i = 3;
		} else if ($member == "jimin") {
			$i = 4;
		} else if ($member == "v") {
			$i = 5;
		} else if ($member == "jungkook") {
			$i = 6;
		}
		
		$xml = simplexml_load_file('reactions.xml');
		$new = $xml -> member[$i] -> $reaction -> __toString();
		$new = (integer)$new + 1;
		$xml -> member[$i] -> $reaction = $new;
		
		$xml->asXml('reactions.xml');
		header("location: $member.php");
	}
	
	
?>