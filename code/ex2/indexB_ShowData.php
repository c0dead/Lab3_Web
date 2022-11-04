<?php
session_start();
if (!empty($_SESSION['userData'])) {
    echo "Name: ".$_SESSION['userData']['name']."<br/>"."Surname: ".$_SESSION['userData']['surname']."<br/>".
    "Age: ".$_SESSION['userData']['age']."<br/>";
}