<?php
include("db.php");

$id = $_GET["id"] ?? null;

if (!$id) {
    die("Manjka ID");
}

$stmt = $conn->prepare("
    SELECT * FROM STRANKA
    WHERE id_stranka = :id
");

$stmt->execute([":id" => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Ni podatkov");
}
?>

<form method="POST" action="update.php">

    <input type="hidden" name="id" value="<?= $row['id_stranka'] ?>">

    <label>Ime:</label>
    <input type="text" name="ime" value="<?= htmlspecialchars($row['ime']) ?>">

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>">

    <button type="submit">Shrani</button>

</form>