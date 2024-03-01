## Задание 1:

Есть таблица Users. 
Нужно написать один SQL запрос, чтобы получить пользователей из первой группы т.е. пользователей, у которых group = 1. Результат должен вывести колонки:
id(пользователя) / name(пользователя) / name_group (группы). 
Подсказка: написать JOIN запрос

Таблица 1 (пользователи – “users”)
<pre>
Id	name	    group
-------------------------
1	Ирина	    2
2	Харитон	    1
3	Ольга	    3
4	Илья	    2
</pre>
Таблица 2 (группы – “groups”)
<pre>
Id	name
------------
1	Гости
2	Модератор
3	Администратор
</pre>
### Ответ:
````sql
SELECT users.id, users.name, groups.name AS name_group
FROM users    
JOIN groups ON users.group = groups.id
WHERE users.group = 1;
````
## Задание 2:
### Выберите правильный вариант А или В. И напишите его преимущество.
Вариант А:
````php
<?
$arItems = [['id' => 1], ['id' => 2], ['id' => 3], ['id' => 4], ['id' => 5]];

foreach($arItems as $key => $arVal) {

    $res = CIBlockElement::GetByID($arVal['id']);
    
    while($arData = $res->GetNext()) {
    
        $arResult[] = $arData;
    }
}
?>
````
Вариант B:
````php
<?
$arItems = [['id' => 1], ['id' => 2], ['id' => 3], ['id' => 4], ['id' => 5]];
$arIds = [];

foreach($arItems as $arVal) {

 	$arIds[] = intval($arVal['id']);
}

$res = CIBlockElement::GetList( array('ID' => 'ASC'), array('IBLOCK_ID' => XX, 'ID' => $arIds, 'ACTIVE' => 'Y'), false, false, array('ID', 'NAME', 'PREVIEW_PICTURE'));

while($arData = $res->GetNext()) {

   $arResult[] = $arData;
}
?>
````
### Ответ:
Правильный вариант — B. Он делает один запрос к базе данных, а вариант А делает пять запросов в цикле. Использование варианта B — улучшает производительность и уменьшает нагрузку на сервер.

Вариант B также позволяет задать дополнительные параметры для выборки элементов: IBLOCK_ID, ACTIVE и arSelectFields.
## Задание 3:
### Написать именно свою компоненту (не использовать стандартные) и сбросить нам в виде архива. (задача на знание Bitrix Framework)
Компонента должна выводить всех пользователей на страницу из группы Администратор.
На странице должен отобразиться Логин, Email, Имя, Фамилия
Вывод данных должен происходить в шаблоне компонента. (т.е. echo 'ID товара, Название товара'; печатать в шаблоне компонента, а не в component.php)
### Ответ:
[task3-component.zip](../main/task-3/task3-component.zip)
## Задание 4:
### Написать именно свою компоненту (не использовать стандартные) и сбросить нам в виде архива. (задача на знание Bitrix Framework)
Компонента должна выводить список товаров из любого раздела на ваш выбор.
Указание ID раздела необходимо сделать через параметры компонента.
На странице должно отобразиться ID товара, Название товара
Вывод данных должен происходить в шаблоне компонента. (т.е. echo 'ID товара, Название товара'; печатать в шаблоне компонента, а не в component.php)
### Ответ:
[task4-component.zip](../main/task-4/task4-component.zip)
## Задание 5:
### Написать форму обратной связи (html+php)
HTML форма из двух полей email и textarea
PHP должен принять POST запрос, проверить поля на пустоту, добавить валидацию поля email и отправить данные на почту.
### Ответ:
````html
<!DOCTYPE html>
<html>
<body>
    <form action="send_email.php" method="post">
        Email: <input type="text" name="email"><br>
        Сообщение: <textarea name="message"></textarea><br>
        <input type="submit">
    </form>
</body>
</html>
````
````php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Проверяем, не пустые ли поля
    if(empty($email) || empty($message)) {
        echo "Поля email и сообщение не могут быть пустыми.";
        exit();
    }

    // Регулярное выражение для проверки email
    $emailRegex = "/^[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/";
    if (!preg_match($emailRegex, $email)) {
        echo "Неверный формат email.";
        exit();
    }

    // Очищаем входные данные для предотвращения атак XSS
    $email = strip_tags(htmlspecialchars($email));
    $message = strip_tags(htmlspecialchars($message));

    // Отправка email
    $to = 'your-email@example.com';
    $subject = 'Отправка формы обратной связи';
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    if(mail($to, $subject, $message, $headers)) {
        echo "Email успешно отправлен.";
    } else {
        echo "Не удалось отправить email.";
    }
}
````
<hr>

#### ДОКУМЕНТАЦИЯ к ТЗ
Требования к заданию №5
<br>
Задание должно быть выполнено с использованием регулярного выражения.
Важно предусмотреть безопасность передаваемых данных.
Гуглить можно, но запрещено использовать готовые примеры.
[Документация к заданию №2, 4](https://dev.1c-bitrix.ru/api_help/iblock/functions/getiblockelementlist.php)
<br>
[Документация к заданию №3](https://dev.1c-bitrix.ru/api_help/main/reference/cuser/getlist.php)
<br>
[Документация к заданию №3, 4](https://dev.1c-bitrix.ru/learning/course/index.php?COURSE_ID=43&LESSON_ID=2894&LESSON_PATH=3913.3435.4777.2894)
