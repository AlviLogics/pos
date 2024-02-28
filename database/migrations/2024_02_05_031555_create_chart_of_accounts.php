<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('type');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        // Insert commands
        DB::table('chart_of_accounts')->insert([
            ['code' => '1000', 'name' => 'Cash', 'type' => 'assets'],
            ['code' => '1120', 'name' => 'Accounts Receivable', 'type' => 'assets'],
            ['code' => '1410', 'name' => 'Inventory', 'type' => 'assets'],
            ['code' => '1100', 'name' => 'Current Assets', 'type' => 'assets'],
            ['code' => '1100', 'name' => 'Fixed Assets', 'type' => 'assets'],
            ['code' => '2000', 'name' => 'Current Liabilities', 'type' => 'liabilities'],
            ['code' => '1100', 'name' => 'Fixed Liabilities', 'type' => 'liabilities'],
            ['code' => '2110', 'name' => 'Accounts Payable', 'type' => 'liabilities'],
            ['code' => '2510', 'name' => 'Bank Loan', 'type' => 'liabilities'],
            ['code' => '3000', 'name' => 'Owner Equity', 'type' => 'equity'],
            
            ['code' => '4000', 'name' => 'Sales Revenue', 'type' => 'revenue'],
            ['code' => '5100', 'name' => 'Cost of Goods Sold (COGS)', 'type' => 'expense'],
            ['code' => '5340', 'name' => 'Rent Expense', 'type' => 'expense'],
            ['code' => '5400', 'name' => 'Utilities Expense', 'type' => 'expense'],
            // Add more insert commands for other accounts
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chart_of_accounts');
    }
};
