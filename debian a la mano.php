<!DOCTYPE html>
<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="content-type">
    <meta name="title" content="Sons">
  <meta name="keywords" content="media">
    <title>DEBIAN A LA MAIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">

  </head>
  <body>
    <header>
      <h1>BANIERE</h1>
    </header>
    <!-- louais a la base j'ai un nav class et ca colle le texte du content tout en ba s c pas normal -->
    <nav class="col-sm-2 nav">
      <?php
    include("index.php");
  ?>
    </nav>
    <div class="col-sm-10 content">

      <h1> Debian a la main</h1>

      <p>comme debian ma pensée est libre,comme sid, mon instinct bidouilleur,
      comme openbox, mon appart minimal</p>

      <h2>breve intro:</h2>
      <p>ca me soule un peu d'etre a la merci de l'arrivage de paquets dans la
      goulotte de debian stable (squeeze actuellement)<br>
      la testing (wheezy) peut poser quelques soucis mais avec une bonne
      connaissance vous serez en possessions de logiciels plus<br>
      recent en passe d'etre sur la prochaine versions stable (une maj de
      distrib peut prendre des années).<br>
      et nous avons la sid, unstable qui est souvent mis a jour par le fait que
      certains paquets pose probleme, sur cette version<br>
      nous aurons apparemment quelques soucis de dependances qui peuvent poser
      probleme pendant 3 jours.<br> </p>

      </p>bref, je suis impatient, j'en ai marre d'avoir un paquet non installable a
      cause d'une probleme de dependances et de ne<br>
      pas pouvoir telecharger la derniere maj de flare ou de rythmbox a cause
      d'un bridage et tout ca pour? une stabilitée<br>
      imcomparable mouharff! bon ok jvais ptete le regretter.</p>

      <h2>resumé</h2>

      <p>
      aller un resumé de ce qui va se passer:<br>
      installation de debian sid sur un portable presario C500EA</p>
      <ol>
      <li> dl du netinstall de debian sid</li>
      <li> copiage sur cle usb</li>
      <li> preparation de boot du bios</li>
      <li> installation</li>
      <li> partition</li>
      <li> choix des paquets</li>
      <li> installation d'openbox</li>
      <li> configuration supplementaires</li>
      </ol>

      <h2>en detail </h2>

      <ol>
      <li> la distribution en netinstall est dispo sur le <a href="https://www.debian.org/distrib/netinst">site
        officiel </a>attention ici, si vous avez quelques pilotes necessitant
      les proprietaires chercher la debian adequates.</li>
      <li> <a href="http://unetbootin.sourceforge.net/">unetbootin</a> m'a
      grandement facilité la vie, sous windows formattage de la cle
      choix de la distribution et hop</li>
      <li> un coup de F10, selon le fabricant l'acces au bios peut etre different<br>
      aller mettre boot usb en 1er, j'ai desactivé le lecteur cd, et mis le
      disque dur en dernier afin de laisser
      les bidules marqués ***USB car je ne sait pas reelement lequel lance
      unetbootin.</li>
      <li> unetbootin se lance</li>
      <li> la partition, j'ai laisser debian s'en charger, je n'aurai pas fait
      comme il me la mis mais bon c'etait ma 8eme install, car y'a un probleme que j'avais je vous en parlerai par la suite,
      </li>
      <li> j'ai laisser le choix des paquets par defaut, j'ai juste desactiver
      l'environnement bureau, car je vais test openbox<br>
      !! ce qui nout fera lancer linux en mode console, il faudra avoir une
      petite habitude de la console pour cela</li>
      <li> la tout s'install, il arrive ensuite l'installation de GRUB sur le
      secteur d'amorcage<br>
      la un message me lance que "grub-install /dev/sdb ne peut etre installé,
      cette erreur est fatal"<br>
      le probleme vien de la cle usb, llors de cette demande d'installation il
      faut enlever la cle usb, vous n'en aurez plus besoin<br>
      relancer l'installation de grub, il va s'installer.</li>
      <li> debian demande de relancer le pc sans la clef usb</li>
      <li> lancement, le systeme charge, et nous propose de nous logger, la logger
      vous direct en root car vous aller jouer du apt-get</li>
      <li> apt-get install openbox : il vous lancera un bon nombre de paquet a
      installer marquez O et entre
      il installera automatiquement obconf en plus</li>
      <li> si vous lancer un openbox-session, la vous aurez un "echec de
      l'ouverture depuis la variable display"<br>
      <li> un petit apt-get install xorg, serait le bienvenue, le soucis s'est
      qu'il va vous installer max de paquet de xorg<br>
      je pige pas pourquoi</li>
      <li> un relancement de openbox-session renvoie encore le message?<br>
      alors lancer un simple "startx" et vous etes sur openbox!!!!!!</li>
      </ol>
      <h2>configuration d'un pc fonctionnel et plus:</h2>


      actuellement je suis donc sur openbox, obconf (le menu en click droit est
      la, mais limité)<br>
      mon terminal fonctionne mais est en anglais<br>
      je pense que je demarre en console a chaque fois<br>
      <br>
      <h3> internet </h3>
      du coup je commence a installer iceweasel (firefox modifié, celui-ci n'a
      pas de paquet dispo sur sid a ce moment)<br>
      <code>apt-get install iceweasel </code> <br>
      je lance iceweasel, j'evite de le reduire car je n'ai pas de barre de menu<br>
      <br>
      bon j'ai internet, je ne sait pas par quel logiciel, mais ca marche, je
      peut plus facilement trouver la commande pour un clavier en francais<br>
      <br>

      <h3>clavier fr </h3>
      pour le clavier en francais j'ai test du reconfigure tout le bazar, mais
      la bonne vieille commande "setxkbmap fr" fonctionne<br>
      l'inconveniant de cette technique est qu'au prochain demarrage, il risque
      de se remettre en us.<br>
      il faudra editer ca dans le rc.xml de openbox:<br>
      <br>
      === ect/xdm/openbox/autostart.sh<br>
      metter a la fin sans diese <br>
      setxkbmap fr &amp;<br>
      tint2<br>

      <br>
      j'ai quoi sur mon pc? j'ai suivi betement l'install de debian mais je ne
      sait meme pas quels sont les logiciels installés,<br>
      on peut le savoir en ligne de commande mais ca me fait chier dont je vais
      installer synaptic, histore d'avoir une vue hi-tech des paquets, et je vais chercher en 1er lieu l'editeur de texte.<br>
      <br>
      j'ai nano et vim d'installé, je vais utiliser nano, vim je connais pas<br>
      <br>
      &nbsp;j'install quoi?<br>
      j'en sait rien en fait ce qui me gene pour l'instant c'est de ne pas avoir
      de barre de menu et je ne sait pas comment avoir acces <br>
      au gestionnaire de fichiers graphique, bon je commence par thunar.<br>
      <br>
      <h3>thunar</h3>
      <code>apt-get install thunar</code><br>
      <a href="http://doc.ubuntu-fr.org/thunar">http://doc.ubuntu-fr.org/thunar </a><br>
      en naviguant dans thunar, je vois que j'ai que les nom et pas les icones
      wtf???, on verra plus trd<br>
      ==&gt; donc j'ai un message dns la console qui me balance un "gtk-critical
      **: IA__gtk_drag_source_set_icon_name "icon_name != NULL" failed<br>
      bon ca veut pas dire grand chose, enfin que ca marche po.<br>
      on a quand meme des piste, il parle de gtk et d'icones, apparemment les
      gens posent un lxappearence je ne sait a quoi il sert.<br>
      en fait: <br>
      le theme ne gere pas les icones, notemment celle de thunar, il faut trouver
      le moyen de les exploiter, les icones ne sont pas installées<br>
      <br>
      source sur les icones la:
      <a href="https://awesome.naquadah.org/wiki/Customizing_GTK_Apps/fr">https://awesome.naquadah.org/wiki/Customizing_GTK_Apps/fr </a>
      <br>
      <br>

      <h3>lxappearence</h3>
      le plus simple d'utilisation, mais en l'utilisant je viens
      de m'apercevoir que la console balance<br>
      un message bizzare, glib-gobject critical.... : de se que j'ai vu, il y
      aurai un bug avec la version actuel de gtk2<br>
      soit on downgrade gtk2, soit on essaye autre chose.<br>
      <br>
      gtk-chtheme; gnome color chooser.....: <br>
      <br>
      les forum qui parle du pb d'icon.<br>
      <a href="https://bbs.archlinux.org/viewtopic.php?id=35978">https://bbs.archlinux.org/viewtopic.php?id=35978 </a>
      <br>
      <a href="http://askubuntu.com/questions/173800/thunar-icons-missing">http://askubuntu.com/questions/173800/thunar-icons-missing </a>
      <br>
      <br>
      en mode a la mano:<br>
      il nous faut un paquet de petites images, les icones donc, comme tango par
      exemple<br>
      le tango icon est trouvable dans synaptic et sur le site officiel
      <a href="http://tango.freedesktop.org/">http://tango.freedesktop.org/ </a>
      <br>
      installez le<br>
      qui sera dans usr/share/icon/tango<br>
      nous devrons jouer avec le gtkrc se trouvant dans le home en fichiers
      caché<br>
      et peut etre avec le .gtkrc.mine qui devra etre integre en include au
      gtkrc.2.0<br>
      nous allons donc jouer avec le gtkrc 2.0 et le gtkrc.mime<br>
      <br>
      verifier si vous avez bien un gtkrc.2.0 dans le /home/perso sinon creer en
      un et aussi un<br>
      .gtkrc.mime<br>
      home/perso/.gtkrc2.0 ==&gt; include "/home/pers/.gtkrc.mime"<br>
      la je ne sait pas:j'ai poser le theme icone dans les 2 fichiers au cas ou<br>
      .gtkrc.2.0 ==&gt; gtk-icon-theme="Tango"<br>
      la meme chose dans le gtkrc.mime<br>
      <br>
      !! A noter !! le gkt3 commence a etre bien present sur les distrib
      recentes et vous risquer de retomber dns le probleme<br>
      des icones au point que certaine fenetre refusent de se lancer (comme
      synaptic et c'est chiant)<br>
      il vous faudra installer un paquet compatible avec gtk3<br>
      <br>
      il m'a fallu rebooter pour prendre en compte le truc<br>
      <br>
      <h3>tint2</h3>
      le barre de tache: une tite barre de tache c'est cool quand meme alors
      j'install tint2 qui est faite specialement pour<br>
      openbox. elle fonctionne mais il faudra aussi la mettre dans le rc.xml<br>
      infos d'ubuntu sur le sujet:<a href="http://doc.ubuntu-fr.org/tint2">http://doc.ubuntu-fr.org/tint2 </a> <br>
      le redemmarage me prend en compte la barre de tache tint2 automatiquement,
      les parametre de defaut me convienne<br>
      pour l'instant je n'y touche pas.<br>
      <br>
      a ce moment j'au donc un menu click droit en auto qui ne possede pas
      beaucoup de raccourci, je peut soi modifier<br>
      et ajouter des truc a la main, soit telecharger "obmenu", interface
      graphique pour gerer mes raccourci<br>
      <br>
      j'ai aussi thunar, un theme de fenetre et d'icone, iceweasel en anglais,
      geany editeur de texte, un terminal<br>
      (j'en ai 3 d'installer je pense passer a terminator et supprimer les
      autres), je pense deja voir ce qu'il me faut pour la lecture <br>
      video et audio notamment sur iceweasel.<br>
      <br>
      <h3>installation de flashplugin-nonfree </h3>
      un redemarrage de ice et la ca marche par contre je n'ai pas le son oO<br>
      <br>
      <h3>== serveur son</h3>

      il nous faudra un pilote et un serveur audio.<br>
      <br>
      le pilote: permet au noyau des gerer le materiel audio, c'est une couche
      invisible a l'utilisateur<br>
      le sereur son: interface entre le pilote et le logiciel de lecture audio,
      gere les flux entree sortie<br>
      le logiciel audio: lecture audio par le naviguateur, mplayer, vlc...<br>
      <br>
      anciennement OSS etait utilisé, maintenant principalement on utilise ALSA,
      celui-ci possede un module pour<br>
      gerer les appli qui utilisait oss.<br>
      on installera alsa , alsa-utils, alsamixer.<br>
      <br>
      1.commencer a regarder si votre carte est detecté, sorter le manuel de
      l'acaht de votre pc, il doit doner le nom de la carte<br>
      ou son chipset audio dns un pcportable.<br>
      lancer dns le terminal la commande <br>
      lspci | grep -i audio &nbsp; &nbsp; &nbsp; elle doit retourner le nom de
      la carte<br>
      lsusb | grep-i audio &nbsp; &nbsp; &nbsp; donne la meme chose pour une
      carte son par usb<br>
      <br>
      pour avoir le chipset lancer:<br>
      <code>cat /proc/asound/pcm</code><br>
      <br>
      ces 1er commande sont la pour verifier si la carte est reconnu, si ce
      n'est la cas, demmerdez vous car moi ca fonctionne<br>
      mais je n'ai toujours pas de son.<br>
      <br>
      <h3>le controle du son:</h3>
      en esperant que votre pc est deja configurer en therme de relation
      pilotes/materiel on espere que ce ne soit que les <br>
      controle du volume audio qui soit touché:<br>
      le controle est géré par amixer ou alsamixer, je vais utiliser alsamixer
      il sera en mode console vous jouerez<br>
      avec les fleches bah haut pour monter le son et faites vos test avec un
      lecteur, j'ai user d'une video sur du flash<br>
      il faut que vous utilisiez un truc ou vous savez qu'il est bien installer
      avec les codecs necessaires. <br>
      l'icone raccourci de volume, <br>
      je viens de voir sur ce site
      <a href="http://softwarebakery.com/maato/volumeicon.html">http://softwarebakery.com/maato/volumeicon.html </a>
      <br>
      mais je ne trouve pas pour l'installer alors en naviguant dans synaptic je
      suis tomber sur<br>
      volumicon-alsa le lancer avec la commande volumicon, il sera a rajouter au
      autostart<br>
      l'autostart dns le /home n'est pas, il se trouve directement dans
      /etc/xdg/openbox<br>
      dans lequel on ajoutera "volumeicon &amp;" sans les "" et sans le &amp; si
      vous n'avez pas d'appli a ajouter.<br>
      <br>
      <h3>le Gestionnaire de session:</h3>
      il s'agit d'une application qui, au lancement de votre ordinatur lancera
      une interface graphique de session, <br>
      au lieu de faire en mode console&nbsp; de marquer votre login et votre mot
      de passe, et ensuite lancer un<br>
      "startx" pour acceder au bureau graphique, vous aurez un ecran demandant
      login et mot de passe<br>
      en graphique et lancant automatiquement votre bureau.<br>
      <br>
      en regardant vite fait il en exite 5 ou 6 le plus connu sera gdm de gnome
      (kdm, lxdm, xdm ...)<br>
      sous synaptic, je m'apercois que xdm demande pas mal de paquets, je ne
      veut que gdm<br>
      pourquoi il me parle de brasero -_-, celui qui ne m'installe que le widow
      manager est slim<br>
      vieillot, il me semble correct donc je l'install.<br>
      le wiki:<a href="http://fr.wikipedia.org/wiki/SLiM">http://fr.wikipedia.org/wiki/SLiM </a> <br>
      le site:<a href="http://slim.berlios.de/">http://slim.berlios.de/ </a> <br>
      des l'install, il se configure par defaut et au reboot il fonctionne il ne
      vous reste qu'a faire <br>
      vos parametre graphique, je le laisse comme ca pour l'instant.<br>
      <br>
      <h3>un resumé de ce qui a ete fait jusqu'a present:</h3>
      recuperer debian et le copier sur usb en installeur avec modif du bios pr
      botter sur l'usb<br>
      installation d'openbox<br>
      clavier en francais<br>
      installation de thunar<br>
      installation d'un theme d'icone<br>
      installation d'un nav internet + flashplugin, editeur de texte<br>
      installation du son + icone de volume + gerer touche clavier son<br>
      installation d'une gestionnaire de session.<br>
      <br>
      on a donc un pc qui fonctionne correctement,<br>
      ce qu'on peut reprocher, il y a des paquets qui sont surement en trop
      (rien que le fait des theme supplementaire install�)<br>
      , le chargement me semble un peu long<br>
      il manques quelques logiciel, l'interface slim est moyenne, le wi-fi n'est
      pas gerer je ne sait pas comment <br>
      est geré le net,&nbsp; <br>
      <br>
      <h3>le theme des fenetres pas obconf:</h3>
      le theme des fenetres (couleur toussa) peut etre geré simplement pas
      obconf, avec une previsualisation<br>
      je choisis facilement des themes sombre pour baisser l'aggressivitée d'un
      ecran blanc pendant mes insomnies<br>
      pour ce qui est de la legende de l'encran noir = basse consommation, ceci
      est vrai pour les ecrans<br>
      cathodique le nois correspond a un pixel eteind, mais sur un lcd ce n'est
      pas vrai.<br>
      une image sombre ne va pas exiter la retine et permet d'etre moins enervé
      que sur un ecran lumineux.<br>
      <p> </p>
    </div>
  </body>
</html>
