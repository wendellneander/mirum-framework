<?php
/**
 * Created by PhpStorm.
 * User: Wendell
 * Date: 08/04/2019
 * Time: 23:22
 */

namespace Controllers;

use Core\Controller;
use Core\Request;
use Repository\StoreRepository;

class StoreController extends Controller
{
    /**
     * @var StoreRepository
     */
    private $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    public function index()
    {
        $stores = $this->storeRepository->all();

        $this->view('store/index', ['stores' => $stores]);
    }

    public function create()
    {
        $this->view('store/form');
    }

    public function edit(int $id)
    {
        $store = $this->storeRepository->show($id);

        $this->view('store/form', ['store' => $store]);
    }

    public function save(Request $request)
    {
        $this->storeRepository->create($request->all());

        Request::redirect('store/index');
    }

    public function update(Request $request, int $id)
    {
        $this->storeRepository->update($request->all(), $id);

        Request::redirect('store/index');
    }

    public function delete(int $id)
    {
        $this->storeRepository->delete($id);

        Request::redirect('store/index');
    }

}
