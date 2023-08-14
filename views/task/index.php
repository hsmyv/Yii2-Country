<?php

use yii\helpers\Url;

echo '<a href="' . Url::to(['task/create-task']) . '">Create</a></td>';

echo
'<table style="width:100%; border:1px solid black; text-align:center">' .
    '<tr>' .
    '<th>Name<th>' .
    '<th>Content<th>' .
    '<th>EndDate<th>' .
    '</tr>';


foreach ($tasks as $task) {

    echo
    '<tr>' .
        '<td>' . $task->name . '</td>' .
        '<td>' . $task->content . '</td>' .
        '<td>' . $task->endDate . '</td>' .
        '<td><a href="' . Url::to(['task/edit-task', 'id' => $task->id]) . '">Edit</a></td>' .
        '<td><a href="' . Url::to(['task/delete-task', 'id' => $task->id]) . '">Delete</a></td>' .
        '</tr>';
}

echo '</table>';
