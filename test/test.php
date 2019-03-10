<?php
include_once ('../vendor/autoload.php');


$data = ['user' => ['name' => 'Mars', 'birthday' => '2000-01-01']];
var_export(\marshung\helper\ArrayHelper::getContent($data)); // full $data content
var_export(\marshung\helper\ArrayHelper::getContent($data, 'user')); // full $data content
echo \marshung\helper\ArrayHelper::getContent($data, ['user', 'name']); // Mars
echo \marshung\helper\ArrayHelper::getContent($data, ['user', 'name', 'aaa'], 1); // Mars


exit;


$data = [
    [
        '1'
    ],
    [
        '2','','4'
    ],
    [
        '5'
    ],
];

$options = [
    'data' => $data,
];

// $option =
// array (
//     'table' =>
//     array (
//         'style' => 'width:100%',
//         'border' => '1'
//     ),
//     'tr' =>
//     array (
//     ),
//     'th' =>
//     array (
//     ),
//     'td' =>
//     array (
//     ),
// );

// \marshung\structure\types\TableBuilder::setOption($option);


$render = '\marshung\structure\types\TableBuilder';

echo $render::render($options);

exit;


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

echo \marshung\structure\Structure::render($options);


exit;

?><!doctype html>
<html lang="zh_tw">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>