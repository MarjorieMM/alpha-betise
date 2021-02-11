<?php

namespace App\DataFixtures;

use App\Entity\AgeGroup;
use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      
        $booknames = [
            "L'Etonnante Famille Appenzel", "Gaston Grognon", "La Famille Passiflore", "Les Gestes Barrières", "Maman Ours A La Rescousse"
        ];
        $bookphotos = [
            "etonnanteFamilleAppenzel.jpg", "GastonGrognon.jpg", "LaFamillePassiflore.jpg", "LesGestesBarrieres.jpg", "MamanOursALaRescousse.jpg"
        ];
        $bookExtracts = [
            "Ma grand-mère se nommait Eugénie. Eugénie Appenzell. D'elle, je tiens mes longs cheveux bouclés et, dit-on, mon caractère bien trempé. Peu de jours avant ma naissance, grand-mère Eugénie quitta les siens. En héritage, elle me laissa une boîte remplie de photographies et de lettres. 'Pour que tu connaisses ta famille', m'avait-elle écrit. Durant des années, j'ai démêlé les liens et les intrigues qui unissent ces personnes extraordinaires.
        J'ai pleuré et j'ai ri... Aujourd'hui, je vous livre leur histoire. Mon histoire. Celle de l'étonnante famille Appenzell.", 
        "N'avez-vous jamais été un peu inquiet en allant à une fête ? c'est le cas de Gaston. Son ami Porc-Epic organise une fiesta de folie, et tous les animaux n'ont qu'une hâte... danser jusqu'au bout de la nuit ! Il est HORS DE QUESTION pour Gaston de mettre un pied sur la piste de danse. D'abord, il ne sait même pas comment bouger son corps. Et puis, qu'est-ce qu'ils ont tous à vouloir lui apprendre ? Pourquoi n'aurait-il pas droit de ne pas aimer ça ?", "Au pays multicolore des nymphéas, vit la famille Blanche. La maman est une artiste peintre très connue. Ses deux enfants Ajonc et Genet veulent construire une cabane parmi les nymphéas, aidés par leurs jeunes invités : les Passiflore. 1987, premier livre pour enfants aux éditions Milan : Le Premier Bal d'Agaric Passiflore, texte de Geneviève Huriet. C'est le succès. Succès couronné par des prix littéraires et des récompenses diverses (prix Saint-Exupéry).
        S'ensuivra une longue série (24 titres parus), pour le plus grand plaisir des enfants (à partir de quatre ans). Aujourd'hui, les petits lapins Passiflore sont traduits en 28 langues et font l'objet d'une série télé, 52 épisodes de 26 minutes (production Euro Visual TF1) et diffusée depuis 2004 (TF1, Disney Chanel, etc.). En 2012, chez Dargaud, Loïc Jouannigot reprend seul les personnages des Passiflore en bande dessinée avec deux albums : L'Anniversaire de Dendelion et La Chorale.
        Suivent deux autres titres avec les textes de Michel Plessix, Mélodie potagère et La Chasse au trésor. Depuis l'arrêt en 2007 de l'édition, la sympathique et néanmoins célèbre Famille Passiflore est rééditée aux éditions Maghen. Ce nouvel album, Pirouette & Nymphéas, contient une histoire inédite de la famille Passiflore écrite et dessinée par Loïc Jouannigot.", "Un petit ouvrage documentaire à destination des enfants de l'école maternelle pour leur expliquer simplement les gestes barrières pour qu'ils puissent se protéger et protéger les autres du coronavirus et des virus en général. Un dessin animé conçu par l'auteur et adapté de ce livre est également disponible sur YouTube et a dépassé les 100 000 vues en à peine quelques jours.", "Michel, l'ours grincheux, ne supporte pas ses voisins. Ils sont bruyants, envahissants, collants, et ils sont partout, tout le temps. Heureusement, son sale caractère lui assure une paix relative... jusqu'au jour où une énorme tempête se déclare. Tout le monde se réfugie alors chez Michel, qui doit même participer à une chaîne humaine géante pour sauver un petit lapin des bourrasques ! L'ours ronchon, horripilé par cette invasion, risque pourtant bien de changer d'avis : parfois, l'entraide appelle...
        l'entraide. A partir de 5 ans"
        ];

        $editors = [
            "Margot", "Casterman", "Milan", "Deux Coqs d'Or", "Albin Michel"
        ];

        $publishing_house = [
            "Actes Sud Junior", "Amaterra", "Autrement", "Auzou", "Balivernes"
        ];

        $collections = [
            "Famille", "Fiction", "Famille", "Education", "Fiction"
        ];

        $ean = [ "9791095184249", "9782203211506", "9782356740878", "9782017866763", "9782226454140"
    ];

    $OLanguage = [
        'français', 'anglais', 'espagnol', 'français', 'français'
    ];

    $availability = [
        'en stock', 'en stock', 'en commande',  'épuisé', 'en stock'
            ];
            $stock = [
                15, 22, 0, 0, 30
            ];

            $price = [
                1990, 1390, 1300, 2950, 1200
            ];

        $agegroup = new AgeGroup();
        $agegroup->setMinAge(0);
        $agegroup->setMaxAge(3);
        $agegroup->setCategory("Enfants 0 - 3 ans");

       for ($i=0; $i < count($booknames); $i++) { 
        $book = new Book();
        $book->setCoverPhoto($bookphotos[$i]);
        $book->setTitle($booknames[$i]);
        $book->setExtract($bookExtracts[$i]);
    $book->setEditor($editors[$i]);
    $book->setPublishingHouse($publishing_house[$i]);
    $book->setPublicationDate(new \DateTime("2017-07-09"));
    $book->setCollection($collections[$i]);
$book->setEANCode($ean[$i]);
$book->setISBNCode(rand(1000000000, 9999999999));
$book->setNumberPages(rand(100, 150));
$book->setDimensionH(rand(20, 50));
$book->setDimensionW(rand(15, 40));
$book->setWeight(rand(300, 600));
$book->setLanguage("Français");
$book->setOriginalLanguage($OLanguage[$i]);
// $book->setAvailability($availability[$i]);
$book->setStock($stock[$i]);
$book->setPrice($price[$i]);
$book->setAgeGroup($agegroup);
$manager->persist($agegroup);
$manager->persist($book);


}

