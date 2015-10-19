package com.company;

import java.io.*;
public class Main {

    public static void main(String[] args) throws IOException{
	// write your code here
       /* String test = "1: 1 3 5";
        String[] test1 = test.split(":");
        String[] test2 = test1[1].split(" ");
        System.out.println(test1[0] + "   " + test1[1]);
        for(String variable : test2)
        {
            System.out.println(variable);
        }*/

        graph g = new graph();

        g.buildGraph("graphin-directed.txt");
    }
}
