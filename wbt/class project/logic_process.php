<?php
$userErr = $passErr = "";
$name = $password = "";

function cleanInput($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $userErr = "Email Required";
    } else {
        $name = cleanInput($_POST["name"]);

        if (!filter_var($name, FILTER_VALIDATE_EMAIL)) {
            $userErr = "Invalid Email Format";
        }
    }
    if (empty($_POST["password"])) {
        $passErr = "Password Required";
    } else {
        $password = cleanInput($_POST["password"]);
    }
    $correctUser = "admin@gmail.com";
    $correctPass = "12345";
    if ($userErr == "" && $passErr == "") {

        if (
            strtolower($name) != strtolower($correctUser)
            || $password != $correctPass
        ) {
            $passErr = "Invalid Email or Password";
        }
    }
}
