<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Avito</title>
</head>
<body>
    <div id="form">
    <!-- форма с полями (email, выбор категории (названия выше созданных
    папок), заголовок объявления и текст объявления, кнопка Добавить) -->
        <form action="save.php" method="post">
            <label for="email">email:</label>
            <input type="email" name="email" required>

            <label for="category">category:</label>
            <select name="category" required>
                <?php
                $dir = './categories';
                $categories = scandir($dir);
                foreach($categories as $c):
                    if ($c != "." && $c != "..")
                        echo '<option value="'.$c.'">'.$c.'</option>';
                endforeach;
                ?>
            </select>

            <label for="title">title:</label>
            <input type="text" name="title" required>

            <label for="description">description:</label>
            <textarea rows="3" cols="25" name="description"></textarea>

            <input type="submit" value="Save">
        </form>
    </div>
    <div id="table">
        <table>
            <thead>
                <th>category</th>
                <th>email</th>
                <th>title</th>
                <th>description</th>
            </thead>
            <tbody>
            <?php
            foreach ($categories as $c) {
                if ($c != "." && $c != "..") {
                    $categoryPath = "categories/".$c; // путь до категории
                    $emailFolders = scandir($categoryPath);
                    foreach ($emailFolders as $ef) {
                        if ($ef != "." && $ef != "..") {
                            $emailFolderPath = "categories/".$c."/".$ef; // путь до папки email
                            $bulletins = scandir($emailFolderPath);
                            foreach ($bulletins as $b) {
                                if ($b != "." && $b != "..") {
                                    $bulletinPath = $emailFolderPath . "/" . $b; // путь до объявления
                                    $currentBulletin = fopen($bulletinPath, "r");
                                    $desc = file_get_contents($bulletinPath);
                                    fclose($currentBulletin);
                                    echo "<tr>"; // строка, дальше -- её столбцы
                                    echo "<td>" . $c . "</td>"; // категория
                                    echo "<td>" . $ef . "</td>"; // email
                                    echo "<td>" . substr($b, 0, -4) . "</td>"; // title (убираем из названия .txt)
                                    echo "<td>" . $desc . "</td>"; // содержимое объявления
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                }
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
