<?php

/*
 * This file does not contain any code. It contains the rules for pony creation,
 * as laid out in the ponyisland manual.
 */

//           The system first calculates a random diplacement nr,
//          it then uses this number on all the seperate colors (R G B) to recive a number inbetween its parents.
//
//          Baby:   192|192|192
//
//          After this we add a random nrs between -20 and 20 to each separate color (R G B)
//
//          R: C0 (192) -5 = BB (187)
//          G: C0 (192) 18 = D2 (210)
//          B: C0 (192) -3 = BD (189)
//
//          Baby:   187|210|189
//
//          Finaly we check these new values against the parents,
//          they cannot have a higher color value then the parent with the highest color value and they cannot
//          have a lower color value then the parent with the lowest color value.
//          The only color that is out of range in this case is the green,
//          the baby have 210 and the maximum value is 208 so we simply set that color to 208.
//          The current cross breeds are
//
//
//          Mer Ponies (a mix of Earth Ponies and Sea Ponies),
//          Winged Unicorns (a mix of Pegasus and Unicorn),
//          MerDragon (a mix between MerPony and DragonPony) and
//          WishingPony (a mix between FairyPony and Unicorn).
//
//
//          When breeding for a mixed breed you simply get one parent of each of the containing breeds and breed them,
//          then you have a 20% chance to get the mutation that gives you a cross breed.
//          So you don't get a crossbreed every time. But when breeding cross breeds to other breeds you get a bit of a more varied outcome
//          since the crossbreed itself is then considered to be one of the breeds that combined are the crossbreed.
//
//          Some examples:
//          Sea Pony plus Earth Pony = Sea-, Earth-, or Mer Pony
//
//
//
//          Mer Pony plus Dragon Pony = Sea-, Earth-, Dragon- or MerDragon
//          Mer Pony plus Sea Pony = Sea-, Earh- or Mer Pony (beacuse Earth plus Sea can give Mer)
//          Mer Pony plus Mer Pony = Mer Pony
//
//          Mer Ponies (a mix of Earth Ponies and Sea Ponies),
//
//
//          Earth x Sea pairing = 20% chance of Mer, 40% each for Earth and Sea
//
//          mer X sea = 20% mer + 40% sea + 40% earth
//          mer X earth = 20% mer + 40% sea + 40% earth
//
//          Mer x anything else pairing = 50% chance of the other parent's breed, 25% chance of Earth, 25% chance of Sea
//
//
//
//           Winged Unicorns (a mix of Pegasus and Unicorn),
//
//          Uni x Peg pairing = 20% chance of WU, 40% each for Uni and Peg
//
//          Uni x WU pairing = 20% chance of WU, 40% chance of Uni, 40% chance of Peg
//
//          WU x anything else pairing = 50% chance of other parent's breed, 25% chance of Peg, 25% chance of Uni
//
//          WU x Mer pairing = 25% Earth, 25% Sea, 25% Peg, 25% Uni
//
//
//
//           MerDragon (a mix between MerPony and DragonPony)
//
//          Mer x anything else pairing = 50% chance of the other parent's breed, 25% chance of Earth, 25% chance of Sea
//
//
//
//                   20% for merdragon, 40% for dragon, then 20% for earth and 20% for sea?
//
//
//
//           WishingPony (a mix between FairyPony and Unicorn).
//
//
//
//
//
//
//          Wishie x anything else pairing = 50% chance of other parent's breed, 25% chance of Fairy, 25% chance of Uni
//
//          50% of each parent
?>
