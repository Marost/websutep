<?php 
session_start();
require_once("../../conexion/conexion.php");
require_once("../../conexion/funciones.php");
require_once("../../conexion/verificar_sesion.php");

//VARIABLES
$id_url=$_REQUEST["id"];

//EDITAR
$rst_nota=mysql_query("SELECT * FROM ".$tabla_suf."_portada WHERE id=$id_url;", $conexion);
$fila_nota=mysql_fetch_array($rst_nota);

//VARIABLES
$nota_fecha=$fila_nota["fecha"];
$nota_imagen=$fila_nota["imagen"];
$nota_imagen_carpeta=$fila_nota["imagen_carpeta"];
$nota_pdf=$fila_nota["pdf"];
$nota_pdf_carpeta=$fila_nota["pdf_carpeta"];
$nota_contenido=$fila_nota["revista"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<title>Administrador</title>

<?php require_once("../../w-scripts.php"); ?>

</head>

<body>

<!-- Top line begins -->
<?php require_once("../../w-topline.php"); ?>
<!-- Top line ends -->

<!-- Sidebar begins -->
<div id="sidebar">
    
    <?php require_once("../../w-sidebarmenu.php"); ?>
    
</div><!-- Sidebar ends -->    
    
    
<!-- Content begins -->
<div id="content">
    <div class="contentTop">
        <span class="pageTitle"><span class="icon-screen"></span>Edición Impresa</span>
    </div>
    
    <!-- Breadcrumbs line -->
    <div class="breadLine">
        <div class="bc">
        </div>
    </div>
    
    <!-- Main content -->
    <div class="wrapper">

        <form id="submit-form" class="main" method="POST" action="s-editar.php?id=<?php echo $id_url; ?>" enctype="multipart/form-data">

            <fieldset>
                <div class="widget fluid">
                    
                    <div class="whead"><h6>Editar</h6></div>
                    
                    <div class="formRow">
                        <div class="grid3"><label>Fecha:</label></div>
                        <div class="grid4"><input type="text" class="datepicker" name="pub_fecha" value="<?php echo $nota_fecha; ?>" /></div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Imagen:</label> </div>
                        <div class="grid9">
                            <div class="floatL">
                                <a href="../../../imagenes/upload/<?php echo $nota_imagen_carpeta."".$nota_imagen; ?>" class="lightbox">
                                    <img src="../../../imagenes/upload/<?php echo $nota_imagen_carpeta."".$nota_imagen; ?>" width="100" >
                                </a>
                            </div>
                            <div class="floarL width60 margin1020">    
                                <input type="file" class="styled" id="fileInput" name="fileInput" />
                                <input type="hidden" name="imagen" value="<?php echo $nota_imagen; ?>">
                                <input type="hidden" name="imagen_carpeta" value="<?php echo $nota_imagen_carpeta; ?>">
                            </div>
                        </div>
                    </div>

                    <div class="formRow">
                        <div class="grid3"><label>Revista:</label></div>
                        <div class="grid9">
                            <textarea name="contenido" rows="8"/><?php echo $nota_contenido; ?></textarea>
                        </div>
                    </div>
                    
                    <div class="formRow">
                        <div class="body" align="center">
                            <a href="lista.php" class="buttonL bBlack">Cancelar</a>
                            <input type="submit" class="buttonL bGreen" name="btn-guardar" value="Guardar datos">
                        </div>
                    </div>
                    
                </div>
            </fieldset>

        </form>

    </div>
  <!-- Main content ends -->
    
</div>
<!-- Content ends -->    
   
        
</body>
</html>