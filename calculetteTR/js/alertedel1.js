function delentree(code)
{
	resultat=confirm('ATTENTION !! Ce Type va etre supprime de la Base de Donnees !! Confirmez !!');
	if(resultat===true){
	window.location.href=('./phpfunct/deltypetr.php?cde='+code);
	}
}

function validate1(tabcode)
{
	if (document.forms['codenter'].elements['code'].value =='' || document.forms['codenter'].elements['typeticket'].value =='' ) {
		alert('Vous devez Remplir les Deux Champs (Code et Type de Ticket) pour pouvoir envoyer vos donnees');

	}
	else if(isNaN(document.forms['codenter'].elements['code'].value)){
		alert('Le code doit etre un chiffre entier');
	}
	else if(tabcode.indexOf(document.forms['codenter'].elements['code'].value)!=-1){
	alert('Ce code existe deja!!');
	}
	else{
	document.forms['codenter'].submit();
	}
}

function sessioncheck(){
	alert('La derniere session de comptage n est pas terminee. Si vous desirez demarrer une nouvelle session, cliquez sur VALIDER LA SESSION');
}

function alertstock(nbr){
	if (nbr===0) {
		alert('Aucun Ticket n\'est pour le moment scanne... votre tableau de comptage est vide... Scannez quelques tickets!!');
	}
	else{
	resultat=confirm('ATTENTION !!Cette action TERMINE votre session de comptage. Les donnees vont etre archivees et tous les compteurs von etre remis a zero. Etes vous sur de vouloir terminer cette session !! Confirmez !!');
	if(resultat===true){
	window.location.href=('./phpfunct/validesession.php');
	}
	}
}

function delcomptage(code,proc){
	resultat=confirm('ATTENTION !!voulez vous supprimer ce ticket de votre comptage? Confirmez !!');
	if(resultat===true){
		window.location.href=('./phpfunct/delcomptage.php?cde=' + code +'&proc=' + proc);
	}
}

function monitorscan(){
	var str=document.forms['codebarreintput'].elements['codeb'].value;

	if (str.length===24){
		if (document.forms['codebarreintput'].elements['datepicke'].value=='') {
			alert('Entrez une Date puis RE-SCANNEZ le ticket');
			document.forms['codebarreintput'].elements['codeb'].value='';

		}
		else{
		document.forms['codebarreintput'].submit();
		}

	}
}