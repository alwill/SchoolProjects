package com.company;

/**
 * Created by AlexWill on 10/18/15.
 *
 * https://github.com/KnownSubset/coding-challenges/tree/master/problems/shortest-fizz-buzz
 *
 * Given an upper range go from 1 to upper range.
 * if that number is multiple of 3 output fizz
 * if that number is multiple of 5 output buzz
 * if that number is multiple of 7 output bar
 * else output number
 */
public class FizzBuzz {

    //Simple method to check for multiples
    public void fizzBuzz(int upperRange)
    {
        for(int i = 1; i <= upperRange; i++) {
            if ((i % 3 == 0) && (i % 5 == 0))
            {
                System.out.println("FizzBuzz");
            }
            else if (i % 3 == 0) {
                System.out.println("Fizz");
            }
            else if (i % 5 == 0) {
                System.out.println("Buzz");
            }
            else
            {
                System.out.println(i);
            }
        }// end for
    }//end fizzbuzz()

    /**
     * Compared to the original fizz buzz this is a shorter function because I do not check modulated by 3,5 and 7 or
     * any combination of that. I use one for loop and 4 if statements to check for all the different outputs.
     * There are multiple ways I could have done this in multiple ways by checking multiples of 3,5,7,15,21,35 and 105
     */
    public void fizzBuzzBar(int upperRange)
    {
        String result = "";
        for(int i = 1; i <= upperRange; i++) {
            if (i % 3 == 0) {
                result += "Fizz";
            }
            if (i % 5 == 0) {
                result += "Buzz";
            }
            if(i % 7 == 0)
            {
                result += "Bar";
            }
            if( result.isEmpty())
            {
                result += String.valueOf(i);
            }
            System.out.println(result);

            result = "";
        }// end for
    }//end fizzBuzzBar()

}
