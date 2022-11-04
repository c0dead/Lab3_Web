<?php
session_start();
if (!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['salary']) && !empty($_POST['gender'])) {
    $_SESSION['userData'] = array(
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'salary' => $_POST['salary'],
        'gender' => $_POST['gender'],
    );
    echo "Data saved successfully.";
}
?>

<html>
    <body>
        <form action="indexC_NameAgeSalaryGender.php" method="post">
            <p>Enter your name: <input type="text" name="name"/></p>
            <p>Enter your age: <input type="text" name="age"/></p>
            <p>Enter your salary: <input type="text" name="salary"/></p>
            <p>Enter your gender: <input type="text" name="gender"/></p>
            <input type="submit" value="Submit" />
        </form>

        <form action="indexC_ShowData.php" method="post">
            <input type="submit" value="See the data">
        </form>
    </body>
</html>