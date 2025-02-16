<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

/**
 * Dashboard Controller
 *
 */
class DashboardController extends AppController
{
    /**
     * @var \App\Model\Table\EstadisticasTable
     */
    private $Estadisticas;

    /**
     * @var \App\Model\Table\JuegosTable
     */
    private $Juegos;

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Estadisticas = TableRegistry::getTableLocator()->get('Estadisticas');
        $this->Juegos = TableRegistry::getTableLocator()->get('Juegos');

        // Obtener estadísticas agrupadas por juego y número
        $estadisticas = $this->Estadisticas->find()
            ->select([
                'juego_id',
                'numero',
                'frecuencia' => 'SUM(frecuencia)'
            ])
            ->contain(['Juegos'])
            ->group(['juego_id', 'numero'])
            ->toArray();

        // Inicializar valores por defecto
        $datosPorJuego = [];
        $num_mas_frecuente = null;
        $num_menos_frecuente = null;
        $cantidad_sorteos = 0;
        $ganadores_max = 0;
        $recomendaciones = [];

        // Agrupar datos por juego
        foreach ($estadisticas as $estadistica) {
            $juego = $this->Juegos->get($estadistica->juego_id);
            $juegoNombre = $juego->nombre;

            if (!isset($datosPorJuego[$juegoNombre])) {
                $datosPorJuego[$juegoNombre] = [
                    'numeros' => [],
                    'frecuencias' => []
                ];
            }

            $datosPorJuego[$juegoNombre]['numeros'][] = $estadistica->numero;
            $datosPorJuego[$juegoNombre]['frecuencias'][] = $estadistica->frecuencia;
        }

        // Calcular estadísticas generales
        if (!empty($estadisticas)) {
            $cantidad_sorteos = count($estadisticas);

            // Ordenar por frecuencia
            usort($estadisticas, function ($a, $b) {
                return $b->frecuencia <=> $a->frecuencia;
            });

            // Definir número más frecuente y menos frecuente
            $num_mas_frecuente = $estadisticas[0]->numero ?? null;
            $num_menos_frecuente = end($estadisticas)->numero ?? null;

            // Simular ganadores máxima categoría y recomendaciones
            $ganadores_max = rand(1, 100);
            $recomendaciones = array_slice(array_column($estadisticas, 'numero'), 0, 5);
        }
        //var_dump($datosPorJuego);
        $this->set(compact(
            'datosPorJuego',
            'num_mas_frecuente',
            'num_menos_frecuente',
            'cantidad_sorteos',
            'ganadores_max',
            'recomendaciones'
        ));
    }
}
