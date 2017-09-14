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

            //Austria
            ['id' => "at-gbr", "short_name" => "GBR", "country_id" => "at"],    //   "Gesellschaft bürgerlichen Rechts (non-trading partnership)"
            ['id' => "at-og", "short_name" => "OG", "country_id" => "at"],      //   "Offene Gesellschaft (OG) (general partnership)"
            ['id' => "at-kg", "short_name" => "KG", "country_id" => "at"],      //   "Kommanditgesellschaft (KG) (limited partnership)"
            ['id' => "at-sg", "short_name" => "SG", "country_id" => "at"],      //   "Stille Gesellschaft (silent partnership)"
            ['id' => "at-ag", "short_name" => "AG", "country_id" => "at"],      //   "Aktiengesellschaft (AG) (public limited company)"
            ['id' => "at-gmbh", "short_name" => "GmbH", "country_id" => "at"],  //   "Gesellschaft mit beschränkter Haftung (GmbH) (limited liability company)"
            ['id' => "at-ew", "short_name" => "EW", "country_id" => "at"],      //   "Erwerbs- und Wirtschaftsgenossenschaft (cooperative and industrial and provident society)"
            ['id' => "at-v", "short_name" => "V", "country_id" => "at"],        //   "Verein (association)"
            ['id' => "at-se", "short_name" => "SE", "country_id" => "at"],      //   "European Public Company (Societas Europaea - SE)"
            ['id' => "at-eeig", "short_name" => "EEIG", "country_id" => "at"],  //   "European Economic Interest Grouping (EEIG)"

            //Belgium
            ["id" => "be-sprl-bvba", "short_name" => "SPRL/BVBA", "country_id" => "be"],         //Private limited company (SPRL/BVBA);
            ["id" => "be-sa-nv", "short_name" => "SA/NV", "country_id" => "be"],             //Public limited company (SA/NV);
            ["id" => "be-sc-scrl-cv-cvba", "short_name" => "SC/SCRL-CV/CVBA", "country_id" => "be"],   //Cooperative with limited liability (SC/SCRL-CV/CVBA);
            ["id" => "be-scri-cvoa", "short_name" => "SCRI/CVOA", "country_id" => "be"],         //Cooperative with unlimited liability (SCRI/CVOA);
            ["id" => "be-snc-vof", "short_name" => "SNC/VOF", "country_id" => "be"],           //General partnership (SNC/VOF);
            ["id" => "be-scs-gcv", "short_name" => "SCS/GCV", "country_id" => "be"],           //Limited partnership (SCS/GCV);
            ["id" => "be-sca-cva", "short_name" => "SCA/CVA", "country_id" => "be"],           //Partnership limited by shares (SCA/CVA);
            ["id" => "be-sp", "short_name" => "SP", "country_id" => "be"],                //Sole proprietorship;
            ["id" => "be-b", "short_name" => "B", "country_id" => "be"],                 //Branches and subsidiaries or representative office for foreign companies.

            // Czech Republic
            ["id" => "cz-sro", "short_name" => "s.r.o.", "country_id" => "cz"], // společnost s ručením omezeným - s.r.o.
            ["id" => "cz-as", "short_name" => "a.s.", "country_id" => "cz"], // akciová společnost - a.s.
            ["id" => "cz-vos", "short_name" => "v.o.s.", "country_id" => "cz"], // veřejná obchodní společnost - v.o.s.
            ["id" => "cz-p", "short_name" => "p", "country_id" => "cz"], // pobočka


            //TODO https://en.wikipedia.org/wiki/List_of_business_entities

        ];

        //TODO add translations
        foreach ($list as $item) {

            HCCompaniesTypes::updateOrCreate(['id' => $item['id'], 'country_id' => $item['country_id']], $item);
        }
    }
}