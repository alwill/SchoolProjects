package com.company;

/**
 * Created by AlexWill on 9/15/15.
 */
public class Insertion {

    public static void Sort(String[] inputArray)
    {
        int j;
        for(int i = 1; i < inputArray.length ; i++)
        {
            String key = inputArray[i];
            j = i - 1;
            while((j >= 0) && (key.compareToIgnoreCase(inputArray[j]))<0) //if compare to is > then the word is less than comparitive screen
            {
                inputArray[j+1] = inputArray[j];

                j = j -1;
            }
            inputArray[j+1] = key;
        }
    }

}
