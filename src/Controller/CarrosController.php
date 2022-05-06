<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Carros Controller
 *
 * @property \App\Model\Table\CarrosTable $Carros
 * @method \App\Model\Entity\Carro[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CarrosController extends AppController
{

    public function beforeFilter(EventInterface $event) {
        parent::beforeFilter($event);
    }

    /**
     * View method
     *
     * @param string|null $id Carro id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        if($this->request->is('Ajax')){

            $carro = $this->Carros->get($id, [
                'contain' => [],
            ]);
            echo $this->response->withType('application/json')
                    ->withStringBody(json_encode($carro));
            die();

        }else{

            $carro = $this->Carros->get($id, [
                'contain' => [],
            ]);
            $this->set(compact('carro'));

        }

    }

    public function orcamento()
    {
        $carros = $this->Carros->find();
        $csrfToken = $this->request->getAttribute('csrfToken');
        $this->set(compact('carros', 'csrfToken' ));
    }
}
