<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if (!empty($data)) {
    $larguraComodo = $data['larguraComodo'];
    $comprimentoComodo = $data['comprimentoComodo'];
    $larguraPiso = $data['larguraPiso'];
    $comprimentoPiso = $data['comprimentoPiso'];
    $margemExtra = $data['margemExtra'] / 100;

    $areaComodo = $larguraComodo * $comprimentoComodo;
    $areaPiso = $larguraPiso * $comprimentoPiso;
    $quantidadePisos = ceil($areaComodo / $areaPiso);
    $quantidadeTotal = ceil($quantidadePisos * (1 + $margemExtra));

    echo json_encode(['quantidadeTotal' => $quantidadeTotal]);
} else {
    echo json_encode(['erro' => 'Dados incompletos']);
}
?>
