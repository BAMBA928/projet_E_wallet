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

    $frais =calculFrais($montant);

    $totalRetrait=$montant + $frais;

    if ($totalRetrait > $wallet['solde']) {
        echo "Solde insuffisant\n";
        return;
    }

    modifierSolde($Numero, -$totalRetrait);


    $transaction = [
        'type' => 'RETRAIT',
        'montant' => $montant,
        'numero' => $Numero,
    ];

    enregistrezTransaction($transactions, $transaction);
}
function calculFrais($montant)
{
    if ($montant <= 10000) {
        return 200;
    } else if ($montant <= 100000) {
        return 500;
    } else {
        $frais = $montant  / 100;
        if ($frais > 5000) {
            return 5000;
        }

        return $frais;
    }


}
?>