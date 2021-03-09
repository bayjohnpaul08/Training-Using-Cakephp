<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Routing\Router;

class ManufacturersController extends AppController
{
    
     public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Manufacturers');
        
    }

    public function index()
    {
        $this -> paginate = [
            'contain' => ['Products'],
            'limit' => '10'
        ];
        $manufacturers = $this->paginate($this->Manufacturers->find('all'));

        $this->set('manufacturers', $manufacturers);

    }

    public function view($id = null)
    {
        $manufacturer = $this->Manufacturers->get($id, [
            'contain' => ['Products'],
        ]);

        $this->set('manufacturer', $manufacturer);
    }

    public function add()
    {

        $manufacturer = $this->Manufacturers->newEntity();
        if ($this->request->is('post')) {
            if(!empty($this->request->data['file']['name'])){
                $filename = $this->request->data['file']['name'];
                $url = Router::url('/', true) . 'images/' . $filename;
                $uploadpath = 'images/';
                $uploadfile = $uploadpath . $filename;
                if(move_uploaded_file($this->request->data['file']['tmp_name'], $uploadfile)){

                    $manufacturer = $this->Manufacturers->newEntity();
                    $manufacturer->id = $this->myRandomNumber = rand();
                    $manufacturer->created = date('Y-m-d');
                    $manufacturer->modified = date('Y-m-d');
                    $manufacturer = $this->Manufacturers->patchEntity($manufacturer, $this->request->getData());
                    $manufacturer->image = $url;
                    
                    if ($this->Manufacturers->save($manufacturer)) {
                        $this->Flash->success(__('The manufacturer has been saved.'));

                         return $this->redirect(['action' => 'index']);
                    }
                }
            }
            
            $manufacturer = $this->Manufacturers->patchEntity($manufacturer, $this->request->getData());

            if ($this->Manufacturers->save($manufacturer)) {
                $this->Flash->success(__('The manufacturer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manufacturer could not be saved. Please, try again.'));
        }
        $this->set(compact('manufacturer'));
    }

    public function edit($id = null)
    {
        $manufacturer = $this->Manufacturers->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $manufacturer = $this->Manufacturers->patchEntity($manufacturer, $this->request->getData());
            $manufacturer->modified = date('Y-m-d');
            if ($this->Manufacturers->save($manufacturer)) {
                $this->Flash->success(__('The manufacturer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manufacturer could not be saved. Please, try again.'));
        }
        $this->set(compact('manufacturer'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manufacturer = $this->Manufacturers->get($id);
        if ($this->Manufacturers->delete($manufacturer)) {
            $this->Flash->success(__('The manufacturer has been deleted.'));
        } else {
            $this->Flash->error(__('The manufacturer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

     public function downloadToSql(){

        $this->autoRender = false;


        $this -> paginate = [
            'contain' => ['Products']
        ];
        $manufacturers = $this->paginate($this->Manufacturers->find('all')->where(['manufacturers_uploaded' => 0]));

        echo json_encode($manufacturers);

        $Manufacturers = TableRegistry::get('Manufacturers');
        $manufacturers = $Manufacturers->updateManufacturerUploaded();
 
    }

    public function manufacturerToMysql(){

        $this->autoRender = false;

        $post_data = $_POST['manufacturers'];

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        // decode JSON data to PHP array
        $manufacturers = json_decode($post_data, true);   

        // fetch the details of manufacturers table 
        foreach($manufacturers as $manufacturer){

            $manufacturersEntity = $this->Manufacturers->newEntity();  
            
            $manufacturersEntity->id = $manufacturer['manufacturersCode'];
            $manufacturersEntity->name = $manufacturer['manufacturersName'];
            $manufacturersEntity->created =  $manufacturer['manufacturersCreated'];
            $manufacturersEntity->modified = $manufacturer['manufacturersModified'];
            $manufacturersEntity->image = $manufacturer['manufacturersImage'];
            $manufacturersEntity->manufacturers_uploaded = 1;
    

             if ($this->Manufacturers->save($manufacturersEntity)) {
                // The $article entity contains the id now
                $id = $manufacturersEntity->id;
            }  

        }
        
    }
}
