/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package cs340projects;

/**
 *
 * @author willa
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
            if(sample.length > 1)
            {
                addNode(dGraph,sample[0]);
                String[] right = sample[1].replaceAll("(^\\s+|\\s+$)", "").split("\\s+");
                for(String key : right)
                {
                    addEdge(dGraph,sample[0], key);
                }
            }
            else
            {
                addNode(dGraph,sample[0]);
            }
        }
        inputStream.close();
        for (String name: dGraph.keySet()){

            String key =name.toString();
            String value = dGraph.get(name).toString();
            System.out.println(key + " " + value);


        }
    }

    public void reverseGraph()
    {

        for (String node: dGraph.keySet())
            addNode(revGraph,node);

        /* Scan over all the edges in the graph, adding their reverse to the
         * reverse graph.
         */
        for (String node: dGraph.keySet())
            for (String endpoint: dGraph.get(node))
                addEdge(revGraph,endpoint, node);

    }
    
    public void dfsearch(String node,Map<String, Set<String>> graph,List<String> order,Set<String> visit, Set<String> searched)
    {
        if(visit.contains(node))
        {
            if(searched.contains(node))
            {
                return;
            }
            else
            {
                System.out.println("This graph contains a cycle.");
                System.exit(0);
            }
        }
        visit.add(node);
        
        for(String edges : graph.get(node))
        {
            System.out.println(node + " stuff: " + graph.get(node).toString());
            System.out.println("edge: " + edges);
            dfsearch(edges,graph,order,visit,searched);
        }
        
        order.add(node);
        searched.add(node);
    }
    
    public List<String> topoSort()
    {
        List<String> topoSorted = new ArrayList<String>();
        Set<String> visit = new HashSet<String>();
        Set<String> searched = new HashSet<String>();
        reverseGraph();
        for(String node : revGraph.keySet())
        {
            dfsearch(node,revGraph,topoSorted, visit, searched);
        }
        
        return topoSorted;
    }
    

}
