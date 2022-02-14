<?php

namespace Database\Seeders;

use App\Models\Plans;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->truncate();

        $this->command->newLine();
        $this->command->line('Iniciando processo de inserção dos planos no banco de dados. Por favor aguarde...');

        try{
            DB::transaction(function(){
                Plans::insert($this->defaultPlans());
            }, 5);
        }catch(\Throwable $th){
            return $this->command->error('Houve um problema ao inserir os planos...Por favor, tente novamente!');
        }

        $this->command->info('Planos inseridos com sucesso!');
        $this->command->newLine();
    }

    /**
     * Create a array with the three defauls plans
     *
     * @return array $plans
     */
    private function defaultPlans()
    {
        return array(
            [
                'name'        => 'FaleMais30',
                'description' => 'Com o FaleMais30, os primeiros 30 minutos são grátis e você só paga os minutos excedentes! Confira a taxa de adesão.',
                'time'        => 30,
                'created_at'  => now()
            ],
            [
                'name'        => 'FaleMais60',
                'description' => 'Com o FaleMais60, os primeiros 60 minutos são grátis e você só paga os minutos excedentes! Confira a taxa de adesão.',
                'time'        => 60,
                'created_at'  => now()
            ],
            [
                'name'        => 'FaleMais120',
                'description' => 'Com o FaleMais120, os primeiros 120 minutos são grátis e você só paga os minutos excedentes! Confira a taxa de adesão.',
                'time'        => 120,
                'created_at'  => now()
            ]
        );

    }
}
