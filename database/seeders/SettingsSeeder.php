<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_list = [
            0 => [
                'id' => 'P',
                'title' => 'Percentage'
            ],
            1 => [
                'id' => 'F',
                'title' => 'Fixed'
            ]
        ];

        //
        DB::insert(
            "INSERT INTO `settings` (`user_id`, `code`, `key`, `value`, `json`, `created_at`, `updated_at`) VALUES
              (0, 'action', 'type_list', '" . collect($type_list)->toJson() . "', 1, NOW(), NOW()),
              (0, 'payment', 'list.cod', '[{\"title\":\"Gotovinom prilikom pouzeća\",\"code\":\"cod\",\"min\":\"10\",\"data\":{\"price\":\"5\",\"short_description\":\"Plačanje gotovinom prilikom preuzimanja.\",\"description\":null},\"geo_zone\":\"1\",\"status\":true,\"sort_order\":\"2\"}]', 1, NOW(), NOW()),
              (0, 'payment', 'list.bank', '[{\"title\":\"Opčom uplatnicom \\/ Virmanom \\/ Internet bankarstvom\",\"code\":\"bank\",\"min\":null,\"data\":{\"price\":\"0\",\"short_description\":\"Uplatite direktno na na\\u0161 bankovni ra\\u010dun. Uputstva i uplatnice će vam stići putem maila.\",\"description\":null},\"geo_zone\":null,\"status\":true,\"sort_order\":\"1\"}]', 1, NOW(), NOW()),
              (0, 'payment', 'list.wspay', '[{\"title\":\"WSPay\",\"code\":\"wspay\",\"min\":null,\"data\":{\"price\":\"0\",\"short_description\":\"WSPay sustav za internet autorizaciju i naplatu kreditnih i debitnih kartica.\",\"description\":null,\"shop_id\":\"AGMEFRMTST\",\"secret_key\":\"2770f6a0a56c4V\",\"type\":\"1\",\"callback\":\"http:\\/\\/antikvarijat.agm\\/narudzba\",\"test\":\"1\"},\"geo_zone\":null,\"status\":false,\"sort_order\":\"0\"}]', 1, NOW(), NOW()),
              (0, 'payment', 'list.pickup', '[{\"title\":\"Platite prilikom preuzimanja\",\"code\":\"pickup\",\"min\":null,\"data\":{\"price\":\"0\",\"short_description\":\"Platiti možete gotovinom ili karticama na POS uređajima\",\"description\":null},\"geo_zone\":\"1\",\"status\":true,\"sort_order\":\"0\"}]', 1, NOW(), NOW()),
              (0, 'currency', 'list', '[{\"id\":1,\"title\":\"Hrvatska kuna\",\"code\":\"HRK\",\"status\":true,\"main\":true,\"symbol_left\":null,\"symbol_right\":\"kn\",\"value\":\"1\",\"decimal_places\":\"2\"},{\"id\":2,\"title\":\"Euro\",\"code\":\"EUR\",\"status\":false,\"main\":false,\"symbol_left\":\"\\u20ac\",\"symbol_right\":null,\"value\":\"0.13272280\",\"decimal_places\":\"2\"}]', 1, NOW(), NOW()),
              (0, 'language', 'list', '[{\"id\":1,\"title\":{\"hr\":\"Hrvatski\",\"en\":\"Croatian\"},\"code\":\"hr\",\"status\":true,\"main\":false},{\"id\":2,\"title\":{\"hr\":\"Engleski\",\"en\":\"English\"},\"code\":\"en\",\"status\":true,\"main\":false}]', 1, NOW(), NOW()),
              (0, 'order', 'statuses', '[{\"id\":1,\"title\":\"Novo\",\"sort_order\":\"0\",\"color\":\"info\"},{\"id\":2,\"title\":\"Čeka uplatu\",\"sort_order\":\"1\",\"color\":\"warning\"},{\"id\":3,\"title\":\"Plaćeno\",\"sort_order\":\"3\",\"color\":\"success\"},{\"id\":4,\"title\":\"Poslano\",\"sort_order\":\"4\",\"color\":\"secondary\"},{\"id\":5,\"title\":\"Otkazano\",\"sort_order\":\"5\",\"color\":\"danger\"},{\"id\":6,\"title\":\"Vračeno\",\"sort_order\":\"6\",\"color\":\"dark\"},{\"id\":7,\"title\":\"Odbijeno\",\"sort_order\":\"2\",\"color\":\"danger\"},{\"id\":8,\"title\":\"Nedovršena\",\"sort_order\":\"7\",\"color\":\"light\"}]', 1, NOW(), NOW()),
              (0, 'tax', 'list', '{\"1\":{\"id\":1,\"geo_zone\":\"1\",\"title\":\"PDV 25%\",\"rate\":\"25\",\"sort_order\":\"0\",\"status\":true}}', 1, NOW(), NOW()),
              (0, 'geo_zone', 'list', '{\"0\":{\"status\":true,\"title\":\"Hrvatska\",\"description\":null,\"state\":{\"2\":\"Croatia\"},\"id\":1},\"2\":{\"title\":\"World\",\"description\":null,\"id\":3,\"status\":true,\"state\":[]}}', 1, NOW(), NOW())"
        );
    }
}
