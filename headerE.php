  <header id="portfolio">
      <a href="#"><img src="/w3images/avatar_g2.jpg" style="width:65px;" class="w3-circle w3-right w3-margin w3-hide-large w3-hover-opacity"></a>
      <span class="w3-button w3-hide-large w3-xxlarge w3-hover-text-grey" onclick="w3_open()"><i class="fa fa-bars"></i></span>
      <div class="w3-container">
          <h1><b>Etudiant</b></h1>
          <div class="w3-section w3-bottombar w3-padding-16">

              <button class="w3-button w3-black"> <a href="ajouterE.php">ajout</a></button>
              <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="findAllE.php">findAll</a></button>
              <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="findAllBoursier.php">findAll Boursier</a></button>
              <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="findAllLoger.php">findAll Loger</a></button>
              <button class="w3-button w3-white"><i class="fa fa-diamond w3-margin-right"></i><a href="findAllNonBoursier.php"> findAll NonBoursier</a></button>
              <div class="">
                  <form action="findE.php">
                      <input type="text" placeholder="find etudiant.." name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
              </div>
              <div class="">
                  <form action="statut.php">
                      <input type="text" placeholder="Check statut" name="search">
                      <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
              </div>

          </div>
      </div>
  </header>