<?php

//Definiciones

define("MPURL", plugins_url() ."/maspopup");
define("MPVERSION", "010002");

define("MP_ICO16",  MPURL ."/mp.png");
define("MP_ICO32",  MPURL ."/mp32.png");
define("MP_ICO64",  MPURL ."/mp64.png");
define("MP_HELP16", MPURL ."/help16.png");

    function menu_plugin_vp(){
		$mp_apikey=get_option("vp_apikey");	
		$vp_activar=activar_vp($mp_apikey);
		
		if ($vp_activar){
		   add_menu_page("Plugin +PopUp", "+PopUp", "manage_options", "vp_paginas", "vp_viralpop_list", MP_ICO16);
		   add_submenu_page("vp_paginas","Páginas +PopUp","Páginas +PopUp","manage_options","vp_paginas","vp_viralpop_list");
		   add_submenu_page("vp_paginas","Agregar/Editar Páginas +PopUp","Añadir Nueva","manage_options","vp_paginas_add","vp_viralpop_add");
		   add_submenu_page("vp_paginas","Datos de Activación","Activación","manage_options","vp_activar","vp_activar");		   
		} else {
		   add_menu_page("Plugin +PopUp", "+PopUp", "manage_options", "vp_paginas", "vp_activar", MP_ICO16);			
		}
    }

if(!function_exists('CCGetFromPost')){
	function CCGetFromPost($parameter_name, $default_value = ""){
		return isset($_POST[$parameter_name]) ? CCStrip($_POST[$parameter_name]) : $default_value;
	}
}

if(!function_exists('CCGetFromGet')){
	function CCGetFromGet($parameter_name, $default_value = ""){
		return isset($_GET[$parameter_name]) ? CCStrip($_GET[$parameter_name]) : $default_value;
	}
}

if(!function_exists('CCGetParam')){
	function CCGetParam($parameter_name, $default_value = ""){
		$parameter_value = "";
		if(isset($_POST[$parameter_name]))
			$parameter_value = CCStrip($_POST[$parameter_name]);
		else if(isset($_GET[$parameter_name]))
			$parameter_value = CCStrip($_GET[$parameter_name]);
		else
			$parameter_value = $default_value;
		return $parameter_value;
	}
}

if(!function_exists('CCStrip')){
	function CCStrip($value){
	  if(get_magic_quotes_gpc() != 0)
	  {
		if(is_array($value))  
		  foreach($value as $key=>$val)
			$value[$key] = stripslashes($val);
		else
		  $value = stripslashes($value);
	  }
	  return $value;
	}
}

if(!function_exists('activar_vp')){
	function activar_vp($vp_apikey){
		//Clase para opetener llamadas http
		if( !class_exists( 'WP_Http' ) ) include_once( ABSPATH . WPINC. '/class-http.php' );

		$url= "http://www.maspopup.com/api.php?a=$mp_apikey&h=" . home_url() . "&v=" . MPVERSION;
		
		$request = new WP_Http;
	    $result = $request->request( $url );

		//die("URL: $url <pre>" . print_r($result, true) . "</pre>");

		$contenidos = $result['body'];
		eval($contenidos);
		
		update_option("vp_activo",$ok);
		return $resultado;
	}
}

if(!function_exists('CCGet_page_id')){
	function CCGet_page_id($page_name){
		global $wpdb;
		$page_name = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '$page_name'");
		return $page_name;
	}
}

if(!function_exists('CCGet_page_title')){
	function CCGet_page_title($page_name){
		global $wpdb;
		$page_name = $wpdb->get_var("SELECT post_title FROM $wpdb->posts WHERE post_name = '$page_name'");
		return $page_name;
	}
}

