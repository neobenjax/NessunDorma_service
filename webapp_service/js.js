app.toMain = function(){
	
	$('#mainPage').show();
    $('#contenidoSitio').attr('src',app.urlsitio);
	$('.contenidoMenu ul.opcionesMenu > li > a:contains("Tienda")').next('ul.subMenu').remove();
    $("a[href^='http://proyectosphp.codice.com/ferrepat_git']").each(function(){
    	$(this).attr(
    			'href',
    			$(this).attr('href').replace(
    				'http://proyectosphp.codice.com/ferrepat_git',
    				'https://www.ferrepat.com'
    				)
    		);
    });
    app.afterMain();
};
app.afterMain = function(){
	setTimeout(function(){
		utiles.alerta({
	                    titulo:'Enhorabuena',
	                    mensaje:'Ahora en ferrepat te ofrecemos la membresia <b class="AZUL">PROGRAMA DE LEALTAD</b><br><img src="http://icdn.pro/images/es/t/a/tarjeta-de-credito-icono-6900-128.png"><br><b class="AZUL">PIDELA</b>',
	                    btnOk:"Continuar"
	                });
	},1000);
}