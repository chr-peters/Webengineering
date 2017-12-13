/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package de.aachen.fh.todo;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Produces;
import javax.ws.rs.Consumes;
import javax.ws.rs.GET;
import static javax.ws.rs.HttpMethod.POST;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PUT;
import javax.ws.rs.core.MediaType;

/**
 * REST Web Service
 *
 * @author we077970
 */
@Path("")
public class TodoAPI {

    @Context
    private UriInfo context;
    
    private HashMap<Long, Task> tasks;

    /**
     * Creates a new instance of TodoAPI
     */
    public TodoAPI() {
        this.tasks = new HashMap<Long, Task>();
    }
    
    @Consumes(MediaType.TEXT_PLAIN)
    @Produces(MediaType.APPLICATION_JSON)
    @POST
    @Path("todo")
    public Task putTask(String task){
        Task tmp = new Task(task, false);
        this.tasks.put(tmp.getId(), tmp);
        return tmp;
    }
    
    @GET
    @Produces(MediaType.APPLICATION_JSON)
    public List<Task> getAllTasks() {
        return new ArrayList<Task>(this.tasks.values());
    }

    /**
     * PUT method for updating or creating an instance of TodoAPI
     * @param content representation for the resource
     */
    @PUT
    @Consumes(MediaType.APPLICATION_JSON)
    public void putJson(String content) {
    }
}
