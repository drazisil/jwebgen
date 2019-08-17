<?php

namespace jwebgen {
    /**
     * @package jwebgen
     * @author Joseph W Becher <jwbecher@jwebnet.net>
     */

    /**
     * PI Workshop
     *
     * Classes
     *
     * pony()
     *   Contains pony information
     *   when pony does not exist
     *   on ponyisland
     */
    class Pony {

        /**
         * Holds the base url for the image link on PonyIsland
         * @var string 
         */
        protected $piImageUrlBase = 'http://im3.ponyisland.net/?img=pony';

        /**
         * Holds the image url for PonyIsland
         * @var string 
         */
        public $piImageUrl;

        /** @var string Stores the breed */
        public $breed = '';

        /** @var string Stores the gender */
        public $gender = '';

        /**
         * Is the pony a baby or or an adult? 
         * @var string 
         */
        public $ponyAge;

        /** @var array List of the names of the color hex variables */
        private $hexsArray = array('colorEyes', 'colorHair', 'colorHair2', 'colorBody', 'colorExtra1',
            'colorExtra2');

        /** @var array Stores the eyes color hex in the format of RR|GG|BB */
        public $colorEyes = array('', '', '');

        /** @var array Stores the hair color hex in the format of RR|GG|BB */
        public $colorHair = array('', '', '');

        /** @var array Stores the hair 2 color hex in the format of RR|GG|BB */
        public $colorHair2 = array('', '', '');

        /**
         * Stores the body color hex in the format of RR|GG|BB
         * @var array
         */
        var $colorBody = array('', '', '');

        /**
         * Stores the extra 1 color hex in the format of RR|GG|BB
         * @var array
         */
        var $colorExtra1 = array('', '', '');

        /**
         * Stores the extra 2 color hex in the format of RR|GG|BB
         * @var array
         */
        var $colorExtra2 = array('', '', '');

        /**
         * Stores the pattern sgene in the format of GG
         * @var string
         */
        var $sgenePattern = '++';

        /**
         * Stores the socks sgene in the format of GG
         * @var string
         */
        var $sgeneSocks = '++';

        /**
         * Stores the hair sgene in the format of GG
         * @var string
         */
        var $sgeneHair = '++';

        /**
         * Stores the face sgene in the format of GG
         * @var string
         */
        var $sgeneFace = '++';

        /**
         * Stores the DNA string to be used in the url
         * @var string
         */
        var $ponyDna;

        /**
         * Loci tables
         * @var array
         */
        private $sgeneLoci = array(
            /* None(++) < Paint(PP) < ZigZag(ZZ) < Light Dapple(LC) < Heavy Dapple(HC) 
             * < Body Fade(DD) < Clownfish (WW) < Zebra (EE) < Tarantula (TT) < Monarch (MM) < Fawn (FF)
             * < Zebrafinch(II) < Koi()KK < Appaloosa(AA) < Gemsbok(GG) < Numbat(NN) < Bioluminescence(BB) 
             */
            'pattern' => array(
                'BC' => 32,
                'BB' => 31,
                'NC' => 30,
                'NN' => 29,
                'GC' => 28,
                'GG' => 27,
                'AC' => 26,
                'AA' => 25,
                'KC' => 24,
                'KK' => 23,
                'IC' => 22,
                'II' => 21,
                'FC' => 20,
                'FF' => 19,
                'MC' => 18,
                'MM' => 17,
                'TC' => 16,
                'TT' => 15,
                'EC' => 14,
                'EE' => 13,
                'WC' => 12,
                'WW' => 11,
                'DC' => 10,
                'DD' => 9,
                'HC' => 8,
                'HH' => 7,
                'LC' => 6,
                'LL' => 5,
                'ZC' => 4,
                'ZZ' => 3,
                'PC' => 2,
                'PP' => 1,
                '++' => 0
            ),
            /* None(++) < Socks(HH) < Stockings(FF) < Fade(DD) < Okapi (OO) */
            'socks' => array(
                'OC' => 8,
                'OO' => 7,
                'DC' => 6,
                'DD' => 5,
                'FC' => 4,
                'FF' => 3,
                'HC' => 2,
                'HH' => 1,
                '++' => 0
            ),
            /* None(++) < Stripe(SS) < Rainbow(RR) < Tips(TT) < MStripes(MM) 
             * < Quad Stripe (QQ) < Hair Fade (DD) */
            'hair' => array(
                'DD' => 6,
                'QQ' => 5,
                'MM' => 4,
                'TT' => 3,
                'RR' => 2,
                'SS' => 1,
                '++' => 0
            ),
            /* None(++) < Star(SS) < Freckles(FF) < Blaze(BB) < Faded(DD) < Skull(KK) */
            'face' => array(
                'KC' => 10,
                'KK' => 9,
                'DC' => 8,
                'DD' => 7,
                'BC' => 6,
                'BB' => 5,
                'FC' => 4,
                'FF' => 3,
                'SC' => 2,
                'SS' => 1,
                '++' => 0
            ),
        );

