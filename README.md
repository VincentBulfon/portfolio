# Portfolio

## Liens
Invision : https://projects.invisionapp.com/d/main?origin=v7#/projects/boards/6650822

## Champ lexical

Web developpement : front-end, développeur, sites web, code, développement, design, web-développeur, création, design, éditer, administrer, développer, php, javascript, html, css, frameworks

## Contenu du site

### Pages

3 pages

- Page accueil/projets
- Page spécifique par projet
- Page about/contact

### Plan du site

- Accueil

  - Splashscreen
    - Nom Prénom
    - Brève description de ma fonction
  - Section projects
    - Slider avec les différentes projets
    - Descritpion brève des projets
  - Footer
    - Lien vers les autres pages
    - Mon Email
    - Lien vers mon Github

- Projets

  - Titre du projet
  - Image issues du projet
  - Description avancée du projet
  - Lien vers le projet
  - Lien vers un autre projet
  - Lien vers la page contact
  - Footer
    - Lien vers les autres pages
    - Mon Email
    - Lien vers mon Github

- Contact
  - Texte à propos de moi
  - texte sur mes compétances
  - Photo de moi
  - Formulaire de contact
  - Footer
    - Lien vers les autres pages
    - Mon Email
    - Lien vers mon Github

### Description du site et du contexte sur chaque pages

- Accueil
  Nous atterissons sur un splashscreen avec qql infos sur moi, mon nom et mon prénom ainsi que la navigation principale
  en supperposition sur un texte en fond avec un déplacement en x et y en fonction du placement de la souris.
  Le texte de fond sera en gras et assez grand pour couvrir la largueur de l'écran. Ensuite lors du scroll nous arrivons sur la section qui présente les projets, on a des effets de déplacements verticaux du texte lors qu scroll entre chaque projet, on le nom du pojet qui revient par devant le projet avec un chagement du couleur du texte lorsqu'il est devant le projet toujours avec un effet 3D et un déplacement x et y en fonction de la souris (le déplacement doit être léger pour ne pas perturber l'utilisateur).
  Ensuite nous avons un petit texte pour m'inciter à m'engager au côté d'un CTA incitant à m'engager
  Le footer se présente à nous comme venant clôturer la page avec les liens des autres pages et du formulaire de contact et mon github.
- Projets
  Nous trouvons le nom du projet sera en grand par dessus l'image de présentation toujours avec un légère animation 3D en x et y en fonction de la souris, nous aurons ensuite une description plus précise du projet avec un lien vers le projet en ligne. Nous avons ensuite un liens vers un autre projet ainsi que la page contact.
  Le footer arrive en dernier avec un lien vers les autres pages et du formulaire de contact et mon github.
- About
  Lorsque nous arrivons à la page about, nous avons mon nom et mon prénom qui viennent au devant de ma photo. Suivi d'un texte descriptif à propos de mes compétences et de moi. Viens ensuite face à nous quelques informations de contact suivies du formulaire de contact pour m'envoyer un email.
  Le footer vient cloturer la navigation avec les liens vers les autres pages, et mon github ainsi que les liens des autres projets.

- [Inspirations pour le concept](https://projects.invisionapp.com/boards/NC3YJT24XAF/)

- Wireframing 1600px de large for desktop et 300px pour le mobile.

## Effets "Waouh"

### Pistes pour le texte négatif par devant une image

- [Hack CSS](https://codepen.io/vincentbulfon/pen/xxGJEmx)
- [Autre exemple du Hack CSS](https://www.davidebaratta.com/)
- [Effet de parallax 3D en web gl](https://www.sbs.com.au/missing/)
- Il est aussi envisageable de faire cela en WebGl avec un librairie pour pouvoir effectuer un déplacement en 3D des éléments les un par rapport aux autre pour rester en cohérence avec l'inclinaison de "l'écran en fonction de la souris" en fonction de la souris. Three js peut permettre de mettre en place ce type de déplacement au sein d'un environnement 3D.

### Pistes pour l'inclinaison de l'écran

- [CSS skew](https://developer.mozilla.org/en-US/docs/Web/CSS/transform-function/skew)
- [CSS matrix](https://developer.mozilla.org/en-US/docs/Web/CSS/transform-function/matrix)
- [Effet d'inclunaison avec parallax 3D en web gl](https://www.sbs.com.au/missing/)
  Deux solution soit skew(), soit matrix().
  Skew est plus limité au niveau des fonction et l'effet donne un aspect déformé un peu cheap dans certains cas.
  Matrix est à la base de tt les transformation CSS il permet d'avoir plus de contrôle sur la transformation et ainsi d'avoir un fini plus propre.

Il va y avoir deux façons d'exploiter les déformation et à coup sur il me faudra du JS soit je divise mon écran en 4 zone comme dans un système de coordonnées cartésiennes avec X et Y et en fonctione de ma souris j'effectue une de c'est 4 transformations en fonction de la partie de plan dans laquelle elle se trouve, soit je calcul la transformation à la volée en fonction de la position de la souris par rapport au centre de ce plan (point 0,0).
Le calcul à la volée donnera un meilleur aspect selon moi.

### Piste pour le filtre d'images

- Pixi js
- [Distorsion image au survol de la souris](https://codepen.io/daniel-hult/pen/WNvRLXY)
- [Distorsion image avec slide](https://codepen.io/daniel-hult/pen/JjdEQZQ)
- [Color transisition image](https://codepen.io/daniel-hult/pen/JjdEQZQ)

- Three js
- [Image filter with pixel manipulation](https://www.martin-laxenaire.fr/)

Pour la conparaison de Pixi js et Three js, pixi à l'air de propser plus de filres et de manipulation d'images ce qui est plus intéressant pour mon, tandis que three js à l'air lui de proposer plus de la manipulation d'objets 3D.
