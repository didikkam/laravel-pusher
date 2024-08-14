import './bootstrap';
// import Pusher from 'pusher-js';

// // Initialize Pusher
// const pusher = new Pusher('361a31314f1a9d681740', {
//   cluster: 'mt1',
//   forceTLS: true
// });

// // Subscribe to the channel
// const channel = pusher.subscribe('todos');

// // Bind to the event
// channel.bind('todo.updated', function(data) {
//   console.log("todo.updated");
  
//   const todoList = document.getElementById('todo-list');
//   const todoItem = document.getElementById(`todo-${data.todo.id}`);

//   if (todoItem) {
//     todoItem.textContent = data.todo.name;
//   } else {
//     const newTodoItem = document.createElement('li');
//     newTodoItem.id = `todo-${data.todo.id}`;
//     newTodoItem.textContent = data.todo.name;
//     todoList.appendChild(newTodoItem);
//   }
// });

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
