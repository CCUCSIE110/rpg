<?php
    require __DIR__ . '/add_score.php';

    $id = $_GET['id'];
    $success = $_GET['success'];
    $score = $_GET['score'];

    $result = add_score::save($id,$success,$score);
	$result2 = add_score::bonus($id);
    echo $result . '\n' . $result2;
