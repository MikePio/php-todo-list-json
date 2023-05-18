<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- fontawesome -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous' />
  <!-- css -->
  <link rel="stylesheet" href="style.css">
  <!-- vue -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/3.2.47/vue.global.js' integrity='sha512-2zwx0mkoR2cxZY0humPK79YhJYgoX5lT+WNqkgTcV7qhVm3+msjlmOgoXnN1cW2r9qqbZez3XhnLZsyW3k8Wtg==' crossorigin='anonymous'></script>
  <!-- axios -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.js' integrity='sha512-RjvSEaeDqPCfUVQ9kna2/2OqHz/7F04IOl1/66LmQjB/lOeAzwq7LrbTzDbz5cJzlPNJ5qteNtHR56XaJSTNWw==' crossorigin='anonymous'></script>
  <title>To Do List</title>
</head>

<body style="background-color: rgb(35, 75, 177); color: white; font-family: Arial, Helvetica, sans-serif;">

  <div id="app">
    <h1 class="logo">Todo list</h1>
    <div class="container">
      <div class="container-input">
        <input placeholder="Scrivi qui un compito da svolgere" type="text">
        <button class="add-item">Aggiungi alla lista</button>
      </div>
      <div class="error-message">Il campo di input è vuoto</div>
      <ul class="item-list">
        <li v-for="(task, index) in tasks" :key="index" class="item">
          {{ task.text }}
          <span></span>
          <i class="fa fa-trash" aria-hidden="true"></i>
        </li>
        <!-- <li class="item">
              <span class="done">Task</span>
              <i class="fa fa-trash" aria-hidden="true"></i>
            </li>
            <li class="item">
              <span class="done">Task</span>
              <i class="fa fa-trash" aria-hidden="true"></i>
            </li>
            <li class="item">
              <span>Task</span>
              <i class="fa fa-trash" aria-hidden="true"></i>
            </li> -->
      </ul>
    </div>


  </div>

  <script src="script.js"></script>
</body>

</html>