<?php

namespace App\Services\States;

use Illuminate\Support\Facades\Http;

class StatesService
{
    /**
     * Get a list of Brasil's UF's via API from IBGE
     *
     * @return Response
     */
    public function getStates()
    {
        $request = Http::accept('application/json')->get(
            "https://servicodados.ibge.gov.br/api/v1/localidades/estados", [
                'orderBy' => 'nome'
            ]
        );

        if($request->status() !== 200 || empty($request)) return [];

        return $this->reassignKeys($request->json());
    }

    /**
     * Reassign the array keys
     *
     * @param array $states
     * @return array $states
     */
    private function reassignKeys(array $states)
    {
        foreach($states as &$state){
            $state['name']       = $state['nome'];
            $state['initials']   = $state['sigla'];
            $state['created_at'] = now();
            unset($state['id'], $state['nome'], $state['sigla'], $state['regiao']);
        }

        return $states;
    }
}
