<?php

namespace App\Controller;
use\Cake\ORM\TableRegistry;
use\App\Controller\Component\UploadComponent;

class ShopController extends AppController
{

    // Index Page

    public $paginate =[
        'limit' => 10,
        'order' => [
            'shop.id' => 'asc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    public function index()
    {
        $product = TableRegistry::get('shop');
        $query = $product->find();
        $this->set(array('data'=>$query));
        $this->set('shop', $this->paginate($query));

        
        $this->render('index');
    }

    public function insert()
    {
        $article = $this->Shop->newEntity();
        if ($this->request->is('post')) 
        {
            $imageName = $this->request->data['file']['name'];
            $filepath = getcwd() . '/img/uploads/' . $imageName;
            $article = $this->Shop->patchEntity($article, $this->request->data);
            $article->file =  $imageName ;

            if ($this->Shop->save($article)) 
            {                
                move_uploaded_file($this->request->data['file']['tmp_name'], $filepath);
                chmod($filepath, 0777);
                $this->Flash->success(__('The article has been saved.'));
                return $this->redirect(['action' => 'index']);
            } 
            else 
            {
                $this->Flash->error(__('The article could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('article'));
        $this->set('_serialize', ['article']);
        $this->render('insert');
    }

    public function save()
    {
        $shop = TableRegistry::get('shop');
        $query = $shop->query();
        //

        $product = $this->request->data('prductname');
        $domain = $this->request->data('domainname');
        $phone = $this->request->data('phone');
        $file = $this->request->data['file'];

        $query->insert([

            'prductname','domainname','phone','file'

        ])->values([

            'prductname'=>$product,
            'domainname'=>$domain,
            'phone'=>$phone,
            'file' => $file

        ])->execute();

        if ($query) 
        {
            $this->Flash->success('This information has been saved.');
            $this->redirect(['controller'=>'shop','action'=>'index']);
        }
    }

    public function update()
    {
        $shop = TableRegistry::get('shop');
        $query = $shop->query();
        //
        $id = $this->request->data('id');
        $product = $this->request->data('prductname');
        $domain = $this->request->data('domainname');
        $phone = $this->request->data('phone');

        $query->update()->set([
            'prductname'=>$product,
            'domainname'=>$domain,
            'phone'=>$phone
        ])->where(['id'=>$id])->execute();

        if ($query) 
        {
            $this->Flash->success('This information has been Updated.');
            $this->redirect(['controller'=>'shop','action'=>'index']);
        }
    }

    public function edit($id)
    {
        $shop = TableRegistry::get('shop');
        $query = $shop->query();
        $s = $shop->find()->where(['id'=>$id])->first();
        $this->set(array('row'=>$s));
        $this->render('edit');
    }

    public function delete($id)
    {
        $shop = TableRegistry::get('shop');
        $query = $shop->query();
        $query->delete()->where(['id'=>$id])->execute();
        if ($query) 
        {
            $this->Flash->error(__('Delete Your Data.'));
            $this->redirect(['controller'=>'shop','action'=>'index']);
        }
    }
}
