<?php

namespace Database\Factories;
use App\Models\Producto;
use App\Models\Transaccion;
use App\Models\TransaccionsProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransaccionsProductoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransaccionsProducto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_productos'=>Producto::all()->random()->id,
            'id_transaccions'=>Transaccion::all()->random()->id,
            'delete'=> FALSE
        ];
    }
}
