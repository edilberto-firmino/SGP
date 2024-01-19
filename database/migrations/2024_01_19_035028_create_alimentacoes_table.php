<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlimentacoesTable extends Migration
{
    public function up()
    {
        Schema::create('alimentacoes', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('descricao');
            $table->decimal('calorias', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('alimentacoes');
    }
}