        /**
         * Table to convert from sgene to colorized version
         * @var array
         */
        private $colorizedArray = array(
            'CC' => 'CC',
            'NN' => 'NC',
            'GG' => 'GC',
            'AA' => 'AC',
            'KK' => 'KC',
            'II' => 'IC',
            'SS' => 'SC',
            'FF' => 'FC',
            'BB' => 'BC',
            'OO' => 'OC',
            'EE' => 'EC',
            'WW' => 'WC',
            'DD' => 'DC',
            'HH' => 'HC',
            'LL' => 'LC',
            'ZZ' => 'ZC',
            'PP' => 'PC',
            '++' => '++',
            'SC' => 'SC',
            'FC' => 'FC',
            'BC' => 'BC',
            'OC' => 'OC',
            'EC' => 'EC',
            'WC' => 'WC',
            'DC' => 'DC',
            'HC' => 'HC',
            'LC' => 'LC',
            'ZC' => 'ZC',
            'TT' => 'TC',
            'MM' => 'MC',
            'FF' => 'FC',
            'PC' => 'PC'
        );

        /**
         * @todo Turn this into a proper construct. Ideally propagate the initial values
         */
        function __construct() {
// Empty for now.
        }

        /**
         * Returns a pipe-separated string of the colors of $colorLocus
         * @param string $colorLocus
         * @param $mode = 'dec'|'dna'
         * @return string
         */
        function colors($colorLocus, $mode = 'dec') {
            switch ($mode) {
                case 'dna':
                    return str_pad($this->{$colorLocus}[0], 2, "0", STR_PAD_LEFT)
                            . str_pad($this->{$colorLocus}[1], 2, "0", STR_PAD_LEFT)
                            . str_pad($this->{$colorLocus}[2], 2, "0", STR_PAD_LEFT);
                default:
                    return str_pad(hexdec($this->{$colorLocus}[0]), 3, "0", STR_PAD_LEFT)
                            . '|' . str_pad(hexdec($this->{$colorLocus}[1]), 3, "0", STR_PAD_LEFT)
                            . '|' . str_pad(hexdec($this->{$colorLocus}[2]), 3, "0", STR_PAD_LEFT);
            }
        }

        /**
         * Outputs the information block of HTML
         * @todo This could really use some cleanup
         * @param bool $noGender 
         */
        function PrintStats($noGender = false) {
            if ($this->piImageUrl <> '') {
                echo '<span class="formLabel">* URL: </span><input type="text" size="40" value="[IMG]' . $this->piImageUrl . '[/IMG]">' . "<br/>\n";
            }
            echo '<span class="formLabel">* Breed: </span>' . $this->breed . "<br/>\n";
            if (!$noGender) {
                echo '<span class="formLabel">* Gender: </span>' . $this->gender . "<br/>\n";
            }
            echo '<span class="formLabel">* Eyes: </span><span class="hexColor" title="' . $this->colors('colorEyes')
            . '" style="background-color: #' . $this->colors('colorEyes', 'dna') . '; '
            . 'color: #' . fontColorContrast($this->colors('colorEyes', 'dna')) . ';">'
            . $this->colors('colorEyes') . "</span><br/>\n";
            echo '<span class="formLabel">* Hair: </span><span class="hexColor" title="' . $this->colors('colorHair')
            . '" style="background-color: #' . $this->colors('colorHair', 'dna') . '; '
            . 'color: #' . fontColorContrast($this->colors('colorHair', 'dna')) . ';">'
            . $this->colors('colorHair') . "</span><br/>\n";
            echo '<span class="formLabel">* Hair2: </span><span class="hexColor" title="' . $this->colors('colorHair2')
            . '" style="background-color: #' . $this->colors('colorHair2', 'dna') . '; '
            . 'color: #' . fontColorContrast($this->colors('colorHair2', 'dna')) . ';">'
            . $this->colors('colorHair2') . "</span><br/>\n";
            echo '<span class="formLabel">* Body: </span><span class="hexColor" title="' . $this->colors('colorBody')
            . '" style="background-color: #' . $this->colors('colorBody', 'dna') . '; '
            . 'color: #' . fontColorContrast($this->colors('colorBody', 'dna')) . ';">'
            . $this->colors('colorBody') . "</span><br/>\n";
            echo '<span class="formLabel">* Extra1: </span><span class="hexColor" title="' . $this->colors('colorExtra1')
            . '" style="background-color: #' . $this->colors('colorExtra1', 'dna') . '; '
            . 'color: #' . fontColorContrast($this->colors('colorExtra1', 'dna')) . ';">'
            . $this->colors('colorExtra1') . "</span><br/>\n";
            echo '<span class="formLabel">* Extra2: </span><span class="hexColor" title="' . $this->colors('colorExtra2')
            . '" style="background-color: #' . $this->colors('colorExtra2', 'dna') . '; '
            . 'color: #' . fontColorContrast($this->colors('colorExtra2', 'dna')) . ';">'
            . $this->colors('colorExtra2') . "</span><br/>\n";
            echo '<span class="formLabel">* S-Genes: </span>' . $this->sgenePattern . '|' . $this->sgeneSocks . '|' . $this->sgeneHair . '|' . $this->sgeneFace . "<br/>\n";
        }

