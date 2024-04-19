<?php include '../../parts/header.php'; ?>

    <div class="medzeraa"></div>
    <div class="celook">
        <div class="celok">
            <div class="kontainer">
                <form action="/action_page.php" id="form">
      
                    <div class="celook">
                        <div class="col-50">
                            <h3>Pokladňa</h3>
                            <label for="fname"><i class="fa fa-user"></i>Celé meno</label>
                            <input type="text" id="fname" name="firstname" placeholder="Jožko Mrkvička" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" id="email" name="email" placeholder="...@example.com" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Adresa</label>
                            <input type="text" id="adr" name="address" placeholder="Ulica 1" required>
                            <label for="city"><i class="fa fa-institution"></i>Mesto</label>
                            <input type="text" id="city" name="city" placeholder="Nitra" required>
      
                    <div class="celook">
                        <div class="col-50">
                            <label for="state">Kraj</label>
                            <input type="text" id="state" name="state" placeholder="Nitriansky kraj" required>
                        </div>
                        <div class="col-50">
                            <label for="zip">Zip kód</label>
                            <input type="text" id="zip" name="zip" placeholder="10 001" required>
                        </div>
                    </div>
                </div>
      
                    <div class="col-50">
                        <label for="cname"  class="labelo">Meno na karte</label>
                        <input type="text" id="cname" name="cardname" placeholder="Jožko Mrkvička" required>
                        <label for="ccnum" class="labelo">číslo na karte</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                        <label for="expmonth" class="labelo">Exp Mesiac</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
                    </div>
            </form>
            </div>
            <label class="labelo">
                <input type="checkbox" checked="checked" name="sameadr">Súhlasím s povinnosťou platby
            </label>
            <a href="index.html"><input type="submit" value="Odoslať" class="btnnn"></a>
            </div>
            
            
        </div>
    </div>
    <div class="medzera"></div>
    <?php include '../../parts/footer.php'; ?>
