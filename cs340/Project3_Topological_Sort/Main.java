package cs340projects;

//package com.company;
import java.util.*;
import java.io.*;
import java.util.Arrays;
import java.util.Scanner;
import java.util.ArrayList;
import java.util.List;

public class Main {

    public static void main(String[] args) throws IOException {
      /*  BinaryTree bt = new BinaryTree();
        String [] words = readFile("list.txt");
        for(int i = 0; i < words.length; i++ )
        {
            bt.insert(words[i]);
        }
       System.out.println(bt.bTreeSearch("asdf"));
                */
        
            /* String test = "1: 1 3 5";
        String[] test1 = test.split(":");
        String[] test2 = test1[1].split(" ");
        System.out.println(test1[0] + "   " + test1[1]);
        for(String variable : test2)
        {
            System.out.println(variable);
        }*/

        graph g = new graph();

        g.buildGraph("graphin-DAG.txt");
        List<String> result = g.topoSort();
        System.out.print(Arrays.toString(result.toArray()));
        

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
