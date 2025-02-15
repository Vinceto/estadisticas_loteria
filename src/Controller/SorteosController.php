<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Sorteos Controller
 *
 * @property \App\Model\Table\SorteosTable $Sorteos
 */
class SorteosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Sorteos->find()
            ->contain(['Juegos']);
        $sorteos = $this->paginate($query);

        $this->set(compact('sorteos'));
    }

    /**
     * View method
     *
     * @param string|null $id Sorteo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sorteo = $this->Sorteos->get($id, contain: ['Juegos', 'Apuestas']);
        $this->set(compact('sorteo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $sorteo = $this->Sorteos->newEmptyEntity();
        if ($this->request->is('post')) {
            $sorteo = $this->Sorteos->patchEntity($sorteo, $this->request->getData());
            if ($this->Sorteos->save($sorteo)) {
                $this->Flash->success(__('The sorteo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sorteo could not be saved. Please, try again.'));
        }
        $juegos = $this->Sorteos->Juegos->find('list', limit: 200)->all();
        $apuestas = $this->Sorteos->Apuestas->find('list', limit: 200)->all();
        $this->set(compact('sorteo', 'juegos', 'apuestas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sorteo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sorteo = $this->Sorteos->get($id, contain: ['Apuestas']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sorteo = $this->Sorteos->patchEntity($sorteo, $this->request->getData());
            if ($this->Sorteos->save($sorteo)) {
                $this->Flash->success(__('The sorteo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sorteo could not be saved. Please, try again.'));
        }
        $juegos = $this->Sorteos->Juegos->find('list', limit: 200)->all();
        $apuestas = $this->Sorteos->Apuestas->find('list', limit: 200)->all();
        $this->set(compact('sorteo', 'juegos', 'apuestas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sorteo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sorteo = $this->Sorteos->get($id);
        if ($this->Sorteos->delete($sorteo)) {
            $this->Flash->success(__('The sorteo has been deleted.'));
        } else {
            $this->Flash->error(__('The sorteo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
