<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Assumtions: FizzBuzz is in the set of Fizz and Buzz
 *
 * @author user
 */
class BaseIntConvertTask2 {
    /**
     * @assert (array(4,5,6,7,8,9,10,11)) == "4 Buzz Fizz Bazz 8 Fizz Buzz Bazz "
     * @assert (array(1,2,4,5,7,9,20,21,23,26)) == "1 2 4 Buzz 7 Fizz Buzz Fizz Bazz 26 "
     * @assert (array(11,15,18,20,22,25)) == "11 FizzBuzz Fizz Buzz Bazz Buzz "
     * @assert (array(33,35,37,41,43,50,51,62)) == "Fizz Buzz Bazz 41 43 Buzz Fizz Bazz "
     * @assert (array(3,5,7,9,11,13,15,17,19,21,22)) == "Fizz Buzz Bazz Fizz 11 13 FizzBuzz 17 19 Fizz 22 "
     * @assert (array(3,6,7,10,12,14)) == "Fizz Fizz Bazz Buzz Fizz Bazz "
     * @assert (array(15,30,44,45,51,52)) == "FizzBuzz FizzBuzz Bazz FizzBuzz Fizz Bazz "
     * @assert (array(5,10,11,13)) == "Buzz Buzz Bazz 13 "
     */
    public function convertingIntString($postvalue) {
            
            $array = $postvalue;		
            $output = "";	// Define variable for final output.

            if($this->checkint($array)) {

                    /* Generate the array with Fizz and Buzz. */		
                    for($i=0; $i<count($array); $i++) {
                            // Check if the integer value can be divid by 3.
                            if($array[$i]%3 == 0) {
                                    $output = "Fizz";	// If the modulus is 0 when the integer is divid by 3 then change it to Fizz.
                            }

                            if($array[$i]%5 == 0) {
                                    $output .= "Buzz";	// If the modulus is 0 when the integer is divid by 5 then change it to Buzz.
                            }

                            if($array[$i]%3 != 0 && $array[$i]%5 != 0) {
                                    $output = $array[$i];	// If the integer is not a multiple of 3 nor 5 then assign the integer for output.
                            }	

                            $outputArray[] = $output;	// Store the generated output into an array.

                            $output = "";	// Make the variable output to empty.
                    }
                    return $this->changeIntBazz($outputArray);
            }else {
                    $error = "Invalid input! Please enter positive integer values only!";
                    return $error;
            }


    }

    public function changeIntBazz($outputArray) {
            /* Generate the array with Fizz, Buzz and Bazz. */
            for($i=0; $i<count($outputArray); $i++) {
                    if(($outputArray[$i] == "Fizz" || $outputArray[$i] == "Buzz" || $outputArray[$i] == "FizzBuzz") && $i >0 && $i+1 < count($outputArray)) {	// Check if the value is Fizz or Buzz or FizzBuzz and index+1 of the array is withing the array length.
                            if($outputArray[$i-1] == "Buzz" || $outputArray[$i-1] == "Fizz" || $outputArray[$i-1] == "FizzBuzz") {	// Check if the value of index-1 of the array is Buzz or Fizz or FizzBuzz.
                                    if($outputArray[$i+1] != "Fizz" && $outputArray[$i+1] != "Buzz" && $outputArray[$i+1] != "FizzBuzz") {	// Check the value of index+1 of array is Fizz or Buzz or FizzBuzz. If not then proceed.
                                            $outputArray[$i+1] = "Bazz";	// Add value Bazz for array index+1.				
                                    }
                            }	
                    }
            }
            $finalString = "";	// Output list
            /* Generate the final output String */
            for($i=0; $i<count($outputArray); $i++) {
                    $finalString .= $outputArray[$i]." ";
            }
            return $finalString;
    }

    public function checkint($array) {
        for($i=0; $i<count($array); $i++) {

            if(($array[$i] <= 0) && is_int($array[$i])) {								
                    return false;
            }else if(!is_int($array[$i])) {					
                    return false;
            }
        }
        return true;
    }
}

?>