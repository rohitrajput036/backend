<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '1000'); 
require_once APPPATH."third_party/spout-3.1.0/src/Spout/Autoloader/autoload.php"; 
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

use Box\Spout\Writer\Common\Creator\Style\StyleBuilder;
use Box\Spout\Common\Entity\Style\CellAlignment;
use Box\Spout\Common\Entity\Style\Color;

use Box\Spout\Common\Entity\Style\Border;
use Box\Spout\Writer\Common\Creator\Style\BorderBuilder;

class Myexcel { 
    public $reader, $writer;
    function __construct() {
        $this->reader = ReaderEntityFactory::createXLSXReader();
        // $reader = ReaderEntityFactory::createODSReader();
        // $reader = ReaderEntityFactory::createCSVReader();
        $this->writer = WriterEntityFactory::createXLSXWriter();
        // $writer = WriterEntityFactory::createODSWriter();
        // $writer = WriterEntityFactory::createCSVWriter();
    }

    function readExcel() {
        
    } 

    function writeExcel($filePath=UPLOAD_PATH, $Header=[], $Datas=[]) {
        $heder_border = (new BorderBuilder())
            ->setBorderBottom(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
            ->setBorderLeft(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
            ->setBorderRight(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
            ->setBorderTop(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
            ->build();
        $header_style = (new StyleBuilder())
           ->setFontBold()
           ->setFontSize(12)
           ->setFontColor(Color::WHITE)
           ->setShouldWrapText(false)
           ->setCellAlignment(CellAlignment::CENTER)
           ->setBackgroundColor(Color::GREY)
           ->setBorder($heder_border)
           ->build();

        $cell_border = (new BorderBuilder())
           ->setBorderBottom(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
           ->setBorderLeft(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
           ->setBorderRight(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
           ->setBorderTop(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
           ->build();
        $cell_style = (new StyleBuilder())
          ->setFontSize(12)
          ->setFontColor(Color::BLACK)
          ->setShouldWrapText(false)
          ->setCellAlignment(CellAlignment::LEFT)
          ->setBorder($cell_border)
          ->build();
        $multipleRows[] =  WriterEntityFactory::createRowFromArray($Header,$header_style);
        foreach($Datas as $Data) {
            $multipleRows[] =  WriterEntityFactory::createRowFromArray($Data,$cell_style);
        }
        $this->writer->openToFile($filePath);
        $this->writer->addRows($multipleRows);
        $this->writer->close();
        
    }
    // Header Multideminosal Array, which contains the Header for each Sheet.
    function writeMultipleSheet($filePath=UPLOAD_PATH, $Header=[], $Datas=[], $SheetNames=[]) {
        $heder_border = (new BorderBuilder())
            ->setBorderBottom(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
            ->setBorderLeft(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
            ->setBorderRight(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
            ->setBorderTop(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
            ->build();
        $header_style = (new StyleBuilder())
           ->setFontBold()
           ->setFontSize(12)
           ->setFontColor(Color::WHITE)
           ->setShouldWrapText(false)
           ->setCellAlignment(CellAlignment::CENTER)
           ->setBackgroundColor(Color::GREY)
           ->setBorder($heder_border)
           ->build();

        $cell_border = (new BorderBuilder())
           ->setBorderBottom(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
           ->setBorderLeft(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
           ->setBorderRight(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
           ->setBorderTop(Color::BLACK, Border::WIDTH_THIN,Border::STYLE_SOLID)
           ->build();
        $cell_style = (new StyleBuilder())
          ->setFontSize(12)
          ->setFontColor(Color::BLACK)
          ->setShouldWrapText(false)
          ->setCellAlignment(CellAlignment::LEFT)
          ->setBorder($cell_border)
          ->build();
        $this->writer->openToFile($filePath);
        $i=0;
        foreach($SheetNames as $SheetName) {
            if($i==0) {
                $firstSheet = $this->writer->getCurrentSheet();
            } else {
                $firstSheet = $this->writer->addNewSheetAndMakeItCurrent();
            }
            $firstSheet->setName($SheetName);
            $multipleRows = [];
            $multipleRows[] =  WriterEntityFactory::createRowFromArray($Header[$SheetName],$header_style);
            foreach($Datas[$SheetName] as $Data) {
                $multipleRows[] =  WriterEntityFactory::createRowFromArray($Data,$cell_style);
            }
            $this->writer->addRows($multipleRows);
            $i++;
            
        }
        $this->writer->close();
        
    } 
}