        /**
         * Converts the sgene from the 2-char GG to the longer text name
         * @param string $sgene
         * @param string $locus
         * @return string 
         */
        function TranslateSgene($sgene, $locus = 'body') {

            /**
             * Choices are body, socks, hair or face
             */
            switch ($locus) {
                case 'body':
                    switch ($sgene) {
                        case '++': return 'none';
                        case 'none': return 'none';
                        case 'LL': return 'Light Dapples';
                        case 'HH': return 'Heavy Dapples';
                        case 'LC': return 'Color Light Dapples';
                        case 'HC': return 'Color Heavy Dapples';
                        case 'DD': return 'Faded';
                        case 'DC': return 'Colorized Faded';
                        case 'PP': return 'Paint';
                        case 'PC': return 'Colorized Paint';
                        case 'ZZ': return 'ZigZag';
                        case 'ZC': return 'Colorized ZigZag';
                        case 'WW': return 'ClownFish';
                        case 'WC': return 'Colorized ClownFish';
                        case 'EE': return 'Zebra';
                        case 'EC': return 'Colorized Zebra';
                        case 'TT': return 'Tarantula';
                        case 'TC': return 'Colorized Tarantula';
                        case 'MM': return 'Monarch';
                        case 'MC': return 'Colorized Monarch';
                        case 'FF': return 'Fawn';
                        case 'FC': return 'Colorized Fawn';
                        case 'II': return 'ZebraFinch';
                        case 'IC': return 'Colorized ZebraFinch';
                        case 'KK': return 'Koi';
                        case 'KC': return 'Colorized Koi';
                        case 'AA': return 'Appaloosa';
                        case 'AC': return 'Colorized Appaloosa';
                        case 'GG': return 'Gemsbok';
                        case 'GC': return 'Colorized Gemsbok';
                        case 'NN': return 'Numbat';
                        case 'NC': return 'Colorized Numbat';
                        case 'BB': return 'Bioluminescence';
                        case 'BC': return 'Colorized Bioluminescence';
                        case 'CC': return 'PColorized';
                    }
                    break;
                case 'socks':
                    switch ($sgene) {
                        case '++': return 'none';
                        case 'none': return 'none';
                        case 'DD': return 'Faded';
                        case 'DC': return 'Colorized Faded';
                        case 'HH': return 'Socks';
                        case 'HC': return 'Color Socks';
                        case 'FF': return 'Stockings';
                        case 'FC': return 'Colorized Stockings';
                        case 'OO': return 'Okapi';
                        case 'OC': return 'Colorized Okapi';
                        case 'CC': return 'SColorized';
                    }
                    break;
                case 'hair':
                    switch ($sgene) {
                        case '++': return 'none';
                        case 'none': return 'none';
                        case 'RR': return 'Rainbow';
                        case 'SS': return 'Stripes';
                        case 'TT': return 'Tips';
                        case 'MM': return 'MStripes';
                        case 'QQ': return 'QStripes';
                        case 'DD': return 'Faded';
                    }
                    break;
                case 'face':
                    switch ($sgene) {
                        case '++': return 'none';
                        case 'none': return 'none';
                        case 'FF': return 'Freckles';
                        case 'FC': return 'Colorized Freckles';
                        case 'SS': return 'Star';
                        case 'SC': return 'Colorized Star';
                        case 'BB': return 'Blaze';
                        case 'BC': return 'Colorized Blaze';
                        case 'DD': return 'Fade';
                        case 'DC': return 'Colorized Fade';
                        case 'KK': return 'Skull';
                        case 'KC': return 'Colorized Skull';
                        case 'CC': return 'FColorized';
                    }
                    break;
                default:
                    return $sgene;
                    break;
            }
        }

