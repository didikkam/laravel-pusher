<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusher Test</title>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>
        // Enable Pusher logging (for debugging)
        Pusher.logToConsole = true;

        // Initialize Pusher
        const pusher = new Pusher('your-pusher-app-key', {
            cluster: 'ap1',
            forceTLS: true
        });

        // Subscribe to the channel
        const channel = pusher.subscribe('todos');

        // Bind to the event
        channel.bind('todo.updated', function(data) {
            console.log('Received data:', data);
            // Handle the event data here
            const todoList = document.getElementById('todo-list');
            const todoItem = document.getElementById(`todo-${data.todo.id}`);

            if (todoItem) {
                todoItem.textContent = data.todo.name;
            } else {
                const newTodoItem = document.createElement('li');
                newTodoItem.id = `todo-${data.todo.id}`;
                newTodoItem.textContent = data.todo.name;
                todoList.appendChild(newTodoItem);
            }
        });
    </script>
</head>
<body>
    <div id="app">
        <h1>Todo List</h1>
        <ul id="todo-list">
            <!-- Todo items will be dynamically updated here -->
        </ul>
        <form id="add-todo-form">
            <input type="text" id="todo-name" placeholder="Enter todo name" required>
            <button type="submit">Add Todo</button>
        </form>
    </div>

    <script>
        // Handle form submission
        document.getElementById('add-todo-form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const todoName = document.getElementById('todo-name').value;

            fetch('/todos', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ name: todoName })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('todo-name').value = '';
            });
        });
    </script>
</body>
</html>
