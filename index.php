<?php
require '../progweb-p2/model/casas_model.php';
require '../progweb-p2/controller/casas_controller.php';
require '../progweb-p2/connectionBD.php';

$bd = new Database("localhost", "usuarios", "root", "");
$bd->selectSQL("USE casas");
$model = new Casas_Model($bd);
$controller = new Casas_Controller($model);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';
// $action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store($_POST);
        break;
    case 'edit':
        $controller->edit($_GET['cas_cod']);
        break;
        case 'update':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $cas_cod = isset($_POST['cas_cod']) ? $_POST['cas_cod'] : null;
    
                if ($cas_cod !== null) {
                    $descricao = $_POST['descricao'];
                    $endereco = $_POST['endereco'];
                    $cidade = $_POST['cidade'];
                    $proprietario = $_POST['proprietario'];
    
                    $controller->update($cas_cod, compact('descricao', 'endereco', 'cidade', 'proprietario'));
                } else {
                    echo 'ID da casa inválido.';
                }
            } else {
                echo 'Método inválido para ação de atualização.';
            }
            break;
    case 'delete':
        $controller->delete($_GET['cas_cod']);
        break;
    default:
        echo 'Ação inválida';
}
?>