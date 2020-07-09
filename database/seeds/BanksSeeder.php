<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banks')->insert([
            'code' => '246',
            'name' => 'Banco ABC Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '75',
            'name' => 'Banco ABN AMRO S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '121',
            'name' => 'Banco Agibank S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '25',
            'name' => 'Banco Alfa S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '641',
            'name' => 'Banco Alvorada S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '65',
            'name' => 'Banco Andbank (Brasil) S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '96',
            'name' => 'Banco B3 S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '24',
            'name' => 'Banco BANDEPE S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '318',
            'name' => 'Banco BMG S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '752',
            'name' => 'Banco BNP Paribas Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '107',
            'name' => 'Banco BOCOM BBM S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '63',
            'name' => 'Banco Bradescard S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '36',
            'name' => 'Banco Bradesco BBI S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '204',
            'name' => 'Banco Bradesco Cartões S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '394',
            'name' => 'Banco Bradesco Financiamentos S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '237',
            'name' => 'Banco Bradesco S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '218',
            'name' => 'Banco BS2 S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '208',
            'name' => 'Banco BTG Pactual S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco C6 S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '473',
            'name' => 'Banco Caixa Geral - Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '40',
            'name' => 'Banco Cargill S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Caterpillar S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '739',
            'name' => 'Banco Cetelem S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '233',
            'name' => 'Banco Cifra S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '745',
            'name' => 'Banco Citibank S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco CNH Industrial Capital S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '756',
            'name' => 'Banco Cooperativo do Brasil S.A. - BANCOOB',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '748',
            'name' => 'Banco Cooperativo Sicredi S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '222',
            'name' => 'Banco Credit Agricole Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '505',
            'name' => 'Banco Credit Suisse (Brasil) S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco CSF S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '3',
            'name' => 'Banco da Amazônia S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '83',
            'name' => 'Banco da China Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '707',
            'name' => 'Banco Daycoval S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco de Lage Landen Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Digio S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '1',
            'name' => 'Banco do Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '47',
            'name' => 'Banco do Estado de Sergipe S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '37',
            'name' => 'Banco do Estado do Pará S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '41',
            'name' => 'Banco do Estado do Rio Grande do Sul S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '4',
            'name' => 'Banco do Nordeste do Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '265',
            'name' => 'Banco Fator S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '224',
            'name' => 'Banco Fibra S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '626',
            'name' => 'Banco Ficsa S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Fidis S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '94',
            'name' => 'Banco Finaxis S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Ford S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco GMAC S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '612',
            'name' => 'Banco Guanabara S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Honda S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco IBM S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '12',
            'name' => 'Banco Inbursa S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '604',
            'name' => 'Banco Industrial do Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '653',
            'name' => 'Banco Indusval S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '77',
            'name' => 'Banco Inter S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '249',
            'name' => 'Banco Investcred Unibanco S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '184',
            'name' => 'Banco Itaú BBA S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '29',
            'name' => 'Banco Itaú Consignado S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Itaú Veí­culos S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '479',
            'name' => 'Banco ItauBank S.A',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Itaucard S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '376',
            'name' => 'Banco J. P. Morgan S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '74',
            'name' => 'Banco J. Safra S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '217',
            'name' => 'Banco John Deere S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '600',
            'name' => 'Banco Luso Brasileiro S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '389',
            'name' => 'Banco Mercantil do Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '370',
            'name' => 'Banco Mizuho do Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '746',
            'name' => 'Banco Modal S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '456',
            'name' => 'Banco MUFG Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '169',
            'name' => 'Banco Olé Bonsucesso Consignado S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '212',
            'name' => 'Banco Original S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '623',
            'name' => 'Banco PAN S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '611',
            'name' => 'Banco Paulista S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '643',
            'name' => 'Banco Pine S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '747',
            'name' => 'Banco Rabobank International Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco RCI Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '633',
            'name' => 'Banco Rendimento S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '120',
            'name' => 'Banco Rodobens S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '422',
            'name' => 'Banco Safra S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '33',
            'name' => 'Banco Santander  (Brasil)  S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '743',
            'name' => 'Banco Semear S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '630',
            'name' => 'Banco Smartbank S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '366',
            'name' => 'Banco Société Générale Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '464',
            'name' => 'Banco Sumitomo Mitsui Brasileiro S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '82',
            'name' => 'Banco Topázio S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Toyota do Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '634',
            'name' => 'Banco Triângulo S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Volvo Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '655',
            'name' => 'Banco Votorantim S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '610',
            'name' => 'Banco VR S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '119',
            'name' => 'Banco Western Union do Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '102',
            'name' => 'Banco XP S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Banco Yamaha Motor do Brasil S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '81',
            'name' => 'BancoSeguro S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '21',
            'name' => 'BANESTES S.A. Banco do Estado do Espí­rito Santo',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '755',
            'name' => 'Bank of America Merrill Lynch Banco Múltiplo S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '250',
            'name' => 'BCV - Banco de Crédito e Varejo S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '144',
            'name' => 'BEXS Banco de Câmbio S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '17',
            'name' => 'BNY Mellon Banco S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '70',
            'name' => 'BRB - Banco de Brasí­lia S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '104',
            'name' => 'Caixa Econômica Federal',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '320',
            'name' => 'China Construction Bank (Brasil) Banco Múltiplo S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '477',
            'name' => 'Citibank N.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '487',
            'name' => 'Deutsche Bank S.A. - Banco Alemão',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '64',
            'name' => 'Goldman Sachs do Brasil Banco Múltiplo S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '62',
            'name' => 'Hipercard Banco Múltiplo S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '269',
            'name' => 'HSBC Brasil S.A. - Banco de Investimento',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '492',
            'name' => 'ING Bank N.V.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '652',
            'name' => 'Itaú Unibanco Holding S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '341',
            'name' => 'Itaú Unibanco S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '488',
            'name' => 'JPMorgan Chase Bank, National Association',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '399',
            'name' => 'Kirton Bank S.A. - Banco Múltiplo',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '128',
            'name' => 'MS Bank S.A. Banco de Câmbio',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '254',
            'name' => 'Paraná Banco S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '125',
            'name' => 'Plural S.A. - Banco Múltiplo',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'name' => 'Scania Banco S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '751',
            'name' => 'Scotiabank Brasil S.A. Banco Múltiplo',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '95',
            'name' => 'Travelex Banco de Câmbio S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('banks')->insert([
            'code' => '129',
            'name' => 'UBS Brasil Banco de Investimento S.A.',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

    }
}
