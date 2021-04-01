<!--   HEADER    -->
<header>
    <!-- Menu horizontal -->
    <nav class="menuh">
        <a href="index.php"><img src="img/logo.png" id="logo" alt=""/></a>
        <ul> 
            <li><a href="index.php">Accueil</a></li>
            <li><a href="produits.php?cat=burger">Burger🍔</a></li>
            <li><a href="produits.php?cat=poulet">Poulet🍗</a></li>
            <li><a href="produits.php?cat=pizza">Pizza🍕</a></li>
            <li><a href="contact.php">Contact📞</a></li>
        </ul>
        <?php
        if($_SESSION['connecter']==true){
            echo "
            <ul id='menu-deroulant'>
            <li><a href='commander.php' id='panier'>🛒</a></li>
	<li><a href='dashboard.php'>Mon profil</a>
                <ul>
                <li><a href='dashboard.php'>Tableau de bord</a></li>
                <li><a href='deconnexion.php'>Déconnexion</a></li>
                </ul>
                </li>
                </ul>";
        }
        else{
            echo "<div><a href='#' id='panier' onclick='openForm()'>Commande🛒</a></div>";
        }
        ?>
    </nav>
</header>