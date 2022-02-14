<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->newLine();
        $this->command->line('Iniciando o processo de inserção de algumas cidades no banco de dados. Por favor aguarde...');

        try{
            Cities::query()->delete();
            DB::transaction(function(){
                Cities::insert($this->defaultCities());
            }, 5);
        }catch(\Throwable $th){
            return $this->command->error('Houve um problema ao inserir as cidades...Por favor, tente novamente!');
        }

        $this->command->info('Cidades inseridas com sucesso!');
        $this->command->newLine();
    }

    /**
     * Create a array with the three defauls plans
     *
     * @return array $plans
     */
    private function defaultCities()
    {
        return array(
            [
                'name'       => 'São Paulo',
                'state_id'   => 25,
                'ddd'        => 11,
                'created_at' => now()
            ],
            [
                'name'       => 'Rio de Janeiro',
                'state_id'   => 19,
                'ddd'        => 21,
                'created_at' => now()
            ],
            [
                'name'       => 'Fortaleza',
                'state_id'   => 6,
                'ddd'        => 85,
                'created_at' => now()
            ],
            [
                'name'       => 'Campo Grande',
                'state_id'   => 12,
                'ddd'        => 67,
                'created_at' => now()
            ],
            [
                'name'       => 'Curitiba',
                'state_id'   => 16,
                'ddd'        => 41,
                'created_at' => now()
            ],
        );

    }
}
