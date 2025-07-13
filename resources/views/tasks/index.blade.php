<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TaskList</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        form {
            margin-bottom: 20px;
        }
        .task {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        .completed {
            text-decoration: line-through;
            color: gray;
        }
        button {
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <h1>📝 My Task List</h1>

    {{-- Add New Task --}}
    <form action="/tasks" method="POST">
        @csrf
        <input type="text" name="title" placeholder="Enter new task" required>
        <button type="submit">Add Task</button>
    </form>

    {{-- Display Tasks --}}
    @foreach ($tasks as $task)
        <div class="task">
            <span class="{{ $task->completed ? 'completed' : '' }}">{{ $task->title }}</span>

            {{-- Mark as Complete --}}
            @if (!$task->completed)
                <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit">✅ Complete</button>
                </form>
            @endif

            {{-- Delete Task --}}
            <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">❌ Delete</button>
            </form>
        </div>
    @endforeach

</body>
</html>
