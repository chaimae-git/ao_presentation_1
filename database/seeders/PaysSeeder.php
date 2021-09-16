<?php

namespace Database\Seeders;

use App\Models\Pays;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pays')->delete();


        $pays = array("Afghanistan", "Albanie", "Algérie", "Samoa américaines", "Andorre", "Angola", "Anguilla", "Antarctique", "Antigua-et-Barbuda", "Argentine", "Arménie ", "Aruba", "Australie", "Autriche", "Azerbaïdjan", "Bahamas", "Bahreïn", "Bangladesh", "Barbade", "Biélorussie", "Belgique", "Belize", "Bénin", "Bermudes", "Bhoutan", "Bolivie", "Bosnie-Herzégovine", "Botswana", "Île Bouvet", "Brésil", "Territoire britannique de l'océan Indien", "Brunéi Darussalam", "Bulgarie", "Burkina Faso ", "Burundi", "Cambodge", "Cameroun", "Canada", "Cap-Vert", "Îles Caïmans", "République centrafricaine", "Tchad", "Chili", "Chine", "Île de Noël" , "Îles Cocos (Keeling)", "Colombie", "Comores", "Congo", "Congo, République démocratique du", "Îles Cook", "Costa Rica", "Côte d'Ivoire", "Croatie (Hrvatska)", "Cuba", "Chypre", "République tchèque", "Danemark", "Djibouti", "Dominique", "République dominicaine", "Timor oriental", "Equateur", "Egypte", "El Salvador", "Guinée équatoriale", "Erythrée", "Estonie", "Ethiopie", "Îles Falkland (Malvinas)", "Îles Féroé", "Fidji", "Finlande", "France", "France métropolitaine", "Guyane française", "Polynésie française", "Territoires australes françaises", "Gabon", "Gambie", "Géorgie", "Allemagne", "Ghana", "Gibraltar", "Grèce", "Groenland", "Grenade", "Guadeloupe", "Guam", "Guatemala", "Guinée", "Guinée -Bissau", "Guyane", "Haïti", "Îles Heard et Mc Donald", "Saint-Siège (État de la Cité du Vatican)", "Honduras", "Hong Kong", "Hongrie", "Islande", "Inde" , "Indonésie", "Iran (République islamique d')", "Irak", "Irlande", "Israël", "Italie", "Jamaïque", "Japon", "Jordanie", "Kazakhstan", "Kenya", "Kiribati", "Corée, République populaire démocratique de", "Corée, République de", "Koweït", "Kirghizistan", "Lao, République démocratique populaire", "Lettonie", "Liban", "Lesotho", "Libéria ", "Jamahiriya arabe libyenne", "Liechtenstein", "Lituanie", "Luxembourg", "Macao", "Macédoine, L'ex-République yougoslave de", "Madagascar", "Malawi", "Malaisie", "Maldives", "Mali", "Malte", "Îles Marshall", "Martiniq ue", "Mauritanie", "Maurice", "Mayotte", "Mexique", "Micronésie, États fédérés de", "Moldavie, République de", "Monaco", "Mongolie", "Montserrat", "Maroc", "Mozambique", "Myanmar", "Namibie", "Nauru", "Népal", "Pays-Bas", "Antilles néerlandaises", "Nouvelle-Calédonie", "Nouvelle-Zélande", "Nicaragua", "Niger", "Nigeria" , "Niue", "Île Norfolk", "Îles Mariannes du Nord", "Norvège", "Oman", "Pakistan", "Palau", "Panama", "Papouasie-Nouvelle-Guinée", "Paraguay", "Pérou", "Philippines", "Pitcairn", "Pologne", "Portugal", "Porto Rico", "Qatar", "Réunion", "Roumanie", "Fédération de Russie", "Rwanda", "Saint Kitts et Nevis", " Sainte-Lucie", "Saint-Vincent-et-les Grenadines", "Samoa", "Saint-Marin", "Sao Tomé-et-Principe", "Arabie saoudite", "Sénégal", "Seychelles", "Sierra Leone", "Singapour", "Slovaquie (République slovaque)", "Slovénie", "Îles Salomon", "Somalie", "Afrique du Sud", "Géorgie du Sud et îles Sandwich du Sud", "Espagne", "Sri Lanka", "St. Hélène", "St. Pierre et Miquelon", "Soudan", "Suriname", "Îles Svalbard et Jan Mayen", "Swaziland", "Suède", "Suisse", "République arabe syrienne", "Taïwan, Province de Chine", "Tadjikistan" , "Tanzanie, République-Unie de", "Thaïlande", "Togo", "Tokelau", "Tonga", "Trinité-et-Tobago", "Tunisie", "Turquie", "Turkménistan", "Îles Turques et Caïques", "Tuvalu", "Ouganda", "Ukraine", "Émirats arabes unis", "Royaume-Uni", "États-Unis", "Îles mineures éloignées des États-Unis", "Uruguay", "Ouzbékistan", "Vanuatu", "Venezuela ", "Vietnam", "Îles Vierges (britanniques)", "Îles Vierges (États-Unis)", "Îles Wallis et Futuna", "Sahara occidental", "Yémen", "Yougoslavie", "Zambie", "Zimbabwe") ;
        
        foreach($pays as $pays){
            Pays::create(['pays'=>$pays]);
        }
    }
}
