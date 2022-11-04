<?php
// делаем редирект на главную страницу
function redirectToHome(): void {
    header('Location: /ex3/'); // если поля не установлены, возвращаем пользователя обратно на страницу

    exit();
}

// проверяем, что установлены все поля
if (false === isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description'])) {
    redirectToHome();
}

$category = $_POST['category'];
$email = $_POST['email'];
$title = $_POST['title'];
$desc = $_POST['description'];

$dirPath = "categories/{$category}/{$email}"; // путь до папки email
if (!file_exists($dirPath)) // если такой папки ещё нет, создаём её
    mkdir("categories/{$category}/".$email, 0777);

$filePath = "categories/{$category}/{$email}/{$title}.txt"; // путь, по которому находится файл объявления

// пытаемся записать данные $desc в файл объявления, который находится по пути $filePath
if (false === file_put_contents($filePath, $desc)) {
    throw new Exception('Something went wrong.');
}

redirectToHome();