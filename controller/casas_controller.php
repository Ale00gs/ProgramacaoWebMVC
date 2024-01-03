<?php

// require_once('model/casas_model.php');
// require_once('view/casa_edit_form.php');

class Casas_Controller {
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function index() {
        $casas = $this->model->getAllCasas();
        include 'view/casas_list.php';
    }

    public function show() {
        $casa = $this->model->getAllCasas();
        include 'view/casa_details.php';
    }

    public function create() {
        include 'view/casa_form.php';
    }

    public function store($data) {
        $this->model->insertCasa($data['cas_descricao'], $data['cas_endereco'], $data['cas_cidade'], $data['cas_proprietario']);
        header('Location: index.php');
    }

    public function edit($cas_cod) {
        $casa = $this->model->getCasaById($cas_cod);
        // var_dump($casa);
        include 'view/casa_edit_form.php';
    }

    public function update($cas_cod, $data) {
        var_dump($cas_cod, $data['descricao'], $data['endereco'], $data['cidade'], $data['proprietario']); // Adicione isso para verificar os valores
    
        $this->model->updateCasa($cas_cod, $data['descricao'], $data['endereco'], $data['cidade'], $data['proprietario']);
        header('Location: index.php');
    }

    public function delete($cas_cod) {
        $this->model->deleteCasa($cas_cod);
        header('Location: index.php');
    }
}
?>
