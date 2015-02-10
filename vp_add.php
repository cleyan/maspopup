<?php 
	//El usuario tiene permisos?
	if (!current_user_can('manage_options')){
	  wp_die('No tiene permisos para acceder a esta página.');
	}

	require_once("funciones.php");


	if (CCGetParam("vp_pagina_id","0") && CCGetParam('accion','')=='eliminar'){
		global $wpdb;
		$sql="DELETE FROM vp_paginas WHERE vp_pagina_id=" . CCGetParam("vp_pagina_id","0") . " LIMIT 1 ";
		$wpdb->query($sql);

		  echo '<div class="wrap">
		<h2><img src="' . MP_ICO32 .'" height="32" border="0" style="vertical-align:middle;"/>Eliminar Página +PopUp</h2>
			<br />
			<a href="admin.php?page=vp_paginas">Se ha eliminado La página, volver a la lista de Páginas</a>';
		  include("pie.php");
		  echo "</div>";
		  return true;  
	}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if (CCGetFromPost("MM_update","") == "form1") {
	global $wpdb;
	
	if (CCGetFromPost("vp_pagina_id")){
		//Estoy Editando
		$ok= $wpdb->update("vp_paginas",array("wp_pagina" => CCGetFromPost("wp_pagina"),
												'wp_pagina' => CCGetFromPost('wp_pagina'),
												'usar_fuentes' => ((CCGetFromPost('usar_fuentes')=='V')?'V':'F'),
												'titulo_txt' => CCGetFromPost('titulo_txt'),
												'titulo_fuente' => CCGetFromPost('titulo_fuente'),
												'titulo_color' => CCGetFromPost('titulo_color'),
												'titulo_size' => CCGetFromPost('titulo_size'),
												'pretitulo_txt' => CCGetFromPost('pretitulo_txt'),
												'pretitulo_fuente' => CCGetFromPost('pretitulo_fuente'),
												'pretitulo_color' => CCGetFromPost('pretitulo_color'),
												'pretitulo_size' => CCGetFromPost('pretitulo_size'),
												'subtitulo_txt' => CCGetFromPost('subtitulo_txt'),
												'subtitulo_fuente' => CCGetFromPost('subtitulo_fuente'),
												'subtitulo_color' => CCGetFromPost('subtitulo_color'),
												'subtitulo_size' => CCGetFromPost('subtitulo_size'),
												'fanpage_url' => CCGetFromPost('fanpage_url'),
												'fanpage_ancho' => CCGetFromPost('fanpage_ancho'),
												'fanpage_color' => CCGetFromPost('fanpage_color'),
												'fanpage_caras' => CCGetFromPost('fanpage_caras'),
												'fanpage_bordecolor' => CCGetFromPost('fanpage_bordecolor'),
												'fanpage_stream' => CCGetFromPost('fanpage_stream'),
												'fanpage_header' => CCGetFromPost('fanpage_header'),
												'url_content' => CCGetFromPost('url_content'),
												'url_destino' => CCGetFromPost('url_destino'),
												'texto_libre' => CCGetFromPost('texto_libre'),
												'boton_txt' => CCGetFromPost('boton_txt'),
												'ventana_titulo' => CCGetFromPost('ventana_titulo'),
												'ventana_ancho_val' => CCGetFromPost('ventana_ancho_val'),
												'ventana_ancho_unit' => CCGetFromPost('ventana_ancho_unit'),
												'ventana_alto_val' => CCGetFromPost('ventana_alto_val'),
												'ventana_ajustable' => CCGetFromPost('ventana_ajustable'),
												'ventana_tema' => CCGetFromPost('ventana_tema'),
												'ventana_fondo' => CCGetFromPost('ventana_fondo'),
												'ventana_descripcion' => CCGetFromPost('ventana_descripcion'),
												'ventana_miniatura' => CCGetFromPost('ventana_miniatura'),
												'fb_megusta' => CCGetFromPost('fb_megusta'),
												'fb_megusta_color' => CCGetFromPost('fb_megusta_color'),
												'fb_user_id' => CCGetFromPost('fb_user_id')
												),
										array("vp_pagina_id" => CCGetParam('vp_pagina_id')));
	
	} else {
		//Estoy Agregando
		$ok= $wpdb->insert( 'vp_paginas', array( 'wp_pagina' => CCGetFromPost("wp_pagina"),
												'wp_pagina' => CCGetFromPost('wp_pagina'),
												'usar_fuentes' => ((CCGetFromPost('usar_fuentes')=='V')?'V':'F'),
												'titulo_txt' => CCGetFromPost('titulo_txt'),
												'titulo_fuente' => CCGetFromPost('titulo_fuente'),
												'titulo_color' => CCGetFromPost('titulo_color'),
												'titulo_size' => CCGetFromPost('titulo_size'),
												'pretitulo_txt' => CCGetFromPost('pretitulo_txt'),
												'pretitulo_fuente' => CCGetFromPost('pretitulo_fuente'),
												'pretitulo_color' => CCGetFromPost('pretitulo_color'),
												'pretitulo_size' => CCGetFromPost('pretitulo_size'),
												'subtitulo_txt' => CCGetFromPost('subtitulo_txt'),
												'subtitulo_fuente' => CCGetFromPost('subtitulo_fuente'),
												'subtitulo_color' => CCGetFromPost('subtitulo_color'),
												'subtitulo_size' => CCGetFromPost('subtitulo_size'),
												'fanpage_url' => CCGetFromPost('fanpage_url'),
												'fanpage_ancho' => CCGetFromPost('fanpage_ancho'),
												'fanpage_color' => CCGetFromPost('fanpage_color'),
												'fanpage_caras' => CCGetFromPost('fanpage_caras'),
												'fanpage_bordecolor' => CCGetFromPost('fanpage_bordecolor'),
												'fanpage_stream' => CCGetFromPost('fanpage_stream'),
												'fanpage_header' => CCGetFromPost('fanpage_header'),
												'url_content' => CCGetFromPost('url_content'),
												'url_destino' => CCGetFromPost('url_destino'),
												'texto_libre' => CCGetFromPost('texto_libre'),
												'boton_txt' => CCGetFromPost('boton_txt'),
												'ventana_titulo' => CCGetFromPost('ventana_titulo'),
												'ventana_ancho_val' => CCGetFromPost('ventana_ancho_val'),
												'ventana_ancho_unit' => CCGetFromPost('ventana_ancho_unit'),
												'ventana_alto_val' => CCGetFromPost('ventana_alto_val'),
												'ventana_ajustable' => CCGetFromPost('ventana_ajustable'),
												'ventana_tema' => CCGetFromPost('ventana_tema'),
												'ventana_fondo' => CCGetFromPost('ventana_fondo'),
												'ventana_descripcion' => CCGetFromPost('ventana_descripcion'),
												'ventana_miniatura' => CCGetFromPost('ventana_miniatura'),
												'fb_megusta' => CCGetFromPost('fb_megusta'),
												'fb_megusta_color' => CCGetFromPost('fb_megusta_color'),
												'fb_user_id' => CCGetFromPost('fb_user_id')
												));
	}
	

 	if ($ok) {
	  echo '<div class="wrap">
	<h2><img src="' . MP_ICO32 .'" height="32" border="0" style="vertical-align:middle;"/>Configurar Página de +PopUp</h2>
		<br />
	  <a href="admin.php?page=vp_paginas">Se han Guardado los cambios, volver a la lista de Páginas</a>';
	} else {
	  echo '<div class="wrap">
	<h2><img src="' . MP_ICO32 .'" height="32" border="0" style="vertical-align:middle;"/>Configurar Página de +PopUp</h2>
		<br />
	  <a href="admin.php?page=vp_paginas">Hubo un error Guardado los cambios, volver a la lista de Páginas</a><br>';
	  $wpdb->print_error();
	}
  
	include("pie.php");
	echo "</div>";
	return true;
}

	if (CCGetParam("vp_pagina_id")){
		//Estamos Editando
		//Obtiene los Datos en Caso de Edicion
		global $wpdb;
		$datos = $wpdb->get_row("SELECT * FROM vp_paginas WHERE vp_pagina_id=" . CCGetParam("vp_pagina_id",0) . " LIMIT 1");
		
		$wp_pagina=$datos->wp_pagina;
	
		//Obtiene 
		$paginas = $wpdb->get_results("SELECT ID, post_name, post_title FROM $wpdb->posts 
										WHERE post_type='page' 
										AND post_status='publish'
										AND (post_name NOT IN (SELECT wp_pagina FROM vp_paginas) OR post_name ='$wp_pagina')
										ORDER BY post_name");
										
		$num_rows=	$wpdb->get_var("SELECT count(*) FROM $wpdb->posts 
										WHERE post_type='page' 
										AND post_status='publish'
										AND (post_name NOT IN (SELECT wp_pagina FROM vp_paginas) OR post_name ='$wp_pagina')
										ORDER BY post_name");
	} else {
		//Estamos Agregando asi que no hay datos
		global $wpdb;
		$datos = $wpdb->get_row("SELECT * FROM vp_paginas WHERE vp_pagina_id=0 LIMIT 1");

		//Lee las paginas del blog

		$paginas = $wpdb->get_results("SELECT ID, post_name, post_title FROM $wpdb->posts 
										WHERE post_type='page' 
										AND post_status='publish'
										AND post_name NOT IN (SELECT wp_pagina FROM vp_paginas)
										ORDER BY post_name");	
										
		$num_rows=	$wpdb->get_var("SELECT count(*) FROM $wpdb->posts 
										WHERE post_type='page' 
										AND post_status='publish'
										AND post_name NOT IN (SELECT wp_pagina FROM vp_paginas)
										ORDER BY post_name");	
	}
	
	if (!$num_rows){
		  echo '<div class="wrap">
		        <h2><img src="' . MP_ICO32 .'" height="32" border="0" style="vertical-align:middle;"/>Configurar Página de +PopUp</h2>
			    <br />
				No hay páginas disponibles para ser usadas por +PopUp, le recomendamos <a href="post-new.php?post_type=page" title="Crear Nueva Página" class="edit">Crear una Nueva...</a> <br>';
		  return true;
	}
	
	$fuentes=array( "Arial"        		 => "Arial",
					"Hand Of Sean" 		 => "Hand Of Sean",
					"Impact"	   		 => "Impact",
					"Kristen ITC"  		 => "Kristen ITC",
					"Lucida Handwriting" => "Lucida Handwriting",
					"Tahoma"			 => "Tahoma",
					"Tekton Pro"		 => "Tekton Pro");
	
?>
<div class="wrap  metabox-holder">
<h2><img src='<?php echo MP_ICO32; ?>' height='32' border='0' style='vertical-align:middle;'/>Editar Página de +PopUp</h2>

<div id="ajax-response"></div>
<style>
.form-field input{
	width:auto;
}
.form-field textarea{
	width:100%;
}
.form-table{
	width:auto;
}
</style>

<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" class="validate">
<div class="stuffbox postbox">
<h3>Página del Blog</h3>
  <table class="form-table">
    <tr class="form-field form-required">
      <th scope="row">Página de WordPress</th>
      <td colspan="6"><select name="wp_pagina" style="min-width:300px;" id="wp_pagina">
      
        <?php
			foreach ($paginas as $pagg) {
				$option = '<option value="'.$pagg->post_name.'" ' . (($pagg->post_name == $datos->wp_pagina) ? "selected": "" )  .  ' >';
				$option .= $pagg->post_title;
				$option .= '</option>';
				echo $option;
			}
		?>      
      
      </select> <a href="post-new.php?post_type=page" title="Crear Nueva Página" class="edit">Nueva...</a><br />
      <em>Página del Blog en la que cargará el +PopUp</em>.</td>
    </tr>
</table>
</div>

<div class="stuffbox postbox">
<h3>Títulos de la Página</h3>
  <table class="form-table">
<tr class='form-field'>
  <th scope='row'>Texto del Pretitulo 
  <a href="<?php echo plugins_url() ."/maspopup/ayuda.php?ruta=". WP_PLUGIN_URL . "&keepThis=true&TB_iframe=true"; ?>" title="Ayuda para Configurar Páginas de +PopUp" class="thickbox">
  <img src="<?php echo MP_HELP16; ?>" border="0" style="vertical-align:middle;" />
  </a>
  </th>
  <td colspan="6"><input type='text' value='<?php echo $datos->pretitulo_txt; ?>' name='pretitulo_txt' size='50' id='pretitulo_txt' style="width:100%" />
    </td> 
</tr>

<tr class='form-field'>
  <th align="right" scope='row'>&nbsp;</th>
  <td nowrap="nowrap">Fuente</td>
  <td><select name='pretitulo_fuente' id ='pretitulo_fuente' >
  
  	<?php 
	reset($fuentes); 
	foreach ($fuentes as $fuente_val => $fuente_txt){
	?>
	
    <option value='<?php echo $fuente_val; ?>' <?php echo (($datos->pretitulo_fuente==$fuente_val ? 'selected' : '')); ?> > <?php echo $fuente_txt; ?> </option>
    
    <?php
	}
	?>
  
  
  </select></td>
  <td>Color</td>
  <td><input type='text' value='<?php echo ($datos->pretitulo_color)? $datos->pretitulo_color : "2C19D3" ; ?>' id='pretitulo_color' name='pretitulo_color' size='10' maxlength='20' class="color"/></td>
  <td>Tamaño</td>
  <td nowrap="nowrap"><input type='text' value='<?php echo ($datos->pretitulo_size) ? $datos->pretitulo_size : 19; ?>' id='pretitulo_size' name='pretitulo_size' size='4' maxlength='4'/>
    px</td> 
</tr>

<tr class='form-field'>
     <th scope='row'>Texto del Título
     </th>
     <td colspan="7">
       <textarea name='titulo_txt' cols='50' rows="2" id='titulo_txt'><?php echo $datos->titulo_txt; ?></textarea></th>      
</tr>


<tr class='form-field'>
  <th align="right" scope='row'>&nbsp;</th>
  <td>Fuente</td>
  <td><select name='titulo_fuente' id ='titulo_fuente' >
  	<?php 
	reset($fuentes); 
	foreach ($fuentes as $fuente_val => $fuente_txt){
	?>
	
    <option value='<?php echo $fuente_val; ?>' <?php echo (($datos->titulo_fuente==$fuente_val ? 'selected' : '')); ?> > <?php echo $fuente_txt; ?> </option>
    
    <?php
	}
	?>
    
  </select></td>
  <td>Color</td>
  <td><input type='text' value='<?php echo ($datos->titulo_color) ? $datos->titulo_color :"D30202"; ?>' id='titulo_color' name='titulo_color' size='10' maxlength='50' class="color"/></td>
  <td>Tamaño</td>
  <td nowrap="nowrap"><input name='titulo_size' type='text' id='titulo_size' value='<?php echo ($datos->titulo_size) ? $datos->titulo_size : "34" ; ?>' size='4' maxlength="4"/>
    px</td> 
</tr>



<tr class='form-field'>
  <th scope='row'>Texto del SubTítulo</th>
  <td colspan="6">
  <input type='text' value='<?php echo $datos->subtitulo_txt; ?>' size='50' name='subtitulo_txt' id='subtitulo_txt' style="width:100%"/>
    </td> 
</tr>
<tr class='form-field'>
  <th align="right" scope='row'>&nbsp;</th>
  <td>Fuente</td>
  <td><select name='subtitulo_fuente' id ='subtitulo_fuente' >
    	<?php 
	reset($fuentes); 
	foreach ($fuentes as $fuente_val => $fuente_txt){
	?>
	
    <option value='<?php echo $fuente_val; ?>' <?php echo (($datos->subtitulo_fuente==$fuente_val ? 'selected' : '')); ?> > <?php echo $fuente_txt; ?> </option>
    
    <?php
	}
	?>

  </select></td>
  <td>Color</td>
  <td><input type='text' value='<?php echo ($datos->subtitulo_color) ? $datos->subtitulo_color : "2C19D3"; ?>' id='subtitulo_color' name='subtitulo_color' size='10' maxlength='20' class="color"/></td>
  <td>Tamaño</td>
  <td nowrap="nowrap"><input type='text' value='<?php echo ($datos->subtitulo_size) ? $datos->subtitulo_size : "19"; ?>' id='subtitulo_size' name='subtitulo_size' size='4' maxlength='4'/>
    px</td> 
</tr>
<tr class='form-field'>
  <th align="right" scope='row'>&nbsp;</th>
  <td colspan="6"><input name="usar_fuentes" type="checkbox" id="usar_fuentes" value="V" <?php echo ($datos->usar_fuentes=='V') ? 'checked="checked"' : ''; ?>  />
    Usar Fuentes TrueType al dibujar los Títulos (<em>Puede ser más lenta la carga de la página</em>)</td>
  </tr>
  </table>
</div>

<div class="stuffbox postbox">
<h3>Página de Fans de Facebook y Viralidad</h3>
  <table class="form-table">
<tr class='form-field'>
  <td colspan="7" scope='row'><em>Para mostrar el plugin social de facebook y hacer que tus visitantes se hagan fans de tu página de facebook, coloca los siguintes datos (si lo dejas en blanco no se mostrará el plugin de facebook)</em></td>
  </tr>
<tr class='form-field'>
  <th scope='row'>URL de la página de Fans</th>
  <td colspan="6">
    <input type='text' value='<?php echo $datos->fanpage_url; ?>' id='fanpage_url' name='fanpage_url' size='50' maxlength='255'/>
    <br />
    <em>Incluyendo http por ejemplo, http://www.facebook.com/maspopup</em></td> 
</tr>
<tr class='form-field'>
  <th scope='row'>&nbsp;</th>
  <td>Ancho</td>
  <td><input type='text' value='<?php echo ($datos->fanpage_ancho) ? $datos->fanpage_ancho : 500; ?>' id='fanpage_ancho' name='fanpage_ancho' size='10' maxlength='4'/></td>
  <td nowrap="nowrap">Esquema de color</td>
  <td><select name='fanpage_color' id ='fanpage_color' >
    <option value='light' <?php echo (($datos->fanpage_color=='light' ? 'selected' : '')); ?> > light </option>
    <option value='dark' <?php echo (($datos->fanpage_color=='dark' ? 'selected' : '')); ?> > dark </option>
    </select></td>
  <td> Ver Caras</td>
  <td><select name='fanpage_caras' id ='fanpage_caras' >
    <option value='V' <?php echo (($datos->fanpage_caras=='V' ? 'selected' : '')); ?> > Sí </option>
    <option value='F' <?php echo (($datos->fanpage_caras=='F' ? 'selected' : '')); ?> > No </option>

    </select></td> 
</tr>
<tr class='form-field'>
  <th scope='row'>&nbsp;</th>
  <td>Borde</td>
  <td><input type='text' value='<?php echo $datos->fanpage_bordecolor; ?>' id='fanpage_bordecolor' name='fanpage_bordecolor' size='10' maxlength='50' class="color"/></td>
  <td>Ver Publicaciones</td>
  <td><select name='fanpage_stream' id ='fanpage_stream' >
    <option value='F' <?php echo (($datos->fanpage_stream=='F' ? 'selected' : '')); ?> > No </option>
    <option value='V' <?php echo (($datos->fanpage_stream=='V' ? 'selected' : '')); ?> > Sí </option>

    </select></td>
  <td>Encabezado</td>
  <td><select name='fanpage_header' id ='fanpage_header' >
    <option value='F' <?php echo (($datos->fanpage_header=='F' ? 'selected' : '')); ?> > No </option>
    <option value='V' <?php echo (($datos->fanpage_header=='V' ? 'selected' : '')); ?> > Sí </option>

    </select></td> 
</tr>
<tr class='form-field'>
  <th scope='row'>Incluír Botón Me Gusta</th>
  <td  style="text-align:left;"><input name="fb_megusta" type="checkbox" id="fb_megusta" value="V" <?php echo ($datos->fb_megusta=='V') ? 'checked="checked"' : ''; ?>  /></td>
  <td scope='row'>Esquema de color</td>
  <td><select name='fb_megusta_color' id ='fb_megusta_color' >
    <option value='light' <?php echo (($datos->fb_megusta_color=='light' ? 'selected' : '')); ?> > light </option>
    <option value='dark' <?php echo (($datos->fb_megusta_color=='dark' ? 'selected' : '')); ?> > dark </option>
  </select></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr class='form-field'>
  <th scope='row'>ID de Usuario de Facebook</th>
  <td colspan="5"><input type='text' value='<?php echo $datos->fb_user_id; ?>' id='fb_user_id' name='fb_user_id' size='20' maxlength='50'/>
    <br />
    Opcional pero útil para poder obtener estadísticas de sus visitantes en <a href="https://www.facebook.com/insights/" target="_blank">https://www.facebook.com/insights/</a> </td>
  <td>&nbsp;</td>
</tr>

  </table>
</div>

<div class="stuffbox postbox">
<h3>Texto Libre</h3>
  <table class="form-table"  style="width:100%;">
	<tr class='form-field'>
     <td scope='row'>
  
  <div id="postdivrich1" class="postarea">
  	<?php the_editor(stripslashes($datos->texto_libre),"texto_libre","texto_libre"); ?>
  </div>  

  </td>
     </tr>

</table>
</div>

<div class="stuffbox postbox">
<h3>Diseño de la Ventana</h3>
  <table class="form-table">


<tr class='form-field form-required'>
     <th scope='row'>Título de la Ventana</th>
     <td colspan="6">
        <input type='text' value='<?php echo $datos->ventana_titulo; ?>' id='ventana_titulo' name='ventana_titulo' size='50' maxlength='255'/>
    </td> 
</tr>
<tr class='form-field'>
  <th scope='row'>&nbsp;</th>
  <td>Ancho</td>
  <td colspan="2" nowrap="nowrap"><input type='text' value='<?php echo ($datos->ventana_ancho_val) ? $datos->ventana_ancho_val : 550; ?>' id='ventana_ancho_val' name='ventana_ancho_val' size='10' maxlength='4'/>
    <select name='ventana_ancho_unit' id ='ventana_ancho_unit' >
      <option value='px' <?php echo (($datos->ventana_ancho_unit=='px' ? 'selected' : '')); ?> > px </option>
      <option value='%' <?php echo (($datos->ventana_ancho_unit=='%' ? 'selected' : '')); ?> > % </option>
      </select>
    <br />
    <em>Deje en Blanco para automático</em></td>
  <td nowrap="nowrap">Alto</td>
  <td colspan="2">
    <input type='text' value='<?php echo $datos->ventana_alto_val; ?>' id='ventana_alto_val' name='ventana_alto_val' size='10' maxlength='4'/> px
    <br />
    <em>Deje en Blanco para Automátco</em></td>
</tr>
<tr class='form-field'>
  <th scope='row'>Permite Ajustar Tamaño</th>
  <td colspan="6">
    <select name='ventana_ajustable' id ='ventana_ajustable' >
      <option value='V' <?php echo (($datos->ventana_ajustable=='V' ? 'selected' : '')); ?> >
        Sí
        </option>
      <option value='F' <?php echo (($datos->ventana_ajustable=='F' ? 'selected' : '')); ?> >
        No
        </option>
      </select> 
    ¿Quiere que el vistante pueda ajustar el tamaño de la ventana?
    </td> 
</tr>
<tr class='form-field'>
     <th scope='row'>Tema (aspecto)</th>
     <td colspan="6">
        <select name='ventana_tema' id ='ventana_tema' >
        <?php
		$temas=array("base"=>"Base",
					 "black-tie"=>"Black Tie",
					 "blitzer"=>"Blitzer",
					 "cupertino"=>"Cupertino",
					 "dark-hive"=>"Dark Hive",
					 "dot-luv"=>"Dot Luv",
					 "eggplant"=>"Eggplant",
					 "excite-bike"=>"Excite Bike",
					 "flick"=>"Flick",
					 "hot-sneaks"=>"Hot sneaks",
					 "humanity"=>"Humanity",
					 "le-frog"=>"Le Frog",
					 "mint-choc"=>"Mint Chocolate",
					 "overcast"=>"Overcast",
					 "pepper-grinder"=>"Peper Grinder",
					 "redmond"=>"Redmond",
					 "smoothness"=>"Smoothness",
					 "south-street"=>"South Street",
					 "start"=>"Start",
					 "sunny"=>"Sunny",
					 "swanky-purse"=>"Swanky Purse",
					 "trontastic"=>"Trontastic",
					 "ui-darkness"=>"UI Darkness",
					 "ui-lightness"=>"UI Ligthness",
					 "vader"=>"Vader"
					 );	
		        
        foreach ($temas as $tema_valor => $tema_texto){
		?>
        
        <option value='<?php echo $tema_valor; ?>' <?php echo (($datos->ventana_tema==$tema_valor ? 'selected' : '')); ?> >
        <?php echo $tema_texto; ?>
        </option>
        
        <?php
		}
		?>
        
        
        
        </select> 
        <a href="<?php echo plugins_url() ."/maspopup/temas.php?ruta=". WP_PLUGIN_URL . "&keepThis=true&TB_iframe=true"; ?>" title="Vista previa de Temas Para +PopUp" class="thickbox button">
        Elegir con Vista Previa
        </a>
        
        <br />
        Aspecto que quiere usar para mostrar el +PopUp</td> 
</tr>
<tr class='form-field'>
  <th scope='row'>Descripción</th>
  <td colspan="6"><em>
    <input type='text' value='<?php echo $datos->ventana_descripcion; ?>' id='ventana_descripcion' name='ventana_descripcion' size='50' maxlength='255'/>
    <br />
    Descripción para ser usada al compartir esta página en facebook</em></td>
</tr>
<tr class='form-field'>
  <th scope='row'>URL de miniatura</th>
  <td colspan="6"><em>
    <input type='text' value='<?php echo $datos->ventana_miniatura; ?>' id='ventana_miniatura' name='ventana_miniatura' size='50' maxlength='255'/>
    
    <input id="buscar_miniatura" type="button" value="Buscar" class="button"/>
    
    <br />
    URL de la imágen de miniatura que se muestra al compartir esta página en facebook</em></td>
</tr>


  </table>
</div>

<div class="stuffbox postbox">
<h3>Comportamiento del +PopUp</h3>
  <table class="form-table"  style="width:100%;">
<tr class='form-field form-required'>
  <th scope='row'>URL de Destino</th>
  <td colspan="6">
    <input type='text' value='<?php echo $datos->url_destino; ?>' id='url_destino' name='url_destino' size='50' maxlength='255'/>
    <br />
    <em>Dirección completa, or ejemplo http://www.facebook.com/maspopup</em></td> 
</tr>
<tr class='form-field'>
     <th scope='row'>Texto del Botón</th>
     <td colspan="6">
        <input type='text' value='<?php echo $datos->boton_txt; ?>' id='boton_txt' name='boton_txt' size='20' maxlength='50'/>
    </td> 
</tr>

	</table>
</div>


<div class="stuffbox postbox">
<h3>Fondo de la página</h3>
  <table class="form-table"  style="width:100%;">
	<tr class='form-field'>
     <td scope='row'>
       

    <div id="postdivrich2" class="postarea">
      <?php the_editor(stripslashes($datos->ventana_fondo),"ventana_fondo","ventana_fondo"); ?>

      </div>
   
  </td>
     </tr>

</table>
</div>

    
    <p class="submit">
      <input type="submit" value="Grabar los Cambios"  class="button-primary" id="submit" name="submit"/> o <a href="admin.php?page=vp_paginas">Cancelar</a>
      </p>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="vp_pagina_id" value="<?php echo $datos->vp_pagina_id; ?>" />
</form>

<?php
include("pie.php");
?>
</div>