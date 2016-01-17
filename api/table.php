<?php

require_once '_lib.php';

$faker = Faker\Factory::create();

$data = [];

for($x = 0; $x < 100; $x++) {
    $data[] = [
        'name' => $faker->name,
        'address' => $faker->address,
        'text' => $faker->text
    ];
}

callback($data);
