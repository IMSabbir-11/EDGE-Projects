<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="w-1/2 bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">To-Do List</h2>
        
        <!-- Task Form -->
        <form action="/tasks" method="POST" class="mb-4 flex">
            @csrf
            <input type="text" name="title" placeholder="Enter task..." required
                class="w-full p-2 border rounded-l-lg focus:outline-none">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r-lg">Add</button>
        </form>

        <!-- Task List -->
        <ul>
    @foreach ($tasks as $task)
        <li class="flex justify-between items-center bg-gray-200 p-3 rounded-lg mb-2">
            <span class="font-medium">{{ $task->title }}</span>

            <span class="text-gray-600 text-sm">
                Added on: {{ $task->created_at->format('d M Y, h:i A') }}
            </span>

            <form action="/tasks/{{ $task->id }}/update-status" method="POST">
                @csrf
                <select name="status" class="p-1 rounded" onchange="this.form.submit()">
                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="abandoned" {{ $task->status == 'abandoned' ? 'selected' : '' }}>Abandoned</option>
                </select>
            </form>
        </li>
    @endforeach
</ul>

    </div>
</body>
</html>

