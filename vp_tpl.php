<?php
$contenido=<<<VPPAGINA
<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=iso-8859-1">
    <title> $lin->ventana_titulo </title>
    <meta name="robots" content="index,follow,archive" />
    
    <meta property="og:title" content="$lin->ventana_titulo" />
    <meta property="og:url" content="$page_url" />
	$meta_imagen
	<meta property="og:description" content="$lin->ventana_descripcion" />
	$fbuser_id
    
    <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/themes/$lin->ventana_tema/jquery-ui.css" media="all">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/i18n/jquery-ui-i18n.min.js"></script>
	$script_font
    
    <script type="text/javascript">
	Cufon.replace('.pretitulo', { fontFamily: '$lin->pretitulo_fuente', color: '#$lin->pretitulo_color', fontSize: '{$lin->pretitulo_size}px'});
       Cufon.replace('.titulo',    { fontFamily: '$lin->titulo_fuente', color: '#$lin->titulo_color' , fontSize: '{$lin->titulo_size}px'});
       Cufon.replace('.subtitulo', { fontFamily: '$lin->subtitulo_fuente', color: '#$lin->subtitulo_color', fontSize: '{$lin->subtitulo_size}px'});
	</script>
            
    <script src="http://connect.facebook.net/es_LA/all.js#xfbml=1"></script>		
    <script type="text/javascript" charset="utf-8">
        $(document).ready(function(){
            $("#popup").dialog({ autoOpen: false, 
								 width: $ventana_ancho,
								 height: $ventana_alto,
                                 modal: true, 
                                 position: 'top', 
                                 title: '$lin->ventana_titulo',  
                                 resizable: $ventana_ajustable, 
                                 close: function(event, ui) {
                                    top.location.href="$lin->url_destino"; 
                                 }
								 $boton								 
            });
            $("#popup").dialog('open');
			
        });
    </script>
    
<style type="text/css">
	.pretitulo{
		color:#636363;
		font-size:19px;
		text-align:center;
		padding-bottom:4px;
		margin:0px auto;
		letter-spacing:-1px;		
	}
	
	.pretitulo em{
		color:#215e8e;
		font-style:normal;
		letter-spacing:-1px;
	}	
	
	.titulo{
		color:#b10000;
		font-size:34px;
		text-align:center;
		margin:0px auto;
		padding-bottom:1px;
		padding-top:0px;
		line-height:40px;
		letter-spacing:-1px;
	}
	
	.subtitulo{
		color:#303030;
		font-size:19px;
		text-align:center;
		margin:0px auto;
		letter-spacing:-1px;
	}
	
	.fanpage{
		width:100%;
		text-align:center;
	}
	.cuerpo_pagina{
		width:100%;
		text-align:center;
	}
</style>    
	
	
    </head>
            
    <body style="margin:0px">
             
            <div id="popup">
                <h2 class="pretitulo">$pretitulo_txt</h2>
                <h1 class="titulo">$titulo_txt</h1>
                <h2 class="subtitulo">$subtitulo_txt</h2>
    			
                <div id="fb-root"></div>
                $megusta_box
                $megusta
                <br/>
                $lin->texto_libre
            </div>
      		
            <div class="cuerpo_pagina">
            	$ventana_fondo
            </div>

    </body>
    </html>
VPPAGINA;

die($contenido);

?>