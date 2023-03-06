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
            'card_number' => Hash::make('1756396817048858'),
            'account_holder_name' => 'Mohamed Ahmed',
            'funds' => 500000,
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => Hash::make('6215416024978768'),
            'account_holder_name' => 'Mohamed Ahmed',
            'funds' => 800000,
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => Hash::make('5717771966100635'),
            'account_holder_name' => 'Ahmed Mohamed',
            'funds' => 0,
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => Hash::make('4858508440803943'),
            'account_holder_name' => 'Ahmed Mohamed',
            'funds' => 1000,
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => Hash::make('3308218136865852'),
            'account_holder_name' => 'Ahmed Maged',
            'funds' => 20000,
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => Hash::make('3139538416832297'),
            'account_holder_name' => 'Ahmed Maged',
            'funds' => 50000,
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => Hash::make('4087550735028834'),
            'account_holder_name' => 'Amr Khaled',
            'funds' => 1000000,
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => Hash::make('5164346842297700'),
            'account_holder_name' => 'Arm Khaled',
            'funds' => 0,
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => Hash::make('1882870764463647'),
            'account_holder_name' => 'Ali Ahmed',
            'funds' => 100,
        ]);

        DB::table('bank_accounts')->insert([
            'card_number' => Hash::make('8879656021141713'),
            'account_holder_name' => 'Ali Ahmed',
            'funds' => 450,
        ]);
    }
}