$booknames2 = [
    "Cachée ou pas, j'arrive", "La Cantoche", "La Nuit de Berk", "Le Chat Ritable", "Les P'tites Poules", "Les Pierre A Feu", "Mimose et Sam", "Veangeance de Cornebidouille"
];
$bookphotos2 = [
    "cacheeOuPasJarrive.jpg", "la-cantoche.jpg", "LaNuitDeBerk.jpg", "LeChatRitable.jpg", "LesPierresAFeu.jpg", "LesPtitesPoules.jpg", "MimoseEtSam.jpg", "VeangeanceCornebidouille.jpg"
];
$bookExtracts2 = [
    "Une partie de cache-cache écrite et dessinée à quatre mains. Lolita Séchan et Camille Jourdy s'amusent à faire jouer leur personnages respectifs dans l'univers de la famille Biloba. à partir de 4 ans.",
    "La cloche a sonné, c'est l'heure du repas, direction... la cantoche ! Tous les enfants se retrouvent dans ce lieu mythique, qu'on connaît forcément de près ou de loin. Entre les batailles de nourriture, les disputes, les chutes et les réclamations auprès du cuisiner fan de légumes, la pause déjeuner peut rapidement se transformer... en catastrophe ! Toujours pas de héros récurrent mais les gags s'enchaînent autour de cet univers délicieux.",
    "L'autre jour, un truc terrible est arrivé dans mon école. C'est Berk mon canard qui me l'a raconté. J'avais oublié Berk dans la caisse à doudous et un croco-sac-à-dos était resté là aussi. « Allez viens, on va aller se balader dans la classe », a proposé Berk. Ils ont pris la lampe de la maîtresse car il faisait tout noir. Berk et Croco ont ensuite commencé à avoir la trouille avec ce Sprouitch Sprouitch qui les suivait partout.",
    "Il était une fois un petit chat bienveillant, qui toujours secourait les pauvres et les mendiants. Le coeur sur la patte, généreux et fort aimable, ce chat exceptionnel, c'était le chat Ritable.",
    "Cette fois-ci, Boris et son ami vont au centre de la Terre!",
    "Connaissez-vous Carmen, la petite poulette qui en a sous la crête ? Son frère Carmélito, le téméraire petit poulet rose ? Leurs copains Coquenpâte, Coqsix, Molédecoq, Hucocotte et les autres agités du poulailler ? Voyages, humour, émotion, frisson et fantaisie... Voilà ce que vous trouverez dans le collector des quatre premières aventures des P'tites Poules.",
    "'Où étiez-vous la nuit dernière ?' Mimose et Sam ont lancé leur enquête. Ils veulent découvrir qui a grignoté les feuilles de leur ami Basile. Aucun des insectes interrogés n'admet être le coupable. Les deux amis doivent trouver des moyens pour le démasquer. Mais cela est plus facile à dire qu'à faire ! Il faudra user de beaucoup d'ingéniosité.",
    "Ses parents l’ont envoyé au lit pour avoir renâclé devant sa soupe de légumes. Mais Pierre est décidé à ruser et à trouver un moyen imparable pour éliminer non seulement Cornebidouille, la sorcière coincée dans les cabinets, mais aussi l’horrible potage de sa propre mère!"
];

