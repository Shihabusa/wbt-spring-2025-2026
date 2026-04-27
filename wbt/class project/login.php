<?php require_once "logic_process.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend>Login</legend>

            <table>

                <tr>
                    <td>User Email</td>

                    <td>
                        <input
                            type="email"
                            name="name"
                            value="<?= $name ?>"
                            required>
                        <?= $userErr ?>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input
                            type="password"
                            name="password"
                            required>
                        <span style="color:red;">
                            <?= $passErr ?>
                        </span>

                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Login">
                    </td>
                </tr>

            </table>

        </fieldset>
    </form>
    <?php if (
        $_SERVER["REQUEST_METHOD"] == "POST"
        && !$userErr
        && !$passErr
    ): ?>
        <h3>Submitted Values</h3>
        <table border="1">
            <tr>
                <td>Email</td>
                <td><?= $name ?></td>
            </tr>

            <tr>
                <td>Status</td>
                <td>Login Successful</td>
            </tr>
        </table>
    <?php endif; ?>
</body>