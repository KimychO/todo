<?php
return [
    'points/get/([0-9]+)' => 'points/get/$1',
    'points/save'         => 'points/save',

    'todo/edit/([0-9]+)' => 'todo/edit/$1',
    'todo/new'           => 'todo/new',

    'todo/save/([0-9]+)' => 'todo/save/$1',
    'todo/save'          => 'todo/save',

    'todo/remove/([0-9]+)' => 'todo/remove/$1',

    '' => 'todo/list',
];