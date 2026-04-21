<?php require_once "contact_process.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="icon"
        href="https://tl.vhv.rs/dpng/s/556-5565905_user-call-contacts-phone-user-contacts-png-transparent.png">
</head>

<body>
    <nav>
        <a href="/Portfolio/index.html">Home</a>
        <a href="/Portfolio/html/education.html">Education</a>
        <a href="/Portfolio/html/experience.html">Experience</a>
        <a href="/Portfolio/html/project.html">Project</a>
        Contact me
    </nav>

    <div>
        <p><b>My contact number:</b>01642541702 <br>
        <address>Road-2,sanirakhra,dhaka-1236</address>

        <b>My facebook Account :</b><br>
        <a href="https://www.facebook.com/profile.php?id=100093106444404" target="_blank"><img src="/Portfolio/OIP.jpeg"
                alt="facebook logo" width="50px" height="50px"></a>
        </p>
    </div>


    <form method="post" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <fieldset>
            <legend>Contact me</legend>
            <table class="form-table">
                <tr>
                    <td><label for="name">Name</label><span class="required">*</span></td>
                    <td><input type="text" name="name" value="<?= $name ?>">
                        <span class="error"><?= $nameErr ?></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="Gender">Gender</label><span class="required">*</span></td>
                    <input type="radio" name="gender" value="female" <?= ($gender == "female") ? "checked" : "" ?>> Female &nbsp;
                    <input type="radio" name="gender" value="male" <?= ($gender == "male") ? "checked" : "" ?>> Male
                    <span class="error"><?= $genderErr ?></span>
                </tr>
                <tr>
                    <td>Email:<span class="required">*</span></td>
                    <td>
                        <input type="text" name="email" value="<?= $email ?>">
                        <span class="error"><?= $emailErr ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Website:</td>
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
                    <td>Company Name:</td>
                    <td><input type="text" name="" id=""></td>
                </tr>
                <tr>
                    <td>
                        Reason of contact:
                    </td>
                    <td>
                        <input type="radio" name="Reason" id="">Project
                        <input type="radio" name="Reason" id="">Thesis
                        <input type="radio" name="Reason" id="Reason">Job
                    </td>
                </tr>
                <tr>
                    <td>
                        Topic:
                    </td>
                    <td>
                        <input type="checkbox" name="Reason" id="">Web Development
                        <input type="checkbox" name="Reason" id="">Mobile Development
                        <input type="checkbox" name="Reason" id="Reason">AI/ML Development
                    </td>
                </tr>
                <tr>
                    <td>Consultation Date:</td>
                    <td><input type="date" name="" id=""></td>
                </tr>
                <tr>
                    <td><button type="submit" value="Register">Submit</button>
                        <button type="reset">Reset</button>
                    </td>
                </tr>

            </table>

        </fieldset>




    </form>
    <?php if (
        $_SERVER["REQUEST_METHOD"] == "POST" &&
        !$nameErr && !$emailErr && !$websiteErr && !$genderErr
    ): ?>
        <h3>Submitted values</h3>
        <table class="result-table">
            <tr>
                <td>Name</td>
                <td><?= $name ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= $email ?></td>
            </tr>
            <tr>
                <td>Website</td>
                <td><?= $website ?></td>
            </tr>
            <tr>
                <td>Comment</td>
                <td><?= $comment ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?= $gender ?></td>
            </tr>
        </table>
    <?php endif; ?>

</body>
<footer>
    <p>Connect with me :</p>
    <a href="https://www.linkedin.com/in/shihab-farraz-8781ab2a7/" target="_blank"><img
            src="https://th.bing.com/th/id/R.a330e248626552a23af35e5c46526234?rik=DZhkgnpER0YViQ&riu=http%3a%2f%2fpngimg.com%2fuploads%2flinkedIn%2flinkedIn_PNG8.png&ehk=4bFzIDABrAypqOis7809R99fdbUW93GC4XfvnNxZfdA%3d&risl=&pid=ImgRaw&r=0"
            alt="linkedin" height="50px" width="50px"></a>
    <a href="https://github.com/Shihabusa" target="_blank"><img
            src="https://th.bing.com/th/id/R.7ea67df8f3ea706fdc9b493725fa0835?rik=WIuTpARHDBiwKg&pid=ImgRaw&r=0"
            alt="github" height="50px" width="50px"></a>
</footer>

</html>
//http://localhost/lab%20final/wbt-spring-2025-2026/Portfolio/html/contactme.php