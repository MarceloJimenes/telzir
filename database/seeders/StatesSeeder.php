<?php

namespace Database\Seeders;

use App\Models\States;
use App\Services\States\StatesService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->newline();
        $this->command->line('Iniciando processo de inserção de estados no banco de dados. Por favor, aguarde...');

        try {

            States::query()->delete();

            DB::transaction(function(){
                States::insert($this->getStates());
            }, 5);
        } catch (\Throwable $th) {
            return $this->command->error('Houve um erro ao inserir dados no banco... Por favor tente novamente!');
        }

        $this->command->info('Estados cadastrados com sucesso.');
        $this->command->newline();
    }

    /**
     * Get the states to be insert on database
     *
     * @return array $states
     */
    private function getStates()
    {
        return (new StatesService)->getStates() === [] ? $this->createArrayStates() : (new StatesService)->getStates();
    }

    /**
     * Create a array with the states
     *
     * @return array
     */
    private function createArrayStates(){
        return array(
            [
                'initials'   => 'AC',
                'name'       => 'Acre',
                'created_at' => now()
            ],
            [
                'initials'   => 'AL',
                'name'       => 'Alagoas',
                'created_at' => now()
            ],
            [
                'initials'   => 'AP',
                'name'       => 'Amapá',
                'created_at' => now()
            ],
            [
                'initials'   => 'AM',
                'name'       => 'Amazonas',
                'created_at' => now()
            ],
            [
                'initials'   => 'BA',
                'name'       => 'Bahia',
                'created_at' => now()
            ],
            [
                'initials'   => 'CE',
                'name'       => 'Ceará',
                'created_at' => now()
            ],
            [
                'initials'   => 'DF',
                'name'       => 'Distrito Federal',
                'created_at' => now()
            ],
            [
                'initials'   => 'ES',
                'name'       => 'Espírito Santo',
                'created_at' => now()
            ],
            [
                'initials'   => 'GO',
                'name'       => 'Goiás',
                'created_at' => now()
            ],
            [
                'initials'   => 'MA',
                'name'       => 'Maranhão',
                'created_at' => now()
            ],
            [
                'initials'   => 'MT',
                'name'       => 'Mato Grosso',
                'created_at' => now()
            ],
            [
                'initials'   => 'MS',
                'name'       => 'Mato Grosso do Sul',
                'created_at' => now()
            ],
            [
                'initials'   => 'MG',
                'name'       => 'Minas Gerais',
                'created_at' => now()
            ],
            [
                'initials'   => 'PA',
                'name'       => 'Pará',
                'created_at' => now()
            ],
            [
                'initials'   => 'PB',
                'name'       => 'Paraíba',
                'created_at' => now()
            ],
            [
                'initials'   => 'PR',
                'name'       => 'Paraná',
                'created_at' => now()
            ],
            [
                'initials'   => 'PE',
                'name'       => 'Pernambuco',
                'created_at' => now()
            ],
            [
                'initials'   => 'PI',
                'name'       => 'Piauí',
                'created_at' => now()
            ],
            [
                'initials'   => 'RJ',
                'name'       => 'Rio de Janeiro',
                'created_at' => now()
            ],
            [
                'initials'   => 'RN',
                'name'       => 'Rio Grande do Norte',
                'created_at' => now()
            ],
            [
                'initials'   => 'RS',
                'name'       => 'Rio Grande do Sul',
                'created_at' => now()
            ],
            [
                'initials'   => 'RO',
                'name'       => 'Rondônia',
                'created_at' => now()
            ],
            [
                'initials'   => 'RR',
                'name'       => 'Roraima',
                'created_at' => now()
            ],
            [
                'initials'   => 'SC',
                'name'       => 'Santa Catarina',
                'created_at' => now()
            ],
            [
                'initials'   => 'SP',
                'name'       => 'São Paulo',
                'created_at' => now()
            ],
            [
                'initials'   => 'SE',
                'name'       => 'Sergipe',
                'created_at' => now()
            ],
            [
                'initials'   => 'TO',
                'name'       => 'Tocantins',
                'created_at' => now()
            ],
        );
    }
}
