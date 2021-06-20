
<?php

require_once 'Connection.php';
//require_once 'Contact.php';

print_r($_POST);

if (!empty($_POST)) {

//    $name = htmlspecialchars($_POST['userName'], ENT_NOQUOTES, 'UTF-8');
//    $phone = htmlspecialchars($_POST['userPhone'], ENT_NOQUOTES, 'UTF-8');
//    $email = htmlspecialchars($_POST['userEmail'], ENT_NOQUOTES, 'UTF-8');

    $postData = [
        [
            'name' => 'testDeal',
            'price' => 666,
        ],
    ];

//    $postContact = [
//        [
//            'name' => 'New deal',
//            'price' => 666,
//            '_embedded' => [
//                'metadata' => [
//                    'category' => 'forms',
//                    'form_name' => 'Form on the site',
//                    'referer' => 'http://####'
//                ],
//                'contacts' => [
//                    [
//                        'first_name' => $name,
//                        'custom_fields_values' => [
//                            [
//                                'field_code' => 'EMAIL',
//                                'values' => [
//                                    [
//                                        'value' => $email,
//                                    ],
//                                ],
//                            ],
//                            [
//                                'field_code' => 'PHONE',
//                                'values' => [
//                                        [
//                                            'value' => $phone,
//                                        ],
//                                ],
//                            ],
//                        ],
//                    ],
//                ],
//            ],
//        ],
//    ];

//    Создание сделки
    $connection = new App\Connection();

    $connection->post($postData, '/v4/leads');

//    Создание контакта и компании.
//    $connection->post($postContact, '/v4/leads/complex');
}

?>

<!--Простая форма-->
<!--<!DOCTYPE html>-->
<!--<html lang="ru">-->
<!--<head>-->
<!--        <meta charset="UTF-8">-->
<!--        <title>Форма обратной связи</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<!---->
<!--        <form name="amoCRM" action="" method="post" id="form_message">-->
<!--            <h2>Форма обратной связи.</h2>-->
<!--            <p> <div class="titles">Ваше имя*</div> <input class="input" name="name" type="text"/> </p>-->
<!---->
<!--            <p> <div class="titles">Электронная почта*</div> <input class="input" name="email" type="text"/> </p>-->
<!---->
<!--            <p> <div class="titles">Телефон</div> <input class="input" name="phone" type="text"/> </p>-->
<!---->
<!--            <p><input id="submit" value="Отправить заявку" type="submit" /></p>-->
<!--        </form>-->
<!---->
<!--</body>-->
<!--</html>-->
