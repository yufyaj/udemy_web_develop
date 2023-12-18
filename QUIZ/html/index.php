<?php 

require __DIR__.'/../lib/functions.php';

$ids = fetchAll();

if (!$ids) {
    error404();
}

$assignData = ["ids" => $ids,];

loadTemplate("index", $assignData);

?>