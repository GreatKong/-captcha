<?php
session_start();
global $times;
$times = [];
$times[0] = rand(0, 7);
$times[1] = rand(0, 7);
$times[2] = rand(0, 7);

$_SESSION['times_0'] = $times[0];
$_SESSION['times_1'] = $times[1];
$_SESSION['times_2'] = $times[2];
// Get the image and convert into string

$random_array = [
    [8, 2, 9, 7, 4, 6, 3, 5, 1],
    [7, 5, 9, 3, 4, 6, 8, 1, 2],
    [7, 3, 2, 5, 9, 4, 6, 1, 8],
    [1, 8, 4, 2, 5, 3, 9, 7, 6],
    [2, 1, 7, 9, 3, 4, 5, 8, 6],
    [2, 5, 1, 8, 6, 4, 9, 3, 7],
    [5, 9, 6, 3, 1, 7, 8, 4, 2],
    [2, 6, 9, 8, 3, 4, 5, 1, 7],
    //-------------------------------------
    [2, 4, 9, 7, 6, 3, 1, 5, 8],
    [9, 6, 3, 2, 1, 4, 7, 8, 5],
    [1, 6, 2, 5, 9, 4, 3, 7, 8],
    [1, 3, 9, 5, 7, 8, 6, 4, 2],
    [5, 6, 1, 7, 9, 2, 4, 8, 3],
    [6, 7, 3, 2, 4, 8, 1, 9, 5],
    [6, 8, 4, 1, 3, 7, 9, 5, 2],
    [4, 7, 8, 5, 9, 2, 6, 1, 3],
    //----------------------------------------
    [3, 2, 8, 4, 7, 1, 9, 6, 5],
    [8, 7, 9, 3, 1, 6, 2, 5, 4],
    [8, 7, 4, 9, 1, 3, 2, 6, 5],
    [5, 8, 9, 3, 7, 2, 1, 6, 4],
    [7, 6, 5, 4, 3, 1, 8, 2, 9],
    [3, 1, 2, 7, 6, 4, 8, 5, 9],
    [1, 6, 3, 7, 5, 8, 2, 4, 9],
    [2, 4, 9, 3, 1, 6, 5, 8, 7],
];
// global $times;
// echo $times[0];
// echo $times[1];
// echo $times[2];

// print_r($times);
$imgList = glob('./image/*');
$imBg = imagecreatetruecolor(2970, 110);
for ($j = 0; $j < 3; $j++) {
    $random = array_rand($imgList, 1);
    // $random = 0;
    $file_bg = $imgList[$random];
    // echo $file_bg;

    $imFullBg = imagecreatefrompng($file_bg);
    for ($index = 0; $index < 9; $index++) {
        $i = $random_array[$times[$j] + $j * 8][$index] - 1;
        // $i = $index;
        // echo $i . "<br>";
        imagecopy(
            $imBg,
            $imFullBg,
            $index * 110 + $j * 990,
            0,
            ($i % 3) * 110,
            (int) ($i / 3) * 110,
            110,
            110
        );
    }
}
// $imBg = imagecreatetruecolor(110, 110);
// imagecopy($imBg, $imFullBg, 0, 0, 110, 0, 110, 110);

ob_start();

imagejpeg($imBg);
$image_data = ob_get_contents();

ob_end_clean();

// Encode the image string data into base64
$data = base64_encode($image_data);
imagewebp($imBg, 'output.png', 90);

// for ($k = 0; $k < count($imgList); $k++) {
//     $file = $imgList[$k];
//     echo $file . "<br>";
//     $imFullBg = imagecreatefrompng($file);
// }

// Display the output
// echo $data;
?>
<!DOCTYPE html>
<!-- saved from url=(0019)https://bohemia.so/ -->
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css" media="all">
</head>

