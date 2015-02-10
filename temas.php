<?php

$ruta=$_GET["ruta"] . "/maspopup";

$tn_temas=array( "base"=>"Base",
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
					 
foreach ($tn_temas as $clave => $valor){
	?>
	<div style="margin:10px; float:left; padding: 5px; border: 1px solid #666;min-width: 178px; text-align:center;">
    <?php echo $valor; ?><br />
    <a href="#" onclick="self.parent.jQuery('#ventana_tema').val('<?php echo $clave; ?>');self.parent.tb_remove();">
    	<img src="<?php echo "$ruta/vprevia/$clave.jpg"; ?>" border="0" height="150" />
    </a>
	</div>
    
    <?php
}
//var listbox=self.parent.document.getElementById('ventana_tema');var  mivar=listbox.options[listbox.selectedIndex].value
?>

