# excelheader
For getting ExcelHeader# mahavirvataliya/excelheader
Welcome to the excelheader wiki!
If U want to Use This Package in your Project Then Use

`composer require mahavirvataliya/excelheader`


***

There are Two methods

`getExcelHeader($filepath,$rowno=1)`

> It will return json object of header of first sheet given as file path and if you give row no of header then it will return that row

`getAllSheetExcelHeader($filepath,$rowno=1)`

> get all headers means get header from all sheet given by row number as same to all mean return that row as json object


I Have Used https://github.com/PHPOffice/phpspreadsheet as read excel files please go for it if you want to develop


Add at Import Section

`use mahavirvataliya\ExcelHeader\ExcelHeader;`

use it where you want to

For Example
For Uploading Excel file And getting headers or any row we use like this where xls is name parameter in file upload
`public function upload(Request $request)
    {
        $request->xls;

        if($request->hasFile('xls')) {

            $file = $request->file('xls') ;

            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path() ;
            $file->move($destinationPath,$fileName);

            $rownno = $request->rowno==null?1:$request->rowno;
            $rows =  ExcelHeader::getExcelHeader(public_path().'/'.$fileName,$rownno);
            return view('excelfile',compact('rows'));
        }
        else
        {
            $rows=[];
            return view('excelfile',compact('rows'));
        }
    }`
