<?php

namespace jwebgen {


    /**
     * @package piapi
     * @author Joseph W Becher <jwbecher@jwebnet.net>
     */

    /**
     * PI Workshop
     *
     * Classes
     *
     * piApi()
     *   An API for interfacing with PonyIsland
     */
    class piApi {

        /**
         * 
         * @param string $strPonyBreed
         * @return int
         */
        public function ponyBreed2Int($strPonyBreed) {
            switch ($strPonyBreed) {
                case 'SeaPony':
                    return 1;
                case 'Pegasus':
                    return 2;
                case 'FlutterPony':
                    return 3;
                case 'EarthPony':
                    return 4;
                case 'Unicorn':
                    return 5;
                case 'ShellPony':
                    return 6;
                case 'FairyPony':
                    return 7;
                case 'MerPony':
                    return 8;
                case 'DragonPony':
                    return 9;
                case 'WingedUnicorn':
                    return 10;
                case 'PhoenixPony':
                    return 11;
                case 'Valkyrie':
                    return 12;
                case 'KirinPony':
                    return 13;
                case 'MerDragon':
                    return 14;
                case 'WishingPony':
                    return 15;
                case 'PurrPony':
                    return 16;
                case 'ReindeerPony':
                    return 17;
                case 'MountainPony':
                    return 18;
                case 'KitsunePony':
                    return 19;
                case 'DinoPony':
                    return 20;

                default:
                    echo 'Unsupported breed: ' . $strPonyBreed;
                    die;
            }
        }

        /**
         * Converts the sgene from the 2-char GG to the int used on PI
         * @param string $sgene
         * @param string $locus
         * @return string 
         */
        function ponySgeneShort2Name($sgene, $locus) {

            /**
             * Choices are body, socks, hair or face
             */
            switch ($locus) {
                case 'pattern':
                    switch ($sgene) {
                        case '++': return $sgene;
                        case 'none': return $sgene;
                        case 'PP': return 'Paint';
                        case 'PC': return 'Colorized Paint';
                        case 'ZZ': return 'ZigZag';
                        case 'ZC': return 'Colorized ZigZag';
                        case 'LL': return 'LDapples';
                        case 'LC': return 'Colorized LDapples';
                        case 'HH': return 'HDapples';
                        case 'HC': return 'Colorized HDapples';
                        case 'DD': return 'Faded';
                        case 'DC': return 'Colorized Faded';
                        case 'WW': return 'Clownfish';
                        case 'WC': return 'Colorized Clownfish';
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
                        case 'BB': return 'Biolum';
                        case 'BC': return 'Colorized Biolum';
                        case 'CC': return 'Colorized';
                        default :
                            return 'Unsupported Pattern Sgene: ' . $sgene;
                    }
                    break;
                case 'socks':
                    switch ($sgene) {
                        case '++': return $sgene;
                        case 'none': return $sgene;
                        case 'DD': return 'Faded';
                        case 'DC': return 'Colorized Faded';
                        case 'HH': return 'Socks';
                        case 'HC': return 'Colorized Socks';
                        case 'FF': return 'Stockings';
                        case 'FC': return 'Colorized Stockings';
                        case 'OO': return 'Okapi';
                        case 'OC': return 'Colorized Okapi';
                        case 'CC': return 'Colorized';
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
                        case 'DD': return 'Faded';
                        case 'DC': return 'Colorized Faded';
                        case 'KK': return 'Skull';
                        case 'KC': return 'Colorized Skull';
                        case 'CC': return 'Colorized';
                    }
                    break;
                default:
                    return $sgene;
                    break;
            }
        }

