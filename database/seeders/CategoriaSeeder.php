<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         $categorias = [
            ['nome' => 'Visores'],
            ['nome' => 'Telefones'],
            ['nome' => 'Acessórios'],
        ];

         // Adiciona timestamps automáticos
        $now = Carbon::now();
        foreach ($categorias as &$categoria) {
            $categoria['created_at'] = $now;
            $categoria['updated_at'] = $now;
        }

        DB::table('categorias')->insert($categorias);
    }
}
