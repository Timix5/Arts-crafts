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

if (!$id) {
    die("Potreben je ID!");
}

$stmt = $conn->prepare("
    DELETE FROM FOTOGRAFIJA
    WHERE tk_narocilo = :id;
    DELETE FROM NAROCILO
    WHERE id_narocilo = :id
");

$stmt->execute([ ":id" => $id ]);

header("Location: index.php");
exit;