<html>
    <body>
        <form action="indexA_WordsAndCharsCount.php" method="post">
            <label>
                <textarea name="text" rows="3" cols="40"></textarea>
            </label>
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>

<?php
if (!empty($_POST['text'])) {
    $inputText = $_POST['text'];
    $words = str_word_count($inputText);
    $chars = strlen($inputText);
    echo "Words: ".$words."<br/>"."Chars: ".$chars."<br/>";
}