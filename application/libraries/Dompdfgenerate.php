<?php defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH.'third_party/dompdf/autoload.inc.php';
//require_once APPPATH.'third_party/dompdf/lib/html5lib/Parser.php';
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '1000'); 
use Dompdf\Dompdf;
use Dompdf\Options;

class Dompdfgenerate {
    public $dompdf, $options;
    public function __construct() {
        $this->dompdf = new DOMPDF();
        $this->options = new Options();
    }
    
    public function generate($html, $filename = '', $stream = TRUE, $paper = 'A4', $orientation = "portrait") {
        $this->dompdf->loadHtml($html);
        $this->options->setIsRemoteEnabled(true);
        $this->options->set('isHtml5ParserEnabled', true);
        $this->options->set('debugKeepTemp', TRUE);
        $this->options->set('dpi', 120);
        $this->options->set('isPhpEnabled', TRUE);
        $customPaper = array(0, 0, 700, 970);
        $this->dompdf->set_paper($customPaper);
        $this->dompdf->setOptions($this->options);
        $this->dompdf->render();
        $font = $this->dompdf->getFontMetrics()->get_font("helvetica", "");
        //$this->dompdf->getCanvas()->page_text(622, 940, "Page: {PAGE_NUM} of {PAGE_COUNT}", $font, 10, array(0, 0, 0));
        if ($stream) {
            $this->dompdf->stream($filename, array("Attachment" => 0));
        } else {
            $output = $this->dompdf->output();
            file_put_contents($filename, $output);
        }
    }
}