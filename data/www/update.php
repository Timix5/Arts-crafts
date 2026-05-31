<?php

$servername = "mysql";
$username = "root";
$password = "superVarnoGeslo";
$dbname = "Arts_and_Crafts";

try {
    $conn = new PDO(
        "mysql:host=$servername;dbname=$dbname",
        $username,
        $password
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    die($e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit;
}

$id = $_POST["id"] ?? null;
$ime = $_POST["ime"] ?? null;
$email = $_POST["email"] ?? null;

if (!$id || !$ime || !$email) {
    die("Manjkajo podatki");
}

$stmt = $conn->prepare("
    UPDATE STRANKA
    SET ime = :ime,
        email = :email
    WHERE id_stranka = :id
");

$stmt->execute([
    ":ime" => $ime,
    ":email" => $email,
    ":id" => $id
]);

header("Location: index.php");
exit;