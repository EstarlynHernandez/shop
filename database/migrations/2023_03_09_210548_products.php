<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Type;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->integer('prize');
            $table->string('images')->nullable();
            $table->integer('amount');
            $table->foreignIdFor(Type::class);
            $table->foreignIdFor(Category::class);
            $table->foreignIdFor(Subcategory::class);
            $table->foreignIdFor(Table::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