$editors2 = [ 
    "Actes Sud", "BD Kids", "Pastel", "Balivernes Editions", "Casterman", "PKJ", "Mini BD Kids", "Casterman"
];

$publishing_house2 = [ "Bayard", "Belin", "Casterman", "Creapassions", "Desclee De Brouwer","Editions Du Rocher", "Editions Mango", "Flammarion"
];

$collections2 = [ 
    "Famille", "Fiction", "Famille", "Education", "Fiction", "Education", "Famille", "Fiction"
];

$ean2 = [ "9782330130152", "9791036314919", "9782211236935", "9782350670744", "9782266177054", "9782897770952", "9791036310119", "9782211203166"
];

$OLanguage2 = [ 
'français', 'anglais', 'espagnol', 'français', 'français', 'français', 'français', 'anglais'
];

$availability2 = [
    'momentanément indisponible', 'en stock', 'en commande',  'en stock', 'en stock', 'en stock', 'épuisé', 'en stock'
    ];
    $stock2 = [
        0, 12, 0, 20, 30, 15, 0, 34
    ];

    $price2 = [
        1350, 995, 1350,850, 1510, 950, 795, 1270
    ];


$agegroup2 = new AgeGroup();
$agegroup2->setMinAge(4);
$agegroup2->setMaxAge(7);
$agegroup2->setCategory("Enfants 4 - 7 ans");

for ($i=0; $i < count($booknames2); $i++) { 
$book2 = new Book();
$book2->setCoverPhoto($bookphotos2[$i]);
$book2->setTitle($booknames2[$i]);
$book2->setExtract($bookExtracts2[$i]);
$book2->setEditor($editors2[$i]);
$book2->setPublishingHouse($publishing_house2[$i]);
$book2->setPublicationDate(new \DateTime("2015-12-19"));
$book2->setCollection($collections2[$i]);
$book2->setEANCode($ean2[$i]);
$book2->setISBNCode(rand(1000000000, 9999999999));
$book2->setNumberPages(rand(100, 250));
$book2->setDimensionH(rand(20, 50));
$book2->setDimensionW(rand(15, 40));
$book2->setWeight(rand(300, 600));
$book2->setLanguage("Français");
$book2->setOriginalLanguage($OLanguage2[$i]);
// $book2->setAvailability($availability2[$i]);
$book2->setStock($stock2[$i]);
$book2->setPrice($price2[$i]);
$book2->setAgeGroup($agegroup2);
$manager->persist($agegroup2);
$manager->persist($book2);

}

