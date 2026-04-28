<?php
// ---------- Database connection ----------
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "amazonedb";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

// ---------- Variables ----------
$action  = $_REQUEST["action"] ?? "";
$message = "";
$error   = "";
$editing = null;

// ---------- CREATE ----------
if ($_SERVER["REQUEST_METHOD"] === "POST" && $action === "create") {

    $first   = trim($_POST["first_name"] ?? "");
    $last    = trim($_POST["last_name"] ?? "");
    $contact = trim($_POST["contact"] ?? "");
    $email   = trim($_POST["email"] ?? "");
    $pass    = trim($_POST["pass"] ?? "");

    if ($first == "" || $last == "" || $contact == "" || $email == "" || $pass == "") {
        $error = "All fields are required!";
    } else {

        // 🔐 Hash password (IMPORTANT)
        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO admin (first_name, last_name, contact, email, pass)
             VALUES (?, ?, ?, ?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "ssiss", $first, $last, $contact, $email, $hashedPass);

        if (mysqli_stmt_execute($stmt)) {
            $message = "User added successfully!";
        } else {
            $error = "Insert failed!";
        }

        mysqli_stmt_close($stmt);
    }
}

// ---------- UPDATE ----------
if ($_SERVER["REQUEST_METHOD"] === "POST" && $action === "update") {

    $id      = $_POST["id"];
    $first   = $_POST["first_name"];
    $last    = $_POST["last_name"];
    $contact = $_POST["contact"];
    $email   = $_POST["email"];
    $pass    = $_POST["pass"];

    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare(
        $conn,
        "UPDATE admin SET first_name=?, last_name=?, contact=?, email=?, pass=? WHERE id=?"
    );

    mysqli_stmt_bind_param($stmt, "ssissi", $first, $last, $contact, $email, $hashedPass, $id);

    if (mysqli_stmt_execute($stmt)) {
        $message = "Updated successfully!";
    } else {
        $error = "Update failed!";
    }

    mysqli_stmt_close($stmt);
}

// ---------- DELETE ----------
if ($action === "delete") {

    $id = intval($_GET["id"]); // 🔐 sanitize

    $stmt = mysqli_prepare($conn, "DELETE FROM admin WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $message = "Deleted successfully!";
}

// ---------- EDIT LOAD ----------
if ($action === "edit") {

    $id = intval($_GET["id"]); // 🔐 FIXED SQL INJECTION

    $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE id=?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result_edit = mysqli_stmt_get_result($stmt);
    $editing = mysqli_fetch_assoc($result_edit);

    mysqli_stmt_close($stmt);
}

// ---------- READ ----------
$result = mysqli_query($conn, "SELECT * FROM admin ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin CRUD</title>
</head>

<body>

    <h2><?= $editing ? "Update User" : "Add User" ?></h2>

    <?php if ($message): ?>
        <p style="color:green"><?= $message ?></p>
    <?php endif; ?>

    <?php if ($error): ?>
        <p style="color:red"><?= $error ?></p>
    <?php endif; ?>

    <form method="post">

        <input type="hidden" name="action" value="<?= $editing ? 'update' : 'create' ?>">

        <?php if ($editing): ?>
            <input type="hidden" name="id" value="<?= $editing['id'] ?>">
        <?php endif; ?>

        First Name: <input type="text" name="first_name" value="<?= htmlspecialchars($editing['first_name'] ?? '') ?>"><br><br>

        Last Name: <input type="text" name="last_name" value="<?= htmlspecialchars($editing['last_name'] ?? '') ?>"><br><br>

        Contact: <input type="text" name="contact" value="<?= htmlspecialchars($editing['contact'] ?? '') ?>"><br><br>

        Email: <input type="email" name="email" value="<?= htmlspecialchars($editing['email'] ?? '') ?>"><br><br>

        Password: <input type="password" name="pass"><br><br>

        <button type="submit"><?= $editing ? "Update" : "Add" ?></button>

    </form>

    <hr>

    <h2>All Users</h2>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['first_name']) ?></td>
                <td><?= htmlspecialchars($row['last_name']) ?></td>
                <td><?= htmlspecialchars($row['contact']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                    <a href="?action=edit&id=<?= $row['id'] ?>">Edit</a> |
                    <a href="?action=delete&id=<?= $row['id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>

    </table>

</body>

</html>