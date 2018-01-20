<?php

include_once '../cors.php';
include_once 'Torneio.class.php';
cors();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $torneio = new Torneio();
    $arrayTorneios = $torneio->recuperarTodos();

    echo json_encode($arrayTorneios);

} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {

    $post = file_get_contents("php://input");
    $torneio = new Torneio();
    $torneio->inserir(json_decode($post));

} elseif($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $post = file_get_contents("php://input");
    $torneio = new Torneio();
    $torneio->alterar(json_decode($post));

} elseif($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $torneio = new Torneio();
    echo $torneio->excluir($_GET['id_torneio']);
}