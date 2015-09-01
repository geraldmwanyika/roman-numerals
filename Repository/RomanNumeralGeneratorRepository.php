<?php
/**
 * Roman Numeral Generator Interface.
 * User: Gerald Mwanyika
 * Date: 01/09/2015
 * Time: 08:36
 */

include "RomanNumeralGeneratorInterface.php";


class RomanNumeralGeneratorRepository implements RomanNumeralGeneratorInterface
{

	function __construct()
	{
		// Roman => numbers
		$this->values = [
			'M' 	=> 1000,
	        'CM' 	=> 900,
	        'D' 	=> 500,
	        'CD' 	=> 400,
	        'C' 	=> 100,
	        'XC' 	=> 90,
	        'L' 	=> 50,
	        'XL' 	=> 40,
	        'X' 	=> 10,
	        'IX' 	=> 9,
	        'V' 	=> 5,
	        'IV' 	=> 4,
	        'I' 	=> 1
		];
	}	

	/*
	* Convert number to roman numeric
	* @param int $numb
	* @return string
	*/
	public function generate($numb)
	{
		$results = "";
		
		//Get integer value of a variable
		$n = intval($numb);

		//Loop through the roman values and get keys
		foreach($this->values as $roman=>$numb) {
			
			//Devide the interget by numbers
			$matches = intval($n/$numb);

			//Repeat a string and add it to the results
			$results .= str_repeat($roman, $matches);

			//return reminder of the division to use again
			$n = $n % $numb;

		}

		return $results;
	}

	/*
	* Convert roman numeric to integer
	* @param string $roman
	* @return int
	*/
	public function parse($roman)
	{

		$result = 0;
		$i = 0;
		$state = 0;

		//Get lenght of the string
		$lenght = strlen($roman);

		//convert string to array
		$romanArray = str_split($roman);

		//Loop through the supplied roman numerics
		for ($x = $lenght-1; $x >= 0; $x--) {

			//loop through the array to match each numeric
			foreach($this->values as $roman=>$numb) {

				//match each roman numeric with array
				if(strtoupper($romanArray[$x]) == @$roman) {
					
					if($state > $numb) {
						//if roman numeric number is less than previous, substract
						$result -= $numb;
					} else {
						//if roman numeric number is greater, add
						$result += $numb;
						$state = $numb;
					}

				}
			}
			$i++;
		}

		return $result;
	}

}