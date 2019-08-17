<?php

namespace jwebgen {

    /**
     * PI Workshop
     *
     * Classes
     *
     * namedPony()
     *   Extends pony
     *   used when name is known and
     *   pony exists on ponyisland
     */
    class namedPony extends \jwebgen\Pony {

        var $Nick;
        var $Name;
        var $Level;
        var $ID;
        var $piURL;

        function __construct() {
            $this->ID = '';
        }

        function PrintStats($noGender = false) {
            //$this->imageUrl = "http://im3.ponyisland.net/?img=pony&pny=" . $PonyX->ID . "&size=220&" . $tmpage . "&modified=" . time() . "&jwg";

            parent::setPonyIslandImageUrl();
            echo "<img src=\"$this->piImageUrl\"><br/>\n";

            echo '<span class="formLabel">* Nick: </span>' . $this->Nick . "<br/>\n";
            echo '<span class="formLabel">* Name: </span>' . $this->Name . "<br/>\n";
            if ($this->piImageUrl <> '') {
                if ($this->ID <> '') {
                    echo '<span class="formLabel">* URL: </span><input type="text" size="40" value="[URL http://im3.ponyisland.net/?img=pony&pny=' . $this->ID . '][IMG]' . $this->piImageUrl . '[/IMG][/URL]">' . "<br/>\n";
                } else {
                    echo '<span class="formLabel">* URL: </span><input type="text" size="40" value="[IMG]' . $this->piImageUrl . '[/IMG]">' . "<br/>\n";
                }
            }
            echo '<span class="formLabel">* Breed: </span>' . $this->breed . "<br/>\n";
            echo '<span class="formLabel">* Gender: </span>' . $this->gender . "<br/>\n";
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
         * Populates the class based on the ID
         */
        function createPonyFromID($ponyId, $usenew = false) {

            $this->ID = $ponyId;


            $piApi = new \jwebgen\piApi();

            $ponyXML = $piApi->ponyId2XML($this->ID, false, true);
            
            if ($ponyXML === false) {
                // Pony lookup from PonyIsland failed
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"assets/images/PICry_by_Eoko.png\"><br>\n";
                echo "PonyIsland did not respond or pony was not found, please try again.<br>\n";
                exit;
            }
            $tmpPonyXML = $ponyXML;

            $tmpAge = filter_input(INPUT_GET, 'idage');

            if ($tmpAge == 'Baby') {
                $this->ponyAge = '&state=baby';
            } else {
                $this->ponyAge = '&state=a';
            }
            $this->Name = $tmpPonyXML->name;
            if (isset($tmpPonyXML->nick)) {
                $this->Nick = $tmpPonyXML->nick;
            }
            $this->breed = $tmpPonyXML->breed;
            $this->gender = $tmpPonyXML->gender;
            $this->Level = $tmpPonyXML->level;
            $this->Inbreeding = $tmpPonyXML->inbreeding;

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", $tmpPonyXML->colors->eyes, $regs);
            $this->colorEyes[0] = $regs[1];
            $this->colorEyes[1] = $regs[2];
            $this->colorEyes[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", $tmpPonyXML->colors->hair, $regs);
            $this->colorHair[0] = $regs[1];
            $this->colorHair[1] = $regs[2];
            $this->colorHair[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", $tmpPonyXML->colors->stripe, $regs);
            $this->colorHair2[0] = $regs[1];
            $this->colorHair2[1] = $regs[2];
            $this->colorHair2[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", $tmpPonyXML->colors->body, $regs);
            $this->colorBody[0] = $regs[1];
            $this->colorBody[1] = $regs[2];
            $this->colorBody[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", $tmpPonyXML->colors->ex1, $regs);
            $this->colorExtra1[0] = $regs[1];
            $this->colorExtra1[1] = $regs[2];
            $this->colorExtra1[2] = $regs[3];

            preg_match("/([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})/", $tmpPonyXML->colors->ex2, $regs);
            $this->colorExtra2[0] = $regs[1];
            $this->colorExtra2[1] = $regs[2];
            $this->colorExtra2[2] = $regs[3];

            $this->sgeneHair = $tmpPonyXML->sgenes->hair;
            $this->sgeneSocks = $tmpPonyXML->sgenes->socks;
            $this->sgenePattern = $tmpPonyXML->sgenes->pattern;
            $this->sgeneFace = $tmpPonyXML->sgenes->face;
//        }
            parent::MakeDNA();
        }

    }

}
