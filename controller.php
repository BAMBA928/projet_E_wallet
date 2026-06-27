<?php
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
        $montant = readline("veuillez saisir le montant : ");
    } while (!verfiefieMontant($montant));

    creerDepot($montant, $Numero);
    var_dump($wallets);
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
        $montant = readline("veuillez saisir le montant");
    } while (!verfiefieMontant($montant));


    creerRetrait($montant, $Numero);
    var_dump($wallets);
    echo "Retrait effectué";
}
;
function controllerListerTransactions()
{
    global $wallets;
    do {
        $Numero = readline("Veuillez saisir un telephone :");

    } while (!verfiefieTel($Numero) || existeTel($Numero, $wallets) == false);


}
;
?>