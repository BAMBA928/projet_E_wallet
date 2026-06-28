<?php

namespace App\Validator;


function verfiefieTel($Numero): bool
{
    return strlen($Numero) === 9;

}
;
function verfiefieNom($Nom): bool
{
    if ($Nom === '') {
        return false;
    }
    ;
    return true;

}
function verfiefieCode($CodeSecret): bool
{
    return strlen($CodeSecret) === 4;

}
;
function verfiefieSolde($Solde): bool
{
    return ($Solde > 0);

}
;
function verfiefieMontant($montant): bool
{
    return ($montant > 0);

}
;


function existeTel(string $Numero, array $wallets): bool
{
    foreach ($wallets as $value) {

        if ($value['Numeros'] === $Numero) {

            return true;
        }
        ;
    }
    return false;
}
;

?>