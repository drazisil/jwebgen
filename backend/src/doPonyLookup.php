<?php

/*
 * 	Pony Lookup
 */
$pet = filter_input(INPUT_GET, 'ponyid');

$PonyX = new \jwebgen\namedPony();
$PonyX->createPonyFromID($pet);

$PonyX->ID = $pet;
$PonyX->PrintStats();