        public function setPonyIslandImageUrl() {
            $piApi = new \jwebgen\piApi();
            //img=pony&gender=____&breed=____&colors=____|____|____|____|____|____&genes=____&size=____&modified'
            $colors = $this->colors('colorEyes', 'dna') . '|';
            $colors .= $this->colors('colorHair', 'dna') . '|';
            $colors .= $this->colors('colorHair2', 'dna') . '|';
            $colors .= $this->colors('colorBody', 'dna') . '|';
            $colors .= $this->colors('colorExtra1', 'dna') . '|';
            $colors .= $this->colors('colorExtra2', 'dna');

            $sgenes = $piApi->ponySgeneName2Int($this->sgenePattern, 'pattern');
            $sgenes .= '|' . $piApi->ponySgeneName2Int($this->sgeneSocks, 'socks');
            $sgenes .= '|' . $piApi->ponySgeneName2Int($this->sgeneFace, 'face');
            $sgenes .= '|' . $piApi->ponySgeneName2Int($this->sgeneHair, 'hair');

            $this->piImageUrl = $this->piImageUrlBase
                    . '&gender=' . $this->gender
                    . '&breed=' . $piApi->ponyBreed2Int($this->breed)
                    . '&colors=' . $colors
                    . '&genes=' . $sgenes
                    . $this->ponyAge
                    . '&size=200&modified';
        }

        /**
         * Generate the DNA variable
         */
        protected function MakeDNA() {

            $this->ponyDna = $this->colors('colorBody', 'dna') . '|';
            $this->ponyDna .= $this->colors('colorHair', 'dna') . '|';
            $this->ponyDna .= $this->colors('colorEyes', 'dna') . '|';
            $this->ponyDna .= $this->colors('colorHair2', 'dna') . '|';
            $this->ponyDna .= $this->colors('colorExtra1', 'dna') . '|';
            $this->ponyDna .= $this->colors('colorExtra2', 'dna') . '|';
            $this->ponyDna .= $this->sgenes() . '|++|++|++|++|++';
        }

        /**
         * Given a $fatherPony and a $motherPony
         * Generates a new pony object from the computed values of two pony objects
         * @param object $fatherPony
         * @param object $motherPony
         * @param bool $isStarter
         * @param string $gender 
         */
        function makeBaby($fatherPony, $motherPony, $isStarter = FALSE, $gender = NULL) {

//        echo '='.$fatherPony->breed.'-'.$motherPony->breed.'=';

            /**
             * If the gender was provided then set it, otherwise there is a 50/50 chance between M or F
             */
            if ($isStarter) {
                $this->gender = $gender;
            } else {

                $tmp = mt_rand(0, 1);
                if ($tmp == 1) {
                    $this->gender = $fatherPony->gender;
                } else {
                    $this->gender = $motherPony->gender;
                }
            }


            /**
             * Create the random number, breedNR, for use in breed calculations
             */
            $intMin = 1;
            $intMax = 100;
            $intDecimals = 2;
            $intPowerTen = pow(10, $intDecimals);
            $breedNR = rand($intMin, $intMax * $intPowerTen) / $intPowerTen;

            /**
             * Pony completion is set to FALSE
             */
            $made = FALSE;

            /**
             * Generate the baby's breed based on the breed of the father and mother ponies
             * and the value of breedNR
             * @todo This section badly needs a rework
             */
            switch ($motherPony->breed) {

                // The Hybreds
                /* @TODO: Hybred system does not currently support mother */

                // WishingPony (a mix between FairyPony and Unicorn).
                case 'WishingPony':
                    if ($fatherPony->breed == 'WishingPony') {
                        $this->breed = $motherPony->breed;
                    } else {

//Wishie x anything else pairing = 50% chance of other parent's breed, 25% chance of Fairy, 25% chance of Uni
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 25):
                                $this->breed = 'FairyPony';
                                break;
                            case $this->isBetween($breedNR, 25.01, 50):
                                $this->breed = 'Unicorn';
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                break;
                        }
                    }
                    break;

// MerDragon (a mix between MerPony and DragonPony)
                case 'MerDragon':
                    if ($fatherPony->breed == 'MerDragon') {
                        $this->breed = $motherPony->breed;
                    } else {

//MerDragon x anything else pairing = 50% chance of other parent's breed, 25% chance of MerPony, 25% chance of Dragon
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 25):
                                $this->breed = 'MerPony';
                                break;
                            case $this->isBetween($breedNR, 25.01, 50):
                                $this->breed = 'DragonPony';
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                break;
                        }
                    }
                    break;
