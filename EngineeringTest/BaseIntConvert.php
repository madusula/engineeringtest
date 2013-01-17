<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseIntConvert
 *
 * @author user
 */
class BaseIntConvert {
    
    /**
     * @assert (array(1,2,3,4,5,6,7,8,9,10)) == "1 2 Fizz 4 Buzz Fizz 7 8 Fizz Buzz "
     * @assert (array(4,5,6,8,9,12,15)) == "4 Buzz Fizz 8 Fizz Fizz FizzBuzz "
     * @assert (array(5,7,9,10,15,16,18,20,24,30)) == "Buzz 7 Fizz Buzz FizzBuzz 16 Fizz Buzz Fizz FizzBuzz "
     * @assert (array(10,24,30,40,45)) == "Buzz Fizz FizzBuzz Buzz FizzBuzz "
     * @assert (array(6,10,19,20,25,105)) == "Fizz Buzz 19 Buzz Buzz FizzBuzz "
     * @assert (array(6,-10,19,20,25,105)) == "Invalid input! Please enter positive integer values only!"
     * @assert (array(6,"a",19,20,25,105)) == "Invalid input! Please enter positive integer values only!"
     */
    
    function convertingIntString($postvalue) {
        $array = $postvalue;		
        $output = "";	// Define variable for final output.

        if($this->checkint($array)) {

            /* Generate the final output. */
            for($i=0; $i<count($array); $i++) {
                // Check if the integer value can be divid by 3.
                if($array[$i]%3 == 0) {
                        $output .= "Fizz"; // If the modulus is 0 when the integer is divid by 3 then change it to Fizz.
                }

                if($array[$i]%5 == 0) {
                        $output .= "Buzz";	// If the modulus is 0 when the integer is divid by 5 then change it to Buzz.
                }

                if($array[$i]%3 != 0 && $array[$i]%5 != 0) {
                        $output .= $array[$i];	// If the integer is not a multiple of 3 nor 5 then assign the integer for output.
                }

                $output .= " ";	// Add a space between output values.
            }
        }else {
                $output = "Invalid input! Please enter positive integer values only!";
        }

        return $output;
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