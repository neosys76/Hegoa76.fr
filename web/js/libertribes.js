//  fonction permettant d'obtenir la largeur disponible à côté d'un élément de taille définie
function availwidth(el){
	var widthavail;
	var widthel;
	var marginl;
	var marginr;
	widthel = $(el).width();
	marginl = parseInt($(el).css('margin-left'))+parseInt($(el).css('padding-left'));
	marginr = parseInt($(el).css('margin-right'))+parseInt($(el).css('padding-right'));
	widthavail = $(document).width() - widthel - marginl - marginr;
	return widthavail;
}
