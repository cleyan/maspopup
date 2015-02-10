<?php 
	global $wpdb;
	
	$datos=$wpdb->get_results("SELECT vp_pagina_id, wp_pagina, titulo_txt, fanpage_url, url_destino, ventana_descripcion, ventana_miniatura FROM vp_paginas ORDER BY wp_pagina ASC");
		
	require_once("funciones.php");

?>
<div class="wrap">
<h2><img src='<?php echo MP_ICO32; ?>' height='32' border='0' style='vertical-align:middle;'/> Mis Páginas con +PopUp

<a class="button add-new-h2" href="admin.php?page=vp_paginas_add">Añadir nueva</a>

</h2>
<table class="wp-list-table widefat fixed" cellspacing="0">
<thead>
  <tr>
    <th>Página del blog</th>
    <th>Página de Fans</th>
    <th>URL de Destino</th>
    <th>Descripción</th>
  </tr>
</thead>  

<tfoot>
  <tr>
    <th>Página del blog</th>
    <th>Página de Fans</th>
    <th>URL de Destino</th>
    <th>Descripción</th>
  </tr>
</tfoot>

	<?php
	$alternate=false;
	foreach ($datos as $lin){
  	
	?>
    <tr <?php echo ($alternate) ? 'class="alternate"' : ''; $alternate = !$alternate;  ?>>
      <td><a href="admin.php?page=vp_paginas_add&vp_pagina_id=<?php echo $lin->vp_pagina_id; ?>" class="row-title"><?php echo CCGet_page_title($lin->wp_pagina); ?></a><br />
      <div class="row-actions">
      <span class="edit">
	      <a href="admin.php?page=vp_paginas_add&vp_pagina_id=<?php echo $lin->vp_pagina_id; ?>" title="Editar Esta Página" target="_self"  class="edit">Editar</a> 
      	&nbsp;|&nbsp;
      </span>
      <span class="delete">
      <a href="admin.php?page=vp_paginas_add&accion=eliminar&vp_pagina_id=<?php echo $lin->vp_pagina_id; ?>" title="Eliminar Esta Página" target="_self" onclick="javascript:return confirm('Estás seguro (a) que quieres eliminar esta página?')" class="edit">Eliminar</a>
      &nbsp;|&nbsp;
      </span>
      <span class="view">
      <a href="<?php echo get_permalink( CCGet_page_id($lin->wp_pagina)); ?>" target="_blank" title='Ver "<?php echo $lin->wp_pagina; ?>"'>Ver </a>
      </span>      
      
      </div>      
      </td>
      <td><?php echo $lin->fanpage_url; ?></td>
      <td><?php echo $lin->url_destino; ?></td>
      <td><?php echo (($lin->ventana_miniatura) ? '<img style="vertical-align:middle; margin-right:10px; " height="50" border="0" src="' . $lin->ventana_miniatura . '" />' : '&nbsp;') ;  echo $lin->ventana_descripcion; ?>
      </td> 

    </tr>
    <?php 
	} ?>
    
</table>
<?php 
include("pie.php");
?>
</div>