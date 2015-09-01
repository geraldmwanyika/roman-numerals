<?php
/**
 * Roman Numeral Generator Interface.
 * User: Gerald Mwanyika
 * Date: 01/09/2015
 * Time: 08:36
 */

interface RomanNumeralGeneratorInterface {
	public function generate($numb); // convert from int -> roman
	public function parse($roman); // convert from roman -> int
}
