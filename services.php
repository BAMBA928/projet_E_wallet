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
    $transaction = ['montant' => $montant, 'numero' => $Numero];
    enregistrezTransaction($transactions, $transaction);
    
}
?>