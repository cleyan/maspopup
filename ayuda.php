<?php
	$ruta=$_GET["ruta"] . "/maspopup";
	
?>

<!doctype html>
<html>
<head>
</head>
<FRAMESET ROWS="*,*">
  <FRAME SRC="http://www.maspopup.com/ayuda#<?php echo $_GET['marca']; ?>">
  <NOFRAMES>
    <HEAD>
    <TITLE>Ayuda de +PopUp</TITLE>
    <META HTTP-EQUIV="REFRESH" CONTENT="0; URL='http://www.maspopup.com/ayuda#<?php echo $_GET['marca']; ?>'">
    </HEAD>
    <BODY>
    <P>Su Navegador parece no soportar marcos o el soporte de marcos está desactivado.</P>
    <P>Por favor <A HREF="http://www.maspopup.com/ayuda#<?php echo $_GET['marca']; ?>">Haga Click Aquí</A> para ver la Ayuda en Línea.</P>
    </BODY>
  </NOFRAMES>
<frame src="UntitledFrame-4"></FRAMESET>
</html>