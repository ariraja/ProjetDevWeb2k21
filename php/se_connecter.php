<div class="overlay"></div>
                    <div class="login-popup">
                      <div class="form-popup" id="popupForm">
                        <form action="/action_page.php" class="form-container">
                         <img src="img/logo.png"/>
                          <h2 style="color:black;font-family:calibri;">Veuillez vous connecter</h2>
                          <label for="email">
                          <strong>E-mail</strong>
                          </label>
                          <input type="text" id="email" placeholder="Votre Email" name="email" required>
                          <label for="psw">
                          <strong>Mot de passe</strong>
                          </label>
                          <input type="password" id="psw" placeholder="Votre Mot de passe" name="psw" required>
                          <span>Si vous n'avez pas de compte,<a href="inscription.php"> inscrivez-vous.</a></span>
                            <br><br/>
                          <button type="submit" class="btn">Connecter</button>
                          <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
                        </form>
                      </div>
                </div>