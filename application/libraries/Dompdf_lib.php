<?php
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
class Dompdf_lib {

	var $_dompdf = NULL;

	function __construct()
	{
		if(is_null($this->_dompdf)){
			$this->_dompdf = new Dompdf(array('enable_remote' => true,'isJavascriptEnabled'=>true));
		}
	}

	function convert_html_to_pdf($html, $filename ='', $stream = TRUE)
	{
		$this->_dompdf->load_html($html);
		$this->_dompdf->render();
		if ($stream) {
			$this->_dompdf->stream($filename,array("Attachment" => false));
		} else {
			return $this->_dompdf->output();
		}
	}

	function convert_html_to_custom_pdf($html, $filename ='', $stream = TRUE,$paperSizeType = 'custom',$orientation ='',$background ='')
	{
		if($paperSizeType=='custom'){
			$paperSize = array(0,0,459,732);
		} else {
			$paperSize = $paperSizeType;
		}
		if($orientation==''){
			$this->_dompdf->set_paper($paperSize);
		} else {
			$this->_dompdf->set_paper($paperSize,$orientation);
		}
		$full_html = '<!DOCTYPE html><html><head><style>@page {';
		if($paperSizeType!='custom'){
			$full_html .=	'size: '.$paperSize.' '.$orientation.';';
		}
		$full_html .= " margin: 0px !important; }body { background:url('".$background."') left top no-repeat; background-size:cover; margin: 0px !important; padding:0px !important; }</style></head><body>";
		$full_html .= $html;
		$full_html .= '</body></html>';
		$this->_dompdf->load_html($full_html);
		$this->_dompdf->render();
		if ($stream) {
			$this->_dompdf->stream($filename,array("Attachment" => true));
		} else {
			return $this->_dompdf->output();
		}
	}

	function convert_html_to_stringpdf($html, $filename ='', $stream = TRUE)
	{
		$this->_dompdf->set_paper('A4', 'portrait');
		$this->_dompdf->load_html($html);
		$this->_dompdf->render();
		if ($stream) {
			$this->_dompdf->stream($filename,array("Attachment" => false));
		} else {
			return base64_encode($this->_dompdf->output());
		}
	}

}
?>
