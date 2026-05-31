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

    // (opcijsko - odstrani v produkciji)
    //echo "Povezava je vzpostavljena";

} catch(PDOException $e) {
    die("Napaka pri vzpostavljanju povezave: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $name = $_POST["name"];
    $message = $_POST["message"];

    $stmt = $conn->prepare("
        INSERT INTO STRANKA (email, ime)
        VALUES (:email, :ime)
    ");

    $stmt->execute([
        ":email" => $email,
        ":ime" => $name
    ]);

    $id_stranka = $conn->lastInsertId();

    $stmt = $conn->prepare("
        INSERT INTO NAROCILO (sporocilo, cas, tk_stranka)
        VALUES (:sporocilo, NOW(), :tk)
    ");

    $stmt->execute([
        ":sporocilo" => $message,
        ":tk" => $id_stranka
    ]);

    $id_narocilo = $conn->lastInsertId();

    if (!empty($_FILES["files"]["name"][0])) {

        foreach ($_FILES["files"]["tmp_name"] as $i => $tmpName) {

            $fileName = basename($_FILES["files"]["name"][$i]);
            $targetPath = "uploads/" . $fileName;

            move_uploaded_file($tmpName, $targetPath);

            $stmt = $conn->prepare("
                INSERT INTO FOTOGRAFIJA (pot, tk_narocilo)
                VALUES (:pot, :tk)
            ");

            $stmt->execute([
                ":pot" => $targetPath,
                ":tk" => $id_narocilo
            ]);
        }
    }

    echo "
<!DOCTYPE html>
<html>
<head>
  <title>Uspešno poslano</title>
  <link rel='stylesheet' href='/css/style.css'>
</head>
<body class='form-page d-flex align-items-center justify-content-center'>
<div class='container'>
    <div class='row justify-content-center'>
      <div class='col-12 col-md-8 col-lg-6'>
        <div class='paper p-4 p-md-5'>

<div id='successMessage' class='success-card'> <div class='mb-4 logo-znak'> <img src='/pic/logo_znak.png' alt='logo' class='logo'> </div> <h1>Naročilo poslano</h1> <i class='fa-solid fa-check'></i> <p>Vaše sporočilo je bilo uspešno poslano.<br>Lahko zaprete ta zavihek.</p> </div>
</div></div></div></div>
</body>
</html>
";
exit;

}/* else {
    echo "<br>Ni bilo ok";
}*/
?>