// Winged Unicorns (a mix of Pegasus and Unicorn),
                case 'WingedUnicorn':
                    if ($fatherPony->breed == 'WingedUnicorn') {
                        $this->breed = $motherPony->breed;
                    } else {

//WU x anything else pairing = 50% chance of the other parent's breed, 25% chance of Peg and Uni
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 25):
                                $this->breed = 'Pegasus';
                                break;
                            case $this->isBetween($breedNR, 25.01, 50):
                                $this->breed = 'Unicorn';
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                break;
                        }
                    }
                    break;

                case 'MerPony':
                    if ($fatherPony->breed == 'MerPony') {
                        $this->breed = $motherPony->breed;
                    } else if ($fatherPony->breed == 'DragonPony') {

//Uni x Peg pairing = 20% chance of WU, 40% each for Uni and Peg
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 20):
                                $this->breed = 'EarthPony';
                                break;
                            case $this->isBetween($breedNR, 20.01, 40):
                                $this->breed = 'SeaPony';
                                break;
                            case $this->isBetween($breedNR, 40.01, 80):
                                $this->breed = 'DragonPony';
                                break;
                            case $this->isBetween($breedNR, 80.01, 100):
                                $this->breed = 'MerDragon';
                                break;
                        }
                    } else {

//Mer x anything else pairing = 50% chance of the other parent's breed, 25% chance of Earth and Sea
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 25):
                                $this->breed = 'EarthPony';
                                break;
                            case $this->isBetween($breedNR, 25.01, 50):
                                $this->breed = 'SeaPony';
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                break;
                        }
                    }
                    break;


// Non-Hybreds
                case 'EarthPony':
                    if ($fatherPony->breed == 'EarthPony') {
                        $this->breed = $motherPony->breed;
                    } else if ($fatherPony->breed == 'SeaPony') {

//Earth x Sea pairing = 20% chance of Mer, 40% each for Earth and Sea
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 40):
                                $this->breed = 'EarthPony';
                                break;
                            case $this->isBetween($breedNR, 40.01, 80):
                                $this->breed = 'SeaPony';
                                break;
                            case $this->isBetween($breedNR, 80.01, 100):
                                $this->breed = 'MerPony';
                                break;
                        }
                    } else {
// Pick a 50%
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 50):
                                $this->breed = $motherPony->breed;
                                $made = TRUE;
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                $made = TRUE;
                                break;
                        }
                    }
                    break;

                case 'Unicorn':

                    if ($fatherPony->breed == 'Unicorn') {
                        $this->breed = $motherPony->breed;
                    } else if ($fatherPony->breed == 'Pegasus') {
//Uni x Peg pairing = 20% chance of WU, 40% each for Uni and Peg
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 40):
                                $this->breed = 'Unicorn';
                                break;
                            case $this->isBetween($breedNR, 40.01, 80):
                                $this->breed = 'Pegasus';
                                break;
                            case $this->isBetween($breedNR, 80.01, 100):
                                $this->breed = 'WingedUnicorn';
                                break;
                        }
                    } else if ($fatherPony->breed == 'MerDragon') {
                        //MerDragon x anything else pairing = 50% chance of other parent's breed, 25% chance of MerPony, 25% chance of Dragon
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 25):
                                $this->breed = 'MerPony';
                                break;
                            case $this->isBetween($breedNR, 25.01, 50):
                                $this->breed = 'DragonPony';
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $motherPony->breed;
                                break;
                        }
                    } else {
// Pick a 50%
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 50):
                                $this->breed = $motherPony->breed;
                                $made = TRUE;
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                $made = TRUE;
                                break;
                        }
                    }
                    break;
                case 'SeaPony':
                    if ($fatherPony->breed == 'SeaPony') {
                        $this->breed = $motherPony->breed;
                    } else if ($fatherPony->breed == 'EarthPony') {

//Uni x Peg pairing = 20% chance of WU, 40% each for Uni and Peg
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 40):
                                $this->breed = 'SeaPony';
                                break;
                            case $this->isBetween($breedNR, 40.01, 80):
                                $this->breed = 'EarthPony';
                                break;
                            case $this->isBetween($breedNR, 80.01, 100):
                                $this->breed = 'MerPony';
                                break;
                        }
                    } else {
// Pick a 50%
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 50):
                                $this->breed = $motherPony->breed;
                                $made = TRUE;
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                $made = TRUE;
                                break;
                        }
                    }
                    break;
                case 'ShellPony':
                    switch (TRUE) {
                        case $this->isBetween($breedNR, 0.01, 50):
                            $this->breed = $motherPony->breed;
                            $made = TRUE;
                            break;
                        case $this->isBetween($breedNR, 50.01, 100):
                            $this->breed = $fatherPony->breed;
                            $made = TRUE;
                            break;
                    }
                    break;
                case 'FairyPony':
                    if ($fatherPony->breed == 'FairyPony') {
                        $this->breed = $motherPony->breed;
                    } else if ($fatherPony->breed == 'Unicorn') {

//Uni x Peg pairing = 20% chance of WU, 40% each for Uni and Peg
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 40):
                                $this->breed = 'FairyPony';
                                break;
                            case $this->isBetween($breedNR, 40.01, 80):
                                $this->breed = 'Unicorn';
                                break;
                            case $this->isBetween($breedNR, 80.01, 100):
                                $this->breed = 'WishingPony';
                                break;
                        }
                    } else {
// Pick a 50%
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 50):
                                $this->breed = $motherPony->breed;
                                $made = TRUE;
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                $made = TRUE;
                                break;
                        }
                    }
                    break;
                case 'FlutterPony':
                    switch (TRUE) {
                        case $this->isBetween($breedNR, 0.01, 50):
                            $this->breed = $motherPony->breed;
                            $made = TRUE;
                            break;
                        case $this->isBetween($breedNR, 50.01, 100):
                            $this->breed = $fatherPony->breed;
                            $made = TRUE;
                            break;
                    }
                    break;
                case 'Pegasus':

                    if ($fatherPony->breed == 'Pegasus') {
                        $this->breed = $motherPony->breed;
                    } else if ($fatherPony->breed == 'Unicorn') {

//Uni x Peg pairing = 20% chance of WU, 40% each for Uni and Peg
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 40):
                                $this->breed = 'Pegasus';
                                break;
                            case $this->isBetween($breedNR, 40.01, 80):
                                $this->breed = 'Unicorn';
                                break;
                            case $this->isBetween($breedNR, 80.01, 100):
                                $this->breed = 'WingedUnicorn';
                                break;
                        }
                    } else {
// Pick a 50%
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 50):
                                $this->breed = $motherPony->breed;
                                $made = TRUE;
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                $made = TRUE;
                                break;
                        }
                    }
                    break;
                case 'DragonPony':

