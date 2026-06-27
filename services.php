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


    $wallet = chercherWalletParNumero($Numero);

    if ($wallet === null) {
        echo "Wallet introuvable\n";
        return;
    }

    
    modifierSolde($Numero, $montant);

    
    $transaction = ['type' => 'DEPOT','montant' => $montant,'numero' => $Numero,];

    enregistrezTransaction($transactions, $transaction);
}
?>
