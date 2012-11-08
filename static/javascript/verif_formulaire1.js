function nospace(str) {
	
	return String(str).replace(/^\s*/,'');
	
}	

function verifForm(formulaire) {
	
	if (document.formulaire.password.value == document.formulaire.password2.value)
		{
			if ((nospace(document.formulaire.nom.value) == "") || (nospace(document.formulaire.prenom.value) == "") || (nospace(document.formulaire.age.value) == "") || (nospace(document.formulaire.fcmax.value) == "") ||(nospace(document.formulaire.user.value) == "") || (nospace(document.formulaire.password.value) == "")) 
			{
				alert('Veuillez remplir tout les champs! Merci.');
				return(false);
			}
			
			else 
			{	ageRegex = new RegExp (/^\d{1,3}$/);
				if ( ageRegex.test(nospace(document.formulaire.fcmax.value)) && ageRegex.test(nospace(document.formulaire.age.value)))
				{
					formulaire.submit();
					return(true);
				}
				else {
					alert('Age et/ou Fcmax incorrect');
					return(false);
				}
			}
		}
	else
		{
			alert('Veuillez re-saisir votre mot de passe ! Merci.');
			return(false);
		}	
}
