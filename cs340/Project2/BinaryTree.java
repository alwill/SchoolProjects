package com.company;

/**
 * Created by AlexWill on 9/24/15.
 */
public class BinaryTree {

    public Node root;

    public BinaryTree()
    {
        this.root = null;
    }

    public void insert(String data)
    {
        Node node = new Node(data);
        if(root == null)
        {
            root = node;
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
