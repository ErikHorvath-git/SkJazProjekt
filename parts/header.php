<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protein</title>
    <link rel="icon" href="img/protein.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body>
    <div class="postovne">
        <p class="text_postovne">Poštovné pri nákupe nad 50€ ZDARMA!</p>
    </div>
    <div class="scrollup">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
        </svg>
    </div>
    <header>
        <img src="img/protein.png" alt="logo" class="logo" width="80" height="70" title="protein.sk">
        <div class="dropdown">
            <a href="proteiny.php"><button class="dropbtn">Proteiny</button></a>
            <div class="dropdown-content">
              <a href="proteiny.php">Srvátkový proteín</a>
              <a href="proteiny.php">Viaczložkový proteín</a>
              <a href="proteiny.php">Kazeín</a>
              <a href="proteiny.php">Sójový prteín</a>
              <a href="proteiny.php">Vaječný proteín</a>
              <a href="proteiny.php">Hovädzí protein</a>
            </div>
        </div>
        <div id="head">
            <nav>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#medz1" class="nav-link">ZAUJÍMAVOSTI</a>
                    </li>
                    <li class="nav-item">
                        <a href="#footerr" class="nav-link">KONTAKT</a>
                    </li>
                    <li class="nav-item">
                        <a href="o_nas.php" class="nav-link">O NÁS</a>
                    </li>
                </ul>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </div>        
        
        <div class="ciarka"></div>
        <a class="but" href="#"><button title="Môj košík" type="button"><input type="image" id="kosik" src="img/kosik.png"></button></a>
        <div class="cart">
            <h2 class="cart-title">Tvoj košík</h2>
            <div class="cart-content">
                
            </div>
            <div class="total">
                <div class="total-title">Cena celkom</div>
                <div class="total-price">0€</div>
            </div>
            <a href="kosik.php"><button type="button" class="btn-buy">Prejsť k pokladni</button></a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6-h-6" id="close-cart">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>  
        </div>
    </header>