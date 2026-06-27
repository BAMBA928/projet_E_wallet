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
?>
