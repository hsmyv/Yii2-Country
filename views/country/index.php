<?php
use yii\helpers\Url;

echo 
    '<table style="width:100%; border:1px solid black; text-align:center">'.
    '<tr>'.
    '<th>Code<th>'.
    '<th>Name<th>'.
    '<th>Population<th>'.
    '</tr>';


foreach ($countries as $country) {

    echo
    '<tr>'.
    '<td>'. $country->code.'</td>'.
    '<td>'. $country->name.'</td>'.
    '<td>'. $country->population.'</td>'.
    '<td><a href="'.Url::to(['country/edit-country', 'id' => $country->id]).'">Edit</a></td>'.
    '<td><a href="'.Url::to(['country/delete-country', 'id' => $country->id]) . '">Delete</a></td>' .
    '</tr>';
}

echo '</table>';