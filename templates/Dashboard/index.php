<?php
$this->assign('title', 'Dashboard de Lotería');
?>

<div class="container">
    <h1 class="my-4">Estadísticas de Lotería</h1>

    <?php foreach ($datosPorJuego as $nombre_juego => $juego): ?>
        <div class="card mb-4">
            <div class="card-header">
                <h3><?= h($nombre_juego) ?></h3>
            </div>
            <div class="card-body">
                <h5>Frecuencia Acumulada - <?= h($nombre_juego) ?></h5>
                <canvas id="grafico-<?= h(str_replace(' ', '-', strtolower($nombre_juego))) ?>"></canvas>

                <h5 class="mt-4">Estadísticas</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Número más frecuente</th>
                            <th>Número menos frecuente</th>
                            <th>Cantidad de sorteos</th>
                            <th>Ganadores máxima categoría</th>
                            <th>Recomendación de números</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= h($juego['num_mas_frecuente'] ?? 'No tiene información') ?></td>
                            <td><?= h($juego['num_menos_frecuente'] ?? 'No tiene información') ?></td>
                            <td><?= h($juego['cantidad_sorteos'] ?? 'No tiene información') ?></td>
                            <td><?= h($juego['ganadores_max'] ?? 'No tiene información') ?></td>
                            <td><?= implode(', ', (array) ($juego['recomendaciones'] ?? ['No tiene información'])) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        <?php foreach ($datosPorJuego as $nombre_juego => $juego): ?>
            const ctx<?= h(str_replace(' ', '_', strtolower($nombre_juego))) ?> = document.getElementById('grafico-<?= h(str_replace(' ', '-', strtolower($nombre_juego))) ?>').getContext('2d');
            new Chart(ctx<?= h(str_replace(' ', '_', strtolower($nombre_juego))) ?>, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($juego['numeros']) ?>,
                    datasets: [{
                        label: 'Frecuencia Acumulada',
                        data: <?= json_encode($juego['frecuencias']) ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                }
            });
        <?php endforeach; ?>
    });
</script>
