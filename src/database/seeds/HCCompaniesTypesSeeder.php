<?php

namespace interactivesolutions\honeycombcompanies\database\seeds;

use Illuminate\Database\Seeder;
use interactivesolutions\honeycombcompanies\app\models\hccompanies\HCCompaniesTypes;

class HCCompaniesTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        $list = [
            //Lithuania
            ['id' => 'lt-uab', 'short_name' => 'UAB', 'country_id' => 'lt'],
            ['id' => 'lt-ii', 'short_name' => 'IĮ', 'country_id' => 'lt'],
            ['id' => 'lt-vsi', 'short_name' => 'VŠĮ', 'country_id' => 'lt'],
            ['id' => 'lt-mb', 'short_name' => 'MB', 'country_id' => 'lt'],
            ['id' => 'lt-ab', 'short_name' => 'AB', 'country_id' => 'lt'],
            ['id' => 'lt-pa', 'short_name' => 'PA', 'country_id' => 'lt'],
            ['id' => 'lt-bi', 'short_name' => 'BĮ', 'country_id' => 'lt'],
            ['id' => 'lt-si', 'short_name' => 'SĮ', 'country_id' => 'lt'],
            ['id' => 'lt-other', 'short_name' => 'Other', 'country_id' => 'lt'],

            //Latvia
            ['id' => 'lv-sia', 'short_name' => 'SIA', 'country_id' => 'lv'],
            ['id' => 'lv-as', 'short_name' => 'AS', 'country_id' => 'lv'],
            ['id' => 'lv-other', 'short_name' => 'Other', 'country_id' => 'lv'],

            //Germany
            ['id' => 'de-gmbh', 'short_name' => 'GmbH', 'country_id' => 'de'],
            ['id' => 'de-ag', 'short_name' => 'AG', 'country_id' => 'de'],
            ['id' => 'de-ohg', 'short_name' => 'OHG', 'country_id' => 'de'],
            ['id' => 'de-kg', 'short_name' => 'KG', 'country_id' => 'de'],
            ['id' => 'de-gmbh-kg', 'short_name' => 'GmbH & Co. KG', 'country_id' => 'de'],
            ['id' => 'de-other', 'short_name' => 'Other', 'country_id' => 'de'],

            //Russia
            ['id' => 'ru-ooo', 'short_name' => 'OOO', 'country_id' => 'ru'],
            ['id' => 'ru-oao', 'short_name' => 'OAO', 'country_id' => 'ru'],
            ['id' => 'ru-zao', 'short_name' => 'ЗАО', 'country_id' => 'ru'],
            ['id' => 'ru-ip', 'short_name' => 'ИП', 'country_id' => 'ru'],
            ['id' => 'ru-other', 'short_name' => 'Other', 'country_id' => 'ru'],

            //WhiteRussia
            ['id' => 'by-ooo', 'short_name' => 'OOO', 'country_id' => 'by'],
            ['id' => 'by-oao', 'short_name' => 'OAO', 'country_id' => 'by'],
            ['id' => 'by-zao', 'short_name' => 'ЗАО', 'country_id' => 'by'],
            ['id' => 'by-ip', 'short_name' => 'ИП', 'country_id' => 'by'],
            ['id' => 'by-odo', 'short_name' => 'ОДО', 'country_id' => 'by'],
            ['id' => 'by-kt', 'short_name' => 'КТ', 'country_id' => 'by'],
            ['id' => 'by-pt', 'short_name' => 'ПТ', 'country_id' => 'by'],
            ['id' => 'by-pk', 'short_name' => 'ПК', 'country_id' => 'by'],
            ['id' => 'by-up', 'short_name' => 'УП', 'country_id' => 'by'],
            ['id' => 'by-kfk', 'short_name' => 'КФХ', 'country_id' => 'by'],
            ['id' => 'by-other', 'short_name' => 'Other', 'country_id' => 'by'],

            //Estland
            ['id' => 'ee-ou', 'short_name' => 'OÜ', 'country_id' => 'ee'],
            ['id' => 'ee-as', 'short_name' => 'AS', 'country_id' => 'ee'],
            ['id' => 'ee-uu', 'short_name' => 'TU', 'country_id' => 'ee'],
            ['id' => 'ee-tu', 'short_name' => 'UU', 'country_id' => 'ee'],
            ['id' => 'ee-fie', 'short_name' => 'FIE', 'country_id' => 'ee'],
            ['id' => 'ee-ou', 'short_name' => 'Other', 'country_id' => 'ee'],
        ];

        //TODO add translations
        foreach ($list as $item) {

            HCCompaniesTypes::updateOrCreate(['id' => $item['id'], 'country_id' => $item['country_id']], $item);
        }
    }
}