<?php
session_start();
$answer = $_POST["onionguard_answer"];

if ($_SESSION['times_0'] == $answer[1] - 2 && $_SESSION['times_1'] == $answer[2] - 2 && $_SESSION['times_2'] == $answer[3] - 2) {
    echo "<br><br>success<br>";
} else {
    echo  "<a href='./index.php'>Pease recaptcha</a>";
}