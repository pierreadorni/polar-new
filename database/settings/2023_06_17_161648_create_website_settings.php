<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add("website.headerMessage", "Petite information de la semaine");
        $this->migrator->add("website.aboutText", "Le Polar est une association loi 1901, créée en 1978 par trois visionnaires : Fabrice GIRARD, Philippe PIERRARD et Xavier DUPEYRON. De son vrai nom Promotion des Œuvres Livresques Au Rabais (quel subtil jeu de mot), le Polar est entièrement géré par des étudiants.

Le Bureau actuel contient six personnes, auxquelles s'ajoutent les responsables des différents secteurs. Le détail de la Dream Team du Polar est disponible dans la rubrique \"L'équipe\" dans le menu.

Son but est de centraliser les achats des étudiants pour obtenir les prix les plus bas possibles pour du matériel de bonne qualité, dans des domaines aussi variés que les impressions, les fournitures, les accessoires informatique, les produits dérivés UTC... Le Polar ne propose pas les prix les plus bas du marché, tu trouveras toujours moins cher sur Internet. Il s'efforce de proposer le prix le plus bas sur la gamme proposée, c'est à dire des produits de bonne qualité.

Le Polar, c'est aussi le service à l'étudiant, avec une prise en charge en garantie immédiate et un remboursement rapide. Au Polar, tu peux également commander tes annales d'examens, louer un vidéoprojecteur, acheter tes places pour les concerts, ESTU, et différents événements organisés par les assos de l'UTC, louer les livres de langues.... et plein d'autres choses !

    Sache dès à présent que si tu intègres le Polar, tu auras droit à des avantages non négligeables : accès au local entre 8h et 20h, priorité des impressions personnelles, 50% d'abattement sur les impressions personnelles, gratuité d'utilisation du matériel de l'association. Pour intégrer le Polar, envoie un mail à polar@assos.utc.fr !
        ");
    }
};
