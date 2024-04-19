<?php include '../../parts/header.php'; ?>

    <div class="medzeraa"></div>
    <div class="container">
        <form action="action_page.php">
            <div class="row">
                <div class="col-25">
                    <label for="fname">Meno Priezvisko</label>
                </div>
                <div class="col-75">
                    <input type="text" id="fname" name="firstname" placeholder="Jožko Mrkvička">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="lname">Číslo objednávky</label>
                </div>
                <div class="col-75">
                    <input type="text" id="lname" name="lastname" placeholder="#ID:.......">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Dôvod vrátenia</label>
                </div>
                <div class="col-75">
                    <textarea id="subject" name="subject" placeholder="..." style="height:200px"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Obrázok reklamovaného produktu</label>
                </div>
                <div class="col-75">
                    <form action="/action_page.php">
                        <input type="file" id="myFile" name="filename">
                    </form> 
                </div>
            </div>
            <div class="row">
                <a href="index.html">
                    <input type="submit" value="Odoslať">
                </a>
            </div>
        </form>
    </div>
    <div class="textreklamacia">
        <p>**vyjadrenia na reklamácie odosielame na nasledujúci pracovný deň</p>
    </div>
    <div class="medzera"></div>
    <?php include '../../parts/footer.php'; ?>
