<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BankAccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bank_accounts')->insert([
            'card_number' => '1756396817048858',
            'account_holder_name' => 'Mohamed Ahmed',
            'funds' => 500000,
            'cvv' => Hash::make('123'),
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => '6215416024978768',
            'account_holder_name' => 'Mohamed Ahmed',
            'funds' => 800000,
            'cvv' => Hash::make('456'),
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => '5717771966100635',
            'account_holder_name' => 'Ahmed Mohamed',
            'funds' => 0,
            'cvv' => Hash::make('1234'),
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => '4858508440803943',
            'account_holder_name' => 'Ahmed Mohamed',
            'funds' => 1000,
            'cvv' => Hash::make('5678'),
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => '3308218136865852',
            'account_holder_name' => 'Ahmed Maged',
            'funds' => 20000,
            'cvv' => Hash::make('101'),
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => '3139538416832297',
            'account_holder_name' => 'Ahmed Maged',
            'funds' => 50000,
            'cvv' => Hash::make('120'),
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => '4087550735028834',
            'account_holder_name' => 'Amr Khaled',
            'funds' => 1000000,
            'cvv' => Hash::make('2266'),
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => '5164346842297700',
            'account_holder_name' => 'Amr Khaled',
            'funds' => 0,
            'cvv' => Hash::make('2244'),
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => '1882870764463647',
            'account_holder_name' => 'Ali Ahmed',
            'funds' => 100,
            'cvv' => Hash::make('557'),
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => '8879656021141713',
            'account_holder_name' => 'Ali Ahmed',
            'funds' => 450,
            'cvv' => Hash::make('998'),
        ]);
    }
}