$booknames3 = [
    "Coraline", "Ickabog", "Le Château de Hurle", "Le Château des Nuages", "Petit Vampire"
];
$bookphotos3 = [
    "Coraline.jpg", "Ickabog.jpg", "leChateauDesNuages.jpg", "leChateauHurle.jpg", "PetitVampire.jpg"
];
$bookExtracts3 = [
    "Coraline vient d'emménager dans une étrange maison et, comme ses parents n'ont pas le temps de s'occuper d'elle, elle décide de jouer les exploratrices. Ouvrant une porte condamnée, elle pénètre dans un appartement identique au sien. Identique, et pourtant... Dans la droite ligne d'Alice au pays des merveilles, ce roman à l'atmosphère inoubliable a déjà conquis des millions de lecteurs. A partir de 13 ans",
    
    "Haut comme deux chevaux. Des boules de feu étincelantes à la place des yeux. De longues griffes acérées telles des lames. L'Ickabog arrive...La Cornucopia était un petit royaume heureux. On n'y manquait de rien, le roi portait la plus élégante des moustaches, et le pays était célèbre pour ses mets délicieux : Délice-des-Ducs ou Nacelles-de-Fées, nul ne pouvait goûter ses gâteaux divins sans pleurer de joie ! Mais dans tout le royaume, un monstre rôde : selon la légende, l'Ickabog habitait les Marécages brumeux et froids du nord du pays. On disait de cette créature qu'elle avait de formidables pouvoirs et sortait la nuit pour dévorer les moutons comme les enfants. Des histoires pour les petits et les naïfs ? Parfois, les mythes prennent vie de façon étonnante...Alors, si vous êtes courageux et voulez connaître la vérité, ouvrez ce livre, suivez deux jeunes héros déterminés et perspicaces dans une folle aventure qui changera pour toujours le sort de la Cornucopia.",
    
    "La trilogie arrive enfin dans son intégralité en France ! Découvrez le roman qui a inspiré le chef d'oeuvre acclamé de Miyazaki, Le Château ambulant ? ! Au coeur de la contrée magique d'Ingarie, la jeune Sophie s'est résignée à un avenir morne dans sa petite chapellerie de quartier. Mais lorsqu'elle a le malheur d'offusquer la sorcière des Steppes, celle-ci lui dérobe 60 ans de sa vie, la laissant vieille et démunie.
    Cherchant désespérément un moyen de briser le sortilège, Sophie rejoindra alors l'équipe haute en couleur du grand mage Hurle. C'est au sein de son mystérieux château ambulant qu'elle se retrouvera à pactiser avec le malicieux démon de feu Calcifer. C'est une aventure extraordinaire à la recherche de sa jeunesse volée qui commence alors pour Sophie, prête à reprendre en main son destin... Autrice acclamée de littérature fantastique, Diana Wynne Jones (1934-2011) a remporté de nombreux prix, dont le Guardian Award for Children's Fiction et deux Mythopoeic Fantasy Awards.
    Elle est plus connue pour ses séries Chrestomanci, L'Odyssée DaleMark et, bien entendu, pour sa trilogie du Château.",
"La suite tant attendue du Château de Hurle vous emmène cette fois au sud d'Ingarie, dans les mondes imaginaires des Mille et une nuits ! Loin du pays d'Ingarie, dans le sultanat du Rajpout, un jeune marchand se plaît à rêver à une vie différente. Il s'imagine ainsi fils de roi, promis depuis sa naissance à une belle princesse, bien loin de sa vie miséreuse et de son père Ingrat, bien loin de son petit étal de tapis.
Lorsqu'un beau jour, un étranger lui vend un tapis volant, la vie d'Abdallah prend un tournant pour le moins inattendu. Les péripéties s'enchaînent et le destin de notre héros semble soudain lié à celui de la superbe princesse Fleur-dans-la-Nuit. Pour la retrouver, il part pour une incroyable odyssée, semée de djinns légendaires, de sorciers, de prophéties anciennes... et d'un mystérieux château dans les nuages.",
"Tout a commencé par un film d'horreur. « Ce n'est pas de ton âge, Michel », m'avait pourtant prévenu Petit Vampire. Mais on est quand même allés voir Le Commando des morts vivants. Les zombies nazis étaient effrayants, mais comme c'était du cinéma, ça allait. Le problème, c'est que ces affreux sont revenus le soir, dans mon rêve. J'ai inventé une porte et ils sont partis, ouf ! Sauf que je ne savais pas où menait cette porte. Et puis Marguerite est arrivé pour me dire de venir vite, parce que d'horribles zombies avaient débarqué chez Petit Vampire..."
    
];

