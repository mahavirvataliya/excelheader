<?php 
namespace mahavirvataliya\ExcelHeader;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
class ExcelHeader
{
    public static function world()
    {
        return 'Hello World, Composer!';
    }
    public static function getExcelHeader($filepath,$rowno=1)
    {
        $rows = [];
        try{
            $spreadsheet = IOFactory::load($filepath);
//        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
//        $spreadsheet = $reader->load($filepath);
            $worksheet = $spreadsheet->getActiveSheet();
            foreach ($worksheet->getRowIterator($rowno,$rowno) AS $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                $cells = [];
                foreach ($cellIterator as $cell) {
                    $cells[] = $cell->getValue();
                }
                $rows[] = $cells;
            }
        }
        catch (Exception $exception)
        {
            die($exception);
        }
        return json_encode($rows);
    }
    public static function getAllSheetExcelHeader($filepath,$rowno=1)
    {
        $rows = [];
        try{
            $spreadsheet = IOFactory::load($filepath);
            //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            //$spreadsheet = $reader->load($filepath);
           // $worksheet = $spreadsheet->getActiveSheet();
            $sheetnames = $spreadsheet->getSheetNames();
            foreach($sheetnames AS $sheetname)
            {
                $worksheet = $spreadsheet->getSheetByName($sheetname);
                foreach ($worksheet->getRowIterator($rowno,$rowno) AS $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                    $cells = [];
                    foreach ($cellIterator as $cell) {
                        $cells[] = $cell->getValue();
                    }
                    $rows[] = $cells;
                }
            }
            return json_encode($rows);
            } catch (Exception $exception)
        {
            die($exception);
        }
        return json_encode($rows);


    }
}