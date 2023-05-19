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
function filePut($todo_list){
  file_put_contents('todo-list.json', json_encode($todo_list));
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

//cambio del valore done da false a true o viceversa
if(isset($_POST['changeStatus'])){
  $index = $_POST['changeStatus'];

  //* le doppie quadre perché è un array
  $todo_list[$index]['done'] = !$todo_list[$index]['done'];
  //* se fosse stato un oggetto
  // $todo_list[$index => 'done'] = !$todo_list[$index => 'done'];
  filePut($todo_list);
}

// eliminazione di un task
if(isset ($_POST ['taskToDelete'])){
  $index = $_POST ['taskToDelete'];
  array_splice($todo_list, $index, 1);
  filePut($todo_list);
}

//trasformo i dati per renderli compatibili al file json
header('ContentType: application/json');

// stampa tramite json_encode
echo json_encode($todo_list);









?>


















