<?php

namespace App\Controller;

use function App\Services\creerWallet;
use function App\Services\creerDepot;
use function App\Services\creerRetrait;
use function App\Services\listerTransactions;
use function App\Validator\verfiefieTel;
use function App\Validator\verfiefieNom;
use function App\Validator\verfiefieCode;
use function App\Validator\verfiefieSolde;
use function App\Validator\verfiefieMontant;
use function App\Validator\existeTel;
function controllerCreerWallet()
{
    global $wallets;
    do {
        $Numero = readline("Veuillez saisir un telephone :");


    } while (!verfiefieTel($Numero) || existeTel($Numero, $wallets) == true);

    ;
    do {

        $Nom = readline("Veuillez saisir  Nom  :");

    } while (verfiefieNom($Nom) == false);
    do {
        $CodeSecret = readline("Veuillez saisir un code :");
    } while (!verfiefieCode($CodeSecret));
    do {
        $Solde = (int) readline("veuillez saisir un solde");
    } while (!verfiefieSolde($Solde));

    creerWallet($Numero, $Nom, $CodeSecret, $Solde);


    echo "creation effectué\n";
}

;
function controllerDepot()
{
    global $wallets;

    do {
        $Numero = readline("Veuillez saisir un telephone :");
    } while (!verfiefieTel($Numero) || existeTel($Numero, $wallets) == false);

    do {
        $montant = (int) readline("veuillez saisir le montant : ");
    } while (!verfiefieMontant($montant));

    creerDepot($montant, $Numero);
    echo "Depot effectué\n";
}
;
function controllerRetrait()
{
    global $wallets;
    do {
        $Numero = readline("Veuillez saisir un telephone :");

    } while (!verfiefieTel($Numero) || existeTel($Numero, $wallets) == false);

    do {
        $montant = (int) readline("veuillez saisir le montant");
    } while (!verfiefieMontant($montant));


   $resultat =  creerRetrait($montant, $Numero);
  if ($resultat) {
    echo "Retrait effectué\n";
}
}
;
function controllerListerTransactions()
{
    $transactions = listerTransactions();

    if (empty($transactions)) {
        echo "Aucune transaction\n";
        return;
    }

    foreach ($transactions as $transaction) {

        echo "Type : " . $transaction['type'] . "\n";
        echo "Numéro : " . $transaction['numero'] . "\n";
        echo "Montant : " . $transaction['montant'] . "\n";

        if ($transaction['type'] === "RETRAIT") {
            echo "Frais : " . $transaction['frais'] . "\n";
        }

        echo "----------------\n";
    }
}
?>