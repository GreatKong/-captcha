<?php
session_start();
global $times;
$times = array();
$times[0] = rand(0, 7);
$times[1] = rand(0, 7);
$times[2] = rand(0, 7);

$_SESSION['times_0'] = $times[0];
$_SESSION['times_1'] = $times[1];
$_SESSION['times_2'] = $times[2];