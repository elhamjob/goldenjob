<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('general_info', function (Blueprint $table) {
            $table->id();
            $table->string('title_en')->nullable();
            $table->string('title_fa')->nullable();
            $table->string('abr')->nullable();
            $table->string('logo')->nullable();
            $table->text('address_en')->nullable();
            $table->text('address_fa')->nullable();
            $table->text('about_en')->nullable();
            $table->text('about_fa')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('skype')->nullable();
            $table->string('twiter')->nullable();
            $table->timestamps();
        });

        DB::table('general_info')->insert([
            'title_en' => 'Akbar Jobs',
            'title_fa' => 'اکبر جابز',
            'abr'      => 'AJ',
            'logo'     => 'favicon.ico',
            'address_en' => 'Kabul, Afghanistan',
            'address_fa' => 'کابل، افغانستان',
            'about_en'   => 'Akbar Jobs - Job Portal',
            'about_fa'   => 'اکبر جابز - پورتال کاریابی',
            'phone'      => '+93700000000',
            'email'      => 'info@akbarjobs.com',
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('general_info');
    }
};
