<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->decimal('total_price', 10, 2)->nullable()->after('end_date'); // Giá lưu dạng số thập phân
            // $table->text('services')->nullable()->after('total_price');
            $table->json('services')->nullable(); // Dịch vụ lưu dạng JSON
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
};
