<?php
session_start();
echo "<ul>";
foreach ($_SESSION['userData'] as &$data) {
    echo "<li>".$data."</li>";
}
echo "</ul>";