$editors3 = [ 
    "Albin Michel", "Gallimard Jeunesse", "Romans Ynnis", "Romans Ynnis",  "Casterman"
];

$publishing_house3 = [
       "Albin Michel","Flammarion","Fleurus", "Formulette", "Casterman"
];

$collections3 = [ 
    "Famille", "Fiction","Education", "Famille",  "Fiction"
];

$ean3 = [ "9782226453587", "9782075150552", "9782376971290", "9782376971757", "9782211311021"
];

$OLanguage3 = [ 
'français', 'anglais', 'français', 'anglais', 'français'
];

$availability3 = [
     'en stock', 'en commande', 'épuisé', 'en stock','momentanément indisponible',
    ];
    $stock3 = [
        45, 0, 0, 28, 0
    ];

    $price3 = [
        1990, 2000, 1495, 1495, 950
    ];

$agegroup3 = new AgeGroup();
$agegroup3->setMinAge(8);
$agegroup3->setMaxAge(15);
$agegroup3->setCategory("Enfants 8 - 15 ans");

for ($i=0; $i < count($booknames3); $i++) { 
$book3 = new Book();
$book3->setCoverPhoto($bookphotos3[$i]);
$book3->setTitle($booknames3[$i]);
$book3->setExtract($bookExtracts3[$i]);
$book3->setEditor($editors3[$i]);
$book3->setPublishingHouse($publishing_house3[$i]);
$book3->setPublicationDate(new \DateTime("2015-02-10"));
$book3->setCollection($collections3[$i]);
$book3->setEANCode($ean3[$i]);
$book3->setISBNCode(rand(1000000000, 9999999999));
$book3->setNumberPages(rand(100, 250));
$book3->setDimensionH(rand(20, 50));
$book3->setDimensionW(rand(15, 40));
$book3->setWeight(rand(300, 600));
$book3->setLanguage("Français");
$book3->setOriginalLanguage($OLanguage3[$i]);
// $book3->setAvailability($availability3[$i]);
$book3->setStock($stock3[$i]);
$book3->setPrice($price3[$i]);
$book3->setAgeGroup($agegroup3);
$manager->persist($agegroup3);
$manager->persist($book3);

}

