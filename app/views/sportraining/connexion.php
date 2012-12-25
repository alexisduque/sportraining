	
<div class="entry">
    <br>
    <div class="entry-title"><a href="#">Veuillez vous identifier</a></div>
    <p>
    </p>

    <form action="auth">
        <table border="0" width="40%">
            <tr>
                <td>
                    <div class="input-prepend">
                        <span class="add-on">@</span>
                        <input class="span2" id="prependedInput" type="text" placeholder="Login" name="login">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="input-prepend"><span class="add-on">@</span>
                        <input class="span2" id="prependedInput" type="password" placeholder="Mot de Passe" name="password">
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <button class="btn btn-block btn-success" type="submit">Valider</button>
                </td>
            </tr>
        </table>    
    </form>
    <br>
    <div class="error">
        <?php
        if (isset($_SESSION['error'])) {
            echo " Erreur de connexion ";
            unset($_SESSION['error']);
        }
        ?>
    </div>	
    <div class="comments"></div>
</div>

