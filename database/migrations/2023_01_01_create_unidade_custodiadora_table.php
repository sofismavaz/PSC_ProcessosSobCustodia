<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unidadeCustodiadora', function (Blueprint $table) {
            $table->id(); // id INT PRIMARY KEY AUTO_INCREMENT [6]
            $table->string('autorRegistro'); // autorRegistro VARCHAR(255) NOT NULL [6]
            $table->dateTime('dataHoraRegistro'); // dataHoraRegistro DATETIME NOT NULL [6]
            $table->string('unidadeCustodiadora'); // unidadeCustodiadora VARCHAR(255) [6]
            // Laravel por padrão adiciona created_at e updated_at. Se não forem desejados, usar $table->timestamps(); ou remover.
            // O documento não especifica, mas é boa prática para auditoria.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidadeCustodiadora');
    }
};
