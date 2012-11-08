<h1>Sportraining</h1>
<h2>Buts</h2>
Cr&eacute;ation d'un site web, permettant &agrave; un utilisateur de sauvegarder le contenu de ses s&eacute;ances d'entrainements, d'acceder &agrave; des statistiques d&eacute;taill&eacute;s afin d'analyser et planifi&eacute; au mieux son entrainement.
<h2>Caract&eacute;ristiques principales</h2>
<ul>
	<li>authentification et compte personnel</li>
	<li>banque de s&eacute;ance d'entrainement</li>
	<li>ajout d'un entrainement effectu&eacute; &agrave; partir d'une s&eacute;ance de la banque</li>
	<li>vue g&eacute;n&eacute;rale sous forme de calendrier</li>
	<li>statistiques d&eacute;taill&eacute;es sous forme de graphiques pour la semaine, le mois , l'ann&eacute;e</li>
</ul>
D&eacute;monstration

<h2>Organisation du groupe </h2>
6 diff&eacute;rentes parties
<ul>
	<li>cr&eacute;ation de la base de donn&eacute;e</li>
	<li>mise en place du framework</li>
	<li>mise en oeuvre du systeme d'authentification, connexion, enregistrement ...</li>
	<li>ajout d'une s&eacute;ance ou d'un entrainement dans la base de donn&eacute;e</li>
	<li>vue calendrier</li>
	<li>pages statistiques</li>
</ul>
<h2>Timeline</h2>
<p>Dans un premier temps, ajustement du framework pockemon, cr&eacute;ation des fichier php de base commmuns a toutes les parties, cr&eacute;ation de la base de donn&eacute;e.(Alexis)<br>
Puis dans un second temps r&eacute;partition des parties : authentification (Alexis), ajout entrainement/seance (Hela/Alexis), vue calendrier (Cl&eacute;ment), pages stats (Yassine, Arthur)<br>
Et enfin, mise en commun, retouche stylistique, pr&eacute;paration de la soutenance</p>
<h2>Architecture du site</h2>
<img src="/sportraining/static/images/organisation.png" width="700">
<h2>Structure de la page du site</h2>
<img src="/static/images/structure.png" width="500">
<h2>Base de donn&eacute;e</h2>
<img src="/sportraining/static/images/base.png" width="700">
<h2>Authentification et Compte perso ...</h2>
<h2>Ajout entrainement/seance</h2>

<p>Une fois connect&eacute; l'utilisateur ajoute les entra&icirc;nements qu'il a effectu&eacute;s.
Pour cela, il clique sur l'onglet "nouvel entra&icirc;nement".
"nouvel entra&icirc;nement" est un lien vers une nouvelle page: addtraining.php
Un formulaire s'affiche pour que l'utilisateur rajoute son entra&icirc;nement. Or un entra&icirc;nement est un type de s&eacute;ance donn&eacute;. La s&eacute;ance que l'utilisateur veut choisir peut &ecirc;tre existante, mais elle peut aussi ne pas figurer parmi les s&eacute;ances d&eacute;j&agrave; existantes sur la base.</p>

<p>L'utilisateur choisira donc une s&eacute;ance dans un menu, mais si aucune s&eacute;ance dans le menu fourni ne convient, il tape une nouvelle s&eacute;ance qui sera ajout&eacute;e dans la base.
Une requete "insert into seances" est execut&eacute;e.</p>

<p>Sauf que dans la table s&eacute;ance, il y a un attribut type (c'est un int, un id) qui correspond &agrave; l'id du type de sport (musculation, r&eacute;cup&eacute;ration, etc) dans la table type. Donc , avant d'ins&eacute;rer une nouvelle s&eacute;ance, on r&eacute;cup&egrave;re avec une requ&ecirc;te "select id from type" l'id du type de sport choisi dans le formulaire.</p>

<p>D'autres donn&eacute;es concernant l'entra&icirc;nement sont rentr&eacute;es, et lorsque l'utilisateur valide le formulaire, son entra&icirc;nement est rajout&eacute; dans la table "effectu&eacute;". Cette table contient tous les entra&icirc;nements des utlisateurs du site, c'est pourquoi, lors de l'ajout de l'entra&icirc;nement, l'id de l'utilisateur connect&eacute; est conserv&eacute; comme un attribut. De cette mani&egrave;re le sportif garde sur son compte les entra&icirc;nements effectu&eacute;s, il peut donc ult&eacute;rieurement avoir une id&eacute;e sur ses performances et sa progression.</p>
<h2>Vue Calendrier</h2>
<p></p>sp&eacute;cificit&eacute;s techniques : </p>
<ul><li>utilisation de DATETIME => date.php renvoit les jours et jour de la semaine pour un mois et une ann&eacute;e donn&eacute;e</li>
<li>utilisation de Javascript et JQuery pour l'affichage des entrainements effectu&eacute;.</li>
<li>requetes MySQL avec Jointure pour acceder aux entrainement d'UN utilisateur</li>
</ul>
<h2>Pages Statistiques</h2>


