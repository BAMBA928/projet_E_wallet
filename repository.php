<?php
$wallets = [];
$transactions = [];
function enregistrezWallet(&$wallets,$wallet){
$wallets[] = $wallet;

};
function enregistrezTransaction(&$transactions,$transaction){
$transactions[] = $transaction;

};
function chercherWalletParNumero($numeros)
{
    global $wallets;

    foreach ($wallets as &$wallet) {
        if ($wallet['Numeros'] === $numeros) {
            return $wallet;
        }
    }

    return null;
}

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
?>