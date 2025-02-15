<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Juegos Controller
 *
 * @property \App\Model\Table\JuegosTable $Juegos
 */
class JuegosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Juegos->find();
        $juegos = $this->paginate($query);

        $this->set(compact('juegos'));
    }

    /**
     * View method
     *
     * @param string|null $id Juego id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $juego = $this->Juegos->get($id, contain: ['Estadisticas']);
        $this->set(compact('juego'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $juego = $this->Juegos->newEmptyEntity();
        if ($this->request->is('post')) {
            $juego = $this->Juegos->patchEntity($juego, $this->request->getData());
            if ($this->Juegos->save($juego)) {
                $this->Flash->success(__('The juego has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The juego could not be saved. Please, try again.'));
        }
        $this->set(compact('juego'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Juego id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $juego = $this->Juegos->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $juego = $this->Juegos->patchEntity($juego, $this->request->getData());
            if ($this->Juegos->save($juego)) {
                $this->Flash->success(__('The juego has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The juego could not be saved. Please, try again.'));
        }
        $this->set(compact('juego'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Juego id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $juego = $this->Juegos->get($id);
        if ($this->Juegos->delete($juego)) {
            $this->Flash->success(__('The juego has been deleted.'));
        } else {
            $this->Flash->error(__('The juego could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
