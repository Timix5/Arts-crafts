<?php
include("db.php");

$id_stranka = $_GET["id_stranka"] ?? null;
$id_narocilo = $_GET["id_narocilo"] ?? null;

if (!$id_stranka) {
    die("Manjka ID stranke");
}
if (!$id_narocilo) {
    die("Manjka ID narocila");
}

// Pridobi podatke stranke
$stmt = $conn->prepare("
    SELECT * FROM STRANKA
    WHERE id_stranka = :id
");

$stmt->execute([":id" => $id_stranka]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("Ni podatkov");
}

// Pridobi podatke narocila
$orderq = $conn->prepare("
    SELECT * FROM NAROCILO
    WHERE id_narocilo = :id
");

$orderq->execute([":id" => $id_narocilo]);
$row_order = $orderq->fetch(PDO::FETCH_ASSOC);
?>

<form method="POST" action="update.php">

    <input type="hidden" name="id" value="<?= $row['id_stranka'] ?>">

    <label>Ime:</label>
    <input type="text" name="ime" value="<?= htmlspecialchars($row['ime']) ?>">

    <label>Email:</label>
    <input type="email" name="email" value="<?= htmlspecialchars($row['email']) ?>">

    <button type="submit">Shrani podatke stranke</button>

</form>

<form method="POST" action="delete.php" style=" display: <?= $row_order ? "block" : "none" ?>">
    <input type="hidden" name="id" value="<?= $row_order['id_narocilo'] ?>">
    <p><?= $row_order['sporocilo'] ?></p>

    <button type="submit">Izbrisi narocilo stranke</button>
</form>