<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\CostClient;
use App\Models\ControlFields;
use Illuminate\Database\Seeder;

class PartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parts = array(
            array('name' => 'Tanque LT-A-101-30','partNum' => '29375','costU' => '463.02','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-01-20 18:07:37','updated_at' => '2020-01-20 18:13:02','family_id' => '21','category_id' => '40'),
            array('name' => 'Cápsula de Barrido LT-A-101-30','partNum' => '423491','costU' => '136.30','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-01-20 18:14:54','updated_at' => '2020-01-20 18:17:10','family_id' => '22','category_id' => '33'),
            array('name' => 'Batería para Módulo CHECKFIRE SC-N','partNum' => '427308','costU' => '87.75','quantity' => NULL,'state' => '1','type' => 'R','created_at' => '2020-01-20 18:29:15','updated_at' => '2020-02-19 09:26:27','family_id' => '25','category_id' => '28'),
            array('name' => 'Protracting CHECKFIRE SC-N','partNum' => '436026','costU' => '117.84','quantity' => NULL,'state' => '1','type' => 'R','created_at' => '2020-01-20 18:41:42','updated_at' => '2020-03-18 15:03:45','family_id' => '25','category_id' => '38'),
            array('name' => 'Repuesto de prueba','partNum' => '062183','costU' => '150.00','quantity' => NULL,'state' => '1','type' => 'R','created_at' => '2020-01-21 13:12:25','updated_at' => NULL,'family_id' => '24','category_id' => '28'),
            array('name' => 'Módulo de Control CHECKFIRE SC-N','partNum' => '423504','costU' => '1705.00','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:03:27','updated_at' => '2020-02-18 12:22:01','family_id' => '25','category_id' => '37'),
            array('name' => 'Cápsula de Actuación LT-10-R','partNum' => '13193','costU' => '39.45','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:08:46','updated_at' => '2020-02-10 18:10:58','family_id' => '23','category_id' => '32'),
            array('name' => 'Tanque LT-A-101-125','partNum' => '427745','costU' => '3459.84','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:12:48','updated_at' => NULL,'family_id' => '21','category_id' => '40'),
            array('name' => 'Tanque LT-A-101-250','partNum' => '427746','costU' => '6165.10','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:13:24','updated_at' => '2020-02-10 18:16:54','family_id' => '21','category_id' => '40'),
            array('name' => 'Tanque LVS-10','partNum' => '439361','costU' => '1933.99','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:15:16','updated_at' => '2020-02-10 18:20:43','family_id' => '24','category_id' => '40'),
            array('name' => 'Tanque LVS-15','partNum' => '438775','costU' => '2970.27','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:20:11','updated_at' => NULL,'family_id' => '24','category_id' => '40'),
            array('name' => 'Tanque LVS-30','partNum' => '438821','costU' => '3536.21','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:21:55','updated_at' => NULL,'family_id' => '24','category_id' => '40'),
            array('name' => 'Cápsula de Barrido de 23 CUFT','partNum' => '428060','costU' => '600.84','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:23:52','updated_at' => '2020-02-10 18:25:34','family_id' => '22','category_id' => '33'),
            array('name' => 'Cápsula de Barrido de 55 CUFT','partNum' => '428061','costU' => '709.57','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:24:34','updated_at' => '2020-02-10 18:26:04','family_id' => '22','category_id' => '33'),
            array('name' => 'ICM CF-210','partNum' => '439561','costU' => '735.87','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:35:54','updated_at' => '2020-08-28 11:01:45','family_id' => '19','category_id' => '37'),
            array('name' => 'Display CF-210','partNum' => '439560','costU' => '284.74','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-02-10 18:36:48','updated_at' => NULL,'family_id' => '19','category_id' => '37'),
            array('name' => 'Protracting CF-210','partNum' => '439448','costU' => '113.80','quantity' => NULL,'state' => '1','type' => 'R','created_at' => '2020-02-10 18:38:00','updated_at' => '2020-08-27 12:12:55','family_id' => '19','category_id' => '38'),
            array('name' => 'Batería para Módulo CF-210','partNum' => '440352','costU' => '64.49','quantity' => NULL,'state' => '1','type' => 'R','created_at' => '2020-02-10 18:39:07','updated_at' => '2020-03-18 15:03:25','family_id' => '19','category_id' => '28'),
            array('name' => 'Extintor Portátil I-A-20-G ','partNum' => '435109','costU' => '438.24','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-03-17 16:47:35','updated_at' => '2020-12-09 16:38:21','family_id' => '20','category_id' => '36'),
            array('name' => 'Tanque LVS-5 ','partNum' => '435876','costU' => '1211.00','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-04-15 14:16:55','updated_at' => '2020-04-15 15:36:55','family_id' => '24','category_id' => '40'),
            array('name' => 'Cápsula de Barrido de 23 CUFT','partNum' => '428060','costU' => '686.20','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-08-27 09:53:39','updated_at' => '2020-11-30 11:42:36','family_id' => '22','category_id' => '33'),
            array('name' => 'Cápsula de Barrido de 55 CUFT','partNum' => '428061','costU' => '686.20','quantity' => NULL,'state' => '1','type' => 'P','created_at' => '2020-08-28 08:56:46','updated_at' => '2020-08-28 09:22:48','family_id' => '22','category_id' => '33')
          );
        foreach ($parts as $part) {
            Item::create($part);
        }
        $controlFiels = array(
            array('item_id' => '1','valist_id' => '14'),
            array('item_id' => '1','valist_id' => '9'),
            array('item_id' => '1','valist_id' => '10'),
            array('item_id' => '2','valist_id' => '15'),
            array('item_id' => '2','valist_id' => '16'),
            array('item_id' => '2','valist_id' => '10'),
            array('item_id' => '2','valist_id' => '9'),
            array('item_id' => '3','valist_id' => '11'),
            array('item_id' => '4','valist_id' => '12'),
            array('item_id' => '5','valist_id' => '11'),
            array('item_id' => '6','valist_id' => '11'),
            array('item_id' => '6','valist_id' => '9'),
            array('item_id' => '7','valist_id' => '15'),
            array('item_id' => '7','valist_id' => '16'),
            array('item_id' => '7','valist_id' => '9'),
            array('item_id' => '8','valist_id' => '14'),
            array('item_id' => '8','valist_id' => '9'),
            array('item_id' => '8','valist_id' => '10'),
            array('item_id' => '9','valist_id' => '14'),
            array('item_id' => '9','valist_id' => '10'),
            array('item_id' => '9','valist_id' => '9'),
            array('item_id' => '10','valist_id' => '10'),
            array('item_id' => '10','valist_id' => '9'),
            array('item_id' => '10','valist_id' => '17'),
            array('item_id' => '11','valist_id' => '17'),
            array('item_id' => '11','valist_id' => '9'),
            array('item_id' => '11','valist_id' => '10'),
            array('item_id' => '12','valist_id' => '10'),
            array('item_id' => '12','valist_id' => '17'),
            array('item_id' => '12','valist_id' => '9'),
            array('item_id' => '13','valist_id' => '10'),
            array('item_id' => '13','valist_id' => '18'),
            array('item_id' => '14','valist_id' => '18'),
            array('item_id' => '14','valist_id' => '10'),
            array('item_id' => '15','valist_id' => '9'),
            array('item_id' => '15','valist_id' => '11'),
            array('item_id' => '16','valist_id' => '9'),
            array('item_id' => '16','valist_id' => '11'),
            array('item_id' => '17','valist_id' => '11'),
            array('item_id' => '17','valist_id' => '12'),
            array('item_id' => '18','valist_id' => '11'),
            array('item_id' => '19','valist_id' => '13'),
            array('item_id' => '19','valist_id' => '9'),
            array('item_id' => '20','valist_id' => '17'),
            array('item_id' => '20','valist_id' => '9'),
            array('item_id' => '20','valist_id' => '10'),
            array('item_id' => '21','valist_id' => '9'),
            array('item_id' => '21','valist_id' => '10'),
            array('item_id' => '21','valist_id' => '18'),
            array('item_id' => '22','valist_id' => '18'),
            array('item_id' => '22','valist_id' => '9'),
            array('item_id' => '22','valist_id' => '10')
          );
         foreach ($controlFiels as $cf) {

             ControlFields::create($cf);
         }
        $clientCost = array(
            array('cost' => '463.02','item_id' => '1','client_id' => '1'),
            array('cost' => '136.30','item_id' => '2','client_id' => '1'),
            array('cost' => '87.75','item_id' => '3','client_id' => '1'),
            array('cost' => '117.84','item_id' => '4','client_id' => '1'),
            array('cost' => '1705.00','item_id' => '6','client_id' => '1'),
            array('cost' => '39.45','item_id' => '7','client_id' => '1'),
            array('cost' => '100.00','item_id' => '18','client_id' => '1'),
            array('cost' => '600.84','item_id' => '19','client_id' => '1'),
            array('cost' => '1211.00','item_id' => '20','client_id' => '1'),
            array('cost' => '686.20','item_id' => '21','client_id' => '1'),
            array('cost' => '686.20','item_id' => '22','client_id' => '1')
          );
          
        foreach ($clientCost as $cc) {

            CostClient::create($cc);
        }
    }
}
