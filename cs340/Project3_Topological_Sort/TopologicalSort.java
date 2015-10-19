package com.company;

/**
 * Created by AlexWill on 10/18/15.
 */
import java.util.*;
import java.io.*;

class graph{

    private   Map<String, Set<String>> dGraph = new HashMap<String,Set<String>>();
    private   Map<String, Set<String>> revGraph = new HashMap<String,Set<String>>();

    public void addNode(Map<String, Set<String>> graph,String node)
    {
        if(graph.containsKey(node))
        {

        }
        else
        {
            graph.put(node, new HashSet<String>());
        }
    }
    public void addEdge(Map<String, Set<String>> graph,String node, String edge)
    {
        graph.get(node).add(edge);
    }

    public void buildGraph(String filename) throws IOException {
        BufferedReader inputStream = new BufferedReader(new FileReader(filename));
        //List testList = new ArrayList();
        String[] sample = null;
        String l;
        while ((l = inputStream.readLine()) != null) {
            sample = l.split(":");
            addNode(dGraph,sample[0]);
            String[] right = sample[1].split(" ");
            for(String key : right)
            {
                addEdge(dGraph,sample[0], key);
            }

        }
        inputStream.close();
        for (String name: dGraph.keySet()){

            String key =name.toString();
            String value = dGraph.get(name).toString();
            System.out.println(key + " " + value);


        }
    }

    public void reverseGraph() {

        for (String node: dGraph.keySet())
            addNode(revGraph,node);

        /* Scan over all the edges in the graph, adding their reverse to the
         * reverse graph.
         */
        for (String node: dGraph.keySet())
            for (String endpoint: dGraph.get(node))
                addEdge(revGraph,endpoint, node);

    }

}
