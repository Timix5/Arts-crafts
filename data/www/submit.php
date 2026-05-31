<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = $_POST["email"];
    $name = $_POST["name"];
    $message = $_POST["message"];

    $sql1 = "INSERT INTO STRANKA (email, ime) VALUES (:email, :name)";

    $stmt = $conn->prepare($sql1);
    $stmt->execute([
        ":email" => $email,
        ":name" => $name
    ]);

    $sql2 = "INSERT INTO KONTAKT (sporocilo) VALUES (:message)";

    $stmt = $conn->prepare($sql2);
    $stmt->execute([
        ":message" => $message
    ]);

    echo "Podatki so bili uspešno poslani";
} else{
    echo "<br>Ni bilo ok";
};
?>