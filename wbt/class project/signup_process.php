<?php

$firstNameErr = $lastNameErr = $contactErr = $emailErr = $passwordErr = "";
$first_name = $last_name = $contact = $email = $password = "";

function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["first_name"])) {
        $firstNameErr = "* First name is required";
    } else {
        $first_name = cleanInput($_POST["first_name"]);

        if (!preg_match("/^[a-zA-Z ]*$/", $first_name)) {
            $firstNameErr = "* First name must contain only alphabets";
        }
    }

    if (empty($_POST["last_name"])) {
        $lastNameErr = "* Last name is required";
    } else {
        $last_name = cleanInput($_POST["last_name"]);

        if (!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
            $lastNameErr = "* Last name must contain only alphabets";
        }
    }

    if (empty($_POST["contact"])) {
        $contactErr = "* Contact is required";
    } else {
        $contact = cleanInput($_POST["contact"]);

        if (!preg_match("/^[0-9]*$/", $contact)) {
            $contactErr = "* Contact must contain only numbers";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "* Email is required";
    } else {
        $email = cleanInput($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "* Invalid email format";
        }
    }

    if (empty($_POST["password"])) {
        $passwordErr = "* Password is required";
    } else {
        $password = cleanInput($_POST["password"]);

        if (strlen($password) < 8) {
            $passwordErr = "* Password must contain minimum 8 characters";
        }
    }
}

?>