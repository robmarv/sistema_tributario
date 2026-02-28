<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('distritos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->tinyInteger('estado')->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('distritos');
    }
};
