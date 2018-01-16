<div class="info_page">
	<form action="annonces.php" method="post">

		<p>Tri des annonces</p>

		<?php
			if($_POST['tri']==0){$glitch1="checked";$glitch2="";$glitch3="";$glitch4="";}
			if($_POST['tri']==1){$glitch1="";$glitch2="checked";$glitch3="";$glitch4="";}
			if($_POST['tri']==2){$glitch1="";$glitch2="";$glitch3="checked";$glitch4="";}
			if($_POST['tri']==3){$glitch1="";$glitch2="";$glitch3="";$glitch4="checked";}

			echo'<input type="radio" name="tri" value="1" '.$glitch2.'>Date croissante<br />';
			echo'<input type="radio" name="tri" value="0" '.$glitch1.'>Date décroissante<br />';
			echo'<input type="radio" name="tri" value="3" '.$glitch4.'>Prix croissant<br />';
			echo'<input type="radio" name="tri" value="2" '.$glitch3.'>Prix décroissant<br />';
		?>

		<input type="submit" name="submit" value="Trier" class="formSend_tri"/>

	</form>
</div>