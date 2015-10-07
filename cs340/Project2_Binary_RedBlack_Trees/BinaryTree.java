package com.company;

import org.omg.Messaging.SYNC_WITH_TRANSPORT;

import java.awt.*;
import java.util.ArrayList;
import java.util.List;
import java.io.*;

/**
 * Created by AlexWill on 9/24/15.
 */
public class BinaryTree {

    public Node root;

    public BinaryTree()
    {
        this.root = null;
    }
    
    public String bTreeSearch(String value)
    {
        Node current = root;

        while(current != null)
        {
            //if(value.equalsIgnoreCase(current.value))
            if(current.value.matches(value.replaceAll("\\*",".")))
            {
                return "Binary Tree Found: " + current.value;
            }
            else if(current.value.compareToIgnoreCase(value) > 0)
            {
                current = current.left;
            }
            else
            {
                current = current.right;
            }
        }
        return "Binary Tree Found: " + null;
    }

    public void insert(String data)
    {
        Node node = new Node(data);
        if(root == null)
        {
            root = node;
            return;
        }

        Node current = root;
        Node parent = null;

        while(true)
        {
            parent = current; //starts at first node the root

            if(data.compareToIgnoreCase(current.value) < 0)
            {
                current = current.left;
                if(current == null)
                {
                    parent.left = node;
                    return;
                }
            }
            else
            {
                current = current.right;
                if(current == null)
                {
                    parent.right = node;
                    return;
                }
            }

        }
    }
    public void display(Node root, FileWriter fw) throws IOException {
        if(root!= null)
        {
            display(root.left, fw);
            fw.write(root.value + "\n");
            display(root.right, fw);
        }

    }

}

class Node {
    String value;

    Node right;
    Node left;

    public Node(String value)
    {
        this.value = value;
        left = null;
        right = null;
    }

}
