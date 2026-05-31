<?php 
  include("../db.php"); 
?>
<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="/pic/slika za zavihek.png">
    <title>Obrazec za naročilo | Nika Verdnik Art</title>
</head>
<body class="form-page d-flex align-items-center justify-content-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <div class="paper p-4 p-md-5">
          <form method="POST" action="../db.php" id="contactForm" novalidate enctype="multipart/form-data">
            <div class="mb-4 logo-znak">
            <img src="/pic/logo_znak.png" alt="logo" class="logo">
          </div>
          <h1>Naročilo portreta</h1>

            <div class="mb-3 field">
              <label class="form-label">E-mail</label>
              <input name="email" type="email" class="form-control" id="email" required placeholder="primer@email.com">
              <div class="error-msg" id="emailError"></div>
            </div>

            <div class="mb-3 field">
              <label class="form-label">Ime</label>
              <input name="name" type="text" class="form-control" id="name" placeholder="Vnesite svoje ime" required>
              <div class="error-msg" id="nameError"></div>
            </div>

            <div class="mb-3 field">
              <label class="form-label">Sporočilo</label>
              <textarea name="message" class="form-control" rows="5" id="message" placeholder="Opišete željeno tehniko in velikost portreta" required></textarea>
              <div class="error-msg" id="messageError"></div>
            </div>

            <div class="mb-3 field">
              <label class="form-label">Referenčne fotografije</label>
              <input name="files[]" type="file" class="form-control" multiple>
            </div>

            <div class="form-check mb-3 last-field">
              <input name="terms" class="form-check-input" type="checkbox" id="terms">
              <label class="form-check-label">
                Strinjam se s pogoji uporabe
              </label>
            </div>

            <button name="submit" type="submit" id="submitBtn" class="btn btn-primary">
              Pošlji
            </button>
          </form>


        </div>
      </div>
    </div>
  </div>
  <script src="../form.js"></script>
</body>
</html>