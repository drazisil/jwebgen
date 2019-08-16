<?php

/**
 * Returns a test breed offspring offspring from two PonyIsland ponies
 */
$ponyP1 = new \jwebgen\namedPony();
$ponyP1->createPonyFromID(filter_input(INPUT_GET, 'P1ID'));
$ponyP1->setPonyIslandImageUrl();
$ponyP2 = new \jwebgen\namedPony();
$ponyP2->createPonyFromID(filter_input(INPUT_GET, 'P2ID'));
$ponyP2->setPonyIslandImageUrl();
$ponyP3 = new \jwebgen\namedPony();
$ponyP3->createPonyFromID(filter_input(INPUT_GET, 'P3ID'));
$ponyP3->setPonyIslandImageUrl();
$ponyP4 = new \jwebgen\namedPony();
$ponyP4->createPonyFromID(filter_input(INPUT_GET, 'P4ID'));
$ponyP4->setPonyIslandImageUrl();
$ponyB1 = new \jwebgen\Pony();
$ponyB1->makeBaby($ponyP1, $ponyP2);
$ponyB1->setPonyIslandImageUrl();
$ponyB2 = new \jwebgen\Pony();
$ponyB2->makeBaby($ponyP3, $ponyP4);
$ponyB2->setPonyIslandImageUrl();
$ponyOO = new \jwebgen\Pony();
$ponyOO->makeBaby($ponyB1, $ponyB2);
$ponyOO->setPonyIslandImageUrl();

$piApi = new jwebgen\piApi();

if ($piApi->ponyId2XML(1, TRUE)) {
    echo "<table>\n";
    echo "<tr>\n";
    echo "<td>\n";
    $ponyP1->PrintStats();
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
    $ponyP2->PrintStats();
    echo "</td>\n";
    echo "<td>\n";
    $ponyP3->PrintStats();
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
    $ponyP4->PrintStats();
    echo "</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td colspan='3'>\n";
    echo "<div style=\"text-align: center;\"><span><img src=\"" . $ponyB1->piImageUrl . "&jwg-start\"></span></div><br/>\n";
    echo $ponyB1->PrintStats() . "\n";
    echo "</td>\n";
    echo "<td colspan='3'>\n";
    echo "<div style=\"text-align: center;\"><span><img src=\"" . $ponyB2->piImageUrl . "&jwg-start\"></span></div><br/>\n";
    echo $ponyB2->PrintStats() . "\n";
    echo "</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td colspan='6'>\n";
    echo "<div style=\"text-align: center;\"><span><img src=\"" . $ponyOO->piImageUrl . "&jwg-start\"></span></div><br/>\n";
    echo "</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td colspan='2'>\n";
    echo "</td>\n";
    echo "<td colspan='2'>\n";
    echo $ponyOO->PrintStats() . "\n";
    echo "</td>\n";
    echo "<td colspan='2'>\n";
    echo "</td>\n";
    echo "</tr>\n";
    echo "</table>\n";
}
