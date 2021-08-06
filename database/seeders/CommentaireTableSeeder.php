<?php

namespace Database\Seeders;

use App\Models\Sms;
use App\Models\User;
use App\Models\Commentaire;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CommentaireTableSeeder extends Seeder
{
    
    
    private $comments = [
        "Dans un Saint-Pétersbourg miteux et étouffant, l'homme \"moyen\" est celui qui n'a ni pouvoir ni argent. Rodion Romanovicth Raskolnikov, que tout désigne comme cet homme \"moyen\", entretient le fantasme de devenir un homme \"supérieur\" en accédant au pouvoir par la richesse. Nourri par l'injustice et la misère qui gangrène son pays et par son désir d'idéalisme moral, il part à la rencontre de...",
        // "(basée sur l'excellente traduction d'André Markowicz) Raskolinikov un étudiant russe qui ne se prend pas pour de la merde décide d’exécuter pour la voler une vieille usurière. Ce qui lui permettra de prendre dans la vie un départ à la mesure de ces ambitions et de la haute opinion qu'il se fait de lui même. Mais en la tuant il découvre qu'il est un homme comme les autres, ce qu'il vit assez mal....",
        // "Difficile de faire plus vrai. Dostoeivski nous dévoile avec le personnage principal Raskolnikov toute la profondeur de la noirceur humaine. Le mot est dit : il reste humain. Entre un idéalisme monstrueusement mégalo rongé par le complexe du héros et toute la modestie, la pudeur et la crise de conscience quasi angélique, vous avez ce personnage, mi-ange mi-bête. Une fine analyse psychologique...",
        // "Voilà une année que je me suis remis à la lecture. Il y a une année d'ailleurs je terminais l'Idiot à peu prêt à la même époque. Dostoïevski constitue en quelque sorte mes lectures d'été. Avant je détestais lire, un livre sans images ne représentait pas d'intérêt, de plus s'il n'y avait pas plus d'image que de texte, je passais aussi mon chemin. Et c'est pas le lycée qui me donnera le goût de...",
        // "Le crime constitue la véritable ouverture du roman et ouvre la voie à deux fils conducteurs passionnants. D’une part, l’enquête policière digne des grands polards avec les méthodes psychologiques de Porphyre Petrovitch qui se livre à un jeu impitoyable et patient du chat et de la souris. D’autre part, la plongée puis à la rédemption du héros, soutenu par la figure quasi christique de Sonia qui...",
        // "Rodion Romanovitch Raskolnikov est un jeune homme de la bourgeoisie russe. Mais sans le sou. Il a été obligé d'interrompre ses études de droits faute de pouvoir payer les frais de scolarité. D'un autre côté, il n'a rien d'un battant : par certains efforts à sa portée, il pourrait gagner de quoi vivre (certes chichement) et suivre ses cours. Mais il n'en pas vraiment envie et préfère rester à ne...",
        // "C’est quand je marche dans la rue, précisément ce matin-là pour rejoindre Razoumikhine, que j’aperçois pour la première fois ce visage pâle et creusé, entouré d’une ribambelle de cheveux voluptueux, si flottants et soyeux qu’ils paraissent ne faire qu’un avec le vent. Ce sont des cheveux noirs et un visage malade, durci par la dureté de la vie, rehaussé par des yeux clairs, qui me troublent,...",
        // "Après plus d'un mois après la fin de ma lecture je suis toujours en digestion. Outre la virtuosité évidente de Dostoïevski, le côté noir du meurtre & de l'étude psychologique dont on se demande s'il est possible de la pousser plus loin… il me reste quelques questions bien plus simples. Pourquoi s'attache-t-on autant à ceux qui nous repoussent ? Est-ce seulement pour...",
        // "Si j'avoue avoir une préférence pour les Frères Karamazov (du même auteur), la lecture de ce second livre (pour moi) de Dostoïevski s'est une nouvelle fois révélée être un régal. Les baisses de rythme sont rare, entrecoupant des passages qui restent gravés dans la tête du lecteur provoquant chez ce dernier une fièvre l'empêchant de lâcher le bouquin! Ces moments sont nombreux et intenses à...",
        // "Je vais régner assis n-word, je vais mourir de-bout sur le podium il n’y a que nous. Tu veux t’assoir sur le trône, faudra t’asseoir sur mes genoux (Vous noterez l'utilisation du n-word : En effet, je ne suis point négrophobe, j'ai lu Aimé Césaire) Pas besoin de le lire pour l'affirmer. Dostoïevski (Dosto pour les intimes) est le D.U.C de la...",
        // "Ice Tray: A book. Crime and Punishment. William 'Will' Smith: Oh, that's just some tired book Carlton is reading. Ice Tray: [reads] From the library of Master William Smith. Who's tired now, homeboy? William 'Will' Smith: Oh, that's just some book they're making us read in school. I ain't gonna read it. Ice Tray: Wait,...",
        // "Tout a déjà été dit sur ce livre. Alors, pourquoi viendrais-je y mettre mon grain de sel ? Parce que je l'ai aimé, ce livre. Je l'ai abordé avec une certaine crainte, Dostoïevski ayant la réputation d'être un auteur difficile (j'avais déjà lu les \"Souvenirs de la Maison des Morts, et je ne l'avais pas trouvé difficile à lire du tout, mais...). Et je l'ai trouvé, au contraire, très...",
        // "Crime et châtiment, Dostoïevski Voici le roman de Dostoïevski que la postérité nous aura légué comme son plus célèbre et somme toute, comme le plus accessible parmi les 5 grands. Il est connu qu’à l’époque de sa sortie, à Saint-Pétersbourg, la réaction principale à sa lecture était l’angoisse doublée de sueurs froides. A l’époque, un élan de sympathie envers les criminels s’illustrait...",
        // "Ce livre est un bijou précieux, une perle rare. Touchant l'importance d'un sujet délicat, il est l'âme d'une grande philosophie sur la recherche de l'existentialisme. Autour des douleurs psychologiques et des doutes idéologiques, on arrive à retrouver une ressemblance avec Les Frères Karamazov sur un thème plus détaillé ici. Je ne saurai décrire avec des mots ce que les questions, idées et...",
        // "Voici l'un des meilleurs livres de mon humble collection personnelle : centré sur la psychologie du héros, improvisé assassin lors d'une heure perdue. Raskolnikov nous fait alors ressentir, et je pèse mes mots, la folie qui s'empare de lui. Ses pensées décousues m'ont paru aussi sensées que si j'avais moi-même assassiné; jusqu'à sortir mon nez du bouquin, où je continuais à penser à sa façon :...",
        // "D'abord pensé comme un journal, \"Le Journal de Raskolnikov\", et écrit à la première personne, Dostoïevski s'est très vite aperçu qu'il ne pourrait pas rendre compte de toutes les incertitudes, hésitations de son héros avec le \"je\". C'est le fantastique qui submerge tous le roman traduit par les doutes permanents du personnage sur les évènements suivant son acte. Pensait-il en arriver là ? Non,...",
        // "De la misère de cette Russie au début de l'ère moderne... De la misère de la condition sociale qui peut pousser jusqu'aux pires extrémités... De la misère de la nature humaine, toujours sur le fil du rasoir, se balançant jusqu'à la nausée entre orgueil et repentance. Un voyage effroyable dans la complexité de l'âme humaine porté par une écriture parfaitement maitrisée.",
        // "Un des livres qui m'a le plus passionné, sans aucun doute. Dostoïevski est fort, il est très fort lorsqu'il s'agit de vous plonger dans la psychologie et dans les sentiments des personnages. Raskolnikov (protagoniste du roman) est un personnage totalement crédible. Mystérieux, ambigu, spécial, intrigant, il est très bien écrit et son histoire est passionnante à suivre. Il est vrai que le...",
        // "C'est une drôle de sensation d'avoir fait ce voyage dans un univers qu'aucun écrivain n'avait encore abordé avant Dostoïevski. Je tiens le pari de faire le plus court possible. Un jeune homme intelligent révolté par l'injustice de sa situation devient un criminel. On participe d'abord comme témoin à l'assassinat de la vieille usurière, et de sa sœur innocente. Et on en vient à vivre...",
        // "Crime et châtiment, la première chose qui attire l’œil dans le chef d’œuvre de Dostoïevski, c'est son titre mystérieux; et si le mot crime semble facilement appréhendable, c'est bien autour du mot châtiment qu'est tout le mystère et le sel du roman. Si dans un premier temps, on pense à la punition de la justice, de la loi des hommes auxquels le héros...",
        // "… à Saint Saint-Pétersbourg quelque part au 19ème siècle. Un brouillard enveloppe constamment la ville. Il flotte au-dessus des palais somptueux, il entoure la splendeur des cathédrales, l’immensité de la Neva et la monumentalité des statues. Il enveloppe les pauvre gens à la recherche de trois sous pour pouvoir payer leur chambre misérable. Le brouillard enveloppe ainsi...",
        // "Cela faisait un petit bout de temps que je n'avais plus rien écrit sur un livre et pour cause, je viens de passer près de deux mois à lire Crime et châtiment de Dostoïevski. Non pas que ce roman de l'écrivain russe ne me plaisait pas, mais il était tellement conséquent et à la fois assez lourd dans le style qu'il a fallu simplement prendre le temps pour bien le décortiquer. Toutefois, il faut...",
        // "Attention : cette critique spoile la fin du livre. Le fait est que l'histoire n'est pas inintéressante, que les personnages sont bien dépeints et que les descriptions sont très réalistes. Pourtant, je me suis fermement ennuyé dès lors que le personnage principal s'était s'embourbé pendant plusieurs centaines de pages dans des réflexions décousues et fiévreuses. C'est...",
        // "Pour l'heure le livre qui supplante, selon moi, tous les autres. Je ne pensais pas qu'on pouvait écrire comme on respire. Tout est superbe : le rythme, les thèmes abordés, les personnages. Mention spéciale à : - la magistrale scène de meurtre, confuse, et haletante ; - la scène où Sonia lit la résurrection de Lazare à Raskolnikov ; - et celle où Pierre Petrovitch accuse Sonia de l'avoir..."
    ];
    // private function commentaires (){
    //     Commentaire::create([
    //         'commentaire' => rand(1,count($this->comments)),
    //         'par' => rand(1,count($this->utilisateurs)),
    //         'crime_id' => rand(1,count($this->crimes)),

    //     ]);
    // }


    public function run()
    {

         
        $messages = Sms::all();
        $utilisateurs = User::all();
        
         for ($i=0; $i <count($messages); $i++) { 
             for( $j=0; $j<count($this->comments);$j++){
                 Commentaire::create([
                     'uuid'   => Str::uuid(),
                     'par' => rand(1,count($utilisateurs)),
                     'commentaire' => $this->comments[$j],
                     'sms_id' =>$messages[$i]->id,
                 ]);       
             }
         }
    }
}