if(!function_exists('contenido_vp')){
	function contenido_vp(){
		global $wpdb;
		$datos=$wpdb->get_results("SELECT * FROM vp_paginas");
		
		//die("<pre>" . print_r($datos, true) . "</pre>");
		
		foreach ($datos as $lin){
				//es la pagina que quiero?
				if (strlen($lin->wp_pagina) && is_page($lin->wp_pagina)){		
					$lin=stripslashes_deep($lin);
							
					$page_url=get_permalink( CCGet_page_id($lin->wp_pagina));
					$ventana_ajustable=($lin->ventana_ajustable=='V')?"true":"false";
					$fanpage_ancho=($lin->fanpage_ancho)     ? $lin->fanpage_ancho : 450;
					$fanpage_caras=($lin->fanpage_caras=='V')? "true" : "false";
					$ventana_alto =($lin->ventana_alto_val)  ? "'" . $lin->ventana_alto_val . (($lin->ventana_alto_unit=="%") ? "%" :"") ."'" : "'auto'";
					$ventana_ancho=($lin->ventana_ancho_val) ? "'" . $lin->ventana_ancho_val . (($lin->ventana_ancho_unit=="%") ? "%" :"") . "'" : "500";
					$boton        =(strlen($lin->boton_txt)) ? ',buttons: [{text: "' . $lin->boton_txt . '",click: function() {$(this).dialog("close");}}]' : '';	
					$fanpage_stream=($lin->fanpage_stream=='V') ? "true" : "false";
					$fanpage_header=($lin->fanpage_header=='V') ? "true" : "false";
					$fanpage_bordecolor=(strlen($lin->fanpage_bordecolor)) ? $lin->fanpage_bordecolor : "FFF";
					$fanpage_color = ($lin->fanpage_color=='dark') ? 'colorscheme="dark"' : '';
					$pretitulo_txt=nl2br($lin->pretitulo_txt);
					$titulo_txt=nl2br($lin->titulo_txt);
					$subtitulo_txt=nl2br($lin->subtitulo_txt);
					if ($lin->usar_fuentes=='V'){
						$script_font  =	'<script type="text/javascript" src="' . plugins_url() .'/maspopup/cufon-yui.js"></script>';
						$cufon_fuentes=array( "Arial"=> "Arial",
										"Hand" 		 => "Hand Of Sean",
										"Impact"	 => "Impact",
										"Kristen"	 => "Kristen ITC",
										"Lucida"	 => "Lucida Handwriting",
										"Tahoma"	 => "Tahoma",
										"Tekton"	 => "Tekton Pro");					
						foreach ($cufon_fuentes as $valor => $clave){
							if ($lin->pretitulo_fuente == $clave || $lin->titulo_fuente == $clave || $lin->subtitulo_fuente == $clave){
								$script_font  .= "\n" .'<script type="text/javascript" src="' . plugins_url() .'/maspopup/' . $valor . '.js"></script>';
							}
						}
					}
					$meta_imagen=(strlen($lin->ventana_miniatura))? "<meta property=\"og:image\" content=\"$lin->ventana_miniatura\" />": '';
					
					if ($lin->fb_megusta=='V'){
						$megusta='<br /><fb:like href="'. $page_url .'" send="true" width="450" show_faces="true" font="arial" ' . (($lin->fb_megusta_color=='dark')? 'colorscheme="dark"':'')  . ' ></fb:like>';					
					} else {
						$megusta='';
					}
					
					$fbuser_id=(strlen($lin->fb_user_id)) ? '<meta property="fb:admins" content="' . $lin->fb_user_id .'" />' :'';
					
					if (strlen($lin->fanpage_url)){
						$megusta_box='<div class="fanpage">' .
				                 '<fb:like-box href="' . $lin->fanpage_url . '" ' .
								 ' width=" ' . $fanpage_ancho . '" ' .
								 ' show_faces="' . $fanpage_caras . '" stream="' . $fanpage_stream .'" '. 
								 ' header="' . $fanpage_header . '" ' .
								 ' border_color="#' . $fanpage_bordecolor . '" '.
								   $fanpage_color . '></fb:like-box></div>';
				
					}  else {
						$megusta_box='';
					}
					$ventana_fondo=stripslashes($lin->ventana_fondo);
						
					include("vp_tpl.php");
					
				} 
		}
		
	}
}

function vp_my_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', plugins_url() ."/maspopup/funciones.js", array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');

}

function vp_my_admin_styles() {
	wp_enqueue_style('thickbox');
}

?>
