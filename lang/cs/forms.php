<?php

return [
    'add' => [
        'comment' => [
            'submit' => 'Vytvořit',
            'header' => 'Vytvořit komentář',
            'default' => [
                'comment' => 'Tři metry sedmdesát má slon, africkej'
            ]
        ],
        'notification' => [
            'submit' => 'Přidat',
            'header' => 'Přidat upozornění?',
            'cancel' => 'Zrušit',
        ],
        'project' => [
            'header' => 'Vytvořit projekt',
            'submit' => 'Vytvořit',
            'default' => [
                'name' => 'Postav třeba zeď',
                'description' => 'Upeč třeba chleba'
            ]
        ],
        'task' => [
            'header' => 'Vytvořit úkol',
            'submit' => 'Vytvořit',
            'default' => [
                'name' => 'Chodí to výborně, ale neseje to',
                'type' => 'Vybrat'
            ]
        ],
        'taskChange' => [
            'header' => 'Vytvořit změnu úkolu',
            'submit' => 'Vytvořit',
            'default' => [
                'state' => 'Vybrat',
                'comment' => 'Nějaká další hláška'
            ]
        ]
    ],
    'delete' => [
        'project' => [
            'header' => 'Smazat projekt?',
            'submit' => 'Smazat',
            'cancel' => 'Zrušit'
        ],
        'task' => [
            'header' => 'Smazat úkol?',
            'submit' => 'Smazat',
            'cancel' => 'Zrušit'
        ]
    ],
    'edit' => [
        'project' => [
            'header' => 'Upravit projekt',
            'submit' => 'Upravit',
        ],
        'task' => [
            'header' => 'Upravit úkol',
            'submit' => 'Upravit'
        ]
    ],
    'filter' => [
        'filter' => 'Filtrovat',
        'search' => 'Hledat',
        'selectProjectDefault' => 'Vybrat',
        'selectTypeDefault' => 'Vybrat',
        'selectStateDefault' => 'Vybrat'
    ]
];
