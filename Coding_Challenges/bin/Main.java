package com.company;
/**
 * Written By Alex Will
 * The mehtods are commented out. Uncomment to test each function.
 * First one Fizzbuzz tests the fizzbuzz method
 *
 * The Second one is Merge Sorts accepts a text file called "perm30k.txt" and outputs the sorted file.
 */
import java.io.*;
import java.util.ArrayList;
import java.util.List;
public class Main {

    public static void main(String[] args) throws IOException {
        // write your code here

        /* Start Fizz Buzz */
        FizzBuzz fz = new FizzBuzz();
        fz.fizzBuzzBar(150);
        /* End Fizz Buzz */

        /* Start Merge Sort*/
        String[] words = readFile("perm30k.txt");
        MergeSort.Sort(words,0,words.length -1);
        FileWriter write = new FileWriter("MergeSort30k.txt");

        for(int j = 0; j < words.length; j++)
        {
            write.write(words[j] + "\n");
        }
        write.close();
        /* End Merge Sort */

    }

    public static String[] readFile(String filename) throws IOException {
        BufferedReader inputStream = new BufferedReader(new FileReader(filename));
        List testList = new ArrayList();
        String[] sample = null;
        String l;
        while ((l = inputStream.readLine()) != null) {
            sample = l.split(" ");
            for (int x=0; x < sample.length; x++) {
                testList.add(sample[x]);
            }
        }
        inputStream.close();
        String[] words = new String[testList.size()];
        testList.toArray(words);

        return words;
    }
}