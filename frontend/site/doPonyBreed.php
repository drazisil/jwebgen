<?php

/**
* Returns a test breed from two PonyIsland ponies
*/

	$ponyDad = new \jwebgen\namedpony();
	$ponyDad->createPonyFromID( filter_input(INPUT_GET, 'DadID') );
        $ponyDad->setPonyIslandImageUrl();
	$ponyMom = new \jwebgen\namedpony();
	$ponyMom ->createPonyFromID( filter_input(INPUT_GET, 'MomID') );
        $ponyMom->setPonyIslandImageUrl();
	$PonyB = new \jwebgen\Pony();
	$PonyB->makeBaby($ponyMom, $ponyDad );
        $PonyB->setPonyIslandImageUrl();
        
        $piApi = new jwebgen\piApi();

	if ($piApi->ponyId2XML(1, TRUE)) {
		echo "<table>\n";
		echo "<tr>\n";
		echo "<td>\n";
		$ponyDad->PrintStats();
		echo "</td>\n";
		echo "<td style=\"text-align: center;\">\n";
		echo "<==== Father | Mother ====><br/>\n";
		echo "<br/>\n";
		echo "Baby<br/>\n";
		echo "II<br/>\n";
		echo "II<br/>\n";
		echo "II<br/>\n";
		echo "II<br/>\n";
		echo "V<br/>\n";
		echo "</td>\n";
		echo "<td>\n";
		$ponyMom->PrintStats();
		echo "</td>\n";
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td></td>\n";
		echo "<td>\n";
		echo "<div style=\"text-align: center;\"><span><img src=\"".$PonyB->piImageUrl."&jwg-breed\"></span></div><br/>\n";
		echo $PonyB->PrintStats()."\n";
		echo "</td>\n";
		echo "<td></td>\n";
		echo "</tr>\n";
		echo "</table>\n";
	}

