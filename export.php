<?php
// reference the Dompdf namespace
   
   require_once '../../../wp-includes/dompdf/vendor/autoload.php'; 
   global $wp, $post;
	$sf_date = $_POST['sf_date'];
	$sf_name = $_POST['sf_name'];
	$sf_datebirth = $_POST['sf_datebirth'];
	$sf_passport = $_POST['sf_passport'];
	
	use Dompdf\Dompdf;
	// instantiate and use the dompdf class
	$dompdf = new Dompdf();
    ini_set('allow_url_fopen', 1);
	// Fetch the content of the URL
	$file_content = file_get_contents("http://localhost/wordpress_1/wp-content/themes/ahello-elementor/email_template.php?date=" . $sf_date . "&name=" . $sf_name . "&dob=" . $sf_datebirth . "&passport=" . $sf_passport);
	$file_name='Your guide to Stay Lean with Paleo';

	if ($file_content === false) {
		echo 'Error fetching content: ' . error_get_last()['message'];
		exit(1);
	}
	
	$dompdf->loadHtml($file_content);
	
	$options = $dompdf->getOptions();
	$options->set('defaultFont','Comfortaa-Bold');
	$options->set('isHtml5ParserEnabled',true);
	$options->set('isRemoteEnabled', true);
    set_time_limit(300);
    ini_set('memory_limit', '-1');

	$dompdf->setOptions($options);
	$customPaper = array(0,0,1000,1800);
$dompdf->set_paper($customPaper);
	// (Optional) Setup the paper size and orientation
	//$dompdf->setPaper('A4', 'landscape');

	// Render the HTML as PDF
	$dompdf->render();
    $name='myfile_'.date('m-d-Y_hia').'.txt';
	$randomFileName =$file_name.".pdf";
	// Output the generated PDF to Browser
 	//$dompdf->stream($randomFileName);
	$output = $dompdf->output();
	file_put_contents("../../uploads/pdfExport/".$randomFileName, $output);
	echo $randomFileName;
   
	exit(0);
?>