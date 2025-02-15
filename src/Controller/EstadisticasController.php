<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Estadisticas Controller
 *
 * @property \App\Model\Table\EstadisticasTable $Estadisticas
 */
class EstadisticasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Estadisticas->find()
            ->contain(['Juegos']);
        $estadisticas = $this->paginate($query);

        $this->set(compact('estadisticas'));
    }

    /**
     * View method
     *
     * @param string|null $id Estadistica id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estadistica = $this->Estadisticas->get($id, contain: ['Juegos']);
        $this->set(compact('estadistica'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estadistica = $this->Estadisticas->newEmptyEntity();
        if ($this->request->is('post')) {
            $estadistica = $this->Estadisticas->patchEntity($estadistica, $this->request->getData());
            if ($this->Estadisticas->save($estadistica)) {
                $this->Flash->success(__('The estadistica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estadistica could not be saved. Please, try again.'));
        }
        $juegos = $this->Estadisticas->Juegos->find('list', limit: 200)->all();
        $this->set(compact('estadistica', 'juegos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estadistica id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estadistica = $this->Estadisticas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estadistica = $this->Estadisticas->patchEntity($estadistica, $this->request->getData());
            if ($this->Estadisticas->save($estadistica)) {
                $this->Flash->success(__('The estadistica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estadistica could not be saved. Please, try again.'));
        }
        $juegos = $this->Estadisticas->Juegos->find('list', limit: 200)->all();
        $this->set(compact('estadistica', 'juegos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estadistica id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estadistica = $this->Estadisticas->get($id);
        if ($this->Estadisticas->delete($estadistica)) {
            $this->Flash->success(__('The estadistica has been deleted.'));
        } else {
            $this->Flash->error(__('The estadistica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
