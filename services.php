<?php
function creerWallet($Numero, $Nom, $CodeSecret, $Solde)
{
    global $wallets;
    $wallet = ['Numeros' => $Numero, 'client' => $Nom, 'code' => $CodeSecret, 'solde' => $Solde];

    enregistrezWallet($wallets, $wallet);

}
function creerDepot($montant, $Numero)
{
    global $transactions;

    $resultat = modifierSolde($Numero, $montant);

    if ($resultat === false) {
        echo "Wallet introuvable\n";
        return;
    }

    $transaction = [
        'type' => 'DEPOT',
        'montant' => $montant,
        'numero' => $Numero,
    ];

    enregistrezTransaction($transactions, $transaction);
}
function creerRetrait($montant, $Numero) 
{
    global $transactions;

    $wallet = chercherWalletParNumero($Numero);

    if ($wallet === null) {
        echo "Wallet introuvable\n";
        return;
    }

    if ($montant > $wallet['solde']) {
        echo "Solde insuffisant\n";
        return;
    }

    modifierSolde($Numero, -$montant);


    $transaction = [
        'type' => 'RETRAIT',
        'montant' => $montant,
        'numero' => $Numero,
    ];

    enregistrezTransaction($transactions, $transaction);
}
?>