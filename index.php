<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    http_response_code(405); 
    echo json_encode(["error" => "Method Not Allowed"], JSON_PRETTY_PRINT);
    exit();
}

function is_prime($num) {
    if ($num < 2) return false;
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function is_perfect($num) {
    $sum = 0;
    for ($i = 1; $i < $num; $i++) {
        if ($num % $i == 0) $sum += $i;
    }
    return $sum === $num;
}

function get_fun_fact($num) {
    $url = "http://numbersapi.com/$num/math";
    return @file_get_contents($url) ?: "No fun fact available.";
}


function is_armstrong($num) {
    $digits = str_split($num);
    $power = count($digits);
    $sum = array_sum(array_map(fn($digit) => pow($digit, $power), $digits));
    return $sum == $num;
}


if (isset($_GET['number']) && is_numeric($_GET['number'])) {
    $number = intval($_GET['number']);
    $properties = [];

    if ($number % 2 != 0) $properties[] = "odd";
    if ($number % 2 == 0) $properties[] = "even";
    if (is_armstrong($number)) $properties[] = "armstrong";
    if (is_prime($number)) $properties[] = "prime";
    if (is_perfect($number)) $properties[] = "perfect";

    $response = [
        "number" => $number,
        "is_prime" => is_prime($number),
        "is_perfect" => is_perfect($number),
        "properties" => $properties,
        "digit_sum" => array_sum(str_split($number)),
        "fun_fact" => get_fun_fact($number),
    ];

    http_response_code(200);
    echo json_encode($response, JSON_PRETTY_PRINT);
} else {
    http_response_code(400); 
    echo json_encode(["number" => "alphabet", "error" => true], JSON_PRETTY_PRINT);
}

?>
