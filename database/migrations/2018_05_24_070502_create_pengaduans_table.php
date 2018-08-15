<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_ktp');
            $table->string('name');
            $table->integer('gender_id')->default(1)->nullable();
            $table->date('birth_date');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('title_pengaduan');
            $table->text('content_pengaduan');
            $table->integer('status')->default(1);
            $table->string('attachment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengaduans');
    }
}
