$(document).ready(function(){

	$("#submit1").click(function(){
		$("#submit1").attr("disabled", true);
		var date1= $("#datepicker1").val();
		if(date1==""){
			alert("Vous devez entrer une DATE valide !!");
			$("#submit1").attr("disabled", false);
		}
		else{
			//entrer ici le traitement Ajax
			$("#submit1").attr("disabled", true);

			$.ajax({
				url : './ajax/ajaxloader1.php',
				type : 'POST',
				data: 'datesearch=' + $("#datepicker1").val(),
				dataType : 'html',

				success : function(code_html, statut){
					afficher(code_html);
				},

				error : function(resultat, statut, erreur){
					alert(statut);
				},

				complete : function(resultat, statut){

				}

			});

			$("#submit1").attr("disabled", false);
		}
	}); //submit1.click

//______________________________________________________________________________
	$("#submit2").click(function(){
		$("#submit2").attr("disabled", true);
		var date1= $("#datepicker2").val();
		var date2= $("#datepicker3").val();
		if(date1=="" || date2==""){
			alert("Vous devez completer TOUS les champs pour cette requete !!");
			$("#submit2").attr("disabled", false);
		}
		else{
			//entrer ici le traitement Ajax*
			$("#submit2").attr("disabled", true);

			$.ajax({
				url : './ajax/ajaxloader2.php',
				type : 'POST',
				data: {
					datesearch2: $("#datepicker2").val(),datesearch3: $("#datepicker3").val()
				},
				dataType : 'html',

				success : function(code_html, statut){
					afficher(code_html);
				},

				error : function(resultat, statut, erreur){
					alert(statut);
				},

				complete : function(resultat, statut){

				}

			});

			$("#submit2").attr("disabled", false);
		}
	}); //submit1.click

//______________________________________________________________________________
	$("#submit3").click(function(){
		$("#submit3").attr("disabled", true);
		var annee= $("#annee").val();
		var mois= $("#mois").val();
		if(annee=="none" && mois=="none"){
			alert("Vous devez completer au moins un champs pour cette requete !!");
			$("#submit3").attr("disabled", false);
		}
		else{
			//entrer ici le traitement Ajax
			$("#submit3").attr("disabled", true);

			$.ajax({
				url : './ajax/ajaxloader3.php',
				type : 'POST',
				data: {
					an: annee,month: mois
				},
				dataType : 'html',

				success : function(code_html, statut){
					afficher(code_html);
				},

				error : function(resultat, statut, erreur){
					alert(statut);
				},

				complete : function(resultat, statut){

				}

			});




			$("#submit3").attr("disabled", false);
		}
	}); //submit1.click

//______________________________________________________________________________


}); //document ready

function afficher(d){
	var $o=$("#resultatrec");
	s=600;
	$o.empty();
	$o.fadeOut(s,function(){$o.html(d).fadeIn(s);});
}