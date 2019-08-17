<?php

/* 
 * Copyright (C) 2014 joseph
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
\date_default_timezone_set('America/Chicago');

spl_autoload_extensions(".php"); // comma-separated list
spl_autoload_register();

require('./config.php');
require('./includes/utility.php');



$pony = new \jwebgen\namedPony();
$pony->createPonyFromID(filter_input(INPUT_GET, 'id'), true);
print_r($pony);
