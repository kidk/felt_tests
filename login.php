<?php

if (
    isset($_POST['username']) &&
    isset($_POST['password']) &&
    $_POST['username'] == 'felt' &&
    $_POST['password'] == 'isAWESOME'
    ) {
    echo "done";
} else {
    header('Location: /');
}
