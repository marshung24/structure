<?php


////////////////////////////////////////////////////////////////

echo "Example 1: <br>\n";

$data = [
    [
        1,2,3,4,5,6,7,8,9,0
    ],
    [
        'a','s','d','f','g','h','j','k','l','q'
    ],
    [
        '','s','','f','','','j','','l',''
    ],
];
$title = [
    [
        'z','x','c','v','b','n','m','e','r','t'
    ]
];
$foot = [
    [
        'd'
    ]
];

$options = [
    'head' => $title,
    'data' => $data,
    'foot' => $foot
];


echo \marshung\structure\types\TableBuilder::render($options);



////////////////////////////////////////////////////////////////


