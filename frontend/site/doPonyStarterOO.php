<?php

/*
 * Test Breeding SOOs
 */

$ponyS1 = new \jwebgen\Pony();
$ponyS1->parentPony('S1', true, 'Female');
$ponyS1->setPonyIslandImageUrl();
$ponyS2 = new \jwebgen\Pony();
$ponyS2->parentPony('S2', true, 'Male');
$ponyS2->setPonyIslandImageUrl();
$ponyS3 = new \jwebgen\Pony();
$ponyS3->parentPony('S3', true, 'Female');
$ponyS3->setPonyIslandImageUrl();
$ponyS4 = new \jwebgen\Pony();
$ponyS4->parentPony('S4', true, 'Male');
$ponyS4->setPonyIslandImageUrl();

$ponyB1 = new \jwebgen\Pony();
$ponyB1->MakeBaby($ponyS1, $ponyS2, 1, 'F');
$ponyB1->setPonyIslandImageUrl();
$ponyB2 = new \jwebgen\Pony();
$ponyB2->MakeBaby($ponyS3, $ponyS4, 1, 'M');
$ponyB2->setPonyIslandImageUrl();

$ponySOO = new \jwebgen\Pony();
$ponySOO->MakeBaby($ponyB1, $ponyB2, 1, filter_input(INPUT_GET, 'gender'));
$ponySOO->setPonyIslandImageUrl();


$piApi = new jwebgen\piApi();

if ($piApi->ponyId2XML(1, TRUE)) {
    echo "<table>\n";
    echo "<tr>\n";
    echo "<td>\n";
    echo "<img src=\"" . $ponyS1->piImageUrl . "\"><br/>";
    $ponyS1->PrintStats();
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
    echo "<img src=\"" . $ponyS2->piImageUrl . "\"><br/>";
    $ponyS2->PrintStats();
    echo "</td>\n";
    echo "<td>\n";
    echo "<img src=\"" . $ponyS3->piImageUrl . "\"><br/>";
    $ponyS3->PrintStats();
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
    echo "<img src=\"" . $ponyS4->piImageUrl . "\"><br/>";
    $ponyS4->PrintStats();
    echo "</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td colspan='3'>\n";
    echo "<div style=\"text-align: center;\"><span><img src=\"" . $ponyB1->piImageUrl . "&jwg-start\"></span></div><br/>\n";
    echo $ponyB1->PrintStats(true) . "\n";
    echo "</td>\n";
    echo "<td colspan='3'>\n";
    echo "<div style=\"text-align: center;\"><span><img src=\"" . $ponyB2->piImageUrl . "&jwg-start\"></span></div><br/>\n";
    echo $ponyB2->PrintStats(true) . "\n";
    echo "</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td colspan='6'>\n";
    echo "<div style=\"text-align: center;\"><span><img src=\"" . $ponySOO->piImageUrl . "&jwg-start\"></span></div><br/>\n";
    echo "</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td colspan='2'>\n";
    echo "</td>\n";
    echo "<td colspan='2'>\n";
    echo $ponySOO->PrintStats() . "\n";
    echo "</td>\n";
    echo "<td colspan='2'>\n";
    echo "</td>\n";
    echo "</tr>\n";
    echo "</table>\n";
}
