<?php
/*
Plugin Name: +PopUp
Plugin URI: http://maspopup.com
Description: PlugIn para cargar PopUp que permiten viralizar tu blog, generar mas Fans en tu página de facebook teniendo multiples temas y full control del contenido y el comportamiento del plugin.
Author: Carlos Leyan
Version: 1.0.3
Author URI: http://www.facebook.com/carlosleyan.net
*/

	require_once("funciones.php");

	function vp_viralpop_list(){
		include(dirname(__FILE__) . "/vp_list.php");
	}
	function vp_viralpop_add(){
		include(dirname(__FILE__) . "/vp_add.php");
	}
	function vp_activar(){
		include(dirname(__FILE__) . "/vp_activar.php");
	}

	function load_vp_admin_scripts() {
		wp_enqueue_script(array('jquery', 'editor', 'thickbox', 'media-upload',"wp-ajax-response",'farbtastic'));
		wp_enqueue_style('thickbox','farbtastic');
        wp_register_script( 'jscolor', plugins_url() . "/maspopup/jscolor.js");
        wp_enqueue_script( 'jscolor' );		
	}	

	function vp_load_tiny_mce() {
		wp_tiny_mce( false ); // true gives you a stripped down version of the editor
	}

	function vp_inicializa(){
		global $wpdb;
		$sql="CREATE TABLE `vp_paginas` (
			  `vp_pagina_id` int(11) NOT NULL auto_increment,
			  `wp_pagina` varchar(255)  NOT NULL,
			  `usar_fuentes` enum('V','F') default 'V',
			  `titulo_txt` longtext ,
			  `titulo_fuente` varchar(255)  default NULL,
			  `titulo_color` varchar(50)  default NULL,
			  `titulo_size` int(11) default NULL,
			  `pretitulo_txt` longtext ,
			  `pretitulo_fuente` varchar(255)  default NULL,
			  `pretitulo_color` varchar(50)  default NULL,
			  `pretitulo_size` int(11) default NULL,
			  `subtitulo_txt` longtext ,
			  `subtitulo_fuente` varchar(255)  default NULL,
			  `subtitulo_color` varchar(50)  default NULL,
			  `subtitulo_size` int(11) default NULL,
			  `fanpage_url` varchar(255)  default NULL,
			  `fanpage_ancho` int(11) default NULL,
			  `fanpage_color` enum('light','dark')  default NULL,
			  `fanpage_caras` enum('V','F')  default NULL,
			  `fanpage_bordecolor` varchar(50)  default NULL,
			  `fanpage_stream` enum('V','F')  default NULL,
			  `fanpage_header` enum('V','F')  default NULL,
			  `url_content` varchar(255)  default NULL,
			  `url_destino` varchar(255)  default NULL,
			  `texto_libre` longtext ,
			  `boton_txt` varchar(50)  default NULL,
			  `ventana_titulo` varchar(255)  default NULL,
			  `ventana_ancho_val` int(11) default NULL,
			  `ventana_ancho_unit` enum('px','%')  default NULL,
			  `ventana_alto_val` int(11) default NULL,
			  `ventana_alto_unit` enum('px','%')  default NULL,
			  `ventana_ajustable` enum('V','F')  default NULL,
			  `ventana_tema` varchar(255)  default NULL,
			  `ventana_fondo` longtext  default NULL,
			  `ventana_descripcion` varchar(255) default NULL,
			  `ventana_miniatura` varchar(255) default NULL,
			  `fb_megusta` ENUM( 'V', 'F' ) NULL DEFAULT 'F',
			  `fb_megusta_color` ENUM( 'light', 'dark' ) NULL DEFAULT 'light',
			  `fb_user_id` VARCHAR( 50 ) default NULL,
			  PRIMARY KEY  (`vp_pagina_id`)
			) ENGINE=MyISAM COMMENT='Paginas para Plugin +PopUp';";

		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);

		update_option("vp_apikey","");	
		update_option("vp_activo","");			
		
	}

	//inicializa
	register_activation_hook(__FILE__, "vp_inicializa");	
	add_action("admin_menu","menu_plugin_vp");	

	add_action("template_redirect", "contenido_vp");
	add_action('admin_enqueue_scripts', 'load_vp_admin_scripts');
	add_action("admin_head","vp_load_tiny_mce");	
	//add_action('admin_print_footer_scripts', 'vp_tiny_mce_preload_dialogs');
	
	if (isset($_GET['page']) && $_GET['page'] == 'vp_paginas_add') {
		add_action('admin_print_scripts', 'vp_my_admin_scripts');
		add_action('admin_print_styles', 'vp_my_admin_styles');
	}	
	
	
?>