$booknames4 = [
    "L'âge d'Or", "Le Monde au Balcon", "Ailefroide", "Géante", "Radium Girls"
];
$bookphotos4 = [
    "AgeDor.jpg","leMondeAuBalcon.jpg", "ailefroide.jpg",  "Geante.jpg", "radiumGirls.jpg"
];
$bookExtracts4 = [
    "Avec l'hiver, la guerre a commencé. Tandis que les insurgés rassemblent leurs troupes et remontent depuis la Péninsule, la princesse Tilda assiège le château de son frère pour reconquérir son trône. En haut des remparts, en première ligne, les 'gueux' se préparent à l'assaut.Ce deuxième tome conclut en majesté l'épopée flamboyante de 'L'Age d'or', ce livre assez puissant pour déchaîner la tempête et la révolution, la force d'une utopie qui donne envie de croire en l'avenir.",
    
    "J'ai commencé ce carnet en janvier 2020, je voulais dessiner mon quotidien avec légèreté, sans objectif précis... Qui aurait pu prévoir que ce petit projet insouciant allait se changer en journal de bord de l'événement mondial le plus inédit du 21e siècle ? Dessinatrice vedette d'instagram, Sophie Lambda est l'autrice de la remarquable bd tant pis pour l'amour, parue en 2019. Dans le monde au balcon, elle donne aux petites histoires personnelles et grandes réalités collectives un coup de crayon libérateur.",
    
    "De Grenoble à la Bérarde en mobylette. Des rappels tirés sur la façade du Lycée Champollion. Avec l'exaltation pure qui tape aux tempes, quand on bivouaque suspendu sous le ciel criblé d'étoiles, où qu'à seize ans à peine on se lance dans des grandes voies. La Dibona, le pilier Frendo, le Coup de Sabre, la Pierre Alain à la Meije, la Rébuffat au Pavé : le Massif des Ecrins tout entier offert comme une terre d'aventure, un royaume, un champ de bataille parfois.
    Car la montagne réclame aussi son dû et la mort rôde dans les couloirs glacés.",
"Elle était une fois Céleste, géante véritable, orpheline recueillie au coeur de la montagne, petite dernière d'une famille de six frères. Et quand vient le temps où chacun s'envole du cocon familial, Céleste veut elle aussi arpenter de nouveaux horizons. De la Vallée aux Marais en passant par Dorsodoro, elle découvrira l'hostilité créée par la différence, les injustices de la guerre ou de la religion mais aussi l'amour et pourquoi pas, au bout du chemin, la liberté d'être elle-même ?",
"New Jersey, 1918. Edna Bolz entre comme ouvrière à l’United State Radium Corporation, une usine qui fournit l’armée en montres. Aux côtés de Katherine, Mollie, Albina, Quinta et les autres, elle va apprendre le métier qui consiste à peindre des cadrans à l’aide de la peinture Undark (une substance luminescente très précieuse et très chère) à un rythme constant. Mais bien que la charge de travail soit soutenue, l’ambiance à l’usine est assez bonne. Les filles s’entendent bien et sortent même ensemble le soir. Elles se surnomment les « Ghost Girls » : par jeu, elles se peignent les ongles, les dents ou le visage afin d’éblouir (littéralement) les autres une fois la nuit tombée. Mais elles ignorent que, derrière ses propriétés étonnantes, le Radium, cette substance qu’elles manipulent toute la journée et avec laquelle elles jouent, est en réalité mortelle. Et alors que certaines d’entre elles commencent à souffrir d’anémie, de fractures voire de tumeur, des voix s’élèvent pour comprendre. D’autres, pour étouffer l’affaire...
"
    
];

$editors4 = [ 
    "Aire Libre", "Albin Michel", "Rochette", "Editions Delcourt",  "Glénat"
];
$publishing_house4 = [
    "Actes Sud Junior", "Albin Michel", "Amaterra", "Autrement", "Auzou",
];

$collections4 = [ 
    "Fiction", "Fiction", "Education", "Famille",  "Biographie"
];

$ean4 = [ "9791034732647", "9782226455789", "9782203121935", "9782413000167", "9782344033449"
];

$OLanguage4 = [ 
'français', 'anglais', 'anglais', 'anglais', 'français'
];

$availability4 = [
     'en stock', 'en stock', 'épuisé', 'en stock', 'en stock',
    ];

    $stock4 = [
        40, 32, 0, 29, 28
    ];

    $price4 = [
        3200, 1890 , 2800 ,2795 , 2200
    ];

$agegroup4 = new AgeGroup();
$agegroup4->setMinAge(15);
$agegroup4->setMaxAge(18);
$agegroup4->setCategory("Jeunes adultes");

for ($i=0; $i < count($booknames3); $i++) { 
$book4 = new Book();
$book4->setCoverPhoto($bookphotos4[$i]);
$book4->setTitle($booknames4[$i]);
$book4->setExtract($bookExtracts4[$i]);
$book4->setEditor($editors4[$i]);
$book4->setPublishingHouse($publishing_house4[$i]);
$book4->setPublicationDate(new \DateTime("2019-02-19"));
$book4->setCollection($collections4[$i]);
$book4->setEANCode($ean4[$i]);
$book4->setISBNCode(rand(1000000000, 9999999999));
$book4->setNumberPages(rand(100, 250));
$book4->setDimensionH(rand(20, 50));
$book4->setDimensionW(rand(15, 40));
$book4->setWeight(rand(300, 600));
$book4->setLanguage("Français");
$book4->setOriginalLanguage($OLanguage4[$i]);
// $book4->setAvailability($availability4[$i]);
$book4->setStock($stock4[$i]);
$book4->setPrice($price4[$i]);
$book4->setAgeGroup($agegroup4);
$manager->persist($agegroup4);
$manager->persist($book4);
}




        $manager->flush();
    }
}