        /**
         * Converts the sgene from the number on PI to the name
         * @param integeger $sgeneId
         * @return string 
         */
        function ponySgeneInt2Name($sgeneId) {
            switch ($sgeneId) {
                case '1': return;
                case '1,17': return 'Colorized Paint';
                case '2': return 'ZigZag';
                case '2,17': return 'Colorized ZigZag';
                case '3': return 'LDapples';
                case '3,17': return 'Colorized LDapples';
                case '4': return 'HDapples';
                case '4,17': return 'Colorized HDapples';
                case '5': return 'Faded';
                case '20': return 'Faded';
                case '32': return 'Faded';
                case '28': return 'Faded';
                case '5,17': return 'Colorized Faded';
                case '20,22': return 'Colorized Faded';
                case '32,34': return 'Colorized Faded';
                case '6': return 'Clownfish';
                case '6,17': return 'Colorized Clownfish';
                case '7': return 'Zebra';
                case '7,17': return 'Colorized Zebra';
                case '8': return 'Tarantula';
                case '8,17': return 'Colorized Tarantula';
                case '9': return 'Monarch';
                case '9,17': return 'Colorized Monarch';
                case '10': return 'Fawn';
                case '10,17': return 'Colorized Fawn';
                case '11': return 'ZebraFinch';
                case '11,17': return 'Colorized ZebraFinch';
                case '12': return 'Koi';
                case '12,17': return 'Colorized Koi';
                case '13': return 'Appaloosa';
                case '13,17': return 'Colorized Appaloosa';
                case '14': return 'Gemsbok';
                case '14,17': return 'Colorized Gemsbok';
                case '15': return 'Numbat';
                case '15,17': return 'Colorized Numbat';
                case '16': return 'Biolum';
                case '16,17': return 'Colorized Biolum';
                case '17': return 'Colorized';
                case '20': return 'Colorized';
                case '18': return 'Socks';
                case '18,22': return 'Colorized Socks';
                case '19': return 'Stockings';
                case '19,22': return 'Colorized Stockings';
                case '21': return 'Okapi';
                case '21,22': return 'Colorized Okapi';
                case '23': return 'Stripes';
                case '24': return 'Rainbow';
                case '25': return 'Tips';
                case '26': return 'MStripes';
                case '27': return 'QStripes';
                case '29': return 'Star';
                case '29,34': return 'Colorized Star';
                case '30': return 'Freckles';
                case '30,34': return 'Colorized Freckles';
                case '31': return 'Blaze';
                case '31,34': return 'Colorized Blaze';
                case '33': return 'Skull';
                case '33,34': return 'Colorized Skull';
                default:
                    return 'Unsupported gene id: ' . $sgeneId;
            }
        }

        /**
         * Converts the sgene from the name to the int used on PI
         * @param string $sgeneName
         * @param string $locus
         * @return string 
         */
        function ponySgeneName2Int($sgeneName, $locus) {

            switch ($sgeneName) {
                case '++': return '';
                case 'none': return '';
                case 'Paint': return '1';
                case 'Colorized Paint': return '1|17';
                case 'ZigZag': return '2';
                case 'Colorized ZigZag': return '2|17';
                case 'LDapples': return '3';
                case 'Colorized LDapples': return '3|17';
                case 'HDapples': return '4';
                case 'Colorized HDapples': return '4|17';
                case 'Faded':
                    switch ($locus) {
                        case 'pattern':

                            return '5';
                        case 'socks':

                            return '20';
                        case 'face':

                            return '32';
                        case 'hair':

                            return '28';
                    }
                case 'Colorized Faded':
                    switch ($locus) {
                        case 'pattern':

                            return '5|17';
                        case 'socks':

                            return '20|22';
                        case 'face':

                            return '32|34';
                    }
                case 'Clownfish': return '6';
                case 'Colorized Clownfish': return '6|17';
                case 'Zebra': return '7';
                case 'Colorized Zebra': return '7|17';
                case 'Tarantula': return '8';
                case 'Colorized Tarantula': return '8|17';
                case 'Monarch': return '9';
                case 'Colorized Monarch': return '9|17';
                case 'Fawn': return '10';
                case 'Colorized Fawn': return '10|17';
                case 'ZebraFinch': return '11';
                case 'Colorized ZebraFinch': return '11|17';
                case 'Koi': return '12';
                case 'Colorized Koi': return '12|17';
                case 'Appaloosa': return '13';
                case 'Colorized Appaloosa': return '13|17';
                case 'Gemsbok': return '14';
                case 'Colorized Gemsbok': return '14|17';
                case 'Numbat': return '15';
                case 'Colorized Numbat': return '15|17';
                case 'Biolum': return '16';
                case 'Colorized Biolum': return '16|17';
                case 'Colorized':
                    switch ($locus) {
                        case 'pattern':

                            return '17';
                        case 'face':

                            return '20';
                    }
                case 'Socks': return '18';
                case 'Colorized Socks': return '18|22';
                case 'Stockings': return '19';
                case 'Colorized Stockings': return '19|22';
                case 'Okapi': return '21';
                case 'Colorized Okapi': return '21|22';
                case 'Stripes': return '23';
                case 'Rainbow': return '24';
                case 'Tips': return '25';
                case 'MStripes': return '26';
                case 'QStripes': return '27';
                case 'Star': return '29';
                case 'Colorized Star': return '29|34';
                case 'Freckles': return '30';
                case 'Colorized Freckles': return '30|34';
                case 'Blaze': return '31';
                case 'Colorized Blaze': return '31|34';
                case 'Skull': return '33';
                case 'Colorized Skull': return '33|34';
                default:
                    return 'Unsupported Sgene Name: ' . $sgeneName;
            }
        }

