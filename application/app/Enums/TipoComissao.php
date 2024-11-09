<?php

namespace App\Enums;

enum TipoComissao: string {
    case PERCENTUAL = 'percentual';
    case VALOR = 'valor';
    case SEM_COMISSAO = 'sem_comissao';

}

