<?php
return [
    'todo/edit/([0-9]+)' => 'todo/edit/$1',
    'todo/new'           => 'todo/new',
    'todo/([0-9]+)'      => 'todo/view/$1',
    ''                   => 'todo/list',
];