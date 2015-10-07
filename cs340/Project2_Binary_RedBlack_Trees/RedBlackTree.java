package com.company;

import java.io.FileWriter;
import java.io.IOException;

/**
 * Created by AlexWill on 9/24/15.
 */
public class RedBlackTree {

    public RBNode nil = new RBNode();
    public RBNode root = nil;

   public RedBlackTree()
   {
       root.left = nil;
       root.right = nil;
       root.parent = nil;
   }

    public void insert(String value)
    {
        insert(new RBNode(value));
    }
    private void insert(RBNode newNode)
    {
        RBNode current = root;
        RBNode dummy = nil;

        int i = 0;
        while(current != nil)
        {
            dummy = current;

            if(newNode.value.compareToIgnoreCase(current.value) < 0)
            {
                current = current.left;
            }
            else
            {
                current = current.right;
            }

        }

        newNode.parent = dummy;

        if(dummy == nil)
        {
            root = newNode;
        }
        else if(newNode.value.compareToIgnoreCase(dummy.value) < 0)
        {
            dummy.left = newNode;
        }
        else
        {
            dummy.right = newNode;
        }

        newNode.left = nil;
        newNode.right = nil;
        newNode.color = RBNode.RED;

        insertFixUp(newNode);

    }

    public void insertFixUp(RBNode current)
    {
        RBNode dummy = nil;

        while(current.parent.color == RBNode.RED)
        {

            if(current.parent == current.parent.parent.left)
            {
                dummy = current.parent.parent.right;

                //case 1

                if(dummy.color == RBNode.RED)
                {
                    current.parent.color = RBNode.BLACK;
                    dummy.color = RBNode.BLACK;
                    current.parent.parent.color = RBNode.RED;
                    current = current.parent.parent;
                }
                // case 2
                else if(current == current.parent.right)
                {
                    current = current.parent;
                    leftRotate(current);
                }

                //case 3
                else
                {
                    current.parent.color = RBNode.BLACK;
                    current.parent.parent.color = RBNode.RED;
                    rightRotate(current.parent.parent);
                }
            }
            else
            {
                dummy  = current.parent.parent.left;

                //case 1

                if(dummy.color == RBNode.RED)
                {
                    current.parent.color = RBNode.BLACK;
                    dummy.color = RBNode.BLACK;
                    current.parent.parent.color = RBNode.RED;
                    current = current.parent.parent;
                }
                // case 2
                else if(current == current.parent.left)
                {
                    current = current.parent;
                    rightRotate(current);
                }

                //case 3
                else
                {
                    current.parent.color = RBNode.BLACK;
                    current.parent.parent.color = RBNode.RED;
                    leftRotate(current.parent.parent);
                }
            }
        }

        root.color = RBNode.BLACK;
    }

    public void rightRotate(RBNode current)
    {
        RBNode dummy = current.left;
        current.left = dummy.right;

        if(dummy.right != nil)
        {
            dummy.right.parent = current;
        }

        dummy.parent = current.parent;

        if(current.parent == nil)
        {
            root = dummy;
        }
        else if(current.parent.right == current)
        {
            current.parent.right = dummy;
        }
        else
        {
            current.parent.left = dummy;
        }

        dummy.right = current;

        current.parent = dummy;
    }

    public void leftRotate(RBNode current)
    {
        RBNode dummy = current.right;
        current.right = dummy.left;

        if(dummy.left != nil)
        {
            dummy.left.parent=current;
        }
        dummy.parent = current.parent;

        if(current.parent == nil)
        {
            root = dummy;
        }
        else if(current.parent.left ==current)
        {
            current.parent.left = dummy;
        }

        else
        {
            current.parent.right = dummy;
        }

        dummy.left= current;
        current.parent = dummy;

    }
    public String rbtSearch(String value)
    {
        RBNode current = root;

        while(current != nil)
        {

            if(current.value.matches(value.replaceAll("\\*",".")))
            {
                return "RedBlack Tree Found: " + current.value;
            }
            else if(current.value.compareToIgnoreCase(value) < 0)
            {
                current = current.right;
            }
            else
            {
                current = current.left;
            }
        }
        return "RedBlack Tree Found: " + null;
    }
    public void display(RBNode root, FileWriter fw) throws IOException {
        if(root!= nil)
        {
            display(root.left, fw);
            fw.write(root.value + "\n");
            display(root.right, fw);
        }

    }

}

class RBNode
{
    public static int BLACK = 0;
    public static int RED = 1;
    public int color;

    public String value;

    RBNode right;
    RBNode left;
    RBNode parent;

    RBNode()
    {
        color = BLACK;
        parent = null;
        left = null;
        right = null;
    }

    public RBNode(String value)
    {
        this();
        this.value = value;
    }

}