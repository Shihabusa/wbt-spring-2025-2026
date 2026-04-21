<?php require_once "contact_process.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <h2>Student Registration</h2>
    <p><span class="required">* required field</span></p>

    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <table class="form-table">
            <tr>
                <td>Name <span class="required">*</span></td>
                <td>
                    <input type="text" name="name" value="<?= $name ?>">
                    <span class="error"><?= $nameErr ?></span>
                </td>
            </tr>
            <tr>
                <td>Email <span class="required">*</span></td>
                <td>
                    <input type="text" name="email" value="<?= $email ?>">
                    <span class="error"><?= $emailErr ?></span>
                </td>
            </tr>
            <tr>
                <td>Website</td>
                <td>
                    <input type="text" name="website" value="<?= $website ?>">
                    <span class="error"><?= $websiteErr ?></span>
                </td>
            </tr>
            <tr>
                <td>Comment</td>
                <td>
                    <textarea name="comment" rows="4"><?= $comment ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Gender <span class="required">*</span></td>
                <td>
                    <input type="radio" name="gender" value="female" <?= ($gender == "female") ? "checked" : "" ?>> Female &nbsp;
                    <input type="radio" name="gender" value="male" <?= ($gender == "male") ? "checked" : "" ?>> Male
                    <span class="error"><?= $genderErr ?></span>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" &&
        !$nameErr && !$emailErr && !$websiteErr && !$genderErr): ?>
        <h3>Submitted values</h3>
        <table class="result-table">
            <tr><td>Name</td><td><?= $name ?></td></tr>
            <tr><td>Email</td><td><?= $email ?></td></tr>
            <tr><td>Website</td><td><?= $website ?></td></tr>
            <tr><td>Comment</td><td><?= $comment ?></td></tr>
            <tr><td>Gender</td><td><?= $gender ?></td></tr>
        </table>
    <?php endif; ?>
</body>
</html>
