<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="/pic/slika za zavihek.png">
    <title>Naroči portret hišnega ljubljenčka | Nika Verdnik Art</title>
</head>
<body>
    <div id="layout">
        <div id="topBar">
            <?php
                include("../header.php");
            ?>
            <?php
                $currentPage = "domov";
                include("../nav.php");
            ?>
        </div>
        <main>
            <h1>NAROČI PORTRET</h1>
            <?php
include '../db.php';
?>
            <article>
                <figure class="visual">
                    <img src="/pic/placeholder.png">
                    <figcaption>

                    </figcaption>
                </figure>
                <div class="text">
                    <h2>Spoznaj me</h2>
                    <p>
                        Sem Nika, umetnica iz Slovenije, ki skozi risbo in sliko lovim značaj in dušo živali. Najraje ustvarjam s svinčnikom in akrili, kjer lahko z nežnimi detajli ujamem tisto nekaj posebnega, kar vašega ljubljenčka naredi res vašega.<br><br>
                        Že od otroštva naprej me spremlja ljubezen do risanja in živali – takrat sem ustvarjala za najbližje, danes pa to strast delim z vami. Vsak portret ustvarim z mislijo na to, da ne gre le za sliko, ampak za spomin in občutek, ki vam veliko pomeni.
                    </p>
                    <p class="preberiVec">
                        <a href="o-meni.php" class="changePage">Več o meni</a>
                    </p>
                </div>
            </article>
            <article>
                <figure class="visual">
                    <img style="object-position: 70%;" alt="S svinčnikom ustvarjen portret psa" src="/pic/portret-psa.jpg">
                    <figcaption>

                    </figcaption>
                </figure>
                <div class="text">
                    <h2>Naroči portret hišnega ljubljenčka</h2>
                    <p>
                        Naročilo portreta je preprosto in brez zapletov. Pošljete mi fotografijo svojega hišnega ljubljenčka, ki vam je najljubša, skupaj z morebitnimi željami glede sloga in velikosti. Na podlagi tega začnem ustvarjati portret, pri čemer pazim, da ujamem njegov pravi značaj.<br><br>
                        Ko je portret zaključen, ga skrbno pripravim in pošljem – tako dobite unikatno umetnino, ki ohrani poseben spomin na vašega štirinožnega prijatelja.<br><br>
                        Po dogovoru lahko ustvarim tudi portret osebe.
                    </p>
                    <p class="preberiVec">
                        <a href="narocilo.php" class="changePage">Postopek naročila</a>
                    </p>
                </div>
            </article>
            <article>
                <figure class="visual">
                    <img alt="Z akrili ustvarjena slika, ki zajema pogled skozi okno na hribe in hiše" src="/pic/pogled-skozi-okno.jpg">
                    <figcaption>

                    </figcaption>
                </figure>
                <div class="text">
                    <h2>Kupi že ustvarjeno sliko</h2>
                    <p>
                        Na voljo so tudi že ustvarjena dela, ki jih lahko izberete in takoj kupite. Gre za unikatne umetnine, nastale iz mojega lastnega raziskovanja motivov, kompozicije in tehnik.<br><br>
                        Če iščete nekaj za svoj prostor ali darilo, lahko med obstoječimi deli izberete tisto, ki vam ustreza. Vsako delo je original in pripravljeno za nakup.
                    </p>
                    <p class="preberiVec">
                        <a href="nakup.php" class="changePage">Poglej umetnine</a>
                    </p>
                </div>
            </article>
            <article>
                <figure class="visual">
                    <img alt="Z akrili ustvarjen portret ženske." src="/pic/SKRS7_Verdnik_Nika_1.letnik_Akril_70x50cm.jpg">
                    <figcaption>

                    </figcaption>
                </figure>
                <div class="text">
                    <h2>Oglej si moje delo</h2>
                    <p>
                        V galeriji si lahko ogledate zbirko mojih del, ki vključujejo tako portrete po naročilu, kot tudi osebne projekte.<br><br>
                        Dela odražajo moj umetniški razvoj skozi čas.
                    </p>
                    <p class="preberiVec">
                        <a href="galerija.php" class="changePage">Poglej galerijo</a>
                    </p>
                </div>
            </article>
        </main>
        <?php
            include("../footer.php");
        ?>
    </div>

    <section class="container">

    <h2>Podatki</h2>

    <?php

    $sql = "
        SELECT
            s.id_stranka,
            s.ime,
            s.email,
            n.sporocilo
        FROM STRANKA s
        JOIN NAROCILO n
            ON s.id_stranka = n.tk_stranka
        ORDER BY s.id_stranka DESC
    ";

    $stmt = $conn->query($sql);

    $podatki = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>

    <table id="podatkiTabela" border="1" style="border-collapse: collapse; width: 100%;">

    <thead>
        <tr>
            <th style="padding: 10px 20px;">ID</th>
            <th style="padding: 10px 20px;">Ime</th>
            <th style="padding: 10px 20px;">Email</th>
            <th style="padding: 10px 20px;">Sporočilo</th>
        </tr>
    </thead>

    <tbody>

    <?php foreach($podatki as $row): ?>

        <tr>
            <td style="padding: 10px 20px;"><?= $row["id_stranka"] ?></td>
            <td style="padding: 10px 20px;"><?= htmlspecialchars($row["ime"]) ?></td>
            <td style="padding: 10px 20px;"><?= htmlspecialchars($row["email"]) ?></td>
            <td style="padding: 10px 20px;"><?= htmlspecialchars($row["sporocilo"]) ?></td>
        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

</section>

<section>
        Tukaj dodaj ostale 3 stvari za nalogo 8.
</section>




    <script src="../functions.js"></script>
</body>
</html>