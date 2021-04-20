<?php


namespace app\commands;


use app\models\Orders;
use app\models\Product;
use app\models\Stock;
use yii\base\BaseObject;
use yii\console\Controller;
use yii\db\Exception;
use function GuzzleHttp\Psr7\str;

class FileController extends Controller
{
    public function actionGenerate()
    {
        var_dump('test');
        $new_order = new Orders();
        $new_order->number = 5;
        $new_order->recipient = 'ded pafnori';
        $new_order->sender = 'ebobo sklad';
        $new_order->order_name = '№15';
        $new_order->date = '2021-04-15';
        $save_result = $new_order->save();
        if (!$save_result) {
            var_dump('order');
            var_dump($new_order->getErrors());
        }
        $new_product = new Product();
        $new_product->product_name = 'Salo v shokolade';
        $new_product->properties = 'Girnoe';
        $new_product->weight = 47;
        $new_product->number_of_meters = 999;
        $save_result = $new_product->save();
        if (!$save_result) {
            var_dump('product');
            var_dump($new_product->getErrors());
        }
        $new_stock = new Stock();
        $new_stock->product_name = 'salo jak salo';
        $new_stock->properties = 'ochen girnoe';
        $new_stock->weight = 123;
        $new_stock->number_of_meters = 666;
        $new_stock->balance = 13;
        $new_stock->comment = 'jak pahnet';
        $new_stock->date = '2021-12-15';
        $save_result = $new_stock->save();
        if (!$save_result) {
            var_dump('stock');
            var_dump($new_stock->getErrors());
        }
    }

    public function actionLoadAssystem()
    {
        $inputFile = 'inbound/assystem/assystem.xlsx';
        $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
        $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFile);
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        array_shift($sheetData);
        foreach ($sheetData as $assystemOrder) {
            $new_order = new Orders();
            $new_order->number = $assystemOrder['A'];
            $new_order->customer = $assystemOrder['B'];
            $new_order->order_name = $assystemOrder['C'];
            $edition = $assystemOrder['D'];
            $edition = preg_replace('#[^0-9.,]#', '', $edition);
            $new_order->edition = $edition;
            $new_order->billing = $assystemOrder['E'];
            $weight = $assystemOrder['F'];
            $weight = str_replace(',', '.', $weight);
            $weight = preg_replace('#[^0-9.]#', '', $weight);
            $new_order->weight = $weight;
            $new_order->packed_material_order = $assystemOrder['G'];
            $save_result = $new_order->save();
            if (!$save_result) {
                var_dump('order');
                var_dump($new_order->getErrors());
            } else {
                var_dump('saved successfully');
            }
        }
    }

    public function actionLoadBest()
    {
        $inputFile = 'inbound/best/best.xlsx';
        $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
        $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
        $objPHPExcel = $objReader->load($inputFile);
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
        array_shift($sheetData);
        foreach ($sheetData as $stockBest) {
            $new_stock = new Stock();
            $new_stock->product_number = (string)$stockBest['A'];
            $new_stock->product_name = $stockBest['B'];

            if (!empty($stockBest['I'])) {
                $new_stock->unit_of_measure = $stockBest['I'];
            }

            if (!empty($stockBest['J'])) {
                $product_quantity = $stockBest["J"];
                $product_quantity = preg_replace('#[^0-9.]#', '', $product_quantity);
                $new_stock->product_quantity = $product_quantity;
            }

            $save_result = $new_stock->save();
            if (!$save_result) {
                var_dump($new_stock->getErrors());
            } else {
                var_dump('saved successfully');
            }
        }
    }

}
