package com.company;

/**
 * Created by AlexWill on 10/18/15.
 */

import org.junit.Test;

import java.lang.reflect.Array;

import static org.junit.Assert.assertArrayEquals;
import static org.junit.Assert.assertEquals;

public class TestMergeSort {

    @Test
    public void testSort()
    {
        String[] test = {"Test", "Alex", "Zata","Alpha"};
        MergeSort.Sort(test,0,test.length - 1);
        String[] sorted = {"Alex", "Alpha", "Test", "Zata"};
        assertArrayEquals(test,sorted); //should pass
    }

}
