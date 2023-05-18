<?php
// ottengo una stringa
$json_string = file_get_contents('todo-list.json');
// var_dump($json_string);



//* json_decode(): ottengo un oggetto
// $todo_list = json_decode($json_string);

//* json_decode() + true: ottengo array associativi php
$todo_list = json_decode($json_string, true);
// var_dump($todo_list);

header('ContentType: application/json');
echo json_encode($todo_list);









?>


















