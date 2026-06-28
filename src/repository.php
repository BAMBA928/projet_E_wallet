<?php
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

    $numeros = array_column($wallets, 'Numeros');

    $index = array_search($Numero, $numeros);

    if ($index !== false) {
        return $wallets[$index];
    }

    return null;
}

function recupererTransactions()
{
    global $transactions;
    $vide = true;

    foreach ($transactions as $transaction) {
        $vide = false;
    }
    return $transactions;
}

?>