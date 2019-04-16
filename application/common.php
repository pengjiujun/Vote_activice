<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//将二维数组转换为一维数组
function multi2array($array) {
    static $result_array = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            multi2array($value);
        }
        else{
            $result_array[] = $value;
        }
    }
    return $result_array;
}


//设置excel
function excelExport($fileName = '', $headArr = [], $data = []) {
    // vendor("PHPExcel.PHPExcel");
    $fileName .= "_" . date("Y-m-d",time()) . ".xls";

    $objPHPExcel = new \PHPExcel();

    $objPHPExcel->getProperties();
    $objPHPExcel->getDefaultStyle()->getFont()->setName(iconv('gbk', 'utf-8', '宋体'));//设置字体
    $objPHPExcel->getDefaultStyle()->getFont()->setSize(15);//字体大小
    // $objPHPExcel->getActiveSheet()->getColumnDimension()->setAutoSize(true);//表格宽度

    $objPHPExcel->setActiveSheetIndex(0);
    $activeSheet = $objPHPExcel->getActiveSheet();

    // $activeSheet->mergeCells('A1:D1');//合并单元格
    //设置表格宽度
    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(100);
//    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
//    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
//    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
//    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
//    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
//    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);


    //内容全部居中
    $objPHPExcel->getDefaultStyle()->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    $objPHPExcel->getDefaultStyle()->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
    $objPHPExcel->getDefaultStyle('H2:H1000')->getAlignment()->setWrapText(TRUE);//设置H2-H1000单元格自动换行
    $objPHPExcel->getDefaultStyle('F2:F1000')->getAlignment()->setWrapText(TRUE);

    //画出单元格边框
    $styleArray = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THICK,//边框是粗的
                // 'style' => PHPExcel_Style_Border::BORDER_THIN,//细边框
                //'color' => array('argb' => 'FFFF0000'),  //颜色
            ),
        ),
    );
    $n=count($data)+1;
    $activeSheet->getStyle('A1:B'.$n)->applyFromArray($styleArray);//这里就是画出从单元格A5到N5的边框，看单元格最右边在哪哪个格就把这个N改为那个字母替代

    $key = ord("A"); // 设置表头

    foreach ($headArr as $v) {

        $colum = chr($key);

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);

        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($colum . '1', $v);

        $key += 1;

    }

    $column = 2;

    $objActSheet = $objPHPExcel->getActiveSheet();

    foreach ($data as $key => $rows) { // 行写入

        $span = ord("A");

        foreach ($rows as $keyName => $value) { // 列写入

            $objActSheet->setCellValue(chr($span) . $column, $value);

            $span++;

        }

        $column++;

    }

    $fileName = iconv("utf-8", "gb2312", $fileName); // 重命名表

    $objPHPExcel->setActiveSheetIndex(0); // 设置活动单指数到第一个表,所以Excel打开这是第一个表

    header('Content-Type: application/vnd.ms-excel');

    header("Content-Disposition: attachment;filename=$fileName");

    header('Cache-Control: max-age=0');

    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

    $objWriter->save('php://output'); // 文件通过浏览器下载

    exit();

}

