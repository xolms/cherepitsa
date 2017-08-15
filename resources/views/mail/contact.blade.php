<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новая заявка с формы обратной связи</title>
    <p>В {{$time}} была отправлена форма обратной связи с сайта {{$_SERVER['SERVER_NAME']}}</p>
    <p>Данные приложение к письму</p>
    <ul>
        <li>
            Имя: {{$data->name}}
        </li>
        <li>
            E-mail: {{$data->mail}}
        </li>
        <li>
            Телефон: {{$data->phone}}
        </li>
        <li>
            Текст: {{$data->message}}
        </li>
    </ul>
</head>
<body>

</body>
</html>