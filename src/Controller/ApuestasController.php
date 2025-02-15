<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Apuestas Controller
 *
 * @property \App\Model\Table\ApuestasTable $Apuestas
 */
class ApuestasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Apuestas->find();
        $apuestas = $this->paginate($query);

        $this->set(compact('apuestas'));
    }

    /**
     * View method
     *
     * @param string|null $id Apuesta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $apuesta = $this->Apuestas->get($id, contain: ['Sorteos']);
        $this->set(compact('apuesta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $apuesta = $this->Apuestas->newEmptyEntity();
        if ($this->request->is('post')) {
            $apuesta = $this->Apuestas->patchEntity($apuesta, $this->request->getData());
            if ($this->Apuestas->save($apuesta)) {
                $this->Flash->success(__('The apuesta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apuesta could not be saved. Please, try again.'));
        }
        $sorteos = $this->Apuestas->Sorteos->find('list', limit: 200)->all();
        $this->set(compact('apuesta', 'sorteos'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Apuesta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $apuesta = $this->Apuestas->get($id, contain: ['Sorteos']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $apuesta = $this->Apuestas->patchEntity($apuesta, $this->request->getData());
            if ($this->Apuestas->save($apuesta)) {
                $this->Flash->success(__('The apuesta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The apuesta could not be saved. Please, try again.'));
        }
        $sorteos = $this->Apuestas->Sorteos->find('list', limit: 200)->all();
        $this->set(compact('apuesta', 'sorteos'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Apuesta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $apuesta = $this->Apuestas->get($id);
        if ($this->Apuestas->delete($apuesta)) {
            $this->Flash->success(__('The apuesta has been deleted.'));
        } else {
            $this->Flash->error(__('The apuesta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
