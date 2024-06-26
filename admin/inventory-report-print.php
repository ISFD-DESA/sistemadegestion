<?php
	
	// get the HTML
    ob_start();
	session_start();
	if (!isset($_SESSION['user_id'])){
			header("location: index.php");//Redirecciona 
			exit;
	}
	/* Connect To Database*/
	include("config/db.php");
	include("config/conexion.php");
	require_once ("libraries/inventory.php");//Contiene funcion que controla stock en el inventario
	//Ontengo variables pasadas por GET
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$product_code = mysqli_real_escape_string($con,(strip_tags($_REQUEST['product_code'], ENT_QUOTES)));
	$manufacturer_id=intval($_REQUEST['manufacturer_id']);
	$tables="products, manufacturers";
	$campos="products.product_id, products.model, products.product_name, products.status, products.image_path, products. product_code, products.buying_price, manufacturers.name";
	$sWhere="products.manufacturer_id=manufacturers.id";
	$sWhere.=" and products.product_name LIKE '%".$query."%'";
	if (!empty($product_code)){
		$sWhere.=" and products.product_code LIKE '%".$product_code."%'";
	}
	if ($manufacturer_id>0){
		$sWhere.=" and products.manufacturer_id = '".$manufacturer_id."'";
	}
	$sWhere.=" order by products.product_name";
	
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere ");
	/*Datos de la empresa*/
		$sql_empresa=mysqli_query($con,"SELECT business_profile.name, business_profile.tax, business_profile.address,  currencies.symbol, business_profile.city, business_profile.state, business_profile.postal_code, business_profile.phone, business_profile.email, business_profile.logo_url FROM  business_profile, currencies where business_profile.currency_id=currencies.id and business_profile.id=1");
		$rw_empresa=mysqli_fetch_array($sql_empresa);
		$moneda=$rw_empresa["symbol"];
		$tax=$rw_empresa["tax"];
		$bussines_name=$rw_empresa["name"];
		$address=$rw_empresa["address"];
		$city=$rw_empresa["city"];
		$state=$rw_empresa["state"];
		$postal_code=$rw_empresa["postal_code"];
		$phone=$rw_empresa["phone"];
		$email=$rw_empresa["email"];
		$logo_url=$rw_empresa["logo_url"];
		
	/*Fin datos empresa*/

	require_once(dirname(__FILE__).'/pdf/html2pdf.class.php');
		

    
     include(dirname('__FILE__').'/pdf/documentos/html/inventory-report.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('usuarios.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
