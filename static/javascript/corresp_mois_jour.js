function corresp_mois_jour(mois,annee)
{
	
	if((mois>=0)  && (mois<=11)){
	
			
		if (mois==1) //fevrier
		{
			if (annee%4==0) //annee bissextile
			{
				document.getElementById('jour').options[29].style.display = 'none'; //on câche les jours qu'il faut dans la liste déroulante
				document.getElementById('jour').options[30].style.display = 'none';
				
				document.getElementById('jour').options[28].style.display = 'block';// on affiche les jours qui peuvent avoir été cachés
				
				return 29;
			}
			else
			{
				document.getElementById('jour').options[28].style.display = 'none';
				document.getElementById('jour').options[29].style.display = 'none';
				document.getElementById('jour').options[30].style.display = 'none';
				
				return 28;
			}
			
		}
		
		else
		{
			if (mois<=6) //janvier mars avril mai juin juillet
			 {
				if (mois%2==0)
				{
					document.getElementById('jour').options[28].style.display = 'block';
					document.getElementById('jour').options[29].style.display = 'block';
					document.getElementById('jour').options[30].style.display = 'block';
					
					return 31;
				}
				else
				{	
					document.getElementById('jour').options[28].style.display = 'block';
					document.getElementById('jour').options[29].style.display = 'block';
					
					document.getElementById('jour').options[30].style.display = 'none';
					
					return 30;
				}
			}
			
			else //août septembre octobre novembre decembre
			{
				if (mois%2==0)
				{
					document.getElementById('jour').options[28].style.display = 'block';
					document.getElementById('jour').options[29].style.display = 'block';
					
					document.getElementById('jour').options[30].style.display = 'none';
					
					return 30;
				}
				else
				{	
					document.getElementById('jour').options[28].style.display = 'block';
					document.getElementById('jour').options[29].style.display = 'block';
					document.getElementById('jour').options[30].style.display = 'block';
					
					return 31;
				}
			}
		}
	}
	
	else
	{
		alert("erreur mois");
		return(-1);
		
	}
	
	
	
	
		
}




function corresp_mois1_jour1(mois,annee)
{
	
	if((mois>=0)  && (mois<=11)){
	
			
		if (mois==1) //fevrier
		{
			if (annee%4==0) //annee bissextile
			{
				document.getElementById('jour1').options[29].style.display = 'none'; //on câche les jours qu'il faut dans la liste déroulante
				document.getElementById('jour1').options[30].style.display = 'none';
				
				document.getElementById('jour1').options[28].style.display = 'block';// on affiche les jours qui peuvent avoir été cachés
				
				return 29;
			}
			else
			{
				document.getElementById('jour1').options[28].style.display = 'none';
				document.getElementById('jour1').options[29].style.display = 'none';
				document.getElementById('jour1').options[30].style.display = 'none';
				
				return 28;
			}
			
		}
		
		else
		{
			if (mois<=6) //janvier mars avril mai juin juillet
			 {
				if (mois%2==0)
				{
					document.getElementById('jour1').options[28].style.display = 'block';
					document.getElementById('jour1').options[29].style.display = 'block';
					document.getElementById('jour1').options[30].style.display = 'block';
					
					return 31;
				}
				else
				{	
					document.getElementById('jour1').options[28].style.display = 'block';
					document.getElementById('jour1').options[29].style.display = 'block';
					
					document.getElementById('jour1').options[30].style.display = 'none';
					
					return 30;
				}
			}
			
			else //août septembre octobre novembre decembre
			{
				if (mois%2==0)
				{
					document.getElementById('jour1').options[28].style.display = 'block';
					document.getElementById('jour1').options[29].style.display = 'block';
					
					document.getElementById('jour1').options[30].style.display = 'none';
					
					return 30;
				}
				else
				{	
					document.getElementById('jour1').options[28].style.display = 'block';
					document.getElementById('jour1').options[29].style.display = 'block';
					document.getElementById('jour1').options[30].style.display = 'block';
					
					return 31;
				}
			}
		}
	}
	
	else
	{
		alert("erreur mois");
		return(-1);
		
	}
	
	
	
	
		
}
