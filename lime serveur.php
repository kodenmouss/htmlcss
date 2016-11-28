<!DOCTYPE html>
<html lang="en">
<head>
  <title>lime :config serveur</title>
  <meta charset="utf-8">
  <!-- voir les meta et avoir un menu en fonction du domaine du sujet par ex video ou electro et le titre de la page pour etre genere par php -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="title" content="Sons">
  <meta name="keywords" content="media">
  <!-- le link de la page css qui sera dans le mm dossier -->
 <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- au lieu d'utiliser un div, j'utilise header qui est censé etre mon en tete de page -->
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
    <!-- le h1 devra etre mis en gros et au milieu de la page -->

<h1> lime :config serveur</h1>


<!-- <a href="h">site officiel </a> -->
<!-- <code> cela un code de dingue </code> -->
<!-- <img src="pic_mountain.jpg" alt="Mountain View" style="width:304px;height:228px;"> -->
<!-- <ol>
  <li> comme la </li>
  <li> et la </li>
</ol>  -->
<!-- list num <ul> <li> ... </li> </ul>  -->

<h2> description</h2>


<p>On peut commencer par une install fraiche:<br>
formater la carte sd, detecter l'emplacement de la carte et copier l'image via dd
detecter ou se situe la carte: on parle de son emplacement dans le /dev en general cette adresse nous sert pour la suite et eviter de formater autre choses
formater:<br>
copier l'image : <code> dd bs=4M if=Armbian.raw of=/dev/sdX </code><br>
au premier demarrage, le systeme s'initialise, la version de igor fonctionne avec le hdmi autant le connecter pour la premiere fois si l'ip n'est pas detecter le ssh sera difficile a mettre en place.
login et mdp au debut debian demandera de vous connecter en tant que root avec le mot de passe 1234
et par la suite demande de changer le mot de passe. (quelques habitude sont a prendre sur les mots de passe dois-je faire une page dessus????)<br>
un <code> apt-get update </code><br>
un <code> apt-get upgrade </code><br>
le tour est joué.<br>
nota je fonctionne avec un autre pc via ssh, sur l'image utilisé elle est activé au demarrage:<br>
pour s'y connecter, utiliser putty par exemple sur win, ou sur linux par le terminal :<br>
 <code> ssh login@ip de votre arm </code> ; cela demandera un clé pour lui faire confiance pour la suite
et vous demande le mot de passe.</p>


  <h2>installation serveur</h2>

<p> nous allons nous lancer dans une installation serveur: pour avoir un site internet et ajouter peut etre un agenda, un gitlab et par la suite un serveur mail ...<br>
les logiciels utilisable: apache ou lghttpd , php , un *sql (postgrsql, mysql, libsql...) , caldav , gitlab<br>
le choix partira sur apache je pense car lighttpd m'a poser quelques soucis en ce qui concerne le caldav.<br>
le hostname : le nom du lime2 est lime 2, il peut etre utile de le changer: <br>
<code> sudo nano /etc/hostname </code> <br>
installer apache : <code> apt-get install apache2 apache2-doc apache2-utils </code> <br>
installer php:<code> apt-get install libapache2-mod-php5 php5 php-pear php5-xcache </code> <br>
A ce moment nous pouvons deja tester si apache fonctionne:<br>
selon la commande ifconfig, vos pourrez determiner l'ip de votre serveur
et a partir d'un autre ordinateur vous pourrez noter votre ip et verifier si vous tomber sur la page d'apache.
</p>



  <h2> ajout disque dur </h2>

  <p> apache est en fonctionnement mais je doit monter mon disque dur en permanent pour leserveur:

un fdisk -l donne la liste des disques par ex:<br>

Disk /dev/sda: 232.9 GiB, 250059350016 bytes, 488397168 sectors<br>
Units: sectors of 1 * 512 = 512 bytes<br>
Sector size (logical/physical): 512 bytes / 512 bytes<br>
I/O size (minimum/optimal): 512 bytes / 512 bytes<br>
Disklabel type: dos<br>
Disk identifier: 0x000b68b6<br>
<br>
Device     Boot Start       End   Sectors   Size Id Type<br>
/dev/sda1        2048 488397167 488395120 232.9G 83 Linux<br>
<br>
Disk /dev/mmcblk0: 1.9 GiB, 2002780160 bytes, 3911680 sectors<br>
Units: sectors of 1 * 512 = 512 bytes<br>
Sector size (logical/physical): 512 bytes / 512 bytes<br>
I/O size (minimum/optimal): 512 bytes / 512 bytes<br>
Disklabel type: dos<br>
Disk identifier: 0x000be016<br>
<br>
Device         Boot Start     End Sectors  Size Id Type<br>
/dev/mmcblk0p1       2048 3911679 3909632  1.9G 83 Linux<br>
<br>
<br>
nous savons donc que nous avons comme disque un sda de 232 gib et un mmcblk0 de 2go<br>

