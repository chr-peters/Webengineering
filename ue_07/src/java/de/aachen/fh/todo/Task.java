/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package de.aachen.fh.todo;

public class Task {
    
    private long id;
    private boolean done;
    private String name;
    
    private static long counter = 1;
    
    public Task () {
        
    }
    
    public Task (String name, boolean done) {
        this.name = name;
        this.done = done;
        this.id = counter++;
    }

    public long getId() {
        return id;
    }

    public void setId(final long id) {
        this.id = id;
    }

    public boolean isDone() {
        return done;
    }

    public void setDone(final boolean done) {
        this.done = done;
    }

    public String getName() {
        return name;
    }

    public void setName(final String name) {
        this.name = name;
    }
    
}
