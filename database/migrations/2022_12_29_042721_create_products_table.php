<?php

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(ProductCategory::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Product::class)->nullable()->constrained()->nullOnDelete();

            $table->string('title');
            $table->string('slug');

            $table->string('main_image')->nullable();

            $table->text('description')->nullable();

            $table->float('price')->nullable();

            $table->boolean('is_stockable')->default(true);
            $table->integer('in_stock')->default(0);

            $table->boolean('is_group')->default(false);
            $table->boolean('is_subscribe')->default(false);

            $table->boolean('is_active')->default(true);
            $table->integer('position')->default(0);

            $table->boolean('searchable')->default(true);

            $table->softDeletes();

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
        Schema::dropIfExists('products');
    }
};
