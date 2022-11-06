<?php

return [
    'add' => [
        'comment' => [
            'submit' => 'Create',
            'header' => 'Create comment',
            'default' => [
                'comment' => 'Here is something I wanted to share.'
            ]
        ],
        'notification' => [
            'submit' => 'Add',
            'header' => 'Add notification?',
            'cancel' => 'Cancel',
        ],
        'project' => [
            'header' => 'Create project',
            'submit' => 'Create',
            'default' => [
                'name' => 'Build a dog house',
                'description' => 'Needs to be done ASAP, I am tired of vacuuming'
            ]
        ],
        'task' => [
            'header' => 'Create task',
            'submit' => 'Create',
            'default' => [
                'name' => 'Missing needed tools',
                'type' => 'Select one'
            ]
        ],
        'taskChange' => [
            'header' => 'Create task change',
            'submit' => 'Create',
            'default' => [
                'state' => 'Select one',
                'comment' => 'Found the missing tools, but they are not working.'
            ]
        ]
    ],
    'delete' => [
        'project' => [
            'header' => 'Delete project?',
            'submit' => 'Delete',
            'cancel' => 'Cancel'
        ],
        'task' => [
            'header' => 'Delete task?',
            'submit' => 'Delete',
            'cancel' => 'Cancel'
        ]
    ],
    'edit' => [
        'project' => [
            'header' => 'Edit project',
            'submit' => 'Edit',
        ],
        'task' => [
            'header' => 'Edit task',
            'submit' => 'Edit'
        ]
    ],
    'filter' => [
        'filter' => 'Filter',
        'search' => 'Search',
        'selectProjectDefault' => 'Select project',
        'selectTypeDefault' => 'Select type',
        'selectStateDefault' => 'Select state'
    ]
];
