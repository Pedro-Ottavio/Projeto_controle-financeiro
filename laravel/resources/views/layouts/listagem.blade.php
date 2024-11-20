@extends('layout')

@section('content')
<div class="container">
    <h1 class="my-4">Lista de Tarefas</h1>
    <div class="todo-container">
        <input type="text" id="new-task" placeholder="Nova Tarefa" class="form-control">
        <button onclick="addTask()" class="btn btn-primary mt-2">Adicionar Tarefa</button>
        <button onclick="resetTasks()" class="btn btn-warning mt-2">Atualizar</button>
        
        <ul id="task-list" class="list-group mt-4">
            <!-- As tarefas aparecerão aqui -->
        </ul>
    </div>
</div>

<script>
    function addTask() {
        var taskInput = document.getElementById("new-task");
        var taskText = taskInput.value.trim();
        if (taskText === "") {
            alert("Por favor, insira uma tarefa.");
            return;
        }

        var taskList = document.getElementById("task-list");

        var li = document.createElement("li");
        li.className = "list-group-item d-flex justify-content-between align-items-center";
        li.appendChild(document.createTextNode(taskText));

        var editButton = document.createElement("button");
        editButton.className = "btn btn-warning btn-sm ml-2";
        editButton.appendChild(document.createTextNode("Editar"));
        editButton.onclick = function () {
            var newTaskText = prompt("Modifique a tarefa:", taskText);
            if (newTaskText !== null && newTaskText.trim() !== "") {
                li.childNodes[0].nodeValue = newTaskText;
            }
        };

        var deleteButton = document.createElement("button");
        deleteButton.className = "btn btn-danger btn-sm ml-2";
        deleteButton.appendChild(document.createTextNode("Excluir"));
        deleteButton.onclick = function () {
            taskList.removeChild(li);
        };

        li.appendChild(editButton);
        li.appendChild(deleteButton);
        taskList.appendChild(li);

        taskInput.value = "";
    }

    function resetTasks() {
        var taskList = document.getElementById("task-list");
        taskList.innerHTML = ""; // Limpa a lista de tarefas
    }
</script>
@endsection
