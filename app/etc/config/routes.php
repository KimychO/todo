<?php
return [
    'todo/edit/([0-9]+)' => 'todo/edit/$1',
    'todo/new'           => 'todo/new',

    'todo/save/([0-9]+)' => 'todo/save/$1',
    'todo/save'          => 'todo/save',

    'todo/([0-9]+)'      => 'todo/view/$1',
    ''                   => 'todo/list',
];