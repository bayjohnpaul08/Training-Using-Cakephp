<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Routing\Router;


class ProductsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadModel('Products');
        
    }

    // INDEX
    public function index()
    {
        $this->paginate = [
            'contain' => ['Manufacturers'],
            'limit' => '5'
        ];
        $products = $this->paginate($this->Products->find('all'));

        $this->set(compact('products'));

    }

    //
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['Manufacturers'],
        ]);

        $this->set('product', $product);
    }

    public function add()
    {

        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            if(!empty($this->request->data['file']['name'])){
                $filename = $this->request->data['file']['name'];
                $url = Router::url('/', true) . 'images/' . $filename;
                $uploadpath = 'images/';
                $uploadfile = $uploadpath . $filename;
                if(move_uploaded_file($this->request->data['file']['tmp_name'], $uploadfile)){
                    $product = $this->Products->newEntity();
                    $product = $this->Products->patchEntity($product, $this->request->getData());
                    $product->created = date('Y-m-d');
                    $product->modified = date('Y-m-d');
                    $product->image = $url;
                    if ($this->Products->save($product)) {
                        $this->Flash->success(__('The product has been saved.'));

                         return $this->redirect(['action' => 'index']);
                    }
                }
            
            }
            $product = $this->Products->patchEntity($product, $this->request->getData());
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $manufacturers = $this->Products->Manufacturers->find('list', ['limit' => 200]);
        $this->set(compact('product', 'manufacturers'));
    }

    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->getData());
            $product->modified = date('Y-m-d');
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $manufacturers = $this->Products->Manufacturers->find('list', ['limit' => 200]);
        $this->set(compact('product', 'manufacturers'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function productToSqlite(){
        $this->autoRender = false;

        $products = $this->paginate($this->Products->find('all')->where(['products_uploaded' => 0]));

        echo json_encode($products);

        $Products = TableRegistry::get('Products');
        $products = $Products->updateProductUploaded();
    }

     public function productToMysql(){

        $this->autoRender = false;

        $post_product = $_POST['products'];

        // echo '<pre>';
        // print_r($_POST);
        // echo '</pre>';

        // decode JSON data to PHP array
        $products = json_decode($post_product, true);

        // fetch the details of manufacturers table 
        foreach($products as $product){

            $productsEntity = $this->Products->newEntity();  
            
            $productsEntity->product_name = $product['productName'];
            $productsEntity->price =  $product['productPrice'];
            $productsEntity->created = $product['productCreated'];
            $productsEntity->modified = $product['productModified'];
            $productsEntity->manufacturers_id = $product['productManufacturer'];
            $productsEntity->image = $product['productImage'];

             if ($this->Products->save($productsEntity)) {
                // The $article entity contains the id now
                $id = $productsEntity->id;
            }  
        }
        $Products = TableRegistry::get('Products');
        $products = $Products->updateProductUploaded();
    }
}
