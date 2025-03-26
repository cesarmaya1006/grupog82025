<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaParametros extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('parametros')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        // ===================================================================================
        $datas = [
            ['logo' => 'logo.png','texto' => "Some 60 years ago, a number of elements converged and gave way to one of the most emblematic, significant, and representative industries for the Colombian agricultural sector.

A number of businessmen, who are also FRIENDS and share an all-encompassing vision, found in the Colombian flowers a business opportunity thanks to its great diversity, the country's privileged geographical location on the northern part of South America, the great variety of climates, the amount of sunlight, and the fertility of the Bogota savanna soil with vast natural water sources, all of these being unbeatable conditions for the production of excellent quality flowers.

As with every business, this industry's consolidation has brought significant challenges for these businessmen in terms of developing the best possible agricultural practices, new varieties, proper packing, and the most efficient distribution and trading channels to allow reaching the entire world with a very high quality product.

Step-by-step, a corporate class that had decided to conquer the world came to be, having to tackle all types of challenges in time, in spite of this having gained a position and recognition in the most demanding markets in terms of quality and services.

It is so that G-8 was born 15 years ago, this being a group of friendly farms sharing similar corporate philosophies, with more than 20 years in the market, members of Asocolflores, 6,000 direct employees, a Florverde sustainable flowers certification, focused on quality and service, their initial challenge having been finding an efficient raw materials purchasing option. The model has allowed this group to consolidate and gain a significant recognition and the best possible reputation in the local market.

Looking to continue strengthening the group at an international level, the decision was made to take an additional step to promote our flowers and make available to the world markets (North America, Europe, Asia, and Oceania) POSSIBLY THE BEST FLOWERS IN THE WORLD, with 500 cultivated hectares, a large number of products with more than 400 varieties endorsed by significant recognitions and awards in international fairs such as IPM – Essen, IFEX – Japan, PROFLORA – Colombia, WF&FSA/SAF - USA, Flower EXPO - Rusia, IPM - Hortiflorexpo - China, IFTF - Holland / International Grower of the Year 2018 – AIPH."],

        ];
        // ===================================================================================
        foreach ($datas as $data) {
            DB::table('parametros')->insert([
                'logo' => $data['logo'],
                'texto' => $data['texto'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
