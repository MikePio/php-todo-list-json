<?php
// dal file json prendo i dati e li trasformo in una stringa 
$json_string = file_get_contents('todo-list.json');
// var_dump($json_string);

//* json_decode(): ottengo un oggetto
// $todo_list = json_decode($json_string);

//* json_decode() + true: ottengo array associativi php
$todo_list = json_decode($json_string, true);
// var_dump($todo_list);

// funzione per inserire l'oggetto nel json (non è obbligatoria)
function filePut($tasks){
  file_put_contents('todo-list.json', json_encode($tasks));
}

// se axios invia in POST newTask quest'ultimo viene pushato nell'array
if(isset($_POST['newTask'])){
  //* SENZA FormData();
  // $todo_list[] = $_POST['newTask'];
  // file_put_contents('todo-list.json', json_encode($todo_list));
  
  //* CON FormData();
  $new_task = 
  [
    'text' => $_POST['newTask'],
    'done' => false
  ];
  $todo_list[] = $new_task;
  
  filePut($todo_list);
  // OPPURE
  // file_put_contents('todo-list.json', json_encode($todo_list));
}

//trasformo i dati per renderli compatibili al file json
header('ContentType: application/json');

// stampa tramite json_encode
echo json_encode($todo_list);









?>


