//                echo 'Danger! (breedNR = '.$breedNR.')';

                    if ($fatherPony->breed == 'DragonPony') {
                        $this->breed = $motherPony->breed;
                    } else if ($fatherPony->breed == 'MerPony') {

//Uni x Peg pairing = 20% chance of WU, 40% each for Uni and Peg
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 40):
                                $this->breed = 'DragonPony';
                                break;
                            case $this->isBetween($breedNR, 40.01, 80):
                                $this->breed = 'MerPony';
                                break;
                            case $this->isBetween($breedNR, 80.01, 100):
                                $this->breed = 'MerDragon';
                                break;
                        }
                    } else {
// Pick a 50%
                        switch (TRUE) {
                            case $this->isBetween($breedNR, 0.01, 50):
                                $this->breed = $motherPony->breed;
                                $made = TRUE;
                                break;
                            case $this->isBetween($breedNR, 50.01, 100):
                                $this->breed = $fatherPony->breed;
                                $made = TRUE;
                                break;
                        }
                    }
                    break;
                case 'PhoenixPony':
                    switch (TRUE) {
                        case $this->isBetween($breedNR, 0.01, 50):
                            $this->breed = $motherPony->breed;
                            $made = TRUE;
                            break;
                        case $this->isBetween($breedNR, 50.01, 100):
                            $this->breed = $fatherPony->breed;
                            $made = TRUE;
                            break;
                    }
                    break;
                case 'Valkyrie':
                    switch (TRUE) {
                        case $this->isBetween($breedNR, 0.01, 50):
                            $this->breed = $motherPony->breed;
                            $made = TRUE;
                            break;
                        case $this->isBetween($breedNR, 50.01, 100):
                            $this->breed = $fatherPony->breed;
                            $made = TRUE;
                            break;
                    }
                    break;
                case 'KirinPony':
                    switch (TRUE) {
                        case $this->isBetween($breedNR, 0.01, 50):
                            $this->breed = $motherPony->breed;
                            $made = TRUE;
                            break;
                        case $this->isBetween($breedNR, 50.01, 100):
                            $this->breed = $fatherPony->breed;
                            $made = TRUE;
                            break;
                    }
                    break;
                case 'PurrPony':
                    switch (TRUE) {
                        case $this->isBetween($breedNR, 0.01, 50):
                            $this->breed = $motherPony->breed;
                            $made = TRUE;
                            break;
                        case $this->isBetween($breedNR, 50.01, 100):
                            $this->breed = $fatherPony->breed;
                            $made = TRUE;
                            break;
                    }
                    break;
                case 'ReindeerPony':
                    switch (TRUE) {
                        case $this->isBetween($breedNR, 0.01, 50):
                            $this->breed = $motherPony->breed;
                            $made = TRUE;
                            break;
                        case $this->isBetween($breedNR, 50.01, 100):
                            $this->breed = $fatherPony->breed;
                            $made = TRUE;
                            break;
                    }
                    break;
                case 'MountainPony':
                    switch (TRUE) {
                        case $this->isBetween($breedNR, 0.01, 50):
                            $this->breed = $motherPony->breed;
                            $made = TRUE;
                            break;
                        case $this->isBetween($breedNR, 50.01, 100):
                            $this->breed = $fatherPony->breed;
                            $made = TRUE;
                            break;
                    }
                    break;
            }

            /**
             * Set the colorNR value to a random hex displacement value
             * Add a random value between -20 and 20 to each hex
             * Check that each hex is between the values of father and mother 
             * and adjust if needed
             */
            foreach ($this->hexsArray as $hex) {
                $colorNR = mt_rand(000, 255);

                /* Debug what the NR color is */
//        echo ' = '.$colorNR.' = ';
                if ($motherPony->{$hex}[0] > $fatherPony->{$hex}[0]) {
                    $this->{$hex}[0] = $fatherPony->{$hex}[0] + $colorNR + mt_rand(-20, 20);
                } else {
                    $this->{$hex}[0] = $motherPony->{$hex}[0] + $colorNR + mt_rand(-20, 20);
                }
                $this->{$hex}[0] = $this->plimit($this->{$hex}[0], $motherPony->{$hex}[0], $fatherPony->{$hex}[0]);
                if ($motherPony->{$hex}[0] > $fatherPony->{$hex}[0]) {
                    $this->{$hex}[0] = $fatherPony->{$hex}[0] + $colorNR + mt_rand(-20, 20);
                } else {
                    $this->{$hex}[0] = $motherPony->{$hex}[0] + $colorNR + mt_rand(-20, 20);
                }
                $this->{$hex}[0] = $this->plimit($this->{$hex}[0], $motherPony->{$hex}[0], $fatherPony->{$hex}[0]);
                if ($motherPony->{$hex}[1] > $fatherPony->{$hex}[1]) {
                    $this->{$hex}[1] = $fatherPony->{$hex}[1] + $colorNR + mt_rand(-20, 20);
                } else {
                    $this->{$hex}[1] = $motherPony->{$hex}[1] + $colorNR + mt_rand(-20, 20);
                }
                $this->{$hex}[1] = $this->plimit($this->{$hex}[1], $motherPony->{$hex}[1], $fatherPony->{$hex}[1]);
                if ($motherPony->{$hex}[2] > $fatherPony->{$hex}[2]) {
                    $this->{$hex}[2] = $fatherPony->{$hex}[2] + $colorNR + mt_rand(-20, 20);
                } else {
                    $this->{$hex}[2] = $motherPony->{$hex}[2] + $colorNR + mt_rand(-20, 20);
                }
                $this->{$hex}[2] = $this->plimit($this->{$hex}[2], $motherPony->{$hex}[2], $fatherPony->{$hex}[2]);
            }

