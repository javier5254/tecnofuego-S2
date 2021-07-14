<?php

namespace Database\Seeders;

use App\Models\ActivList;
use Illuminate\Database\Seeder;

class ActivListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            //inspecciones

            [
                "name" => "Remueva cápsula AMA",
                "description" => "Remueva la cápsula LT-10-R del Actuador Manual/Automático de la cabina, colóquele su tapa de seguridad y ubíquela en un lugar seguro.",
                "type_id" => "1",
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos)",
                "type_id" => "1",
            ],
            [
                "name" => "Verifique Módulo SC-N",
                "description" => "tiene hijo",
                "type_id" => "1",
                "father" => "1",
            ],
            [
                "name" => "Verifique la batería",
                "description" => "Verifique la fecha de instalación de la batería. Reemplace si es mayor a un (1) año o no está marcada.",
                "type_id" => "1",
                "funct" => "1",
            ],
            [
                "name" => "Prueba DELAY al CF SC-N",
                "description" => "Genere una falla al Módulo CHECKFIRE SC-N y presione por cinco (5) segundos el botón DELAY. Verique que no se enciende ningún led de falla adcional a la falla generada en el Módulo. En caso de encenderse un led de falla adicional, se debe corregir la falla y luego volver a repetir. ",
                "type_id" => "1",
            ],
            [
                "name" => "Verifique Fin de Línea",
                "description" => "Verifique que el Fin de Línea se encuentre en buen estado, que no presente deformación o deterioro físico. Con un multímetro verifique la resistencia de la misma (4,7 K ohmios).",
                "type_id" => "1",
            ],
            [
                "name" => "Verifique Alarmas audiovisuales",
                "description" => "Revise que las alarmas audiovisuales se encuentren en buen estado, que no presente golpes, grietas y/o deformaciónes.",
                "type_id" => "1",
            ],
            [
                "name" => "Revise AMA",
                "description" => "Revise que el AMA, la manguera y acoples se encuentre en buen estado, el pasador de seguridad y sello visual instalado, y las conexiones apretadas.",
                "type_id" => "1",
            ],
            [
                "name" => "Verifique conexión PAD",
                "description" => "Retire la guarda protectora del PAD y verifique que la conexión se encuentra ajustada. ",
                "type_id" => "1",
            ],
            [
                "name" => "Revise Cable Térmico",
                "description" => "tiene hijo",
                "type_id" => "1",
                "father" => "1"
            ],
            [
                "name" => "Sistema Triple IR ",
                "description" => "Inspeccione el sistema Triple IR. Verifique que todos los detectores se establezcan en modo NORMAL de operación (LED alumbrando color verde). Nota: No utilice agua a alta presión.",
                "type_id" => "1",
            ],
            [
                "name" => "Inspección de Tanques",
                "description" => "tiene hijo",
                "type_id" => "1",
                "father" => "1"
            ],
            [
                "name" => "Mangueras presurización 1/4",
                "description" => "Revise que las mangueras de presurización de 1/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => "1"
            ],
            [
                "name" => "Mangueras actuación 1/4",
                "description" => "Revise que las mangueras de actuación de 1/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => "1"
            ],
            [
                "name" => "Mangueras descarga 1/2",
                "description" => "Revise que las mangueras de descarga de 1/2 y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => "1"
            ],
            [
                "name" => "Mangueras distribución 3/4",
                "description" => "Revise que las mangueras de distribución de 3/4 y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => "1"
            ],
            [
                "name" => "Verifique boquillas",
                "description" => "Verifique que las boquillas no estén tapadas, estén correctamente orientadas.",
                "type_id" => "1"
            ],
            [
                "name" => "Instale tapaboquillas ",
                "description" => "Instale todas las tapaboquillas. Cambie las que se encuentren deterioradas. Boquillas QS: tapaboquillas rojas. Boquillas LVS: tapaboquillas azules.",
                "type_id" => "1"
            ],
            [
                "name" => "Inspeccione AEN´s",
                "description" => "Revise que los actuadores neumáticos se encuentren en buen estado, que no presenten golpes, corrosión y/o deformación. Estos deben encontrarse bien ajustados.",
                "type_id" => "1"
            ],
            [
                "name" => "Insp. AEN´s del Booster",
                "description" => "Revise que los actuadores neumáticos se encuentren en buen estado, que no presenten golpes, corrosión y/o deformación. Estos deben encontrarse bien ajustados.",
                "type_id" => "1"
            ],
            [
                "name" => "Inspeccione AMR",
                "description" => "Revise que los AMR, se encuentren en buen estado, el pasador de seguridad y sello visual instalados, y las conexiones apretadas.",
                "type_id" => "1"
            ],
            [
                "name" => "Verifique Shutdown",
                "description" => "Verifique que el Interruptor de presión (Shutdown), las mangueras y sus acoples se encuentren en buen estado, y las conexiones apretadas.",
                "type_id" => "1"
            ],
            [
                "name" => "Revise válvula de alivio",
                "description" => "Revise que la válvula de alivio se encuentra en buen estado.",
                "type_id" => "1"
            ],
            [
                "name" => "Verifique los cheques",
                "description" => "Verifique el flujo correcto de los cheques. Debe ir en dirección de la actuación.  La flecha debe ser visible. En caso contrario reemplácelo por una nuevo",
                "type_id" => "1"
            ],
            [
                "name" => "Insp. Cápsulas de Barrido",
                "description" => "tiene hijo",
                "type_id" => "1",
                "father" => "1"
            ],
            [
                "name" => "Insp. Cápsula del Booster",
                "description" => "tiene hijo",
                "type_id" => "1",
                "father" => "1"
            ],
            [
                "name" => "Verifique AMR´s",
                "description" => "Verifique que los pasadores de seguridad y sellos visuales de inspección estén correctamente instalados.",
                "type_id" => "1",
                "funct" => "1"
            ],
            [
                "name" => "Verifique AMA",
                "description" => "tiene hijo",
                "type_id" => "1",
                "father" => "1"
            ],
            [
                "name" => "Instale cápsula AMA",
                "description" => "Instale la cápsula LT-10-R en el AMA. ",
                "type_id" => "1",
                "funct" => "1"
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos).",
                "type_id" => "1"
            ],
            [
                "name" => "Inspección del Extintor",
                "description" => "tiene hijo",
                "type_id" => "1",
                "father" => "1"
            ],
            //mantenimientos
            [
                "name" => "Remueva cápsula AMA",
                "description" => "Remueva la cápsula LT-10-R del Actuador Manual/Automático de la cabina, colóquele su tapa de seguridad y ubíquela en un lugar seguro.",
                "type_id" => 2
            ],
            [
                "name" => "Retire cápsulas de barrido",
                "description" => "Retire las cápsulas de barrido LT-A-101-30, 23 CU.FT. y 55 CU.FT. y colóquele su tapa de seguridad y ubíquelas en un lugar seguro.",
                "type_id" => 2
            ],
            [
                "name" => "Remueva cápsula del Booster ",
                "description" => "Remueva la cápsula de nitrógeno LT-A-101-30 del Booster y colóquele su tapa de seguridad y ubíquela en un lugar seguro.",
                "type_id" => 2
            ],
            [
                "name" => "RESET del SC-N ",
                "description" => "Remueva la cápsula de nitrógeno LT-A-101-30 del Booster y colóquele su tapa de seguridad y ubíquela en un lugar seguro.",
                "type_id" => 2
            ],
            [
                "name" => "Verifique Módulo SC-N",
                "description" => "Tiene hijo.",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Verifique estado SC-N",
                "description" => "Verifique que el Módulo CHECKFIRE SC-N se encuentra en buen estado, que no presente golpes, grietas y/o deformaciónes. Anote el serial.",
                "type_id" => 2,
                "father_id" => 36,
                "funct" => 1
            ],
            [
                "name" => "Verifique conexiones internas SC-N",
                "description" => "Retire la tapa frontal del módulo CHECKFIRE SC-N y verifique que las conexiones internas se encuentran bien ajustadas.",
                "type_id" => 2,
                "father_id" => 36
            ],
            [
                "name" => "Verifique la batería",
                "description" => "Verifique la fecha de instalación de la batería. Reemplace si es mayor a un (1) año o no está marcada.",
                "type_id" => 2,
                "funct" => 1
            ],
            [
                "name" => "Prueba DELAY al CF SC-N",
                "description" => "Instale nuevamente la tapa frontal del Módulo CHECKFIRE SC-N. Genere una falla al Módulo CHECKFIRE SC-N y presione por cinco (5) segundos el botón DELAY. Verique que no se enciende ningún led de falla adcional a la falla generada en el Módulo. En caso de encenderse un led de falla adicional, se debe corregir la falla y luego volver a repetir. ",
                "type_id" => 2
            ],
            [
                "name" => "Verifique Fin de Línea",
                "description" => "Verifique que el Fin de Línea se encuentre en buen estado, que no presente deformación o deterioro físico. Con un multímetro verifique la resistencia de la misma (4,7 K ohmios). ",
                "type_id" => 2
            ],
            [
                "name" => "Verifique Alarmas audiovisuales",
                "description" => "Revise que las alarmas audiovisuales se encuentren en buen estado, que no presente golpes, grietas y/o deformaciónes. ",
                "type_id" => 2
            ],
            [
                "name" => "Mantenimiento al AMA",
                "description" => "tiene hijo ",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Revise Cable Térmico",
                "description" => "tiene hijo. ",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Mtto sistema Triple IR ",
                "description" => "tiene hijo. ",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Prueba funcionamiento SC-N",
                "description" => "tiene hijo. ",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Mantenimiento de Tanques",
                "description" => "tiene hijo. ",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Mangueras presurización 1/4",
                "description" => "Revise que las mangueras de presurización de 1/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión. ",
                "type_id" => 2
            ],
            [
                "name" => "Pruebe mangueras pres. 1/4",
                "description" => "Pruebe las mangueras de presurización de 1/4” mediante soplado o instalándolas en la línea de actuación principal. ",
                "type_id" => 2
            ],
            [
                "name" => "Mangueras actuación 1/4",
                "description" => "Revise que las mangueras de actuación de 1/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión. ",
                "type_id" => 2
            ],
            [
                "name" => "Mangueras distribución 3/4",
                "description" => "Revise que las mangueras de distribución de 3/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión. ",
                "type_id" => 2
            ],
            [
                "name" => "Mangueras descarga 1/2",
                "description" => "Revise que las mangueras de descarga de 1/2 y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión. ",
                "type_id" => 2
            ],
            [
                "name" => "Realice barrido",
                "description" => "Realice barrido con nitrógeno o aire seco. Verifique que las boquillas no estén tapadas, estén correctamente orientadas y que no existan fugas en la red. ",
                "type_id" => 2
            ],
            [
                "name" => "Instale tapaboquillas",
                "description" => "Instale todas las tapaboquillas. Cambie las que se encuentren deterioradas.
                Boquillas QS: tapaboquillas rojas. Boquillas LVS: tapaboquillas azules.",
                "type_id" => 2
            ],
            [
                "name" => "Mantenimiento AEN´s",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Mtto AEN´s del Booster",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Mantenimiento a los AMR",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Verifique Shutdown",
                "description" => "Verifique que el Interruptor de presión (Shutdown), las mangueras y sus acoples se encuentren en buen estado, y las conexiones apretadas.",
                "type_id" => 2
            ],
            [
                "name" => "Revisar válvula de alivio",
                "description" => "Revise que la válvula de alivio se encuentra en buen estado.",
                "type_id" => 2
            ],
            [
                "name" => "Verifique los cheques",
                "description" => "Verifique el flujo correcto de los cheques. Debe ir en dirección de la actuación.  La flecha debe ser visible. En caso contrario reemplácelo por una nuevo",
                "type_id" => 2
            ],
            [
                "name" => "Prueba de Actuación AMA",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Prueba de Actuación AMR",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Mtto Cápsulas de Barrido",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Mtto Cápsula del Booster",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Mtto Cápsulas de Actuación",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Verifique percutor Booster",
                "description" => "Verifique que el percutor del Actuador Eléctrico-Neumático del Booster se encuentre completamente hacia adentro.",
                "type_id" => 2
            ],
            [
                "name" => "Instale cápsula en Booster",
                "description" => "Instale la cápsula LT-A-101-30 en el Actuador Eléctrico-Neumático del Booster.",
                "type_id" => 2
            ],
            [
                "name" => "Verifique percutores AEN´s",
                "description" => "Verifique que los percutores de todos los Actuador Eléctrico-Neumático se encuentren completamente hacia adentro. ",
                "type_id" => 2
            ],
            [
                "name" => "Instale cápsulas de barrido",
                "description" => "Instale las cápsulas de barrido LT-A-101-30, 23 CU.FT. y 55 CU.FT. en los Actuador Eléctrico-Neumático.",
                "type_id" => 2
            ],
            [
                "name" => "Verifique AMR´s",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Instale cápsulas AMR´s",
                "description" => "Instale las cápsulas LT-10-R en los AMR´s. ",
                "type_id" => 2,
                "funct" => 1
            ],
            [
                "name" => "Verifique AMA",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],
            [
                "name" => "Instale cápsula AMA",
                "description" => "Instale la cápsula LT-10-R en el AMA. ",
                "type_id" => 2,
                "funct" => 1
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos).",
                "type_id" => 2
            ],
            [
                "name" => "Inspección del Extintor",
                "description" => "tiene hijo",
                "type_id" => 2,
                "father" => 1
            ],



            //recargas

            [
                "name" => "Verifique Módulo SC-N",
                "description" => "Verifique el estado y las alarmas que presenta el Módulo CHECKFIRE SC-N. Anote en las observaciones.",
                "type_id" => 3
            ],
            [
                "name" => "Alivie la presión",
                "description" => "Alivie la presión existente en la línea de actuación jalando la válvula de alivio y la válvula de alivio del Booster.",
                "type_id" => 3
            ],
            [
                "name" => "Restablezca Shutdown",
                "description" => "Restablezca el Interruptor de presión (Shutdown).",
                "type_id" => 3
            ],
            [
                "name" => "Remueva cápsula AMA",
                "description" => "Remueva la cápsula LT-10-R del Actuador Manual/Automático de la cabina, colóquele su tapa de seguridad y ubíquela en un lugar seguro.",
                "type_id" => 3
            ],
            [
                "name" => "Remueva cápsulas AMR",
                "description" => "En caso de actuación manual desde alguno de los Actuadores Manuales Remotos, remueva las cápsulas LT-10-R descargada del Actuadores Manuales Remotos, colóquele su tapa de seguridad y ubíquela en un lugar seguro.",
                "type_id" => 3
            ],
            [
                "name" => "Retire cápsulas de barrido",
                "description" => "Retire las cápsulas de barrido LT-A-101-30, 23 CU.FT. y 55 CU.FT. descargadas y colóquele su tapa de seguridad y ubíquelas en un lugar seguro.",
                "type_id" => 3
            ],
            [
                "name" => "Remueva cápsula del Booster ",
                "description" => "Remueva la cápsula de nitrógeno LT-A-101-30 del Booster y colóquele su tapa de seguridad y ubíquela en un lugar seguro.",
                "type_id" => 3
            ],
            [
                "name" => "Mantenimiento AEN´s",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Mtto AEN´s del Booster",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Recarga Tanques",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Cambio de tanques",
                "description" => "Cambie los tanques descargados e instale tanques nuevos/recargados.",
                "type_id" => 3
            ],
            [
                "name" => "Mantenimiento Tanques",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Mangueras presurización 1/4",
                "description" => "Revise que las mangueras de presurización de 1/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => 3
            ],
            [
                "name" => "Pruebe mangueras pres. 1/4",
                "description" => "Pruebe las mangueras de presurización de 1/4” mediante soplado o instalándolas en la línea de actuación principal.",
                "type_id" => 3
            ],
            [
                "name" => "Mangueras actuación 1/4",
                "description" => "Revise que las mangueras de actuación de 1/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => 3
            ],
            [
                "name" => "Mangueras distribución 3/4",
                "description" => "Revise que las mangueras de distribución de 3/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => 3
            ],
            [
                "name" => "Mangueras descarga 1/2",
                "description" => "Revise que las mangueras de descarga de 1/2 y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => 3
            ],
            [
                "name" => "Realice barrido",
                "description" => "Realice barrido con nitrógeno o aire seco. Verifique que las boquillas no estén tapadas, estén correctamente orientadas y que no existan fugas en la red.",
                "type_id" => 3
            ],
            [
                "name" => "Limpie boquillas",
                "description" => "Retire las boquillas y revise que se encuentren en buen estado. Límpielas e instálelas nuevamente. Verifique que están correctamente orientadas.",
                "type_id" => 3
            ],
            [
                "name" => "Instale tapaboquillas ",
                "description" => "Instale todas las tapaboquillas. Cambie las que se encuentren deterioradas.Boquillas QS: tapaboquillas rojas. Boquillas LVS: tapaboquillas azules.",
                "type_id" => 3
            ],
            [
                "name" => "Mantenimiento al AMA",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Revise la Batería",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Revise Cable Térmico",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Verifique Fin de Línea",
                "description" => "Verifique que el Fin de Línea se encuentre en buen estado, que no presente deformación o deterioro físico. Con un multímetro verifique la resistencia de la misma (4,7 K ohmios).",
                "type_id" => 3
            ],
            [
                "name" => "Verifique Alarmas audiovisuales",
                "description" => "Revise que las alarmas audiovisuales se encuentren en buen estado, que no presente golpes, grietas y/o deformaciónes.",
                "type_id" => 3
            ],
            [
                "name" => "Prueba DELAY al CF SC-N",
                "description" => "Instale nuevamente la tapa frontal del Módulo CHECKFIRE SC-N. Genere una falla al Módulo CHECKFIRE SC-N y presione por cinco (5) segundos el botón DELAY. Verique que no se enciende ningún led de falla adcional a la falla generada en el Módulo. En caso de encenderse un led de falla adicional, se debe corregir la falla y luego volver a repetir. ",
                "type_id" => 3
            ],
            [
                "name" => "Mtto sistema Triple IR ",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Verifique Módulo SC-N",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Prueba funcionamiento SC-N ",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Mantenimiento a los AMR",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Revisar válvula de alivio",
                "description" => "Revise que la válvula de alivio se encuentra en buen estado.",
                "type_id" => 3
            ],
            [
                "name" => "Verifique los cheques",
                "description" => "Verifique el flujo correcto de los cheques. Debe ir en dirección de la actuación.  La flecha debe ser visible. En caso contrario reemplácelo por una nuevo",
                "type_id" => 3
            ],
            [
                "name" => "Prueba de Actuación AMA",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1,
            ],
            [
                "name" => "Prueba de Actuación AMR",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1,
            ],
            [
                "name" => "Cambie Cápsulas de Barrido",
                "description" => "Cambie las cápsulas descargadas por cápsulas nuevas/recargadas.",
                "type_id" => 3,
            ],
            [
                "name" => "Mtto Cápsulas de Barrido",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1,
            ],
            [
                "name" => "Mtto Cápsula del Booster",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1,
            ],
            [
                "name" => "Mtto Cápsulas de Actuación",
                "description" => "tiene hijo",
                "type_id" => 3
            ],
            [
                "name" => "Verifique percutor Booster",
                "description" => "Verifique que el percutor del Actuador Eléctrico-Neumático del Booster se encuentre completamente hacia adentro.",
                "type_id" => 3
            ],
            [
                "name" => "Instale cápsula en Booster",
                "description" => "Instale la cápsula LT-A-101-30 en el Actuador Eléctrico-Neumático del Booster.",
                "type_id" => 3
            ],
            [
                "name" => "Verifique percutores AEN´s",
                "description" => "Verifique que los percutores de todos los Actuador Eléctrico-Neumático se encuentren completamente hacia adentro. ",
                "type_id" => 3
            ],
            [
                "name" => "Instale cápsulas de barrido",
                "description" => "Instale las cápsulas de barrido LT-A-101-30, 23 CU.FT. y 55 CU.FT. en los Actuador Eléctrico-Neumático.",
                "type_id" => 3
            ],
            [
                "name" => "Verifique AMR´s",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Instale cápsulas AMR´s",
                "description" => "Instale las cápsulas LT-10-R en los AMR´s. ",
                "type_id" => 3,
                "funct" => 1
                
                
            ],
            [
                "name" => "Verifique AMA",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Instale cápsula AMA",
                "description" => "No tiene descripcion",
                "type_id" => 3,
                "funct" => 1
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos)",
                "type_id" => 3
            ],
            [
                "name" => "Inspección del Extintor",
                "description" => "tiene hijo",
                "type_id" => 3,
                "father" => 1
            ],
            [
                "name" => "Retire manguera y pasador",
                "description" => "Desconecte la manguera de actuación de 1/4” del Actuador Manual/Automático. Retire el pasador de seguridad.",
                "type_id" => 2,
                "father_id" => 43,
            ],
            [
                "name" => "Verifique el PAD",
                "description" => "Retire la guarda protectora del PAD y desconéctelo. Desenrosque la parte superior del actuador retire cuidosamente el PAD. Verifique la fecha de fabricación del PAD, reemplace si es mayor a 5 años.",
                "type_id" => 2,
                "father_id" => 43,
                "funct" => 1
            ],
            [
                "name" => "Desarme el AMA",
                "description" => "Remueva el Actuador Manual/Automático de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador.",
                "type_id" => 2,
                "father_id" => 43,
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire los o-rings de la rosca superior del actuador, del vástago, y de la parte inferior del Actuador Manual/Automático. Verifique que se encuentran en buen estado, en caso contrario cámbielo por uno nuevo. Limpie y lubrique los o-rings con grasa siliconada. Instalelos nuevamente.",
                "type_id" => 2,
                "father_id" => 43,
            ],
            [
                "name" => "Verique roscas",
                "description" => "Limpie la parte interna del cuerpo del Actuador Manual/Automático. Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 2,
                "father_id" => 43,
            ],
            [
                "name" => "Arme el AMA",
                "description" => "Instale el cuerpo del Actuador Manual/Automático en el soporte y apriételo usando la contra tuerca de la parte inferior. Inserte el pasador.Conecte el PAD al cable conector del PAD proveniente del Módulo CHECKFIRE SC-N. Instale el sello visual de inspección o precinto de seguridad. Conecte la manguera de actuación de 1/4”.",
                "type_id" => 2,
                "father_id" => 43,
            ],
            [
                "name" => "Revise estado de Cable Térmico",
                "description" => "Revise que el cable térmico se encuentra en buen estado, que no presente desgaste, cortes y/o deformaciones. ",
                "type_id" => 2,
                "father_id" => 44,
                "funct" => 1
            ],
            [
                "name" => "Verifique sujeción Cable Térmico",
                "description" => "Verifique que le Cable Térmico se encuentra debidamente sujetado. Verifique que el cable térmico no presente pérdida o deterioro de la cubierta protectora de color rojo. Verifique que el espaciamiento de los puntos de sujeción sea el adecuado (como máximo cada 30 a 45 cms) y que cuenten con su protector de caucho Rubber y/o abrazaderas con recubrimiento de caucho. ",
                "type_id" => 2,
                "father_id" => 44,
            ],
            [
                "name" => "Distancia de separación Cable Térmico",
                "description" => "Revise que la distancia de separación entre el cable térmico y cualquier superficie súper caliente (exhostos, turbos, otros) sea como mínimo 30 cm.",
                "type_id" => 2,
                "father_id" => 44,
            ],
            [
                "name" => "Revise Interfaz Triple IR",
                "description" => "Verifique que la Interfaz Triple IR se encuentra en buen estado, que no presente golpes, grietas y/o deformaciónes. Retire la tapa frontal de la Interfaz Triple IR y verifique que las conexiones internas se encuentran bien ajustadas.",
                "type_id" => 2,
                "father_id" => 45,
            ],
            [
                "name" => "Desconecte y limpie conexiones Triple IR",
                "description" => "Desconecte todas las conexiones del sistema Triple IR y verifique que no presenten suciedad, humedad y/o corrosión al interior de las conexiones. En caso de presentar suciedad, limpie con limpiador de contactos eléctrico y aplique nuevamente grasa dieléctrica a las conexiones. Si algún componente presenta corrosión, cámbielo por uno nuevo.  ",
                "type_id" => 2,
                "father_id" => 45,
            ],
            [
                "name" => "Limpie detectores Triple IR",
                "description" => "Limpie el lente de visión de los Detectores Tripe IR con un trapo húmedo. Nota: No utilice agua a alta presión.",
                "type_id" => 2,
                "father_id" => 45,
            ],
            
            [
                "name" => "Conecte y verifique Triple IR",
                "description" => "Conecte nuevamente todas las conexiones del sistema Triple IR. Una vez conectados, cada detector realizará automáticamente una prueba BIT interna (30 segundos en LED amarillo). Espere a que todos los detectores se establezcan en modo NORMAL de operación (LED alumbrando color verde). Si algún detector permanece con el LED en amarillo notifique a su Supervisor para evaluar el motivo de la alarma. Realice inmediatamente el correctivo requerido.  ",
                "type_id" => 2,
                "father_id" => 45,
            ],
            [
                "name" => "Realice prueba de funcionamiento al SC-N",
                "description" => "1. Desconecte el PAD. 2. Conecte el Módulo de prueba (P/N ) al cable conector del PAD. 3. Encienda el Módulo de prueba.  4. Posicione el interruptor en la posición “SQUIB”. 5. Resetee el Módulo de prueba y el SC-N. 6. Mediante un destornillador o un alambre de acero genere un puente entre los alambres del Cable Térmico.",
                "type_id" => 2,
                "father_id" => 46,
            ],
            [
                "name" => "Verificar primer tiempo de retardo",
                "description" => "Verifique durante la prueba el primer tiempo de retardo, este debe ser díez (10) segundos. Anote el tiempo.",
                "type_id" => 2,
                "father_id" => 46,
                "funct" => 1,
            ],
            [
                "name" => "Verificar segundo tiempo de retardo",
                "description" => "Verifique durante la prueba el segundo tiempo de retardo, este debe ser díez (10)  segundos. Anote el tiempo.",
                "type_id" => 2,
                "father_id" => 46,
                "funct" => 1,
            ],
            [
                "name" => "Conecte el PAD",
                "description" => "Desconecte el Módulo de Prueba y vuelva a conectar el PAD.",
                "type_id" => 2,
                "father_id" => 46,
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos).",
                "type_id" => 2,
                "father_id" => 46,
            ],
            [
                "name" => "Revise estado de tanques",
                "description" => "Revise que los cilindros de QS/LVS y sus soportes se encuentren en buen estado, que no presente golpes, corrosión y/o deformación.",
                "type_id" => 2,
                "father_id" => 47,
            ],
            [
                "name" => "Verifique PH de Tanques de QS/LVS",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de los tanques de QS/LVS, esta no debe ser superior a 12 años.",
                "type_id" => 2,
                "father_id" => 47,
                "funct" => 1,
            ],
            [
                "name" => "Revise indicador de descarga",
                "description" => "Revise que el indicador de descarga ubicado en la tapa de los tanques LT-A-101-125/250 y LVS-15/30 se encuentre hacia adentro.",
                "type_id" => 2,
                "father_id" => 47,
            ],
            [
                "name" => "Revise estado empaques ",
                "description" => "Revise que las roscas de las tapas de los tanques y los empaques se encuentren en buen estado. Lubrique los empaques con grasa siliconada.",
                "type_id" => 2,
                "father_id" => 47,
            ],
            [
                "name" => "Revise estado roscas",
                "description" => "Revise que el estado de las roscas de los tanques y las tapas se encuentren en buen estado, que no presenten desgaste en sus hilos.",
                "type_id" => 2,
                "father_id" => 47,
            ],
            [
                "name" => "Verifique estado QS ",
                "description" => "Verifique que el QS al interior de cada tanque se encuentre en buen estado (fluido y sin presencia de grumos), a través de la tapa y del disco de ruptura.",
                "type_id" => 2,
                "father_id" => 47,
            ],
            [
                "name" => "Verifique altura QS",
                "description" => "Verifique que la altura entre el QS y la parte superior de la rosca del tanque no exceda el límite.",
                "type_id" => 2,
                "father_id" => 47,
                "funct" => 1,
            ],
            [
                "name" => "Verifique estado LVS ",
                "description" => "Verifique que el LVS al interior de cada tanque se encuentre en buen estado (fluido, limpio y de color blancuzco). ",
                "type_id" => 2,
                "father_id" => 47,
            ],
            [
                "name" => "Verifique altura LVS",
                "description" => "Verifique que la altura entre el LVS y la parte superior de la rosca del tanque no exceda el límite.",
                "type_id" => 2,
                "father_id" => 47,
                "funct" => 1,
            ],
            [
                "name" => "Verificar estado discos/niples de ruptura",
                "description" => "Verifique que los discos de ruptura o niples de ruptura se encuentre en buen estado. Revise la unión universal.",
                "type_id" => 2,
                "father_id" => 47,
            ],
            [
                "name" => "Retire manguera",
                "description" => "Desconecte las mangueras de actuación y presurización de 1/4” del Actuador Eléctrico-Neumático.",
                "type_id" => 2,
                "father_id" => 55,
            ],
            [
                "name" => "Remueva AEN",
                "description" => "Remueva el Actuador  Eléctrico-Neumático de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador.",
                "type_id" => 2,
                "father_id" => 55,
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire el o-ring del percutor y de la parte inferior del actuador. Verifique que se encuentra en buen estado, en caso contrario cámbielo por uno nuevo. Limpie y lubrique el o-ring con grasa siliconada. Instale nuevamente el o-ring.",
                "type_id" => 2,
                "father_id" => 55,
            ],
            [
                "name" => "Verifique roscas",
                "description" => "Limpie la parte interna del cuerpo del actuador.Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 2,
                "father_id" => 55,
            ],
            [
                "name" => "Arme el AEN",
                "description" => "Instale el cuerpo del Actuador Neumático en el soporte y apriételo usando la contra tuerca. Conecte la manguera de actuación al 1/4”.",
                "type_id" => 2,
                "father_id" => 55,
            ],
            [
                "name" => "Retire manguera",
                "description" => "Desconecte la manguera de actuación de 1/4” del Actuador Eeléctrico-Neumático.",
                "type_id" => 2,
                "father_id" => 56,
            ],
            [
                "name" => "Remueva AEN",
                "description" => "Remueva el Actuador Eléctrico-Neumático de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador.",
                "type_id" => 2,
                "father_id" => 56,
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire los o-rings del percutor y de la parte inferior del Actuador Eléctrico-Neumático. Verifique que se encuentran en buen estado, en caso contrario cámbielos por uno nuevo. Limpie y lubrique los o-rings con grasa siliconada. Instale nuevamente los o-rings.",
                "type_id" => 2,
                "father_id" => 56,
            ],
            [
                "name" => "Verifique roscas",
                "description" => "Limpie la parte interna del cuerpo del Actuador Eléctrico-Neumático. Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 2,
                "father_id" => 56,
            ],
            [
                "name" => "Arme el AEN",
                "description" => "Instale el cuerpo del Actuador Eléctrico-Neumático en el soporte y apriételo usando la contra tuerca. Conecte la manguera de actuación de 1/4” al Actuador Eléctrico-Neumático",
                "type_id" => 2,
                "father_id" => 56,
            ],
            [
                "name" => "Retire manguera",
                "description" => "Desconecte la manguera de actuación de 1/4” del Actuador Manual Remoto. Retire el pasador de seguridad.",
                "type_id" => 2,
                "father_id" => 57,
            ],
            [
                "name" => "Remueva AMR",
                "description" => "Remueva el Actuador Manual Remoto de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador Manual Remoto.",
                "type_id" => 2,
                "father_id" => 57,
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire los o-rings del percutor y de la parte inferior del Actuador Manual Remoto. Verifique que se encuentran en buen estado, en caso contrario cámbielos por uno nuevo. Limpie y lubrique los o-rings con grasa siliconada. Instale nuevamente los o-rings.",
                "type_id" => 2,
                "father_id" => 57,
            ],
            [
                "name" => "Verifique roscas",
                "description" => "Limpie la parte interna del cuerpo del Actuador Manual Remoto. Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 2,
                "father_id" => 57,
            ],
            [
                "name" => "Arme el AMR",
                "description" => "Instale el cuerpo del Actuador Manual Remoto en el soporte y apriételo usando la contra tuerca de la parte inferior. Inserte el pasador. Instale el sello visual de inspección o precinto de seguridad. Conecte la manguera de actuación de 1/4” al Actuador Manual Remoto.",
                "type_id" => 2,
                "father_id" => 57,
            ],
            [
                "name" => "Instale una cápsula en el actuador Booster",
                "description" => "Instale una cápsula de barrido LT-A-101-30 nueva/recargada en el actuador Booster para la ejecución de la prueba de actuación.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Presurice la línea de actuación",
                "description" => "Presurice la línea de actuación mediante la actuación de una cápsula LT-10-R nueva/recargada en el Actuador Manual/Automático o mediante la conexión de una línea de aire seco o un cilindro de nitrógeno con regulador.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Verifique que los percutores de los AEN´s descendieron.",
                "description" => "Verifique que los percutores de los Actuadores Eléctrico-Neumáticos descendieron completamente, y se mantengan abajo.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Verifique que el percutor del AEN del Booster descendió.",
                "description" => "Verifique que el percutor del Actuador Eléctrico-Neumático del Booster descendió completamente, y se mantenga abajo.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio principal",
                "description" => "Verifique que se haya activado la válvula de alivio del sistema.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio del Booster",
                "description" => "Verifique que se haya activado la válvula de alivio del Booster.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Verifique funcionamiento correcto de los cheques",
                "description" => "Verifique el correcto funcionamiento de los cheques. Esto se cumple cuando ocurre lo siguiente: - Los percutores se mantengan hacia abajo. - Se haya activado la válvula de alivio. - No se evidencien alivios de presión por algunas de las líneas de actuación.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Alivie la presión en la línea de actuación",
                "description" => "Hale la argolla de la válvula de alivio para aliviar la presión remanente el la línea de actuación",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Verifique activación Shutdown",
                "description" => "Verifique la activación del Interruptor de presión (Shutdown) y que el equipo se haya apagado. ",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Restablezca Shutdown",
                "description" => "Restablezca el Interruptor de presión (Shutdown). Presionando el botón rojo.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Retire cápsula actuación descargada",
                "description" => "Retire las cápsulas de Actuación LT-10-R de prueba descargada.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Retire cápsula Booster descargada",
                "description" => "Retire la cápsula de Barrido LT-A-101-30 de prueba del Booster descargada.",
                "type_id" => 2,
                "father_id" => 61,
            ],
            [
                "name" => "Instale una cápsula en el actuador Booster ",
                "description" => "Instale una cápsula de barrido LT-A-101-30 nueva/recargada en el actuador Booster para la ejecución de la prueba de actuación.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Presurice la línea de actuación",
                "description" => "Presurice la línea de actuación mediante la actuación de una cápsula LT-10-R nueva/recargada en el Actuador Manual Remoto o mediante la conexión de una línea de aire seco o un cilindro de nitrógeno con regulador.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Verifique que los percutores de los AEN´s descendieron.",
                "description" => "Verifique que los percutores de los Actuadores Eléctrico-Neumáticos descendieron completamente, y se mantengan abajo.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Verifique que el percutor del AEN del Booster descendió.",
                "description" => "Verifique que el percutor del Actuador Eléctrico-Neumático del Booster descendió completamente, y se mantenga abajo.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio principal",
                "description" => "Verifique que se haya activado la válvula de alivio del sistema.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio del Booster",
                "description" => "Verifique que se haya activado la válvula de alivio del Booster.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Verifique funcionamiento correcto de los cheques",
                "description" => "Verifique el correcto funcionamiento de los cheques. Esto se cumple cuando ocurre lo siguiente: - Los percutores se mantengan hacia abajo. - Se haya activado la válvula de alivio. - No se evidencien alivios de presión por algunas de las líneas de actuación.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Alivie la presión en la línea de actuación",
                "description" => "Hale la argolla de la válvula de alivio para aliviar la presión remanente el la línea de actuación",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Verifique activación Shutdown",
                "description" => "Verifique la activación del Interruptor de presión (Shutdown) y que el equipo se haya apagado. ",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Restablezca Shutdown",
                "description" => "Restablezca el Interruptor de presión (Shutdown). Presionando el botón rojo.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Retire cápsula actuación descargada",
                "description" => "Retire las cápsulas de Actuación LT-10-R de prueba descargada.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Retire cápsula Booster descargada",
                "description" => "Retire la cápsula de Barrido LT-A-101-30 de prueba del Booster descargada.",
                "type_id" => 2,
                "father_id" => 62,
            ],
            [
                "name" => "Revise estado de cápsulas de barrido ",
                "description" => "Revise que la cápsula de barrido se encuentre en buen estado, esta no debe presentar golpes, corrosión y/o deformaciones.",
                "type_id" => 2,
                "father_id" => 63,
                "funct" => 1,
            ],
            [
                "name" => "Verifique PH de Cápsulas de Barrido",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de las cápsulas de barrido y anótela. - Para Cápsula de Barrido LT-A-101-30: 12 años.- Para Cápsula de Barrido 55Cu Ft/ 23 Cu Ft: 5 años. En caso que tenga una estrella son 10 años.",
                "type_id" => 2,
                "father_id" => 63,
                "funct" => 1,
            ],
            [
                "name" => "Verifique peso cápsulas de barrido",
                "description" => "Verifique el peso de las cápsulas de barrido  LT-A-101-30 sin tapa, que no exceda ± 14 gr del peso estampado de la cápsula. Anote el peso real en las casillas.",
                "type_id" => 2,
                "father_id" => 63,
                "funct" => 1,
            ],
            [
                "name" => "Verifique presión cápsulas de barrido",
                "description" => "Verifique que la presión que se visualiza en el manómetro de las cápsulas estén dentro del rango 1800 - 2300 psi. Anote la presión en las casillas.",
                "type_id" => 2,
                "father_id" => 63,
                "funct" => 1,
            ],
            [
                "name" => "Revise estado de cápsula Booster",
                "description" => "Revise que la cápsula de barrido se encuentre en buen estado, esta no debe presentar golpes, corrosión y/o deformaciones.",
                "type_id" => 2,
                "funct" => 1,
                "father_id" => 64,
            ],
            [
                "name" => "Verifique PH de cápsula Booster",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de la cápsula de barrido, esta no debe ser superior a 12 años.",
                "type_id" => 2,
                "father_id" => 64,
                "funct" => 1,
            ],
            [
                "name" => "Verifique peso cápsula Booster",
                "description" => "Verifique el peso de la cápsula del Booster sin tapa, que no exceda ± 14 gr del peso estampado de la cápsula. Anote el peso real en la casilla.",
                "type_id" => 2,
                "father_id" => 64,
                "funct" => 1,
            ],
            [
                "name" => "Revise estado de cápsulas de actuación",
                "description" => "Revise que las cápsulas de actuación se encuentre en buen estado, que no presentan golpes, corrosión y/o deformaciones.",
                "type_id" => 2,
                "father_id" => 65,
                "funct" => 1,
            ],
            [
                "name" => "Verifique peso cápsulas de actuación",
                "description" => "Verifique el peso de las cápsulas de actuación LT-10-R sin tapa, del AMA y de los AMR, que no excedan ± 7 gr del peso estampado de las cápsulas. Anote el peso real en las casillas.",
                "type_id" => 2,
                "father_id" => 65,
                "funct" => 1,
            ],
            [
                "name" => "Verifique percutores AMR´s",
                "description" => "Verifique que los percutores de los actuadores remotos se encuentren completamente hacia adentro. ",
                "type_id" => 2,
                "father_id" => 70,
            ],
            [
                "name" => "Instale pasador y sello visual",
                "description" => "Instale correctamente los pasadores de seguridad y sellos visuales de inspección.",
                "type_id" => 2,
                "father_id" => 70,
            ],
            [
                "name" => "Verifique percutor AMA",
                "description" => "Verifique que el percutor del actuador manual/automático se encuentre completamente hacia adentro. ",
                "type_id" => 2,
                "father_id" => 72,
            ],
            [
                "name" => "Instale pasador y sello visual",
                "description" => "Instale correctamente el pasador de seguridad y sello visual de inspección.",
                "type_id" => 2,
                "father_id" => 72,
            ],
            [
                "name" => "Estado general",
                "description" => "Revise que los extintores se encuentren en buen estado, que no presente golpes, corrosión y/o deformación.",
                "type_id" => 2,
                "father_id" => 75,
            ],
            [
                "name" => "No Consecutivo",
                "description" => "Anote el número de consecutivo de los extintores",
                "type_id" => 2,
                "father_id" => 75,
                "funct" => 1,
            ],
            [
                "name" => "Fecha de Mantenimiento",
                "description" => "Verifique la fecha del último Mantenimiento de los extintores en su collar de verificación, si se encuentra vencido reemplácelo por uno nuevo o recargado.",
                "type_id" => 2,
                "father_id" => 75,
                "funct" => 1,
            ],
            [
                "name" => "Sello visual o precinto",
                "description" => "Verifique que el sello visual de inspección o precinto se encuentra en buen estado.",
                "type_id" => 2,
                "father_id" => 75,                
            ],
            [
                "name" => "Indicador de descarga",
                "description" => "Revise que el indicador de descarga (testigo) ubicado en la tapa del extintor se encuentre hacia adentro.",
                "type_id" => 2,
                "father_id" => 75,                
            ],
            [
                "name" => "Agite el extintor",
                "description" => "Agite los extintores para verificar que esté lleno y la cápsula en su lugar.",
                "type_id" => 2,
                "father_id" => 75,                
            ],
            [
                "name" => "Agite el extintor",
                "description" => "Agite los extintores para verificar que esté lleno y la cápsula en su lugar.",
                "type_id" => 2,
                "father_id" => 75,                
            ],
            [
                "name" => "Revise manguera",
                "description" => "Revise que las mangueras de descarga y sus acoples se encuentren en buen estado, que no presenten deterioro, deformación y/o desgaste. Verifique que las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.   ",
                "type_id" => 2,
                "father_id" => 75,                
            ],
            [
                "name" => "Revise boquilla",
                "description" => "Verifique que la boquilla no esté tapada y no presente obstrucción.",
                "type_id" => 2,
                "father_id" => 75,                
            ],
            [
                "name" => "Revise soporte del extintor",
                "description" => "Revise que el soporte del extintor se encuentren en buen estado, que no presente golpes, corrosión y/o deformación. ",
                "type_id" => 2,
                "father_id" => 75,                
            ],
            [
                "name" => "Verifique estado SC-N",
                "description" => "Verifique que el Módulo CHECKFIRE SC-N se encuentra en buen estado, que no presente golpes, grietas y/o deformaciónes. Anote el serial.",
                "type_id" => 1,
                "father_id" => 3,                
                "funct" => 1,                
            ],
            [
                "name" => "Verifique conexiones internas SC-N",
                "description" => "Retire la tapa frontal del módulo CHECKFIRE SC-N y verifique que las conexiones internas se encuentran bien ajustadas.",
                "type_id" => 1,
                "father_id" => 3,                
            ],
            [
                "name" => "Revise estado de Cable Térmico",
                "description" => "Revise que el cable térmico se encuentra en buen estado, que no presente desgaste, cortes y/o deformaciones. ",
                "type_id" => 1,
                "father_id" => 10,                
                "funct" => 1,                
            ],
            [
                "name" => "Verifique sujeción Cable Térmico",
                "description" => "Verifique que le Cable Térmico se encuentra debidamente sujetado. Verifique que el cable térmico no presente pérdida o deterioro de la cubierta protectora de color rojo. Verifique que el espaciamiento de los puntos de sujeción sea el adecuado (como máximo cada 30 a 45 cms) y que cuenten con su protector de caucho Rubber y/o abrazaderas con recubrimiento de caucho.",
                "type_id" => 1,
                "father_id" => 10,                
            ],
            [
                "name" => "Distancia de separación Cable Térmico",
                "description" => "Revise que la distancia de separación entre el cable térmico y cualquier superficie súper caliente (exhostos, turbos, otros) sea como mínimo 30 cm.",
                "type_id" => 1,
                "father_id" => 10,                
            ],
            [
                "name" => "Revise estado de tanques",
                "description" => "Revise que los cilindros de QS/LVS y sus soportes se encuentren en buen estado, que no presente golpes, corrosión y/o deformación.",
                "type_id" => 1,
                "father_id" => 12,                
            ],
            [
                "name" => "Verifique PH de Tanques de QS/LVS",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de los tanques de QS/LVS, esta no debe ser superior a 12 años.",
                "type_id" => 1,
                "father_id" => 12,              
                "funct" => 1,                  
            ],
            [
                "name" => "Revise indicador de descarga",
                "description" => "Revise que el indicador de descarga ubicado en la tapa de los tanques LT-A-101-125/250 y LVS-15/30 se encuentre hacia adentro.",
                "type_id" => 1,
                "father_id" => 12,                
            ],
            [
                "name" => "Revise estado de cápsulas de barrido ",
                "description" => "Revise que la cápsula de barrido se encuentre en buen estado, esta no debe presentar golpes, corrosión y/o deformaciones.",
                "type_id" => 1,
                "father_id" => 25,                
                "funct" => 1,                
            ],
            [
                "name" => "Verifique PH de Cápsulas de Barrido",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de las cápsulas de barrido y anótela. - Para Cápsula de Barrido LT-A-101-30: 12 años.- Para Cápsula de Barrido 55Cu Ft/ 23 Cu Ft: 5 años. En caso que tenga una estrella son 10 años.",
                "type_id" => 1,
                "father_id" => 25,                
                "funct" => 1,                
            ],
            [
                "name" => "Verifique presión cápsulas de barrido",
                "description" => "Verifique que la presión que se visualiza en el manómetro de las cápsulas estén dentro del rango 1800 - 2300 psi. Anote la presión en las casillas.",
                "type_id" => 1,
                "father_id" => 25,                
                "funct" => 1,                
            ],
            [
                "name" => "Revise estado de cápsula Booster",
                "description" => "Revise que la cápsula de barrido se encuentre en buen estado, esta no debe presentar golpes, corrosión y/o deformaciones.",
                "type_id" => 1,
                "father_id" => 26,   
                "funct" => 1,        
            ],
            [
                "name" => "Verifique PH de cápsula Booster",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de la cápsula de barrido, esta no debe ser superior a 12 años.",
                "type_id" => 1,
                "father_id" => 26,                
                "funct" => 1,                
            ],
            [
                "name" => "Verifique percutor AMA",
                "description" => "Verifique que el percutor del actuador manual/automático se encuentre completamente hacia adentro. ",
                "type_id" => 1,
                "father_id" => 28,                            
            ],
            [
                "name" => "Verifique pasador y sello visual",
                "description" => "Verifique que el pasador de seguridad y sello visual de inspección esté correctamente instalado.",
                "type_id" => 1,
                "father_id" => 28,                            
            ],
            [
                "name" => "Estado general",
                "description" => "Revise que los extintores se encuentren en buen estado, que no presente golpes, corrosión y/o deformación.",
                "type_id" => 1,
                "father_id" => 31,                            
            ],
            [
                "name" => "No Consecutivo",
                "description" => "Anote el número de consecutivo de los extintores",
                "type_id" => 1,
                "father_id" => 31,                            
                "funct" => 1,                            
            ],
            [
                "name" => "Fecha de Mantenimiento",
                "description" => "Verifique la fecha del último Mantenimiento de los extintores en su collar de verificación, si se encuentra vencido reemplácelo por uno nuevo o recargado.",
                "type_id" => 1,
                "father_id" => 31,    
                "funct" => 1,                        
            ],
            [
                "name" => "Sello visual o precinto",
                "description" => "Verifique que el sello visual de inspección o precinto se encuentra en buen estado.",
                "type_id" => 1,
                "father_id" => 31,                            
            ],
            [
                "name" => "Indicador de descarga",
                "description" => "Revise que el indicador de descarga (testigo) ubicado en la tapa del extintor se encuentre hacia adentro.",
                "type_id" => 1,
                "father_id" => 31,                            
            ],
            [
                "name" => "Agite el extintor",
                "description" => "Agite los extintores para verificar que esté lleno y la cápsula en su lugar.",
                "type_id" => 1,
                "father_id" => 31,                            
            ],
            [
                "name" => "Revise manguera",
                "description" => "Revise que las mangueras de descarga y sus acoples se encuentren en buen estado, que no presenten deterioro, deformación y/o desgaste. Verifique que las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.   ",
                "type_id" => 1,
                "father_id" => 31,                            
            ],
            [
                "name" => "Revise boquilla",
                "description" => "Verifique que la boquilla no esté tapada y no presente obstrucción.",
                "type_id" => 1,
                "father_id" => 31,                            
            ],
            [
                "name" => "Revise soporte del extintor",
                "description" => "Revise que el soporte del extintor se encuentren en buen estado, que no presente golpes, corrosión y/o deformación. ",
                "type_id" => 1,
                "father_id" => 31,                            
            ],
            [
                "name" => "Retire manguera",
                "description" => "Desconecte las mangueras de actuación y presurización de 1/4” del Actuador Eléctrico-Neumático.",
                "type_id" => 3,
                "father_id" => 83,                            
            ],
            [
                "name" => "Remueva AEN",
                "description" => "Remueva el Actuador  Eléctrico-Neumático de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador.",
                "type_id" => 3,
                "father_id" => 83,                            
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire el o-ring del percutor y de la parte inferior del actuador. Verifique que se encuentra en buen estado, en caso contrario cámbielo por uno nuevo. Limpie y lubrique el o-ring con grasa siliconada. Instale nuevamente el o-ring.",
                "type_id" => 3,
                "father_id" => 83,                            
            ],
            [
                "name" => "Verifique roscas",
                "description" => "Limpie la parte interna del cuerpo del actuador.Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 3,
                "father_id" => 83,                            
            ],
            [
                "name" => "Arme el AEN",
                "description" => "Instale el cuerpo del Actuador Neumático en el soporte y apriételo usando la contra tuerca. Conecte la manguera de actuación al 1/4”.",
                "type_id" => 3,
                "father_id" => 83,                            
            ],
            [
                "name" => "Retire manguera",
                "description" => "Desconecte la manguera de actuación de 1/4” del Actuador Eeléctrico-Neumático.",
                "type_id" => 3,
                "father_id" => 84,                            
            ],
            [
                "name" => "Remueva AEN",
                "description" => "Remueva el Actuador Eléctrico-Neumático de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador.",
                "type_id" => 3,
                "father_id" => 84,                            
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire los o-rings del percutor y de la parte inferior del Actuador Eléctrico-Neumático. Verifique que se encuentran en buen estado, en caso contrario cámbielos por uno nuevo. Limpie y lubrique los o-rings con grasa siliconada. Instale nuevamente los o-rings.",
                "type_id" => 3,
                "father_id" => 84,                            
            ],
            [
                "name" => "Verifique roscas",
                "description" => "Limpie la parte interna del cuerpo del Actuador Eléctrico-Neumático. Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 3,
                "father_id" => 84,                            
            ],
            [
                "name" => "Arme el AEN",
                "description" => "Instale el cuerpo del Actuador Eléctrico-Neumático en el soporte y apriételo usando la contra tuerca. Conecte la manguera de actuación de 1/4” al Actuador Eléctrico-Neumático",
                "type_id" => 3,
                "father_id" => 84,                            
            ],
            [
                "name" => "Recarga manual de tanques",
                "description" => "Recargue los tanques descargados con las siguientes medidas de QS/LVS según su referencia: LT-A-101-30 = 25 lb (11.3 kg)     LT-A-101-50 = 45 lb (20.4 kg)     LT-A-101-125 = 112 lb (50.8 kg)     LT-A-101-250 = 225 lb (102.1 kg)  LVS 5 = 5 ga (18,9 lts)                LVS 10 = 10 gal (37,85 lts)          LVS 15 = 15 gal (56,78 lts)              LVS 30 = 30 gal (113,56 lts) ",
                "type_id" => 3,
                "father_id" => 85,                            
                "funct" => 1,                            
            ],
            [
                "name" => "Cambio de disco niple de ruptura",
                "description" => "Reemplace los discos o niples de ruptura, aplique teflón en su rosca.",
                "type_id" => 3,
                "father_id" => 85,                         
            ],
            [
                "name" => "Revise estado de tanques",
                "description" => "Revise que los cilindros de QS/LVS y sus soportes se encuentren en buen estado, que no presente golpes, corrosión y/o deformación.",
                "type_id" => 3,
                "father_id" => 87,                         
            ],
            [
                "name" => "Verifique PH de tanques de QS/LVS",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de los tanques de QS/LVS, esta no debe ser superior a 12 años.",
                "type_id" => 3,
                "father_id" => 87,                         
                "funct" => 1,                         
            ],
            [
                "name" => "Revise indicador de descarga",
                "description" => "Revise que el indicador de descarga ubicado en la tapa de los tanques LT-A-101-125/250 y LVS-15/30 se encuentre hacia adentro.",
                "type_id" => 3,
                "father_id" => 87,                       
            ],
            [
                "name" => "Revise estado empaques ",
                "description" => "Revise que las roscas de las tapas de los tanques y los empaques se encuentren en buen estado. Lubrique los empaques con grasa siliconada.",
                "type_id" => 3,
                "father_id" => 87,                       
            ],
            [
                "name" => "Revise estado roscas",
                "description" => "Revise que el estado de las roscas de los tanques y las tapas se encuentren en buen estado, que no presenten desgaste en sus hilos.",
                "type_id" => 3,
                "father_id" => 87,                       
            ],
            [
                "name" => "Verifique estado QS ",
                "description" => "Verifique que el QS al interior de cada tanque se encuentre en buen estado (fluido y sin presencia de grumos), a través de la tapa y del disco de ruptura.",
                "type_id" => 3,
                "father_id" => 87,                       
            ],
            [
                "name" => "Verifique altura QS",
                "description" => "Verifique que la altura entre el QS y la parte superior de la rosca del tanque no exceda el límite. LT-A-101-30: 7-1/2” =19 cms     LT-A-101-50: 8-1/2” =21,59 cms     LT-A-101-125: 9-1/2” = 24,13 cms     LT-A-101-250: 19” = 48,26 cms  ",
                "type_id" => 3,
                "father_id" => 87,                       
                "funct" => 1,                       
            ],
            [
                "name" => "Verifique estado LVS ",
                "description" => "Verifique que el LVS al interior de cada tanque se encuentre en buen estado (fluido, limpio y de color blancuzco). ",
                "type_id" => 3,
                "father_id" => 87,                       
            ],
            [
                "name" => "Verifique altura LVS",
                "description" => "Verifique que la altura entre el LVS y la parte superior de la rosca del tanque no exceda el límite. LVS 5: 5” = 12,7 cms     LVS 10: 3,5” = 8,89 cms     LVS 15: 4” = 10,16 cms     LVS 30: 12” = 30,48 cms    ",
                "type_id" => 3,
                "father_id" => 87,                       
                "funct" => 1,                       
            ],
            [
                "name" => "Verificar estado discos/niples de ruptura",
                "description" => "Verifique que los discos de ruptura o niples de ruptura se encuentre en buen estado. Revise la unión universal.",
                "type_id" => 3,
                "father_id" => 87,    
            ],
            [
                "name" => "Retire manguera y pasador",
                "description" => "Desconecte la manguera de actuación de 1/4” del Actuador Manual/Automático. Retire el pasador de seguridad.",
                "type_id" => 3,
                "father_id" => 96,    
            ],
            [
                "name" => "Retire PAD activado",
                "description" => "Retire la guarda protectora del PAD y desconéctelo. Desenrosque la parte superior del actuador retire cuidosamente el PAD activado. Reemplácelo por uno nuevo. ",
                "type_id" => 3,
                "father_id" => 96,    
            ],
            [
                "name" => "Instale nuevo PAD",
                "description" => "Verifique la fecha de fabricación del nuevo PAD, reemplace si es mayor a 5 años. ",
                "type_id" => 3,
                "father_id" => 96,    
                "funct" => 1,    
            ],
            [
                "name" => "Desarme el AMA",
                "description" => "Remueva el Actuador Manual/Automático de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador.",
                "type_id" => 3,
                "father_id" => 96,    
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire los o-rings de la rosca superior del actuador, del vástago, y de la parte inferior del Actuador Manual/Automático. Verifique que se encuentran en buen estado, en caso contrario cámbielo por uno nuevo. Limpie y lubrique los o-rings con grasa siliconada. Instalelos nuevamente.",
                "type_id" => 3,
                "father_id" => 96,    
            ],
            [
                "name" => "Verique roscas",
                "description" => "Limpie la parte interna del cuerpo del Actuador Manual/Automático. Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 3,
                "father_id" => 96,    
            ],
            [
                "name" => "Arme el AMA",
                "description" => "Instale el cuerpo del Actuador Manual/Automático en el soporte y apriételo usando la contra tuerca de la parte inferior. Inserte el pasador.Conecte el PAD al cable conector del PAD proveniente del Módulo CHECKFIRE SC-N. Instale el sello visual de inspección o precinto de seguridad. Conecte la manguera de actuación de 1/4”.",
                "type_id" => 3,
                "father_id" => 96,    
            ],
            [
                "name" => "Cambie la Batería",
                "description" => "Desconecte la Batería al interior del Módulo CHECKFIRE SC-N y cambie la batería por una nueva. ",
                "type_id" => 3,
                "father_id" => 97,    
            ],
            [
                "name" => "Instale Nueva Batería",
                "description" => "Instale la nueva Batería y colóquele su fecha de instalación.",
                "type_id" => 3,
                "father_id" => 97,    
                "funct" => 1,    
            ],
            [
                "name" => "Retire Cable Térmico quemado",
                "description" => "Retire el cable térmico quemado o deteriorado.",
                "type_id" => 3,
                "father_id" => 98,    
            ],
            [
                "name" => "Instalte nuevo Cable Térmico",
                "description" => "Instale nuevo Cable Térmico.",
                "type_id" => 3,
                "father_id" => 98,    
            ],
            [
                "name" => "Revise estado de Cable Térmico",
                "description" => "Revise que el cable térmico se encuentra en buen estado, que no presente desgaste, cortes y/o deformaciones. ",
                "type_id" => 3,
                "father_id" => 98,    
                "funct" => 1,    
            ],
            [
                "name" => "Verifique sujeción Cable Térmico",
                "description" => "Verifique que le Cable Térmico se encuentra debidamente sujetado. Verifique que el cable térmico no presente pérdida o deterioro de la cubierta protectora de color rojo. Verifique que el espaciamiento de los puntos de sujeción sea el adecuado (como máximo cada 30 a 45 cms) y que cuenten con su protector de caucho Rubber y/o abrazaderas con recubrimiento de caucho.",
                "type_id" => 3,
                "father_id" => 98,    
            ],
            [
                "name" => "Distancia de separación Cable Térmico",
                "description" => "Revise que la distancia de separación entre el cable térmico y cualquier superficie súper caliente (exhostos, turbos, otros) sea como mínimo 30 cm.",
                "type_id" => 3,
                "father_id" => 98,    
            ],
            [
                "name" => "Revise Interfaz Triple IR",
                "description" => "Verifique que la Interfaz Triple IR se encuentra en buen estado, que no presente golpes, grietas y/o deformaciónes. Retire la tapa frontal de la Interfaz Triple IR y verifique que las conexiones internas se encuentran bien ajustadas.",
                "type_id" => 3,
                "father_id" => 102,    
            ],
            [
                "name" => "Desconecte y limpie conexiones Triple IR",
                "description" => "Desconecte todas las conexiones del sistema Triple IR y verifique que no presenten suciedad, humedad y/o corrosión al interior de las conexiones. En caso de presentar suciedad, limpie con limpiador de contactos eléctrico y aplique nuevamente grasa dieléctrica a las conexiones. Si algún componente presenta corrosión, cámbielo por uno nuevo.",
                "type_id" => 3,
                "father_id" => 102,    
            ],
            [
                "name" => "Limpie detectores Triple IR",
                "description" => "Limpie el lente de visión de los Detectores Tripe IR con un trapo húmedo.  Nota: No utilice agua a alta presión.",
                "type_id" => 3,
                "father_id" => 102,    
            ],
            [
                "name" => "Conecte y verifique Triple IR",
                "description" => "Conecte nuevamente todas las conexiones del sistema Triple IR. Una vez conectados, cada detector realizará automáticamente una prueba BIT interna (30 segundos en LED amarillo). Espere a que todos los detectores se establezcan en modo NORMAL de operación (LED alumbrando color verde). Si algún detector permanece con el LED en amarillo notifique a su Supervisor para evaluar el motivo de la alarma. Realice inmediatamente el correctivo requerido.  ",
                "type_id" => 3,
                "father_id" => 102,    
            ],
            [
                "name" => "Verifique estado SC-N",
                "description" => "Verifique que el Módulo CHECKFIRE SC-N se encuentra en buene estado, que no presente golpes, grietas y/o deformaciónes. Anote el serial.",
                "type_id" => 3,
                "father_id" => 103,    
                "funct" => 1,    
            ],
            [
                "name" => "Verifique conexiones internas SC-N",
                "description" => "Retire la tapa frontal del módulo CHECKFIRE SC-N y verifique que las conexiones internas se encuentran bien ajustadas.",
                "type_id" => 3,
                "father_id" => 103,    
            ],
            [
                "name" => "Realice prueba de funcionamiento al SC-N",
                "description" => "1. Desconecte el PAD. 2. Conecte el Módulo de prueba (P/N ) al cable conector del PAD. 3. Encienda el Módulo de prueba.  4. Posicione el interruptor en la posición “SQUIB”. 5. Resetee el Módulo de prueba y el SC-N. 6. Mediante un destornillador o un alambre de acero genere un puente entre los alambres del Cable Térmico.",
                "type_id" => 3,
                "father_id" => 104,    
            ],
            [
                "name" => "Verificar primer tiempo de retardo",
                "description" => "Verifique durante la prueba el primer tiempo de retardo, este debe ser díez (10) segundos. Anote el tiempo.",
                "type_id" => 3,
                "father_id" => 104,    
                "funct" => 1,    
            ],
            [
                "name" => "Verificar segundo tiempo de retardo",
                "description" => "Verifique durante la prueba el segundo tiempo de retardo, este debe ser díez (10)  segundos. Anote el tiempo.",
                "type_id" => 3,
                "father_id" => 104,    
                "funct" => 1,    
            ],
            [
                "name" => "Conecte el PAD",
                "description" => "Desconecte el Módulo de Prueba y vuelva a conectar el PAD.",
                "type_id" => 3,
                "father_id" => 104,    
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos).",
                "type_id" => 3,
                "father_id" => 104,    
            ],
            [
                "name" => "Retire manguera",
                "description" => "Desconecte la manguera de actuación de 1/4” del Actuador Manual Remoto. Retire el pasador de seguridad.",
                "type_id" => 3,
                "father_id" => 105,    
            ],
            [
                "name" => "Remueva AMR",
                "description" => "Remueva el Actuador Manual Remoto de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador Manual Remoto.",
                "type_id" => 3,
                "father_id" => 105,    
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire los o-rings del percutor y de la parte inferior del Actuador Manual Remoto. Verifique que se encuentran en buen estado, en caso contrario cámbielos por uno nuevo. Limpie y lubrique los o-rings con grasa siliconada. Instale nuevamente los o-rings.",
                "type_id" => 3,
                "father_id" => 105,    
            ],
            [
                "name" => "Verifique roscas",
                "description" => "Limpie la parte interna del cuerpo del Actuador Manual Remoto. Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 3,
                "father_id" => 105,    
            ],
            [
                "name" => "Arme el AMR",
                "description" => "Instale el cuerpo del Actuador Manual Remoto en el soporte y apriételo usando la contra tuerca de la parte inferior. Inserte el pasador. Instale el sello visual de inspección o precinto de seguridad. Conecte la manguera de actuación de 1/4” al Actuador Manual Remoto.",
                "type_id" => 3,
                "father_id" => 105,    
            ],
            [
                "name" => "Instale una cápsula en el actuador Booster ",
                "description" => "Instale una cápsula de barrido LT-A-101-30 nueva/recargada en el actuador Booster para la ejecución de la prueba de actuación.",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Presurice la línea de actuación",
                "description" => "Presurice la línea de actuación mediante la actuación de una cápsula LT-10-R nueva/recargada en el Actuador Manual/Automático o mediante la conexión de una línea de aire seco o un cilindro de nitrógeno con regulador.",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Verifique que los percutores de los AEN´s descendieron.",
                "description" => "Verifique que los percutores de los Actuadores Eléctrico-Neumáticos descendieron completamente, y se mantengan abajo.",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Verifique que el percutor del AEN del Booster descendió.",
                "description" => "Verifique que el percutor del Actuador Eléctrico-Neumático del Booster descendió completamente, y se mantenga abajo.",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio principal",
                "description" => "Verifique que se haya activado la válvula de alivio del sistema.",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio del Booster",
                "description" => "Verifique que se haya activado la válvula de alivio del Booster.",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Verifique funcionamiento correcto de los cheques",
                "description" => "Verifique el correcto funcionamiento de los cheques. Esto se cumple cuando ocurre lo siguiente: - Los percutores se mantengan hacia abajo. - Se haya activado la válvula de alivio. - No se evidencien alivios de presión por algunas de las líneas de actuación. ",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Alivie la presión en la línea de actuación",
                "description" => "Hale la argolla de la válvula de alivio para aliviar la presión remanente el la línea de actuación",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Verifique activación Shutdown",
                "description" => "Verifique la activación del Interruptor de presión (Shutdown) y que el equipo se haya apagado. ",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Restablezca Shutdown",
                "description" => "Restablezca el Interruptor de presión (Shutdown). Presionando el botón rojo.",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Retire cápsula actuación descargada",
                "description" => "Retire las cápsulas de Actuación LT-10-R de prueba descargada.",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Retire cápsula Booster descargada",
                "description" => "Retire la cápsula de Barrido LT-A-101-30 de prueba del Booster descargada.",
                "type_id" => 3,
                "father_id" => 108,    
            ],
            [
                "name" => "Instale una cápsula en el actuador Booster ",
                "description" => "Instale una cápsula de barrido LT-A-101-30 nueva/recargada en el actuador Booster para la ejecución de la prueba de actuación.",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Presurice la línea de actuación",
                "description" => "Presurice la línea de actuación mediante la actuación de una cápsula LT-10-R nueva/recargada en el Actuador Manual Remoto o mediante la conexión de una línea de aire seco o un cilindro de nitrógeno con regulador.",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Verifique que los percutores de los AEN´s descendieron.",
                "description" => "Verifique que los percutores de los Actuadores Eléctrico-Neumáticos descendieron completamente, y se mantengan abajo.",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Verifique que el percutor del AEN del Booster descendió.",
                "description" => "Verifique que el percutor del Actuador Eléctrico-Neumático del Booster descendió completamente, y se mantenga abajo.",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio principal",
                "description" => "Verifique que se haya activado la válvula de alivio del sistema.",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio del Booster",
                "description" => "Verifique que se haya activado la válvula de alivio del Booster.",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Verifique funcionamiento correcto de los cheques",
                "description" => "Verifique el correcto funcionamiento de los cheques. Esto se cumple cuando ocurre lo siguiente: - Los percutores se mantengan hacia abajo. - Se haya activado la válvula de alivio. - No se evidencien alivios de presión por algunas de las líneas de actuación. ",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Alivie la presión en la línea de actuación",
                "description" => "Hale la argolla de la válvula de alivio para aliviar la presión remanente el la línea de actuación",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Verifique activación Shutdown",
                "description" => "Verifique la activación del Interruptor de presión (Shutdown) y que el equipo se haya apagado. ",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Restablezca Shutdown",
                "description" => "Restablezca el Interruptor de presión (Shutdown). Presionando el botón rojo.",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Retire cápsula actuación descargada",
                "description" => "Retire las cápsulas de Actuación LT-10-R de prueba descargada.",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Retire cápsula Booster descargada",
                "description" => "Retire la cápsula de Barrido LT-A-101-30 de prueba del Booster descargada.",
                "type_id" => 3,
                "father_id" => 109,    
            ],
            [
                "name" => "Revise estado de cápsulas de barrido ",
                "description" => "Revise que la cápsula de barrido se encuentre en buen estado, esta no debe presentar golpes, corrosión y/o deformaciones.",
                "type_id" => 3,
                "father_id" => 111,    
                "funct" => 1,    
            ],
            [
                "name" => "Verifique PH de Cápsulas de Barrido",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de las cápsulas de barrido y anótela.  - Para Cápsula de Barrido LT-A-101-30: 12 años. - Para Cápsula de Barrido 55Cu Ft/ 23 Cu Ft: 5 años. En caso que tenga una estrella son 10 años. ",
                "type_id" => 3,
                "father_id" => 111,    
                "funct" => 1,    
            ],
            [
                "name" => "Verifique peso cápsulas de barrido",
                "description" => "Verifique el peso de las cápsulas de barrido  LT-A-101-30 sin tapa, que no exceda ± 14 gr del peso estampado de la cápsula. Anote el peso real en las casillas.",
                "type_id" => 3,
                "father_id" => 111,    
                "funct" => 1,    
            ],
            [
                "name" => "Verifique presión cápsulas de barrido",
                "description" => "Verifique que la presión que se visualiza en el manómetro de las cápsulas estén dentro del rango 1800 - 2300 psi. Anote la presión en las casillas.",
                "type_id" => 3,
                "father_id" => 111,    
                "funct" => 1,    
            ],
            [
                "name" => "Cambie Cápsula del Booster",
                "description" => "Cambie la cápsula del Booster descargada por una cápsula nueva/recargada.",
                "type_id" => 3,
                "father_id" => 112,    
                "funct" => 1,    
            ],
            [
                "name" => "Revise estado de cápsula Booster",
                "description" => "Revise que la cápsula de barrido se encuentre en buen estado, esta no debe presentar golpes, corrosión y/o deformaciones.",
                "type_id" => 3,
                "father_id" => 112,    
                "funct" => 1,    
            ],
            [
                "name" => "Verifique PH de cápsula Booster",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de la cápsula de barrido, esta no debe ser superior a 12 años.",
                "type_id" => 3,
                "father_id" => 112,    
                "funct" => 1,   
            ], 
            [
                "name" => "Verifique peso cápsula Booster",
                "description" => "Verifique el peso de la cápsula del Booster sin tapa, que no exceda ± 14 gr del peso estampado de la cápsula. Anote el peso real en la casilla.",
                "type_id" => 3,
                "father_id" => 112,    
                "funct" => 1,    
            ],
            [
                "name" => "Cambie Cápsula de Actuación AMA",
                "description" => "En caso de descarga automática, cambie la Cápsula de Actuación LT-10-R descargada del Actuador Manual/Automático por una cápsula nueva/recargada.",
                "type_id" => 3,
                "father_id" => 113,    
                "funct" => 1,    
            ],
            [
                "name" => "Cambie Cápsulas de Actuación AMR",
                "description" => "En caso de descarga manual, cambie la Cápsula de Actuación LT-10-R descargada del Actuador Manual Remoto por una cápsula nueva/recargada.",
                "type_id" => 3,
                "father_id" => 113,    
                "funct" => 1,    
            ],
            [
                "name" => "Revise estado de cápsulas de actuación",
                "description" => "Revise que las cápsulas de actuación se encuentre en buen estado, que no presentan golpes, corrosión y/o deformaciones.",
                "type_id" => 3,
                "father_id" => 113,    
                "funct" => 1,    
            ],
            [
                "name" => "Verifique peso cápsulas de actuación",
                "description" => "Verifique el peso de las cápsulas de actuación LT-10-R sin tapa, del AMA y de los AMR, que no excedan ± 7 gr del peso estampado de las cápsulas. Anote el peso real en las casillas.",
                "type_id" => 3,
                "father_id" => 113,    
                "funct" => 1,    
            ],
            [
                "name" => "Verifique percutores AMR´s",
                "description" => "Verifique que los percutores de los actuadores remotos se encuentren completamente hacia adentro. ",
                "type_id" => 3,
                "father_id" => 118,
            ],
            [
                "name" => "Instale pasador y sello visual",
                "description" => "Instale correctamente los pasadores de seguridad y sellos visuales de inspección.",
                "type_id" => 3,
                "father_id" => 118,
            ],
            [
                "name" => "Verifique percutor AMA",
                "description" => "Verifique que el percutor del actuador manual/automático se encuentre completamente hacia adentro. ",
                "type_id" => 3,
                "father_id" => 120,
            ],
            [
                "name" => "Instale pasador y sello visual",
                "description" => "Instale correctamente el pasador de seguridad y sello visual de inspección.",
                "type_id" => 3,
                "father_id" => 120,
            ],
            [
                "name" => "Estado general",
                "description" => "Revise que los extintores se encuentren en buen estado, que no presente golpes, corrosión y/o deformación.",
                "type_id" => 3,
                "father_id" => 123,
            ],
            [
                "name" => "No Consecutivo",
                "description" => "Anote el número de consecutivo de los extintores",
                "type_id" => 3,
                "father_id" => 123,
                "funct" => 1,
            ],
            [
                "name" => "Fecha de Mantenimiento",
                "description" => "Verifique la fecha del último Mantenimiento de los extintores en su collar de verificación, si se encuentra vencido reemplácelo por uno nuevo o recargado.",
                "type_id" => 3,
                "father_id" => 123,
                "funct" => 1,
            ],
            [
                "name" => "Sello visual o precinto",
                "description" => "Verifique que el sello visual de inspección o precinto se encuentra en buen estado.",
                "type_id" => 3,
                "father_id" => 123,
            ],
            [
                "name" => "Indicador de descarga",
                "description" => "Revise que el indicador de descarga (testigo) ubicado en la tapa del extintor se encuentre hacia adentro.",
                "type_id" => 3,
                "father_id" => 123,
            ],
            [
                "name" => "Agite el extintor",
                "description" => "Agite los extintores para verificar que esté lleno y la cápsula en su lugar.",
                "type_id" => 3,
                "father_id" => 123,
            ],
            [
                "name" => "Revise manguera",
                "description" => "Revise que las mangueras de descarga y sus acoples se encuentren en buen estado, que no presenten deterioro, deformación y/o desgaste. Verifique que las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.   ",
                "type_id" => 3,
                "father_id" => 123,
            ],
            [
                "name" => "Revise boquilla",
                "description" => "Verifique que la boquilla no esté tapada y no presente obstrucción.",
                "type_id" => 3,
                "father_id" => 123,
            ],
            [
                "name" => "Revise soporte del extintor",
                "description" => "Revise que el soporte del extintor se encuentren en buen estado, que no presente golpes, corrosión y/o deformación. ",
                "type_id" => 3,
                "father_id" => 123,
            ],

            // reinstalacion 

            [
                "name" => "Remueva cápsula AMA",
                "description" => "Remueva la cápsula LT-10-R del Actuador Manual/Automático de la cabina, colóquele su tapa de seguridad y ubíquela en un lugar seguro.",
                "type_id" => 4,
            ],
            [
                "name" => "Retire cápsulas de barrido",
                "description" => "Retire las cápsulas de barrido LT-A-101-30, 23 CU.FT. y 55 CU.FT. y colóquele su tapa de seguridad y ubíquelas en un lugar seguro.",
                "type_id" => 4,
            ],
            [
                "name" => "Remueva cápsula del Booster ",
                "description" => "Remueva la cápsula de nitrógeno LT-A-101-30 del Booster y colóquele su tapa de seguridad y ubíquela en un lugar seguro.",
                "type_id" => 4,
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos)",
                "type_id" => 4,
            ],
            [
                "name" => "Verifique Módulo SC-N",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Verifique estado SC-N",
                "description" => "Verifique que el Módulo CHECKFIRE SC-N se encuentra en buen estado, que no presente golpes, grietas y/o deformaciónes. Anote el serial.",
                "type_id" => 4,
                "father_id" => 343,
                "funct" => 1,
            ],
            [
                "name" => "Verifique conexiones internas SC-N",
                "description" => "Retire la tapa frontal del módulo CHECKFIRE SC-N y verifique que las conexiones internas se encuentran bien ajustadas.                           ",
                "type_id" => 4,
                "father_id" => 343,
            ],
            [
                "name" => "Verifique la batería",
                "description" => "Verifique la fecha de instalación de la batería. Reemplace si es mayor a un (1) año o no está marcada.",
                "type_id" => 4,
                "funct" => 1,
            ],
            [
                "name" => "Prueba DELAY al CF SC-N",
                "description" => "Instale nuevamente la tapa frontal del Módulo CHECKFIRE SC-N. Genere una falla al Módulo CHECKFIRE SC-N y presione por cinco (5) segundos el botón DELAY. Verique que no se enciende ningún led de falla adcional a la falla generada en el Módulo. En caso de encenderse un led de falla adicional, se debe corregir la falla y luego volver a repetir. ",
                "type_id" => 4,
            ],
            [
                "name" => "Verifique Fin de Línea",
                "description" => "Verifique que el Fin de Línea se encuentre en buen estado, que no presente deformación o deterioro físico. Con un multímetro verifique la resistencia de la misma (4,7 K ohmios).",
                "type_id" => 4,
            ],
            [
                "name" => "Verifique Alarmas audiovisuales",
                "description" => "Revise que las alarmas audiovisuales se encuentren en buen estado, que no presente golpes, grietas y/o deformaciónes.",
                "type_id" => 4,
            ],
            [
                "name" => "Mantenimiento al AMA",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Retire manguera y pasador",
                "description" => "Desconecte la manguera de actuación de 1/4” del Actuador Manual/Automático. Retire el pasador de seguridad.",
                "type_id" => 4,
                "father_id" => 350,
            ],
            [
                "name" => "Verifique el PAD",
                "description" => "Retire la guarda protectora del PAD y desconéctelo. Desenrosque la parte superior del actuador retire cuidosamente el PAD. Verifique la fecha de fabricación del PAD, reemplace si es mayor a 5 años. ",
                "type_id" => 4,
                "father_id" => 350,
                "funct" => 1,
            ],
            [
                "name" => "Desarme el AMA",
                "description" => "Remueva el Actuador Manual/Automático de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador.",
                "type_id" => 4,
                "father_id" => 350,
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire los o-rings de la rosca superior del actuador, del vástago, y de la parte inferior del Actuador Manual/Automático. Verifique que se encuentran en buen estado, en caso contrario cámbielo por uno nuevo. Limpie y lubrique los o-rings con grasa siliconada. Instalelos nuevamente.",
                "type_id" => 4,
                "father_id" => 350,
            ],
            [
                "name" => "Verique roscas",
                "description" => "Limpie la parte interna del cuerpo del Actuador Manual/Automático. Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 4,
                "father_id" => 350,
            ],
            [
                "name" => "Arme el AMA",
                "description" => "Instale el cuerpo del Actuador Manual/Automático en el soporte y apriételo usando la contra tuerca de la parte inferior. Inserte el pasador.Conecte el PAD al cable conector del PAD proveniente del Módulo CHECKFIRE SC-N. Instale el sello visual de inspección o precinto de seguridad. Conecte la manguera de actuación de 1/4”.",
                "type_id" => 4,
                "father_id" => 350,
            ],
            [
                "name" => "Revise Cable Térmico",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Revise estado de Cable Térmico",
                "description" => "Revise que el cable térmico se encuentra en buen estado, que no presente desgaste, cortes y/o deformaciones. ",
                "type_id" => 4,
                "father_id" => 357,
                "funct" => 1,
            ],
            [
                "name" => "Verifique sujeción Cable Térmico",
                "description" => "Verifique que le Cable Térmico se encuentra debidamente sujetado. Verifique que el cable térmico no presente pérdida o deterioro de la cubierta protectora de color rojo. Verifique que el espaciamiento de los puntos de sujeción sea el adecuado (como máximo cada 30 a 45 cms) y que cuenten con su protector de caucho Rubber y/o abrazaderas con recubrimiento de caucho.",
                "type_id" => 4,
                "father_id" => 357,
            ],
            [
                "name" => "Distancia de separación Cable Térmico",
                "description" => "Revise que la distancia de separación entre el cable térmico y cualquier superficie súper caliente (exhostos, turbos, otros) sea como mínimo 30 cm.",
                "type_id" => 4,
                "father_id" => 357,
            ],
            [
                "name" => "Mtto sistema Triple IR ",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Revise Interfaz Triple IR",
                "description" => "Verifique que la Interfaz Triple IR se encuentra en buen estado, que no presente golpes, grietas y/o deformaciónes. Retire la tapa frontal de la Interfaz Triple IR y verifique que las conexiones internas se encuentran bien ajustadas.",
                "type_id" => 4,
                "father_id" => 361,
            ],
            [
                "name" => "Desconecte y limpie conexiones Triple IR",
                "description" => "Desconecte todas las conexiones del sistema Triple IR y verifique que no presenten suciedad, humedad y/o corrosión al interior de las conexiones. En caso de presentar suciedad, limpie con limpiador de contactos eléctrico y aplique nuevamente grasa dieléctrica a las conexiones. Si algún componente presenta corrosión, cámbielo por uno nuevo.  ",
                "type_id" => 4,
                "father_id" => 361,
            ],
            [
                "name" => "Limpie detectores Triple IR",
                "description" => "Limpie el lente de visión de los Detectores Tripe IR con un trapo húmedo. Nota: No utilice agua a alta presión.",
                "type_id" => 4,
                "father_id" => 361,
            ],
            [
                "name" => "Conecte y verifique Triple IR",
                "description" => "Conecte nuevamente todas las conexiones del sistema Triple IR. Una vez conectados, cada detector realizará automáticamente una prueba BIT interna (30 segundos en LED amarillo). Espere a que todos los detectores se establezcan en modo NORMAL de operación (LED alumbrando color verde). Si algún detector permanece con el LED en amarillo notifique a su Supervisor para evaluar el motivo de la alarma. Realice inmediatamente el correctivo requerido.  ",
                "type_id" => 4,
                "father_id" => 361,
            ],
            [
                "name" => "Prueba funcionamiento SC-N",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Realice prueba de funcionamiento al SC-N",
                "description" => "1. Desconecte el PAD. 2. Conecte el Módulo de prueba (P/N ) al cable conector del PAD. 3. Encienda el Módulo de prueba.  4. Posicione el interruptor en la posición “SQUIB”. 5. Resetee el Módulo de prueba y el SC-N. 6. Mediante un destornillador o un alambre de acero genere un puente entre los alambres del Cable Térmico.",
                "type_id" => 4,
                "father_id" => 366,
            ],
            [
                "name" => "Verificar primer tiempo de retardo",
                "description" => "Verifique durante la prueba el primer tiempo de retardo, este debe ser díez (10) segundos. Anote el tiempo.",
                "type_id" => 4,
                "father_id" => 366,
                "funct" => 1,
            ],
            [
                "name" => "Verificar segundo tiempo de retardo",
                "description" => "Verifique durante la prueba el segundo tiempo de retardo, este debe ser díez (10)  segundos. Anote el tiempo.",
                "type_id" => 4,
                "father_id" => 366,
                "funct" => 1,
            ],
            [
                "name" => "Conecte el PAD",
                "description" => "Desconecte el Módulo de Prueba y vuelva a conectar el PAD.",
                "type_id" => 4,
                "father_id" => 366,
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos).",
                "type_id" => 4,
                "father_id" => 366,
            ],
            [
                "name" => "Mantenimiento de Tanques",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Revise estado de tanques",
                "description" => "Revise que los cilindros de QS/LVS y sus soportes se encuentren en buen estado, que no presente golpes, corrosión y/o deformación.",
                "type_id" => 4,
                "father_id" => 372,
            ],
            [
                "name" => "Verifique PH de Tanques de QS/LVS",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de los tanques de QS/LVS, esta no debe ser superior a 12 años.",
                "type_id" => 4,
                "father_id" => 372,
                "funct" => 1,
            ],
            [
                "name" => "Revise indicador de descarga",
                "description" => "Revise que el indicador de descarga ubicado en la tapa de los tanques LT-A-101-125/250 y LVS-15/30 se encuentre hacia adentro.",
                "type_id" => 4,
                "father_id" => 372,
            ],
            [
                "name" => "Revise estado empaques ",
                "description" => "Revise que las roscas de las tapas de los tanques y los empaques se encuentren en buen estado. Lubrique los empaques con grasa siliconada.",
                "type_id" => 4,
                "father_id" => 372,
            ],
            [
                "name" => "Revise estado roscas",
                "description" => "Revise que el estado de las roscas de los tanques y las tapas se encuentren en buen estado, que no presenten desgaste en sus hilos.",
                "type_id" => 4,
                "father_id" => 372,
            ],
            [
                "name" => "Verifique estado QS ",
                "description" => "Verifique que el QS al interior de cada tanque se encuentre en buen estado (fluido y sin presencia de grumos), a través de la tapa y del disco de ruptura.",
                "type_id" => 4,
                "father_id" => 372,
            ],
            [
                "name" => "Verifique altura QS",
                "description" => "Verifique que la altura entre el QS y la parte superior de la rosca del tanque no exceda el límite.",
                "type_id" => 4,
                "father_id" => 372,
                "funct" => 1,
            ],
            [
                "name" => "Verifique estado LVS ",
                "description" => "Verifique que el LVS al interior de cada tanque se encuentre en buen estado (fluido, limpio y de color blancuzco). ",
                "type_id" => 4,
                "father_id" => 372,
            ],
            [
                "name" => "Verifique altura LVS",
                "description" => "Verifique que la altura entre el LVS y la parte superior de la rosca del tanque no exceda el límite.",
                "type_id" => 4,
                "father_id" => 372,
                "funct" => 1,
            ],
            [
                "name" => "Verificar estado discos/niples de ruptura",
                "description" => "Verifique que los discos de ruptura o niples de ruptura se encuentre en buen estado. Revise la unión universal.",
                "type_id" => 4,
                "father_id" => 372,
            ],
            
            [
                "name" => "Mangueras presurización 1/4",
                "description" => "Revise que las mangueras de presurización de 1/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => 4,
            ],
            [
                "name" => "Pruebe mangueras pres. 1/4",
                "description" => "Pruebe las mangueras de presurización de 1/4” mediante soplado o instalándolas en la línea de actuación principal.",
                "type_id" => 4,
            ],
            [
                "name" => "Mangueras actuación 1/4",
                "description" => "Revise que las mangueras de actuación de 1/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => 4,
            ],
            [
                "name" => "Mangueras distribución 3/4",
                "description" => "Revise que las mangueras de distribución de 3/4” y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => 4,
            ],
            [
                "name" => "Mangueras descarga 1/2",
                "description" => "Revise que las mangueras de descarga de 1/2 y sus acoples se encuentren en buen estado, que no tenga deterioro, deformación y/o desgaste. Verifique las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.",
                "type_id" => 4,
            ],
            [
                "name" => "Realice barrido",
                "description" => "Realice barrido con nitrógeno o aire seco. Verifique que las boquillas no estén tapadas, estén correctamente orientadas y que no existan fugas en la red.",
                "type_id" => 4,
            ],
            [
                "name" => "Instale tapaboquillas ",
                "description" => "Instale todas las tapaboquillas. Cambie las que se encuentren deterioradas. Boquillas QS: tapaboquillas rojas. Boquillas LVS: tapaboquillas azules.",
                "type_id" => 4,
            ],
            [
                "name" => "Mantenimiento AEN´s",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Retire manguera",
                "description" => "Desconecte las mangueras de actuación y presurización de 1/4” del Actuador Eléctrico-Neumático.",
                "type_id" => 4,
                "father_id" => 390,
            ],
            [
                "name" => "Remueva AEN",
                "description" => "Remueva el Actuador  Eléctrico-Neumático de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador.",
                "type_id" => 4,
                "father_id" => 390,
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire el o-ring del percutor y de la parte inferior del actuador. Verifique que se encuentra en buen estado, en caso contrario cámbielo por uno nuevo. Limpie y lubrique el o-ring con grasa siliconada. Instale nuevamente el o-ring.",
                "type_id" => 4,
                "father_id" => 390,
            ],
            [
                "name" => "Verifique roscas",
                "description" => "Limpie la parte interna del cuerpo del actuador.Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 4,
                "father_id" => 390,
            ],
            [
                "name" => "Arme el AEN",
                "description" => "Instale el cuerpo del Actuador Neumático en el soporte y apriételo usando la contra tuerca. Conecte la manguera de actuación al 1/4”.",
                "type_id" => 4,
                "father_id" => 390,
            ],
            [
                "name" => "Mtto AEN´s del Booster",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Retire manguera",
                "description" => "Desconecte la manguera de actuación de 1/4” del Actuador Eeléctrico-Neumático.",
                "type_id" => 4,
                "father_id" => 396,
            ],
            [
                "name" => "Remueva AEN",
                "description" => "Remueva el Actuador Eléctrico-Neumático de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador.",
                "type_id" => 4,
                "father_id" => 396,
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire los o-rings del percutor y de la parte inferior del Actuador Eléctrico-Neumático. Verifique que se encuentran en buen estado, en caso contrario cámbielos por uno nuevo. Limpie y lubrique los o-rings con grasa siliconada. Instale nuevamente los o-rings.",
                "type_id" => 4,
                "father_id" => 396,
            ],
            [
                "name" => "Verifique roscas",
                "description" => "Limpie la parte interna del cuerpo del Actuador Eléctrico-Neumático. Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 4,
                "father_id" => 396,
            ],
            [
                "name" => "Arme el AEN",
                "description" => "Instale el cuerpo del Actuador Eléctrico-Neumático en el soporte y apriételo usando la contra tuerca. Conecte la manguera de actuación de 1/4” al Actuador Eléctrico-Neumático",
                "type_id" => 4,
                "father_id" => 396,
            ],
            [
                "name" => "Mantenimiento a los AMR",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Retire manguera",
                "description" => "Desconecte la manguera de actuación de 1/4” del Actuador Manual Remoto. Retire el pasador de seguridad.",
                "type_id" => 4,
                "father_id" => 402,
            ],
            [
                "name" => "Remueva AMR",
                "description" => "Remueva el Actuador Manual Remoto de su soporte. Retire el resorte y percutor del interior del cuerpo del Actuador Manual Remoto.",
                "type_id" => 4,
                "father_id" => 402,
            ],
            [
                "name" => "Verifique o-rings",
                "description" => "Retire los o-rings del percutor y de la parte inferior del Actuador Manual Remoto. Verifique que se encuentran en buen estado, en caso contrario cámbielos por uno nuevo. Limpie y lubrique los o-rings con grasa siliconada. Instale nuevamente los o-rings.",
                "type_id" => 4,
                "father_id" => 402,
            ],
            [
                "name" => "Verifique roscas",
                "description" => "Limpie la parte interna del cuerpo del Actuador Manual Remoto. Revise que las roscas tanto internas como externas del cuerpo del actuador se encuentran en buen estado, en caso contrario cámbielo por uno nuevo.",
                "type_id" => 4,
                "father_id" => 402,
            ],
            [
                "name" => "Arme el AMR",
                "description" => "Instale el cuerpo del Actuador Manual Remoto en el soporte y apriételo usando la contra tuerca de la parte inferior. Inserte el pasador. Instale el sello visual de inspección o precinto de seguridad. Conecte la manguera de actuación de 1/4” al Actuador Manual Remoto.",
                "type_id" => 4,
                "father_id" => 402,
            ],
            [
                "name" => "Verifique Shutdown",
                "description" => "Verifique que el Interruptor de presión (Shutdown), las mangueras y sus acoples se encuentren en buen estado, y las conexiones apretadas.",
                "type_id" => 4,
            ],
            [
                "name" => "Revisar válvula de alivio",
                "description" => "Revise que la válvula de alivio se encuentra en buen estado.",
                "type_id" => 4,
            ],
            [
                "name" => "Verifique los cheques",
                "description" => "Verifique el flujo correcto de los cheques. Debe ir en dirección de la actuación.  La flecha debe ser visible. En caso contrario reemplácelo por una nuevo",
                "type_id" => 4,
            ],
            [
                "name" => "Prueba de Actuación AMA",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Instale una cápsula en el actuador Booster ",
                "description" => "Instale una cápsula de barrido LT-A-101-30 nueva/recargada en el actuador Booster para la ejecución de la prueba de actuación.",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Presurice la línea de actuación",
                "description" => "Presurice la línea de actuación mediante la actuación de una cápsula LT-10-R nueva/recargada en el Actuador Manual/Automático o mediante la conexión de una línea de aire seco o un cilindro de nitrógeno con regulador.",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Verifique que los percutores de los AEN´s descendieron.",
                "description" => "Verifique que los percutores de los Actuadores Eléctrico-Neumáticos descendieron completamente, y se mantengan abajo.",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Verifique que el percutor del AEN del Booster descendió.",
                "description" => "Verifique que el percutor del Actuador Eléctrico-Neumático del Booster descendió completamente, y se mantenga abajo.",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio principal",
                "description" => "Verifique que se haya activado la válvula de alivio del sistema.",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio del Booster",
                "description" => "Verifique que se haya activado la válvula de alivio del Booster.",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Verifique funcionamiento correcto de los cheques",
                "description" => "Verifique el correcto funcionamiento de los cheques. Esto se cumple cuando ocurre lo siguiente: - Los percutores se mantengan hacia abajo. - Se haya activado la válvula de alivio. - No se evidencien alivios de presión por algunas de las líneas de actuación. ",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Alivie la presión en la línea de actuación",
                "description" => "Hale la argolla de la válvula de alivio para aliviar la presión remanente el la línea de actuación",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Verifique activación Shutdown",
                "description" => "Verifique la activación del Interruptor de presión (Shutdown) y que el equipo se haya apagado. ",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Restablezca Shutdown",
                "description" => "Restablezca el Interruptor de presión (Shutdown). Presionando el botón rojo.",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Retire cápsula actuación descargada",
                "description" => "Retire las cápsulas de Actuación LT-10-R de prueba descargada.",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Retire cápsula Booster descargada",
                "description" => "Retire la cápsula de Barrido LT-A-101-30 de prueba del Booster descargada.",
                "type_id" => 4,
                "father_id" => 411,
            ],
            [
                "name" => "Prueba de Actuación AMR",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Instale una cápsula en el actuador Booster ",
                "description" => "Instale una cápsula de barrido LT-A-101-30 nueva/recargada en el actuador Booster para la ejecución de la prueba de actuación.",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Presurice la línea de actuación",
                "description" => "Presurice la línea de actuación mediante la actuación de una cápsula LT-10-R nueva/recargada en el Actuador Manual Remoto o mediante la conexión de una línea de aire seco o un cilindro de nitrógeno con regulador.",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Verifique que los percutores de los AEN´s descendieron.",
                "description" => "Verifique que los percutores de los Actuadores Eléctrico-Neumáticos descendieron completamente, y se mantengan abajo.",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Verifique que el percutor del AEN del Booster descendió.",
                "description" => "Verifique que el percutor del Actuador Eléctrico-Neumático del Booster descendió completamente, y se mantenga abajo.",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio principal",
                "description" => "Verifique que se haya activado la válvula de alivio del sistema.",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Verifique la activación de la válvula de alivio del Booster",
                "description" => "Verifique que se haya activado la válvula de alivio del Booster.",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Verifique funcionamiento correcto de los cheques",
                "description" => "Verifique el correcto funcionamiento de los cheques. Esto se cumple cuando ocurre lo siguiente: - Los percutores se mantengan hacia abajo. - Se haya activado la válvula de alivio. - No se evidencien alivios de presión por algunas de las líneas de actuación. ",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Alivie la presión en la línea de actuación",
                "description" => "Hale la argolla de la válvula de alivio para aliviar la presión remanente el la línea de actuación",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Verifique activación Shutdown",
                "description" => "Verifique la activación del Interruptor de presión (Shutdown) y que el equipo se haya apagado. ",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Restablezca Shutdown",
                "description" => "Restablezca el Interruptor de presión (Shutdown). Presionando el botón rojo.",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Retire cápsula actuación descargada",
                "description" => "Retire las cápsulas de Actuación LT-10-R de prueba descargada.",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Retire cápsula Booster descargada",
                "description" => "Retire la cápsula de Barrido LT-A-101-30 de prueba del Booster descargada.",
                "type_id" => 4,
                "father_id" => 424,
            ],
            [
                "name" => "Mtto Cápsulas de Barrido",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Revise estado de cápsulas de barrido ",
                "description" => "Revise que la cápsula de barrido se encuentre en buen estado, esta no debe presentar golpes, corrosión y/o deformaciones.",
                "type_id" => 4,
                "father_id" => 437,
                "funct" => 1,
            ],
            [
                "name" => "Verifique PH de Cápsulas de Barrido",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de las cápsulas de barrido y anótela.  - Para Cápsula de Barrido LT-A-101-30: 12 años. - Para Cápsula de Barrido 55Cu Ft/ 23 Cu Ft: 5 años. En caso que tenga una estrella son 10 años.",
                "type_id" => 4,
                "father_id" => 437,
                "funct" => 1,
            ],
            [
                "name" => "Verifique peso cápsulas de barrido",
                "description" => "Verifique el peso de las cápsulas de barrido  LT-A-101-30 sin tapa, que no exceda ± 14 gr del peso estampado de la cápsula. Anote el peso real en las casillas.",
                "type_id" => 4,
                "father_id" => 437,
                "funct" => 1,
            ],
            [
                "name" => "Verifique presión cápsulas de barrido",
                "description" => "Verifique que la presión que se visualiza en el manómetro de las cápsulas estén dentro del rango 1800 - 2300 psi. Anote la presión en las casillas.",
                "type_id" => 4,
                "father_id" => 437,
                "funct" => 1,
            ],
            [
                "name" => "Mtto Cápsula del Booster",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Revise estado de cápsula Booster",
                "description" => "Revise que la cápsula de barrido se encuentre en buen estado, esta no debe presentar golpes, corrosión y/o deformaciones.",
                "type_id" => 4,
                "father_id" => 442,
                "funct" => 1,
            ],
            [
                "name" => "Verifique PH de cápsula Booster",
                "description" => "Verifique la fecha de fabricación o última prueba hidrostática de la cápsula de barrido, esta no debe ser superior a 12 años.",
                "type_id" => 4,
                "father_id" => 442,
                "funct" => 1,
            ],
            [
                "name" => "Verifique peso cápsula Booster",
                "description" => "Verifique el peso de la cápsula del Booster sin tapa, que no exceda ± 14 gr del peso estampado de la cápsula. Anote el peso real en la casilla.",
                "type_id" => 4,
                "father_id" => 442,
                "funct" => 1,
            ],
            [
                "name" => "Mtto Cápsulas de Actuación",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Revise estado de cápsulas de actuación",
                "description" => "Revise que las cápsulas de actuación se encuentre en buen estado, que no presentan golpes, corrosión y/o deformaciones.",
                "type_id" => 4,
                "father_id" => 446,
                "funct" => 1,
            ],
            [
                "name" => "Verifique peso cápsulas de actuación",
                "description" => "Verifique el peso de las cápsulas de actuación LT-10-R sin tapa, del AMA y de los AMR, que no excedan ± 7 gr del peso estampado de las cápsulas. Anote el peso real en las casillas.",
                "type_id" => 4,
                "father_id" => 446,
                "funct" => 1,
            ],
            [
                "name" => "Verifique peso cápsulas de actuación",
                "description" => "Verifique que el percutor del Actuador Eléctrico-Neumático del Booster se encuentre completamente hacia adentro.",
                "type_id" => 4,
            ],
            [
                "name" => "Verifique peso cápsulas de actuación",
                "description" => "Instale la cápsula LT-A-101-30 en el Actuador Eléctrico-Neumático del Booster.",
                "type_id" => 4,
            ],
            [
                "name" => "Verifique peso cápsulas de actuación",
                "description" => "Verifique que los percutores de todos los Actuador Eléctrico-Neumático se encuentren completamente hacia adentro. ",
                "type_id" => 4,
            ],
            [
                "name" => "Verifique peso cápsulas de actuación",
                "description" => "Instale las cápsulas de barrido LT-A-101-30, 23 CU.FT. y 55 CU.FT. en los Actuador Eléctrico-Neumático.",
                "type_id" => 4,
            ],
            [
                "name" => "Verifique AMR´s",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Verifique percutores AMR´s",
                "description" => "Verifique que los percutores de los actuadores remotos se encuentren completamente hacia adentro. ",
                "type_id" => 4,
                "father_id" => 453,
            ],
            [
                "name" => "Instale pasador y sello visual",
                "description" => "Instale correctamente los pasadores de seguridad y sellos visuales de inspección.",
                "type_id" => 4,
                "father_id" => 453,
            ],
            [
                "name" => "Instale cápsulas AMR´s",
                "description" => "Instale las cápsulas LT-10-R en los AMR´s. ",
                "type_id" => 4,
                "funct" => 1,
            ],
            [
                "name" => "Verifique AMA",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Verifique percutor AMA",
                "description" => "Verifique que el percutor del actuador manual/automático se encuentre completamente hacia adentro. ",
                "type_id" => 4,
                "father_id" => 457,
            ],
            [
                "name" => "Instale pasador y sello visual",
                "description" => "Instale correctamente el pasador de seguridad y sello visual de inspección.",
                "type_id" => 4,
                "father_id" => 457,
            ],
            [
                "name" => "Instale cápsula AMA",
                "description" => "Instale la cápsula LT-10-R en el AMA. ",
                "type_id" => 4,
                "funct" => 1,
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos).",
                "type_id" => 4,
            ],
            [
                "name" => "Inspección del Extintor",
                "description" => "tiene hijo",
                "type_id" => 4,
                "father" => 1,
            ],
            [
                "name" => "Estado general",
                "description" => "Revise que los extintores se encuentren en buen estado, que no presente golpes, corrosión y/o deformación.",
                "type_id" => 4,
                "father_id" => 462,
            ],
            [
                "name" => "No Consecutivo",
                "description" => "Anote el número de consecutivo de los extintores",
                "type_id" => 4,
                "father_id" => 462,
                "funct" => 1,
            ],
            [
                "name" => "Fecha de Mantenimiento",
                "description" => "Verifique la fecha del último Mantenimiento de los extintores en su collar de verificación, si se encuentra vencido reemplácelo por uno nuevo o recargado.",
                "type_id" => 4,
                "father_id" => 462,
                "funct" => 1,
            ],
            [
                "name" => "Sello visual o precinto",
                "description" => "Verifique que el sello visual de inspección o precinto se encuentra en buen estado.",
                "type_id" => 4,
                "father_id" => 462,
            ],
            [
                "name" => "Indicador de descarga",
                "description" => "Revise que el indicador de descarga (testigo) ubicado en la tapa del extintor se encuentre hacia adentro.",
                "type_id" => 4,
                "father_id" => 462,
            ],
            [
                "name" => "Agite el extintor",
                "description" => "Agite los extintores para verificar que esté lleno y la cápsula en su lugar.",
                "type_id" => 4,
                "father_id" => 462,
            ],
            [
                "name" => "Revise manguera",
                "description" => "Revise que las mangueras de descarga y sus acoples se encuentren en buen estado, que no presenten deterioro, deformación y/o desgaste. Verifique que las conexiones se encuentran apretadas y no tengan golpes, deformación y/o corrosión.   ",
                "type_id" => 4,
                "father_id" => 462,
            ],
            [
                "name" => "Revise boquilla",
                "description" => "Verifique que la boquilla no esté tapada y no presente obstrucción.",
                "type_id" => 4,
                "father_id" => 462,
            ],
            [
                "name" => "Revise soporte del extintor",
                "description" => "Revise que el soporte del extintor se encuentren en buen estado, que no presente golpes, corrosión y/o deformación. ",
                "type_id" => 4,
                "father_id" => 462,
            ],
            [
                "name" => "Seleccione Emergencia",
                "description" => "Seleccione la emergencia correspondiente del siguiente listado: 1 . Alarma BATTERY. 2. Alarma DETECTION. 3. Alarma RELEASE. 4. AMA sin pasador o precinto. 5. AMR sin pasador o precinto. 6. Falso reporte. 7. Extintor descargado. 8. No presenta extintor. 9. AMA sin cápsula. 10. AMR sin cápsula. 11. Módulo SC-N desajustado. 12.Tanque desajustado. 13. Manguera de actuación desajustada. 14. Cápsula de Barrido desajustada. 15. Cápsula de Actuación desajustada. 16. Otra.",
                "type_id" => 5,
            ],
            [
                "name" => "Módulo SC-N",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "Batería ",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "PAD",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "Cable Térmico",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "Tanques de QS/LVS",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "Cápsulas de barrido ",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "Cápsula del Booster",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "Cápsula AMA",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "Cápsula AMR",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "Extintor",
                "description" => "",
                "type_id" => 5,
                "funct" => 1,
            ],
            [
                "name" => "RESET del SC-N",
                "description" => "Presione por cinco (5) segundos el botón RESET del módulo CHECKFIRE SC-N . Verifique que el módulo esté en modo normal de operación (LED verde POWER encendido o pulsando una vez cada tres (3) segundos).",
                "type_id" => 5,
                "funct" => 1,
            ],
        ];
        foreach ($list as $l) {
            ActivList::create($l);
        }
    }
}
