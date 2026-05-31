<nav>
    <div id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div id="meni">

        <a href="index.php">
            <button class="navigacija <?= ($currentPage == 'domov') ? 'selected' : '' ?>">
                DOMOV
            </button>
        </a>

        <a href="o-meni.php">
            <button class="navigacija <?= ($currentPage == 'o-meni') ? 'selected' : '' ?>">
                O&nbsp;MENI
            </button>
        </a>

        <a href="narocilo.php">
            <button class="navigacija <?= ($currentPage == 'narocilo') ? 'selected' : '' ?>">
                NAROČILO
            </button>
        </a>

        <a href="nakup.php">
            <button class="navigacija <?= ($currentPage == 'nakup') ? 'selected' : '' ?>">
                NAKUP
            </button>
        </a>

        <a href="galerija.php">
            <button class="navigacija <?= ($currentPage == 'galerija') ? 'selected' : '' ?>">
                GALERIJA
            </button>
        </a>

        <div id="languageSettings">
            <button id="changeToSlovene" class="navigacija language">
                <img src="https://flagcdn.com/si.svg" alt="Slovenščina">
            </button>

            <button id="changeToEnglish"
                    class="navigacija language"
                    onclick="setLang('en')">
                <img src="https://flagcdn.com/gb.svg" alt="English">
            </button>
        </div>

    </div>
</nav>