//        /**
//         * Dump the object
//         */
//        echo '<pre>';
//        print_r($this);
//        echo '</pre>';

            /**
             * Check the nextAction
             * Is it either ponyBreed and ponyBreed Offspring Offspring?
             */
            if ((filter_input(INPUT_GET, 'nextAction') == 'ponyBreed') or ( filter_input(INPUT_GET, 'nextAction') == 'ponyBreedOO')) {

                /**
                 * Retrieve the sgene values from the querystring
                 */
                $piApi = new \jwebgen\piApi();
                                               
                $this->sgenePattern = $piApi->ponySgeneShort2Name(filter_input(INPUT_GET, 'bspattern'), 'pattern');
                $this->sgeneSocks = $piApi->ponySgeneShort2Name(filter_input(INPUT_GET, 'bssocks'), 'socks');
                $this->sgeneHair = $piApi->ponySgeneShort2Name(filter_input(INPUT_GET, 'bshair'), 'hair');
                $this->sgeneFace = $piApi->ponySgeneShort2Name(filter_input(INPUT_GET, 'bsface'), 'face');
            } else {
                /* Process pattern */
                $this->babySgenes($fatherPony, $motherPony, 'sgenePattern', 'pattern');

                /* Process Socks */
                $this->babySgenes($fatherPony, $motherPony, 'sgeneSocks', 'socks');

                /* Process Hair S-Gene */
                $this->babySgenes($fatherPony, $motherPony, 'sgeneHair', 'hair');


                /* Process the Face S-Gene */
                $this->babySgenes($fatherPony, $motherPony, 'sgeneFace', 'face');

//===========================================================================
            }


            $this->MakeDNA();

            if (filter_input(INPUT_GET, 'age') == "Baby") {
                $this->ponyAge = "&state=baby";
            } else {
                $this->ponyAge = '&state=a';
            }
        }

        /**
         * Sets the object's sgene based on the father and mother objects
         * @param object $fatherPony
         * @param object $motherPony
         * @param string $sgene
         * @param string $sgeneName 
         */
        private function babySgenes($fatherPony, $motherPony, $sgene, $sgeneName) {
            if ($motherPony->{$sgene} == 'CC') {
                $tcolor = TRUE;
                $tmpMom = 0;
            } else {
                $tmpMom = $this->sgeneLoci[$sgeneName][$motherPony->{$sgene}];
            }

            if ($fatherPony->{$sgene} == 'CC') {
                $tcolor = TRUE;
                $tmpDad = 0;
            } else {
                $tmpDad = $this->sgeneLoci[$sgeneName][$fatherPony->{$sgene}];
            }

            if (isset($tcolor)) {
                /* Either male or female has 'CC' */
                if ($fatherPony->{$sgene} == 'CC') {
                    $this->{$sgene} = $this->colorizedArray[$motherPony->{$sgene}];
                } else {
                    $this->{$sgene} = $this->colorizedArray[$fatherPony->{$sgene}];
                }
            } else {
                if ($tmpDad == $tmpMom) {
                    $this->{$sgene} = $fatherPony->{$sgene};
                } elseif ($tmpDad < $tmpMom) {
                    $this->{$sgene} = $fatherPony->{$sgene};
                } else {
                    $this->{$sgene} = $motherPony->{$sgene};
                }
            }
            if ($fatherPony->{$sgene} == 'CC' and $motherPony->{$sgene} == 'CC') {
                $this->{$sgene} = 'CC';
            }
        }

        /**
         * Generates a pony object fron posted form values
         */
        function parentPony($ponyGender, $setGender = false, $gender = '') {

            $this->breed = filter_input(INPUT_GET, $ponyGender.'breed');
            switch ($ponyGender) {
                case 'M':
                    $this->gender = 'Male';
                    break;
                case 'F':
                    $this->gender = 'Female';
                    break;
            }
            if ($setGender) {
                $this->gender = $gender;
            }
            $regs = array();
            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", filter_input(INPUT_GET, $ponyGender . 'eyes'), $regs);
            $this->colorEyes[0] = $regs[1];
            $this->colorEyes[1] = $regs[2];
            $this->colorEyes[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", filter_input(INPUT_GET, $ponyGender . 'hair'), $regs);
            $this->colorHair[0] = $regs[1];
            $this->colorHair[1] = $regs[2];
            $this->colorHair[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", filter_input(INPUT_GET, $ponyGender . 'hair2'), $regs);
            $this->colorHair2[0] = $regs[1];
            $this->colorHair2[1] = $regs[2];
            $this->colorHair2[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", filter_input(INPUT_GET, $ponyGender . 'body'), $regs);
            $this->colorBody[0] = $regs[1];
            $this->colorBody[1] = $regs[2];
            $this->colorBody[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", filter_input(INPUT_GET, $ponyGender . 'extra1'), $regs);
            $this->colorExtra1[0] = $regs[1];
            $this->colorExtra1[1] = $regs[2];
            $this->colorExtra1[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", filter_input(INPUT_GET, $ponyGender . 'extra2'), $regs);
            $this->colorExtra2[0] = $regs[1];
            $this->colorExtra2[1] = $regs[2];
            $this->colorExtra2[2] = $regs[3];

            $gene = filter_input(INPUT_GET, $ponyGender . 'sgene');

            if ($gene == '+++') {
                $this->sgenePattern = '';
                $this->sgeneSocks = '';
                $this->sgeneHair = '';
                $this->sgeneFace = '';
            } else {

                $locusGene = explode('_', $gene);
                $piApi = new \jwebgen\piApi();

                switch ($locusGene[0]) {
                    case 'pattern':
                        $this->sgenePattern = $piApi->ponySgeneShort2Name($locusGene[1], 'pattern');
                        break;
                    case 'socks':
                        $this->sgeneSocks = $piApi->ponySgeneShort2Name($locusGene[1], 'socks');
                        break;
                    case 'hair':
                        $this->sgeneHair = $piApi->ponySgeneShort2Name($locusGene[1], 'hair');
                        break;
                    case 'face':
                        $this->sgeneFace = $piApi->ponySgeneShort2Name($locusGene[1], 'face');
                        break;
                }
            }
            $this->MakeDNA();
        }

        /**
         * Returns the sgenes as a pipe-seperated string
         * @return string
         */
        function sgenes() {
            return $this->sgenePattern . '|' . $this->sgeneSocks . '|' . $this->sgeneHair . '|' . $this->sgeneFace;
        }

        /*
         * Checks that one number is between two other numbers
         * If not, it adjusts the first number up or down until it
         * is with in the range
         */

        /**
         * Checks that one number is between two other numbers
         * If not, it adjusts the first number up or down until it
         * is with in the range
         * @param float $bval
         * @param hex $fval
         * @param hex $mval
         * @return hex 
         */
        function plimit($bval, $fval, $mval) {
            $low = min(hexdec($mval), hexdec($fval));
            $high = max(hexdec($mval), hexdec($fval));
            if ($bval > $high) {
                $bval = $high;
            }
            if ($bval < $low) {
                $bval = $low;
            }
            return dechex($bval);
        }

        /**
         * Checks if a number is between two other numbers and
         * returns true, otherwise, returns false
         */
        function isBetween($number, $one, $two) {
            if ($number >= $one AND $number <= $two) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

    }

}