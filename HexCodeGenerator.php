<?php
/**
 * User: mitchlusas
 * Date: 11/16/15
 * Time: 1:07 PM
 */

class HexCodeGenerator
{
    // MARK: Public Methods

    /**
    * Create a TextFile of HexCodes
    *
    * @param string $folderPath
    * @param int $numOfCodes
    * @param int $numOfCharacters
    *
    */
    public function createTextFileOfCodes(string $folderPath, int $numOfCodes, int $numOfCharacters){
        $arrayOfCodes = array_unique($this->createCodeArray($numOfCodes, $numOfCharacters));
        $currentTime = time();
        $filepath = $folderPath.'/codes_'.$currentTime.'.txt';
        file_put_contents($filepath, implode(PHP_EOL, $arrayOfCodes));
        print_r $numOfCodes.' codes generated and saved in '.$filepath.' '.PHP_EOL.'example: '.$arrayOfCodes[0];
    }
    
    
    // MARK: Private Variables and Methods
    
    private static $characters = [
        'a', 'b', 'c', 'd', 'e',
        'f', '0', '1', '2', '3',
        '4', '5', '6', '7', '8',
        '9'
    ];

    /**
     * Creates a random character string based on the number of characters and returns the string
     *
     * @param int $numOfCharacters
     *
     * @return string
     */
    private static function createRandomCharacterString(int $numOfCharacters){
        $randomString = '';
        for($i = 0; $i <= $numOfCharacters; $i++){
            $randomString .= self::$characters[mt_rand(0, 15)];
        }

        return $randomString;
    }

    /**
     * Create an array of HexCodes
     *
     * @param int $numOfCodes
     * @param int $numOfCharacters
     *
     * @return array
     */
    private function createCodeArray(int $numOfCodes, int $numOfCharacters){
        $arrayOfCodes = [];
        $amountReached = false;
        $codesToCreate = $numOfCodes;
        while($amountReached == false){
            for($i = 0; $i < $codesToCreate; $i++) {
                array_push($arrayOfCodes, $this->createRandomCharacterString($numOfCharacters));
            }
            $arrayOfCodes = array_unique($arrayOfCodes);
            $currentCount = count($arrayOfCodes);
            if($currentCount >= $numOfCodes) {
                $amountReached = true;
            } else {
                $codesToCreate = $numOfCodes - $currentCount;
            }
        }
        return $arrayOfCodes;
    }
}

?>