notre disque n'est pas monter, celui-ci pour etre monter en permanant a besoin d'un endroit de montage, il n'est pas conseillé de le coller dans media ni dans mnt
ceux ci on comme particularité d'etre utilisé temporairement.<br>

alors on peut faire un mkdir disque, le dossier disque aura le montage du disque.<br>

pour le monter nous aurons : mount -t ext3 /dev/sda1 /disque<br>

on peut le rendre permanant en editant fstab, pour le mieux il est utile de connaitre son uuid<br>

pour cela lancer la commande: blkid<br>

ensuite on peut faire un nano /etc/fstab : UUID=8244710a-5cce-49ad-8b93-a92b5d2e53a0    /disque  ext4 defaults    0 0<br>

on peut aussi definir les droits du disque: ???????????????? </p><br>

<h2>apache </h2>

<p>definir maintenant apache pour que le dossier du serveur soit sur le disque dur que l'on vient de monter.<br>

dans /etc/apache2.conf a la loigne Directory /var/www remplacer pas note /disque<br>

dans site avaible changer aussi cette adresse sur le fichiers 000-default<br>

donner aussi (peut etre le droit de ecture a www-data : chown www-data /disque -Rf<br>
le rf est recurssif ici.<br>

Afin d'activer un site dont la configuration est stockée dans sites-available, utilisez a2ensite (Apache 2 Enable Site) :<br>

a2ensite<br>

et tester sur votre localhost, moi ca marche passon maintenant a l'ip sur le web.<br>

pour cela nous aurons juste a ouvrir les port sur notre routeur pour les rediriger le http et https voir d'autre selon votre config<br>

nous redirigeons les port 80 et 443 en tcp (le udp n'est pas obligatoire) dans la section nat ou un autre nom sur votre root<br>


ceci fait vous devriez y avoir acces sur un autre pc :<br>
a noter que vous ne pourrez y acceder depuis votre reseau local, ce n'est rien mais il faut y penser car j'ai perdu du temps a croire que ca ne marchais pas.<br>

le DNS : le dns est un systeme permettant de donner un nom pour l'ip comme duckduckgo.com peut aussi etre accessible par son ip.<br>
le plus est que l'on peut avoir un nom de site sur plusieurs ip, le dns choisira le plus proche. et les configurations avancées,
je pense a la pose d'un serveur mail prefere le dns par ip cela peut fonctionné mais sera quasi systematiquement bloqué par les serveurs prorio.</p>

<h3> le ssl </h3>

<p>Le SSL : le ssl est un tunnel permettant d'eviter de transferer des paquets lisible entre le serv et le terminal<br>

il s'agit d'un fonctionnement par certificat, en gros on a un signature logicielle un peu la carte d'identité du serveur, on peut se faire renseigné par un autorité
distribuant ces certificat pour une ceraine somme (quelquefois gratuit), mais on peut aussi l'autosigné de maniere gratuite mais pas officielle au yeux des autoritées
cela aura pour consequence d'avoir le naviguateur afficher une page de site dangereux ^^ , une permision sera faite par le naviguant pour y acceder.<br>

nous devons donc installer openssl = apt-get install openssl<br>

apache possede deja un ssl d'activé en autosignature, celui-ci nous evitera la configutration qui ma foi est assez difficile<br>

pour l'activer:<br>

a2enmodssl<br>
a2ensite default-ssl<br>
service apache2 reload<br>
<br>
la premiere ligne active le mod ssl<br>
nous activons le parametre default-ssl comme nous avions fait precedemment pour le parametre en port 80<br>
nous relancons le serveur apache<br>
on tape dans un naviguateur notre page internet sur lequel nous nous connecterons par https://ip et verifier si cela fonctionne<br>
mon naviguateur a crier "houlala c pas secure" alors notre ssl fonctionne.<br>

il devient de coutume de se connecter en https au lieu de http ; (httpseverywhere est toujours installer chez moi^^)<br>
nous pouvons peut etre desactiver le port 80:<br>

et peut etre ne pas le desactiver totalement mais le rediriger vers le port 443 (https) est plus interessant, l'user tombera sur le site, ca fait un port d'ouvert<br>
en plus mais bon. la flemme de tester mais c'est peut etre le default-ssl qui prend le pas??<br>

pour que le port 80 redirige vers le port 443 (tsl) dans vorte virtualhost posez ca:<br>
Redirect "/" "https://www.example.com/"<br>

peut etre qu'un reboot s'imposera, en reload apache le http ne m'affichais plus rien apres un reboot c'etait bon il redirigeai en https^^
 </p>

 <h3>cacher la version apache </h3>

 <p>cacher la version de apache: dans le fichiers /etc/apache2/conf-available/security.conf<br>

on peut mettre servertoken minima a la place de OS<br>
et mettre off server signature.<br>

et on fait service apache2 reload<br>
 </p>

 <h3>mysql </h3>

 <p>bon vu que j'ai bien envie de poser un calendrier dessus pour avoir un emploi du temps, je dois avoir une base de données celles-ci sont en *sql
mysql sdlite postgrsql ....<br>

pour le cal, davical est assez connu, baîkal est un peu plus recent , la difference entre les deux est que davical use de postgrsql (et j'ai eu un probleme d'UTF precedemment)
baïkal use soit de mysql ou sqlite.<br>

bon deja je penche vers baikal; mais lequel prendre je me penche donc sur un hypothetique serveur supplementaire quita a vois un -sql autant qu'il serve.<br>

gitlab peut fonctionner avec mysql donc on part la dessus alors que ce n'est pas mon choix prioritaire (comme apache ).<br>



Mysql : .<br>


on peut installer via la commande:<br>

aptitude install mysql-server php5-mysql<br>

apres l'install on peut verifier si mysql repond:<br>


mysql --user=root --password=votrepasswdmysql --user=root --password=votrepasswd<br>


on devrais avoir un truc commencan par welcome to the mysql monitor </p>

<h3>baikal </h3>

<p>pour baikal on le decompresse dans notre /disque<br>


cd /stock/serv/<br>
root@lime2:/stock/serv# mv baikal-flat/ baikal/<br>
root@lime2:/stock/serv# chown -R www-data:www-data baikal/<br>
root@lime2:/stock/serv# chmod 755 baikal<br>
root@lime2:/stock/serv# cd baikal/<br>
root@lime2:/stock/serv/baikal# chmod 755 Specific/<br>
root@lime2:/stock/serv/baikal# chmod 755 Specific/db<br>
root@lime2:/stock/serv/baikal# chmod 755 Specific/db/db.sqlite<br>
root@lime2:/stock/serv/baikal# touch Specific/ENABLE_INSTALL<br>


on reboot apache<br>


on devrais arriver a quelqueschose de bien, or la base de sql n'est pas existante:<br>
nous pourrons via notre site acceder a baikal :<br>

https://ip/baikal/admin ; dans le tuto il nous parle de baikal or celui-ci n'affiche rien, le premier demarrage doit se faire avec admin pour configurer tout cela.<br>

nous aurons besoin d'avoir comme info celle du mdp (non configuré je pense a ce moment) le compte est admin ; et de connaitre la bdd de mysql (precedemment nous l'avons appeler baikal)<br>

NOTA: si baikal nous envoie un message d'erreur au sujet de mysql/sqlite  cela veut dire que mysql n'est pas lié au serveur (apache ou baikal je ne sait pas).<br>



cd /var/www<br>
sudo chown -R www-data:www-data baikal<br>
mysql -u root -p #password#<br>
```

```mysql<br>
CREATE DATABASE baikal;<br>
GRANT DELETE, INSERT, SELECT, UPDATE ON baikal.* TO 'baikal'@'localhost' IDENTIFIED BY '#password#';<br>
exit<br>
```

```sh<br>
mysql -u root -p --database baikal < /stock/serv/baikal/Core/Resources/Db/MySQL/db.sql<br>
sudo touch /var/www/baikal/Specfic/ENABLE_INSTALL<br>
sudo chown www-data /var/www/baikal/Specific/ENABLE_INSTALL<br>


on doit aussi parametrer le virtualhost sur apache, moi ca marche sans et surtout je n'ai pas de DNS.<br>


le fichiers install.md : donne de bonnes infos sur le sujet.<br>




pour la synchro cela est un peu penible a poser:<br>


on a des synchroniseurs pour que tout fonctionne correctement.<br>

pour la connection il faut noter le chemin specifiqe https://ip/baikal/cal.php/calendars/name/IDcalendrier/<br>

cela ma poser des problemes il nous faut coller le id du calendrier. </p>

</div>
  </div>
</div>
</body>
</html>
