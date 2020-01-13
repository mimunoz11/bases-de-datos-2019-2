<!DOCTYPE HTML>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grupo 06</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

  <!-- Custom fonts for this theme -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="../css/freelancer.min.css" rel="stylesheet">

  <style>
  .center {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  </style>

</head>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Abrir Popup</title>
<script type="text/javascript">
//<![CDATA[
var win= null;
function VentanaCentrada(pagina,w,h,nombre){
var winleft = (screen.width-w)/2;
var wintop = (screen.height-h)/2;
caracteristicas='height='+h+',width='+w+',top='+wintop+',left='+winleft+',scrollbars=no,toolbar=no,resizable=yes'
win=window.open(pagina,nombre,caracteristicas)
if(parseInt(navigator.appVersion) >= 4){win.window.focus();}
}
//]]>
</script>
</head>
<body>
<a href="html2.html" onclick="VentanaCentrada('html2.html','400','400','Popupuno');return false;" > Abrir Popup </a>
</body>
</html>
