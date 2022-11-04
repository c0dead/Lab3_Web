<?php
session_start();
if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['age'])) {
    $_SESSION['userData'] = array(
        'name' => $_POST['name'],
        'surname' => $_POST['surname'],
        'age' => $_POST['age'],
    );
    echo "Data saved successfully.";
}
?>

<html>
    <body>
        <form action="indexB_NameSurnameAge.php" method="post">
            <p>Enter your name: <input type="text" name="name"/></p>
            <p>Enter your surname: <input type="text" name="surname"/></p>
            <p>Enter your age: <input type="text" name="age"/></p>
            <input type="submit" value="Submit" />
        </form>

        <form action="indexB_ShowData.php" method="post">
            <input type="submit" value="See the data">
        </form>
    </body>
</html>