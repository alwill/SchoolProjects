package com.company;

/**
 * Created by AlexWill on 9/15/15.
 */
public class MergeSort {

    public static void Sort(String[] inputArray, int start, int lastIndex)
    {

        if (start < lastIndex)
        {
            int middle = (start + lastIndex)/2;

            Sort(inputArray,start,middle);
            Sort(inputArray,middle+1,lastIndex);
            Merge(inputArray,start,middle,lastIndex);
        }

    }

    public static void Merge(String[] inputArray, int start, int middle, int lastIndex)
    {

        String[] temp = new String[lastIndex - start + 1];
        int index1 = start;
        int index2 = middle + 1;
        int i = 0;

        while((index1 <= middle) && (index2 <= lastIndex))
        {
            if(inputArray[index1].compareToIgnoreCase(inputArray[index2]) < 0)
            {
                temp[i] = inputArray[index1];
                index1++;
            }
            else
            {
                temp[i] = inputArray[index2];
                index2++;
            }
            i++;
        }

        if(index1 > middle)
        {
            for(int j = index2; j<= lastIndex; j++)
            {
                temp[i] = inputArray[j];
                i++;
            }
        }
        else
        {
            for(int f = index1; f <= middle; f++)
            {
                temp[i] = inputArray[f];
                i++;
            }
        }

        for(int g = 0; g <= lastIndex - start; g++)
        {
            inputArray[g + start] = temp[g];
        }
    }
}
