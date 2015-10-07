package com.company;
import java.util.*;
import java.io.*;
import java.util.Arrays;
import java.util.Scanner;
import java.util.ArrayList;
import java.util.List;
import java.util.regex.*;

public class Main {

    public static void main(String[] args) throws IOException {
        BinaryTree bt = new BinaryTree();
        RedBlackTree rbt = new RedBlackTree();
        List foundWords = new ArrayList();
        String[] perm = {"perm15K.txt","perm30K.txt","perm45K.txt","perm60K.txt","perm75K.txt"};
        String[] sort = {"sorted15K.txt","sorted30K.txt","sorted45K.txt","sorted60K.txt","sorted75K.txt"};

        for(int i = 0; i < perm.length; i++)
        {

            String[] words = readFile(perm[i]);

            long start = System.currentTimeMillis();
            for(int j = 0; j < words.length; j++)
            {
                bt.insert(words[j]);
            }
            long end = System.currentTimeMillis();
            long total = end - start;
            FileWriter write = new FileWriter("BinaryTree" + perm[i]);

            bt.display(bt.root,write);
            String totalParsed = String.valueOf(total);
            write.write("Total Time: " + totalParsed + " milliseconds");
            System.out.println("Binary Tree Total Time: " + totalParsed + " milliseconds " + perm[i] );
            write.close();
            long start1 = System.currentTimeMillis();
            bt.bTreeSearch("INVERTED");
            long end1 = System.currentTimeMillis();
            long total1 = end1 - start1;
            String totalParsed1 = String.valueOf(total1);
            System.out.println("Binary Tree Total Time for searching INVERTED: " + totalParsed1 + " milliseconds " + perm[i]);
        }
        for(int i = 0; i < perm.length; i++)
        {

            String[] words = readFile(perm[i]);

            long start = System.currentTimeMillis();
            for(int j = 0; j < words.length; j++)
            {
                rbt.insert(words[j]);

            }
            long end = System.currentTimeMillis();
            long total = end - start;
            FileWriter write = new FileWriter("RedBlackTree" + perm[i]);

            rbt.display(rbt.root,write);
            String totalParsed = String.valueOf(total);
            write.write("Total Time: " + totalParsed + " milliseconds");
            System.out.println("RedBlack Tree Total Time: " + totalParsed + " milliseconds " + perm[i]);
            write.close();
            long start1 = System.currentTimeMillis();
            rbt.rbtSearch("INVERTED");
            long end1 = System.currentTimeMillis();
            long total1 = end1 - start1;
            String totalParsed1 = String.valueOf(total1);
            System.out.println("RedBlack Tree Total Time for searching INVERTED: " + totalParsed1 + " milliseconds " + perm[i]);
        }
        for(int i = 0; i < sort.length; i++)
        {

            String[] words = readFile(sort[i]);

            long start = System.currentTimeMillis();
            for(int j = 0; j < words.length; j++)
            {
                bt.insert(words[j]);
            }
            long end = System.currentTimeMillis();
            long total = end - start;
            FileWriter write = new FileWriter("BinaryTree" + sort[i]);

            bt.display(bt.root,write);
            String totalParsed = String.valueOf(total);
            write.write("Total Time: " + totalParsed + " milliseconds");
            System.out.println("Binary Tree Total Time: " + totalParsed + " milliseconds " + sort[i] );
            write.close();
            long start1 = System.currentTimeMillis();
            bt.bTreeSearch("INVERTED");
            long end1 = System.currentTimeMillis();
            long total1 = end1 - start1;
            String totalParsed1 = String.valueOf(total1);
            System.out.println("Binary Tree Total Time for searching INVERTED: " + totalParsed1 + " milliseconds " + perm[i]);
        }
        for(int i = 0; i < sort.length; i++)
        {

            String[] words = readFile(sort[i]);

            long start = System.currentTimeMillis();
            for(int j = 0; j < words.length; j++)
            {
                rbt.insert(words[j]);
            }
            long end = System.currentTimeMillis();
            long total = end - start;
            FileWriter write = new FileWriter("RedBlackTree" + sort[i]);

            rbt.display(rbt.root,write);
            String totalParsed = String.valueOf(total);
            write.write("Total Time: " + totalParsed + " milliseconds");
            System.out.println("RedBlack Tree Total Time: " + totalParsed + " milliseconds " + sort[i] );
            write.close();
            long start1 = System.currentTimeMillis();
            rbt.rbtSearch("INVERTED");
            long end1 = System.currentTimeMillis();
            long total1 = end1 - start1;
            String totalParsed1 = String.valueOf(total1);
            System.out.println("RedBlack Tree Total Time for searching INVERTED: " + totalParsed1 + " milliseconds " + perm[i]);
        }

       FileWriter write = new FileWriter("Query_Results.txt");
        String test = "FRET";
        String test1 = "INVERTED";
        String test2  = "FE*";
        write.write("Searching for " + test + " : \n" + bt.bTreeSearch(test) + "   " + rbt.rbtSearch(test));
        write.write("\nSearching for " + test1 + " : \n" + bt.bTreeSearch(test1) + " " + rbt.rbtSearch(test1));
        write.write("\nSearching for " + test2 + " : \n" + bt.bTreeSearch(test2) + "   " + rbt.rbtSearch(test2));

        write.close();


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
