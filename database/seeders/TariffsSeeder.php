<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Tariffs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TariffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->newLine();
        $this->command->line('Iniciando o processo de inserção de algumas tarifas no banco de dados. Por favor aguarde...');

        try{
            Tariffs::query()->delete();

            DB::transaction(function(){
                Tariffs::insert($this->defaultTariffs());
            }, 5);
        }catch(\Throwable $th){
            return $this->command->error('Houve um problema ao inserir as tarifas...Por favor, tente novamente!');
        }

        $this->command->info('Tarifas inseridas com sucesso!');
        $this->command->newLine();
    }

    /**
     * Create a array with the three defauls plans
     *
     * @return array $plans
     */
    private function defaultTariffs()
    {
        return array(
            [
                'city_id'    => 1,
                'value'      => 0.50,
                'created_at' => now()
            ],
            [
                'city_id'    => '2',
                'value'      => 1,
                'created_at' => now()
            ],
            [
                'city_id'    => '3',
                'value'      => 1.50,
                'created_at' => now()
            ],
            [
                'city_id'    => '4',
                'value'      => 2,
                'created_at' => now()
            ],
            [
                'city_id'    => '5',
                'value'      => 2.50,
                'created_at' => now()
            ]
        );
    }
}
