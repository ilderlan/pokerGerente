<?php

include_once '../cors.php';
include_once 'Jogador.class.php';
cors();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $jogador = new Jogador();
    $arrayJogadores = $jogador->recuperarTodos();

    echo json_encode($arrayJogadores);

} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {

    $post = file_get_contents("php://input");
    $jogador = new Jogador();
    $jogador->inserir(json_decode($post));

} elseif($_SERVER['REQUEST_METHOD'] == 'PUT') {

    $post = file_get_contents("php://input");
    $jogador = new Jogador();
    $jogador->alterar(json_decode($post));

} elseif($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $jogador = new Jogador();
    echo $jogador->excluir($_GET['id_jogador']);
}