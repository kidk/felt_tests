<?php

require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

$data = [];

for($x = 0; $x < 100; $x++) {
    $data[] = [
        'name' => $faker->name,
        'address' => $faker->address,
        'text' => $faker->text
    ];
}

$json = json_encode($data);

// http://stackoverflow.com/questions/1678214/javascript-how-do-i-create-jsonp
if (array_key_exists('callback', $_GET)) {

    header('Content-Type: text/javascript; charset=utf8');
    header('Access-Control-Max-Age: 3628800');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    $callback = $_GET['callback'];
    echo $callback.'('.$json.');';

} else {
    // normal JSON string
    header('Content-Type: application/json; charset=utf8');

    echo $json;
}
