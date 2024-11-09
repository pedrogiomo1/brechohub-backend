<?php

namespace App\Enums;

enum SituacaoProduto: string {

    case ACERTADO = 'Acertado';
    CASE DEVOLVIDO = 'Devolvido';
    case VENDIDO = 'Vendido';
    case MANUTENCAO = 'Em Manutenção';
    case DISPONIVEL = 'Em Estoque';

}