<body>


    <form method="post" action="server.php">
        <style>
        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>.image-frames>.frame>div {
            background-image: url(data:image/jpeg;base64,<?php echo $data; ?>
)
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="2"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(1) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="2"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(2) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="2"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(3) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="2"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(4) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="2"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(5) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="2"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(6) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="2"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(7) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="2"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(8) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="2"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(9) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="3"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(1) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="3"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(2) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="3"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(3) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="3"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(4) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="3"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(5) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="3"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(6) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="3"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(7) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="3"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(8) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="3"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(9) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="4"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(8) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="4"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(3) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="4"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(2) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="4"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(6) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="4"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(4) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="4"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(7) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="4"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(1) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="4"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(9) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="4"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(5) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="5"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(1) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="5"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(2) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="5"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(3) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="5"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(4) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="5"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(5) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="5"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(6) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="5"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(7) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="5"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(8) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="5"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(9) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="6"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(1) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="6"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(2) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="6"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(3) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="6"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(4) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="6"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(5) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="6"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(6) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="6"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(7) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="6"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(8) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="6"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(9) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="7"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(1) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="7"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(2) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="7"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(3) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="7"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(4) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="7"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(5) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="7"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(6) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="7"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(7) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="7"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(8) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="7"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(9) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="8"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(1) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="8"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(2) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="8"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(3) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="8"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(4) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="8"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(5) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="8"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(6) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="8"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(7) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="8"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(8) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="8"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(9) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="9"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(1) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="9"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(2) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="9"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(3) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="9"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(4) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="9"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(5) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="9"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(6) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="9"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(7) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="9"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(8) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[1]"][value="9"]:checked~.image-frames>.frame:nth-child(1)>div:nth-child(9) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="2"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(7) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="2"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(1) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="2"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(6) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="2"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(2) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="2"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(8) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="2"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(5) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="2"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(4) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="2"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(9) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="2"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(3) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="3"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(1) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="3"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(2) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="3"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(3) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="3"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(4) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="3"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(5) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="3"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(6) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="3"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(7) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="3"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(8) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="3"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(9) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="4"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(1) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="4"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(2) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="4"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(3) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="4"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(4) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="4"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(5) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="4"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(6) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="4"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(7) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="4"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(8) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="4"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(9) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="5"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(1) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="5"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(2) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="5"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(3) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="5"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(4) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="5"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(5) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="5"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(6) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="5"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(7) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="5"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(8) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="5"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(9) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="6"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(1) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="6"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(2) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="6"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(3) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="6"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(4) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="6"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(5) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="6"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(6) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="6"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(7) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="6"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(8) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="6"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(9) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="7"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(1) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="7"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(2) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="7"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(3) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="7"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(4) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="7"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(5) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="7"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(6) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="7"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(7) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="7"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(8) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="7"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(9) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="8"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(1) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="8"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(2) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="8"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(3) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="8"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(4) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="8"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(5) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="8"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(6) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="8"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(7) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="8"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(8) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="8"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(9) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="9"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(1) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="9"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(2) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="9"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(3) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="9"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(4) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="9"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(5) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="9"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(6) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="9"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(7) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="9"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(8) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[2]"][value="9"]:checked~.image-frames>.frame:nth-child(2)>div:nth-child(9) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="2"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(1) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="2"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(2) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="2"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(3) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="2"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(4) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="2"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(5) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="2"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(6) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="2"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(7) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="2"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(8) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="2"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(9) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="3"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(1) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="3"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(2) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="3"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(3) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="3"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(4) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="3"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(5) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="3"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(6) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="3"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(7) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="3"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(8) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="3"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(9) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="4"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(5) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="4"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(7) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="4"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(6) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="4"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(3) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="4"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(9) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="4"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(8) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="4"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(2) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="4"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(1) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="4"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(4) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="5"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(1) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="5"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(2) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="5"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(3) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="5"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(4) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="5"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(5) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="5"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(6) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="5"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(7) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="5"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(8) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="5"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(9) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="6"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(1) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="6"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(2) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="6"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(3) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="6"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(4) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="6"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(5) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="6"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(6) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="6"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(7) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="6"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(8) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="6"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(9) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="7"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(1) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="7"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(2) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="7"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(3) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="7"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(4) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="7"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(5) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="7"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(6) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="7"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(7) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="7"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(8) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="7"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(9) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="8"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(1) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="8"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(2) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="8"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(3) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="8"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(4) {
            top: 213.32px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="8"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(5) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="8"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(6) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="8"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(7) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="8"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(8) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="8"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(9) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="9"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(1) {
            top: 0px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="9"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(2) {
            top: 106.66px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="9"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(3) {
            top: 213.32px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="9"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(4) {
            top: 0px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="9"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(5) {
            top: 0px;
            left: 0px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="9"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(6) {
            top: 106.66px;
            left: 213.32px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="9"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(7) {
            top: 106.66px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="9"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(8) {
            top: 213.32px;
            left: 106.66px;
        }

        #onionguard-352ba24fed92211536d2d8e0>.onionguard-window>input[type="radio"][name="onionguard_answer[3]"][value="9"]:checked~.image-frames>.frame:nth-child(3)>div:nth-child(9) {
            top: 213.32px;
            left: 0px;
        }
        </style>

        <input type="hidden" name="onionguard_id" value="352ba24fed92211536d2d8e0">
        <div class="container">
            <div class="onionguard_wrapper" id="onionguard-352ba24fed92211536d2d8e0">

                <!-- <input type="checkbox" id="image_checkbox" class="checkbox">
        

            <input type="radio" name="toggle-onionguard" value="open">
            <input type="radio" name="toggle-onionguard" class="close-1" value="close" checked="">

            <label for="image_radio"></label>
            <div id="text">
                I'm not a robot
            </div>
            <div class="right">
                <div class="image">
                    <img src="./Screenshot_5.png">
                </div>
                <div class="text">SQUID reCAPTCHA</div>
            </div> -->

                <!-- <div class="verify-box">
                <div class="checkbox"></div>
                <div class="text">Verify</div>
            </div> -->

                <input type="radio" name="toggle-onionguard" value="open" id="checkbox">

                <input type="radio" name="toggle-onionguard" class="close-1" value="close" id="close">
                <label for="checkbox"></label>
                <div id="text">
                    I'm not a robot
                </div>
                <div class="right">
                    <div class="image">
                        <img src="./Screenshot_5.png">
                    </div>
                    <div class="text">SQUID reCAPTCHA</div>
                </div>



                <div class="onionguard-overlay"></div>



                <div class="onionguard-window">
                    <input type="radio" name="frame-select" value="1" checked="">
                    <input type="radio" name="frame-select" value="2">
                    <input type="radio" name="frame-select" value="3">

                    <input type="radio" name="onionguard_answer[1]" value="1" checked="">
                    <input type="radio" name="onionguard_answer[1]" value="2">
                    <input type="radio" name="onionguard_answer[1]" value="3">
                    <input type="radio" name="onionguard_answer[1]" value="4">
                    <input type="radio" name="onionguard_answer[1]" value="5">
                    <input type="radio" name="onionguard_answer[1]" value="6">
                    <input type="radio" name="onionguard_answer[1]" value="7">
                    <input type="radio" name="onionguard_answer[1]" value="8">
                    <input type="radio" name="onionguard_answer[1]" value="9">

                    <input type="radio" name="onionguard_answer[2]" value="1" checked="">
                    <input type="radio" name="onionguard_answer[2]" value="2">
                    <input type="radio" name="onionguard_answer[2]" value="3">
                    <input type="radio" name="onionguard_answer[2]" value="4">
                    <input type="radio" name="onionguard_answer[2]" value="5">
                    <input type="radio" name="onionguard_answer[2]" value="6">
                    <input type="radio" name="onionguard_answer[2]" value="7">
                    <input type="radio" name="onionguard_answer[2]" value="8">
                    <input type="radio" name="onionguard_answer[2]" value="9">

                    <input type="radio" name="onionguard_answer[3]" value="1" checked="">
                    <input type="radio" name="onionguard_answer[3]" value="2">
                    <input type="radio" name="onionguard_answer[3]" value="3">
                    <input type="radio" name="onionguard_answer[3]" value="4">
                    <input type="radio" name="onionguard_answer[3]" value="5">
                    <input type="radio" name="onionguard_answer[3]" value="6">
                    <input type="radio" name="onionguard_answer[3]" value="7">
                    <input type="radio" name="onionguard_answer[3]" value="8">
                    <input type="radio" name="onionguard_answer[3]" value="9">

                    <div class="top-text">Shuffle the images into position
                        (<span>1</span><span>2</span><span>3</span>/3)
                    </div>

                    <div class="image-frames">
                        <div class="frame">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>

                        <div class="frame">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>

                        <div class="frame">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>

                    <div class="navigation">
                        <div class="shuffle">Shuffle</div>
                        <div class="reset">Reset</div>
                        <div class="next">Next</div>
                        <div class="complete"></div>
                    </div>
                    <div class="bottom-text">Upon completion, click away to close the captcha and enter.</div>
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success">Enter</button>
            </div>
        </div>
    </form>
</body>

</html>