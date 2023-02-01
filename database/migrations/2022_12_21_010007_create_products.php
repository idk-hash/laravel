<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('products', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->timestamps();
        // });

        Schema::create('Fridge',
            function (Blueprint $table)
            {$table->id();
            $table->string('isOpen');});

        DB::insert("INSERT INTO Fridge (isOpen) VALUES ('X');");

        DB::statement("CREATE TABLE Products (id INT NOT NULL AUTO_INCREMENT, Name VARCHAR(255), Quantity INT, Unit VARCHAR(255), Date_delivered DATE, Due_date DATE, Category VARCHAR(255), PRIMARY KEY (id));");
        DB::insert("INSERT INTO Products (Name, Quantity, Unit, Date_delivered, Due_date, Category) VALUES
        ('Apple', 20, 'kg', '2023-01-01', '2023-01-15', 'Fruit'),
        ('Banana', 30, 'kg', '2023-01-02', '2023-01-20', 'Fruit'),
        ('Carrot', 10, 'kg', '2023-01-03', '2023-01-25', 'Vegetable'),
        ('Potato', 15, 'kg', '2023-01-04', '2023-01-30', 'Vegetable'),
        ('Beef', 5, 'kg', '2023-01-05', '2023-02-05', 'Meat'),
        ('Chicken', 8, 'kg', '2023-01-06', '2023-02-10', 'Meat'),
        ('Lemon', 25, 'kg', '2023-01-07', '2023-01-25', 'Fruit'),
        ('Onion', 20, 'kg', '2023-01-08', '2023-02-01', 'Vegetable'),
        ('Pork', 10, 'kg', '2023-01-09', '2023-02-15', 'Meat'),
        ('Broccoli', 15, 'kg', '2023-01-10', '2023-02-10', 'Vegetable'),
        ('Tomato', 40, 'kg', '2023-01-11', '2023-02-05', 'Vegetable'),
        ('Lettuce', 50, 'kg', '2023-01-12', '2023-02-01', 'Vegetable'),
        ('Salmon', 12, 'kg', '2023-01-13', '2023-02-15', 'Fish'),
        ('Tuna', 10, 'kg', '2023-01-14', '2023-02-10', 'Fish'),
        ('Raspberry', 30, 'kg', '2023-01-15', '2023-02-05', 'Fruit'),
        ('Blueberry', 20, 'kg', '2023-01-16', '2023-02-01', 'Fruit'),
        ('Egg', 25, 'kg', '2023-01-17', '2023-02-05', 'Vegetable'),
        ('Cucumber', 30, 'kg', '2023-01-18', '2023-02-01', 'Vegetable'),
        ('Shrimp', 15, 'kg', '2023-01-19', '2023-02-15', 'Fish'),
        ('Crab', 12, 'kg', '2023-01-20', '2023-02-10', 'Fish'),
        ('Grapes', 35, 'kg', '2023-01-21', '2023-02-05', 'Fruit'),
        ('Mango', 20, 'kg', '2023-01-22', '2023-02-01', 'Fruit'),
        ('Squid', 10, 'kg', '2023-01-23', '2023-02-15', 'Fish'),
        ('Scallop', 8, 'kg', '2023-01-24', '2023-02-17', 'Fish'),
        ('Plums', 50, 'kg', '2021-01-22', '2021-02-01', 'Fruit'),
        ('Lamb', 15, 'kg', '2021-01-23', '2021-02-15', 'Meat'),
        ('Sausage', 20, 'kg', '2023-01-25', '2023-02-10', 'Meat'),
        ('Lobster', 8, 'kg', '2023-01-26', '2023-02-15', 'Fish'),
        ('Pineapple', 15, 'kg', '2023-01-27', '2023-02-05', 'Fruit'),
        ('Mushroom', 25, 'kg', '2023-01-28', '2023-02-01', 'Vegetable'),
        ('Bacon', 10, 'kg', '2023-01-29', '2023-02-15', 'Meat'),
        ('Cod', 12, 'kg', '2023-01-30', '2023-02-10', 'Fish'),
        ('Celery', 15, 'kg', '2023-01-31', '2023-02-15', 'Vegetable'),
        ('Spinach', 20, 'kg', '2023-02-01', '2023-02-25', 'Vegetable'),
        ('Green Beans', 10, 'kg', '2023-02-02', '2023-03-05', 'Vegetable'),
        ('Asparagus', 8, 'kg', '2023-02-03', '2023-03-10', 'Vegetable'),
        ('Bell Peppers', 25, 'kg', '2023-02-04', '2023-03-05', 'Vegetable'),
        ('Garlic', 30, 'kg', '2023-02-05', '2023-03-01', 'Vegetable'),
        ('Watermelon', 35, 'kg', '2023-02-06', '2023-03-15', 'Fruit'),
        ('Orange', 20, 'kg', '2023-02-07', '2023-03-10', 'Fruit'),
        ('Strawberry', 15, 'kg', '2023-02-08', '2023-03-05', 'Fruit'),
        ('Peach', 25, 'kg', '2023-02-09', '2023-03-01', 'Fruit'),
        ('Cucumber', 30, 'kg', '2023-02-10', '2023-03-15', 'Fruit'),
        ('Haddock', 10, 'kg', '2023-02-11', '2023-03-10', 'Fish'),
        ('Kiwi', 8, 'kg', '2023-02-12', '2023-03-05', 'Fruit'),
        ('Avocado', 25, 'kg', '2023-02-13', '2023-03-10', 'Fruit'),
        ('Guava', 15, 'kg', '2023-02-14', '2023-03-15', 'Fruit'),
        ('Cauliflower', 15, 'kg', '2023-03-06', '2023-03-05', 'Vegetable'),
        ('Blackberry', 30, 'kg', '2023-02-16', '2023-03-20', 'Fruit'),
        ('Cranberry', 20, 'kg', '2023-02-20', '2023-03-01', 'Fruit');");
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
