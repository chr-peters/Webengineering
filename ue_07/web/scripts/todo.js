//Main JS-File for RESTful TODO-App

$(function () {
    // Define Functions

    function taskAdd(task) {
        /* Sample task
         * <tr>
         *    <td>
         *        <input type="checkbox" />
         *    </td>
         *    <td>erste Aufagbe</td>
         *    <td>
         *       <button class="taskDelete">
         *          <span class="glyphicon glyphicon-trash"></span>
         *       </button>
         *    </td>
         * </tr>
         */
        var newTaskNode = $('<div class="row" id="task' + task.id + '"></div>');
        //checkbox
        var taskstatus = $('<input type="checkbox" id="done' + task.id + '"/>');
        taskstatus.click(toggleDone(task.id));
        if (task.done) {
            taskstatus.prop('checked', true);
            taskstatus.prop('disabled', true);
        }
        newTaskNode.append($('<div class="col-sm-1"> </div>').append(taskstatus));

        //Message
        var message = $('<div class="col-sm-10" id="name' + task.id + '"> ' + task.name + '</div>');
        if (task.done) {
            message.addClass("done");
        }
        newTaskNode.append(message);
        //Delete
        var taskDelete = $('<button class="btn btn-default btn-xs" id="delete' + task.id + '"> <span class="glyphicon glyphicon-trash"></span> </button>');
        taskDelete.click(taskRemove(task.id));
        newTaskNode.append($('<div class="col-sm-1 text-right"></div>').append(taskDelete));
        $('#todoList').prepend(newTaskNode);

    }
    
    function toggleDone(id) {
        var savedID = id;
        return function () {
            var url = "";
            if ($('#name' + id).hasClass('done')) {
                url = "todoAPI/undo/" + savedID;

            } else {
                url = "todoAPI/done/" + savedID;
            }
        
            $.ajax({
                url: url,
                type: 'PUT',
                contentType: 'application/json',
                charSet: 'utf-8',
                dataType: 'json',
                success: function (data) {
                    if (data.id === savedID) {
                        $('#name' + id).toggleClass("done");
                    }
                },
                error: errorHandling
            });
        };
    }

    function taskRemove(id) {
        var savedID = id;
        return function () {
            $.ajax({
                url: 'todoAPI/todo/'+savedID,
                type: 'DELETE',
                contentType: 'application/json',
                charSet: 'utf-8',
                dataType: 'json',
                success: function () {
                    $('#task' + savedID).remove();
                },
                error: errorHandling
            });
        }
    }

    function newTask(name) {
        $.ajax({
            url: 'todoAPI/todo/',
            type: 'POST',
            contentType: 'text/plain',
            charSet: 'utf-8',
            dataType: 'json',
            data: name,
            success: function (data) {
                taskAdd(data);
            },
            error: errorHandling
        });
    }


    function loadAllTasks() {
        $.ajax({
            url: 'todoAPI/',
            type: 'GET',
            contentType: 'application/json',
            charSet: 'utf-8',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (index, value) {
                    taskAdd(value);
                });
            },
            error: errorHandling
        });
    }

    function deleteAllTask() {
        $.ajax({
            url: 'todoAPI/',
            type: 'DELETE',
            contentType: 'application/json',
            charSet: 'utf-8',
            dataType: 'json',
            success: function () {
                $('#todoList').empty();
            },
            error: errorHandling
        });
    }

    function clearDoneTasks() {
        $.ajax({
            url: 'todoAPI/done',
            type: 'DELETE',
            contentType: 'application/json',
            charSet: 'utf-8',
            dataType: 'json',
            success: function (data) {
                $('#todoList').empty();
                $.each(data, function (index, value) {
                    taskAdd(value);
                });
            },
            error: errorHandling
        });
    }

    function errorHandling(jqXHR, textStatus, errorThrown) {
        console.log("ErrorAccured in Ajax: " + errorThrown + " (HTTPStatus: " + textStatus + ")");
    }

    //Bind functions
    $('form').submit(function () {
        newTask($('#newTaskName').val());
        return false;
    });
    $('#deleteAll').click(deleteAllTask);
    $('#clearDone').click(clearDoneTasks);

    //initialiase
    loadAllTasks();
});