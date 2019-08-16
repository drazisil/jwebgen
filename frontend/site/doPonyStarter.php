<?php

/*
 * 	Starter follows with 22%
 */

$ponyDad = new \jwebgen\Pony();
$ponyDad->parentPony('M');
$ponyMom = new \jwebgen\Pony();
$ponyMom->parentPony('F');

$PonyB = new \jwebgen\Pony();
$PonyB->MakeBaby($ponyDad, $ponyMom, true, filter_input(INPUT_GET, 'gender'));
$PonyB->setPonyIslandImageUrl();

$ponyMom->setPonyIslandImageUrl();
$momimg = $ponyMom->piImageUrl;
$ponyDad->setPonyIslandImageUrl();
$dadimg = $ponyDad->piImageUrl;

$piApi = new jwebgen\piApi();

if ($piApi->ponyId2XML(1, TRUE)) {
    echo "<table>\n";
    echo "<tr>\n";
    echo "<td>\n";
    echo "<img src=\"" . $dadimg . "\"><br/>";
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
    echo "<img src=\"" . $momimg . "\"><br/>";
    $ponyMom->PrintStats();
    echo "</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td>\n";
    echo "</td>\n";
    echo "<td>\n";
    echo "<div style=\"text-align: center;\"><span><img src=\"" . $PonyB->piImageUrl . "&jwg-start\"></span></div><br/>\n";
    echo $PonyB->PrintStats() . "\n";
    echo "</td>\n";
    echo "<td></td>\n";
    echo "</tr>\n";
    echo "</table>\n";
}
