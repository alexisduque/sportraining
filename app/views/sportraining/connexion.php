<script type="text/javascript" src="/static/bootstrap/js/bootstrap.js"></script> 	
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
 <script src="/static/bootbox.min.js"></script>
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
    
        <?php
        if (isset($_SESSION['error'])) {
            echo " <div class=\"alert alert-error\">  
                   <a class=\"close\" data-dismiss=\"alert\" href=\"#\"></a>  
                   <strong>Erreur!</strong> Mauvais identifiants.  
                   </div>";
            unset($_SESSION['error']);
        }
        ?>
    <div class="comments"></div>
</div>

