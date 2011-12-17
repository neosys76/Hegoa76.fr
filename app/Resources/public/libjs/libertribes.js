//  fonction permettant d'afficher les explications de l'index
function commentairesindex(texte,divparent){
	var text=texte.replace(/##/g,"'");
	if($('#affichindex')){
	$('#affichindex').remove();
	}
	text=text+"<br/><br/><div class='bold curpt vert2' onclick=\"$('#affichindex').remove();\">Fermer</div>"
	var toadd = "<div id='affichindex'>"+text+"</div>";
	$(divparent).append(toadd);
	$('#affichindex').css('left','100px');
	$('#affichindex').css('top','-20px');
	$('#affichindex').addClass('borderindex');
}

//  fonction affichant l'obligation de se connecter
function mandatoryconnect(divparent,laclasse){
	var text="Pour accéder au Forum, vous devez être connecté <span class='bold'>(Accès au jeu)</span>";
	if($('#mandatconn')){
	$('#mandatconn').remove();
	}
	//text=text+"<br/><br/><div class='bold curpt vertfonce' onclick=\"$('#mandatconn').remove();\">Fermer</div>";
	var toadd = "<div id='mandatconn'>"+text+"</div>";

	$(divparent).append(toadd);
	$('#mandatconn').addClass(laclasse);
}