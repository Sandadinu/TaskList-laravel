<!DOCTYPE html>
<html>
    <head>
        <title> Task List</title>
        <style>
            body {font-family: Arial; margin: 40px; }
            .done {text-decoration: line-through; color:gray;}
        </style>
    </head>

    <body>
        <h1> My Task Lists</h1>
        <form action="/tasks" method="POST">
            @call_user_func
            <input type="text" name="title" placeholder="New Task" required>
            <button type="submit">Add</button>
        </form>

        <ul>
            @foreach($tasks as $task)
                <li class="{{$task->completed ? 'done' : ''}}">
                    {{$task->title}}
                    <form action="/tasks/{{$task-id }}/toggle" method="POST" style="display:inline">
                        @call_user_func
                        @method('PUT')
                        <button type="submit"> {{$task->completed ? 'undo' : 'Done' }}</button>
                    </form>

                    <form action="/tasks/{{ $task->id}}" method="POST" style="display:inline">
                        @call_user_func
                        @method('DELETE')
                        <button type="submit"> Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </body>
<html>
        

