<?php
$oldId = 0;
function generateId($reset = false) {
    global $oldId;
    $oldId = $reset ? 0 : $oldId;
    return $oldId++;
}

// majors
$majorsData = (object)[
    (object)[
        'order' => generateId(),
        'name' => 'Multimedia',
        'quota' => 5,
        'index' => 1,
    ], (object)[
        'order'=> generateId(),
        'name' => 'Pengawasan Mutu',
        'quota' => 12,
        'index' => 2,
    ], (object)[
        'order'=> generateId(),
        'name' => 'ATPH',
        'quota' => 20,
        'index' => 3,
    ], (object)[
        'order'=> generateId(),
        'name' => 'Perikanan',
        'quota' => 20,
        'index' => 4,
    ], (object)[
        'order'=> generateId(),
        'name' => 'Agronomi',
        'quota' => 20,
        'index' => 5,
    ],
];


// students
$studentsData = (object)[
    (object)[
        'id' => generateId(true),
        'name' => 'A',
        'score' => 43,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Multimedia',
        'option_2' => 'Pengawasan Mutu'
    ],(object)[
        'id' => generateId(true),
        'name' => 'P1',
        'score' => 43,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Multimedia',
        'option_2' => 'Pengawasan Mutu'
    ],(object)[
        'id' => generateId(true),
        'name' => 'P2',
        'score' => 43,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Multimedia',
        'option_2' => 'Pengawasan Mutu'
    ], (object)[
        'id' => generateId(true),
        'name' => 'P3',
        'score' => 43,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Multimedia',
        'option_2' => 'Pengawasan Mutu'
    ], (object)[
        'id' => generateId(),
        'name' => 'B',
        'score' => 65,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Multimedia',
        'option_2' => 'ATPH'
    ], (object)[
        'id' => generateId(),
        'name' => 'C',
        'score' => 78,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Pengawasan Mutu',
        'option_2' => 'Multi Media'
    ], (object)[
        'id' => generateId(),
        'name' => 'C',
        'score' => 100,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Pengawasan Mutu',
        'option_2' => 'Multi Media'
    ], (object)[
        'id' => generateId(),
        'name' => 'D',
        'score' => 65,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Pengawasan Mutu',
        'option_2' => 'Agronomi'
    ], (object)[
        'id' => generateId(),
        'name' => 'E',
        'score' => 89,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Agronomi',
        'option_2' => 'ATPH'
    ], (object)[
        'id' => generateId(),
        'name' => 'F',
        'score' => 90,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'ATPH',
        'option_2' => 'Agronomi'
    ], (object)[
        'id' => generateId(),
        'name' => 'G',
        'score' => 100,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'ATPH',
        'option_2' => 'Multimedia'
    ], (object)[
        'id' => generateId(),
        'name' => 'H',
        'score' => 86,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Multimedia',
        'option_2' => 'Pengawasan Mutu'
    ], (object)[
        'id' => generateId(),
        'name' => 'I',
        'score' => 69,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Agronomi',
        'option_2' => 'ATPH'
    ], (object)[
        'id' => generateId(),
        'name' => 'J',
        'score' => 50,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'ATPH',
        'option_2' => 'Multimedia'
    ], (object)[
        'id' => generateId(),
        'name' => 'K',
        'score' => 66,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Pengawasan Mutu',
        'option_2' => 'Perikanan'
    ], (object)[
        'id' => generateId(),
        'name' => 'L',
        'score' => 60,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Perikanan',
        'option_2' => 'Multimedia'
    ], (object)[
        'id' => generateId(),
        'name' => 'M',
        'score' => 97,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Perikanan',
        'option_2' => 'Pengawasan mutu'
    ], (object)[
        'id' => generateId(),
        'name' => 'N',
        'score' => 60,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Perikanan',
        'option_2' => 'ATPH'
    ], (object)[
        'id' => generateId(),
        'name' => 'O',
        'score' => 50,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Agronomi',
        'option_2' => 'Pengawasan mutu'
    ], (object)[
        'id' => generateId(),
        'name' => 'P',
        'score' => 79,
        'raport' => 75,
        'academic' => 75,
        'option_1' => 'Multimedia',
        'option_2' => 'ATPH'
    ]
];