        /**
         * Fetches a url using curl and return it as a simplexml object
         * @param integer $ponyId
         * @param boolean $testOnly
         * @return string
         */
        function ponyId2XML($ponyId, $testOnly = false, $usenew = true) {

            $url = 'http://piproxy:9000/get/?pny=' . $ponyId;

            $browser = "Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.49 Safari/537.36";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_TIMEOUT, PONYISLAND_PONY_QUERY_TIMEOUT);
            curl_setopt($ch, CURLOPT_USERAGENT, $browser);

            $url_string = curl_exec($ch);

            if ($url_string === false) {
                /**
                 * Error occurred with the curl
                 * Please display p-cry and email me the error
                 */
                $info = curl_getinfo($ch);
                switch (curl_errno($ch)) {
                    case '7':
                        // Unable to connect
                    case '28':
                        // Normal timeout
                    default:
                        // Some other reason, log
                        $email = "curl failed. Why?\n\n";
                        $email .= "Contents of url\n" . $this->piURL . "\n\n";
                        $email .= 'Curl error: (' . curl_errno($ch) . ') ' . curl_error($ch) . "\n";
                        $email .= "Contents of info:\n\n" . print_r($info, 1);
                        error_log($email, 1, 'jwbecher+errors_jwebgen@gmail.com');
                        break;
                }
                curl_close($ch);
                return false;
            } else {
                /**
                 * curl attemp was a success
                 * Check if transfer was cut off
                 */
                $info = curl_getinfo($ch);
                if ($info['size_download'] < 200) {
                    /**
                     * download size is under 200
                     * PonyIsland returned a result, but it was empty
                     */
                    echo 'URL: '.$info['size_download'].$url_string;
                    curl_close($ch);
                    return false;
                } else if ($testOnly) {
                    return TRUE;
                } else {
                    /**
                     * Curl is a success and appears to be the correct length
                     * transform into xml
                     */
                    $xmlData = $this->cleanRawPonyXml($url_string);
                }
            }
            return $xmlData;
        }

        /**
         * 
         * @param string $ponyXMLString
         * @return simpleXml
         */
        private function cleanRawPonyXml($ponyXMLString) {
            $pattern_name = '@<name>(.+)</name>@i';
            $pattern_nick = '@<nick>(.+)</nick>@i';
            $pattern_owner = '@<owner>(.+)</owner>@i';
            $strCleanedName = preg_replace_callback($pattern_name, array(&$this, '_name_match'), $ponyXMLString);
            $strCleanedNick = preg_replace_callback($pattern_nick, array(&$this, '_nick_match'), $strCleanedName);
            $strCleanedOwner = preg_replace_callback($pattern_owner, array(&$this, '_owner_match'), $strCleanedNick);
            // libxml_use_internal_errors(true);
            $xmlData = simplexml_load_string($strCleanedOwner);
            if (!$xmlData) {
                /**
                 * conversion the xml failed
                 * email errors
                 */
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"assets/images/PICry_by_Eoko.png\"><br>\n";
                echo "PonyIsland is not currently responding, please try again.<br>\n";
                $email = "The XML pull was a success, but the simpleXML call failed. Why?\n\n";
                $email .= print_r($info, 1);
                $email .= "Contents of urlStr\n" . $url_string . "\n\n";
                $email .= "xml errors:\n";
                foreach (libxml_get_errors() as $error) {
                    $email .= "\t" . $error->message . "\n";
                }
                error_log($email, 1, 'jwbecher+errors_jwebgen@gmail.com');
                exit;
            }
            return $xmlData;
        }

        /**
         * Functions to remove HTML enties from XML
         */

        /**
         * 
         * @param string $match
         * @return string
         */
        private function _name_match($match) {
            $clean_name = '<name>' . htmlspecialchars($match[1], ENT_QUOTES) . '</name>';
            return $clean_name;
        }

        /**
         * 
         * @param string $match
         * @return string
         */
        private function _nick_match($match) {
            $clean_nick = '<nick>' . htmlspecialchars($match[1], ENT_QUOTES) . '</nick>';
            return $clean_nick;
        }

        /**
         * 
         * @param string $match
         * @return string
         */
        private function _owner_match($match) {
            $clean_owner = '<owner>' . htmlspecialchars($match[1], ENT_QUOTES) . '</owner>';
            return $clean_owner;
        }

    }

}

