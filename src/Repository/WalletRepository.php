<?php

namespace App\Repository;

$wallets = [];
$transactions = [];
function enregistrezWallet(&$wallets, $wallet)
{
    $wallets[] = $wallet;

}
;
function enregistrezTransaction(&$transactions, $transaction)
{
    $transactions[] = $transaction;

}
;
function modifierSolde($numero, $montant)
{
    global $wallets;

    foreach ($wallets as &$wallet) {

        if ($wallet['Numeros'] === $numero) {

            $wallet['solde'] += $montant;

            return true;
        }
    }

    return false;
}

function chercherWalletParNumero($Numero)
{
    global $wallets;

    $resultat = array_filter($wallets, function($wallet) use ($Numero){

        return $wallet['Numeros'] === $Numero;

    });

    return reset($resultat);
}

function recupererTransactions()
{
    global $transactions;

    return $transactions;
}

?>