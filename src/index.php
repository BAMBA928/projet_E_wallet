<?php
include 'repository.php';
include 'validator.php';
include 'services.php';
include 'controller.php';
function afficherMenu(): void
{
    echo "**Menu Distributeur**\n";
    echo "1 - Créer Wallet\n";
    echo "2 - Faire Dépôt\n";
    echo "3 - Faire Retrait\n";
    echo "4 - Lister les Transactions\n";
    echo "0 - Quitter\n";
}


function saisieOption(): string
{
    return readline("Entrer votre choix : ");
}

do {
    afficherMenu();
    $saisie = saisieOption();


    switch ($saisie) {
        case '1':
            controllerCreerWallet();
            break;

        case '2':
           controllerDepot();
            break;
        case '3':
          controllerRetrait();
            break;

        case '4':
           controllerListerTransactions();
            break;
            case '0':
           echo "Quitter\n";
            break;
        default:
            echo "choix invalide veiiler ressayer\n";
            break;
    }
} while ($saisie !== '0');


