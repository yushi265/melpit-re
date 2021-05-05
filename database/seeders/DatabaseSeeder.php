<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User
        \App\Models\User::factory()->create([
            'name' => 'めるぴっと太郎',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
        ]);;

        // ItemCondition
        \App\Models\ItemCondition::factory()->create([
            'id'      => 1,
            'name'    => '新品、未使用',
            'sort_no' => 1,
        ]);
        \App\Models\ItemCondition::factory()->create([
            'id'      => 2,
            'name'    => '未使用に近い',
            'sort_no' => 2,
        ]);
        \App\Models\ItemCondition::factory()->create([
            'id'      => 3,
            'name'    => '目立った傷や汚れなし',
            'sort_no' => 3,
        ]);
        \App\Models\ItemCondition::factory()->create([
            'id'      => 4,
            'name'    => 'やや傷や汚れあり',
            'sort_no' => 4,
        ]);
        \App\Models\ItemCondition::factory()->create([
            'id'      => 5,
            'name'    => '傷や汚れあり',
            'sort_no' => 5,
        ]);
        \App\Models\ItemCondition::factory()->create([
            'id'      => 6,
            'name'    => '全体的に状態が悪い',
            'sort_no' => 6,
        ]);

        // PrimaryCategory
        \App\Models\PrimaryCategory::factory()->create([
            'id'      => 1,
            'name'    => 'レディース',
            'sort_no' => 1,
        ]);
        \App\Models\PrimaryCategory::factory()->create([
            'id'      => 2,
            'name'    => 'メンズ',
            'sort_no' => 2,
        ]);
        \App\Models\PrimaryCategory::factory()->create([
            'id'      => 3,
            'name'    => 'ベビー・キッズ',
            'sort_no' => 3,
        ]);
        \App\Models\PrimaryCategory::factory()->create([
            'id'      => 4,
            'name'    => 'その他',
            'sort_no' => 4,
        ]);

        // SecondaryCategory
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 1,
            'name'                => 'トップス',
            'sort_no'             => 1,
            'primary_category_id' => 1,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 2,
            'name'                => 'ジャケット/アウター',
            'sort_no'             => 2,
            'primary_category_id' => 1,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 3,
            'name'                => 'パンツ',
            'sort_no'             => 3,
            'primary_category_id' => 1,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 4,
            'name'                => 'トップス',
            'sort_no'             => 4,
            'primary_category_id' => 2,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 5,
            'name'                => 'ジャケット/アウター',
            'sort_no'             => 5,
            'primary_category_id' => 2,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 6,
            'name'                => '靴',
            'sort_no'             => 6,
            'primary_category_id' => 2,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 7,
            'name'                => 'ベビー服（男の子用）',
            'sort_no'             => 7,
            'primary_category_id' => 3,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 8,
            'name'                => 'ベビー服（女の子用）',
            'sort_no'             => 8,
            'primary_category_id' => 3,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 9,
            'name'                => 'キッズ服（男の子用）',
            'sort_no'             => 9,
            'primary_category_id' => 3,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 10,
            'name'                => 'キッズ服（女の子用）',
            'sort_no'             => 10,
            'primary_category_id' => 3,
        ]);
        \App\Models\SecondaryCategory::factory()->create([
            'id'                  => 11,
            'name'                => 'その他',
            'sort_no'             => 11,
            'primary_category_id' => 4,
        ]);
    }
}
