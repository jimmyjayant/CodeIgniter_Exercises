<?php
namespace App\Controllers;
use App\Models\CRUDModel;

class CRUDDBController extends BaseController
{
    protected $CRUDModel;

    public function __construct()
    {
        $this->CRUDModel = new CRUDModel();
    }

    public function index()
    {
        try
        {
            // Get the list of all users from users table in crud1 database
            $data['users'] = $this->CRUDModel->findAll();

            if(!$data['users'])
            {
                throw new \Exception("User Not Found!");
            }

            return view("index", $data);
        }
        catch(\Exception $e)
        {
            $data['error'] = $e->getMessage();
            return view("index", $data);
        }
    }

    public function edit($id)
    {
        try
        {
            $data['user'] = $this->CRUDModel->find($id);
            if(!($data['user']))
            {
                throw new \Exception("User Not Found!");
            }

            return view("edit", $data);
        }
        catch(\Exception $e)
        {
            //$data['error'] = $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update($id)
    {
        $this->CRUDModel->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email')
        ]);

        return redirect()->to('/');
    }

    public function delete($id)
    {
        $this->CRUDModel->delete($id);
        return redirect()->to('/');
    }

    public function store()
    {
        try
        {
            $insertId = $this->CRUDModel->save([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email')
            ]);

            if($insertId === false)
            {
                throw new \Exception("Unable to add new user. Please try again later!");
            }

            return redirect()->to('/');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        return view("create");
    }
}
?>
