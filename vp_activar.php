<?php
require_once("funciones.php");

//Obtener campos
$vp_apikey   = CCGetFromPost("vp_apikey","");
$mp_activar_h= CCGetFromPost("mp_activar_h","");

if ($mp_activar_h=="GRABAR"){
	update_option("vp_apikey",$vp_apikey);
} 

$vp_apikey=get_option("mp_apikey");	

$vp_activar=activar_vp($vp_apikey);

if(!$vp_activar){

?>

<div class="wrap">
<h2><img src='<?php echo MP_ICO32; ?>' height='32' border='0' style='vertical-align:middle;'/> Activar Su PlugIn en +PopUp</h2>

<p>Ingrese los Datos solicitados, los puede obtener en su cuenta de +Prospectos en <br>
  http://www.maspopup.com/apikey.php</p>
<form name="form1" method="post" action="">

<table border="0">
    <td>Clave API de Su Cuenta</td>
    <td><input name="vp_apikey" type="text" id="vp_apikey" size="50" maxlength="100" value="<?php echo $vp_apikey; ?>"></td>
  </tr>
</table>

  <p>
    <input type="submit" name="Activar" id="Activar" value="Activar el PlugIn" class="button-primary">
    <input type="hidden" name="mp_activar_h" id="mp_activar_h" value="GRABAR">
  </p>
</form>


<?php
} else {
?>

<div class="wrap">
<h2><img src='<?php echo MP_ICO32; ?>' height='32' border='0' style='vertical-align:middle;'/> Activación de Su PlugIn en +PopUp</h2>

<p>Su PlugIn Ha sido activado correctamente, por favor recuerde leer las condiciones de uso del servicio, el uso del plugIn es personal e instransferible.</p>

<?php echo "Clave API de Activación (ApiKey): <strong>$mp_apikey</strong>"; ?>

<p>
<a href="admin.php?page=vp_paginas" title="Ir a Ver Mis Páginas de +P">Ir a Ver Mis Páginas</a>
    
<?php
}


include("pie.php");

?>

</div>
