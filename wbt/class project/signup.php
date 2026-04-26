<?php require_once "signup_process.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <style>
        .required {
            color: red;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        table td {
            padding: 6px 10px;
        }
    </style>
</head>
<body>

    <h2>Sign Up</h2>
    <p><span class="required">* required field</span></p>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <fieldset>
            <table>
                <tr>
                    <td>
                        <label for="first_name">First Name:</label>
                        <span class="required">*</span>
                    </td>
                    <td>
                        <input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>">
                        <span class="error"><?php echo $firstNameErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="last_name">Last Name:</label>
                        <span class="required">*</span>
                    </td>
                    <td>
                        <input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>">
                        <span class="error"><?php echo $lastNameErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="contact">Contact:</label>
                        <span class="required">*</span>
                    </td>
                    <td>
                        <input type="text" name="contact" id="contact" value="<?php echo $contact; ?>">
                        <span class="error"><?php echo $contactErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="email">Email:</label>
                        <span class="required">*</span>
                    </td>
                    <td>
                        <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                        <span class="error"><?php echo $emailErr; ?></span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="password">Password:</label>
                        <span class="required">*</span>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" value="<?php echo $password; ?>">
                        <span class="error"><?php echo $passwordErr; ?></span>
                    </td>
                </tr>
            </table>
        </fieldset>

        <br>

        <button type="submit">Submit</button

    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !$firstNameErr &&
        !$lastNameErr &&
        !$contactErr &&
        !$emailErr &&
        !$passwordErr) {
    ?>

        <h3>Submitted Information</h3>

        <table border="1" cellpadding="8">
            <tr>
                <td><strong>First Name</strong></td>
                <td><?php echo $first_name; ?></td>
            </tr>

            <tr>
                <td><strong>Last Name</strong></td>
                <td><?php echo $last_name; ?></td>
            </tr>

            <tr>
                <td><strong>Contact</strong></td>
                <td><?php echo $contact; ?></td>
            </tr>

            <tr>
                <td><strong>Email</strong></td>
                <td><?php echo $email; ?></td>
            </tr>
        </table>

    <?php } ?>

    <br>
    

</body>
</html>