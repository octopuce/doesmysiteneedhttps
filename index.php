<?php

// Redirect non-french speaking people to the English version
// (unless you put ?lang=fr at the end of the URL)
$found=false;
if (isset($_GET["lang"]) && $_GET["lang"]=="fr") $found=true;
if (isset($_SERVER["HTTP_ACCEPT_LANGUAGE"])) {
    $list=explode(",",$_SERVER["HTTP_ACCEPT_LANGUAGE"]);
    foreach($list as $one) {
        if (strtolower(substr(trim($one),0,2))=="fr") { $found=true; break; }
    }
}
if (!$found) {
    header("Location: https://doesmysiteneedhttps.com");
    exit();
}

?><!DOCTYPE html>
<html>
        <head>
                <title>Faut-il HTTPS sur mon site&nbsp;?</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <meta property="og:locale" content="fr-fr">
                <meta property="og:type" content="article">
                <meta property="og:title" content="Mon site a-t-il besoin de HTTPS ?">
                <meta property="og:description" content="Découvrez si votre site web a besoin de passer à HTTPS.">
                <meta property="og:url" content="/">
                <meta property="og:site_name" content="Caddy">
                <meta property="article:publisher" content="https://monsiteatilbesoindehttps.com">
                <meta property="article:tag" content="https">
                <meta property="article:tag" content="sécurité informatique">
                <meta property="article:tag" content="tls">
                <meta name="twitter:card" content="summary">
                <meta name="twitter:title" content="Mon site a-t-il besoin de HTTPS ?">
                <meta name="twitter:description" content="Découvrez si votre site web a besoin de passer à HTTPS.">
                <meta name="twitter:creator" content="@mholt6">
                <meta itemprop="name" content="Mon site a-t-il besoin de HTTPS ?">
                <meta itemprop="description" content="Découvrez si votre site web a besoin de passer à HTTPS.">
                <meta property="og:translator" content="@laquadrature">
                
                <link rel="stylesheet" href="font.css">
                <link rel="stylesheet" href="style.css">
                <script type="text/javascript" src="script.js"></script>
        </head>
        <body>
                <h1>
                        OUI
                        <div class="subtitle">
                                Votre site a besoin de HTTPS.
                        </div>
                </h1>

                <h2>«&nbsp;Mais mon site n'a pas de formulaire ou ne collecte pas d'informations sur ses utilisateurs.&nbsp;»</h2>
                <p>
                        Aucune importance. HTTPS protège bien plus que les données de formulaire&nbsp;! HTTPS protège la <b>confidentialité</b> des URLs, en-têtes et contenus de toutes les pages.
                </p>

                <h2>«&nbsp;Il n'y a rien de sensible sur mon site de toute manière.&nbsp;»</h2>
                <p>
                  Vous êtes responsable de votre site&nbsp;! Que votre site web soit hébergé en toute sécurité sur votre compte d'hébergement ne signifie pas qu'il ne passera pas à travers des câbles et box controllés par une longue liste d'opérateurs privés ou états. Voulez-vous vraiment que quelqu'un injecte des scripts, images, ou <a href="https://justinsomnia.org/2012/04/hotel-wifi-javascript-injection/">contenus publicitaires</a> (note: les liens de cette pages pointent vers des sites en anglais) dans vos pages, de telle sorte que cela apparaisse comme si c'était vous qui l'y aviez mis&nbsp;? Ou change des mots de votre page&nbsp;? Ou utilise votre site pour attaquer d'autres sites&nbsp;? Ce genre de chose <a href="https://gist.github.com/ryankearney/4146814">arrive</a> : dans les <a href="https://twitter.com/konklone/status/598696478018666496">compagnies aériennes</a> (<a href="https://www.theregister.co.uk/AMP/2015/01/06/gogo_ssl/">beaucoup trop </a>, très <a href="https://twitter.com/troyhunt/status/691166196268417024">souvent</a> etc.), <a href="https://citizenlab.org/2015/04/chinas-great-cannon/">en Chine</a>, même <a href="https://gist.github.com/Jarred-Sumner/90362639f96807b8315b">des FAIs</a> <a href="https://arstechnica.com/tech-policy/2014/09/why-comcasts-javascript-ad-injections-threaten-security-net-neutrality/">le font</a> (<a href="https://twitter.com/paul_irish/status/871431848957575168">trop souvent</a>). HTTPS vous protège de tout cela. Il garantit <b>l'intégrité des contenus</b> et vous permet de <b>détecter certaines intrusions</b>. Si nous ne chiffrons que les contenus confidentiels, alors nous peignons automatiquement une cible sur ces transmissions. Protégez vos communications confidentielles en les noyant dans les autres : chiffrez tout.
                </p>

                <h2>«&nbsp;Notre site est en HTTP, mais les formulaires sont envoyés en HTTPS.&nbsp;»</h2>
                <p>
                  C'est pareil que de ne pas avoir de HTTPS du tout&nbsp;! N'importe quel attaquant peut changer le lien ou l'action du formulaire pour une URL de son serveur. Il n'y a aucun moyen de détecter cela puisque cela a lieu en clair avec HTTP. <b>Chiffrez TOUT votre site, et redirigez HTTP vers HTTPS.</b>
                </p>

                <h2>«&nbsp;Je ne peux pas me payer un certificat.&nbsp;»</h2>
                <p>
                        <a href="https://letsencrypt.org">Ils sont gratuits.</a>
                </p>

                <h2>«&nbsp;HTTPS est difficile à installer et à maintenir.&nbsp;»</h2>
                <p>
		  Cela marche nativement si votre serveur web est <a href="https://caddyserver.com">Caddy</a>. Oui, y compris le renouvellement du certificat. Rien d'autre à faire. Pour les autres, HTTPS peut être automatisé très facilement en utilisant <a href="https://letsencrypt.org/docs/client-options/">un des nombreux clients Let's Encrypt disponibles</a>.
                </p>

                <h2>«&nbsp;Des attaquants peuvent quand même se faire passer pour mon site, même si j'utilise HTTPS.&nbsp;»</h2>
                <p>
		  Ils peuvent essayer, mais tant que votre clé privée restera privée, un navigateur montrera un avertissement si un attaquant présente un certificat TLS incompatible ou invalide. Et si l'attaquant tente de forcer à ne pas utiliser HTTPS, le navigateur marquera la page de l'imposteur comme non sûre. HTTPS vous garantit donc <b>l'authenticité</b>.
                </p>

                <h2>«&nbsp;Les certificats à Validation par Domaine (DV) ne sont pas sûrs.&nbsp;»</h2>
                <p>
		  Si, ils le sont. Ne perdez pas le contrôle de votre DNS et choisissez une <a href="https://letsencrypt.org">autorité de certification compétente</a> (par opposition à <a href="https://www.godaddy.com/garage/godaddy/information-about-ssl-bug/">des moins compétentes</a> ou carrément <a href="https://groups.google.com/a/chromium.org/d/msg/blink-dev/eUAKwjihhBs/rpxMXjZHCQAJ">à problèmes</a> <a href="https://bugzilla.mozilla.org/show_bug.cgi?id=1311713">ou pire</a>). Il n'y a absolument aucune différence cryptographiquement parlant entre un certificat DV ou un certificat à validation étendue (EV).
                </p>

                <h2>«&nbsp;Mais les CA peuvent émettre un certificat pour mon site n'importe quand &lt;... ou tout autre râlerie contre le système des CA&gt;.&nbsp;»</h2>
                <p>
		  Bon... Ceci n'est pas une discussion au sujet des infrastructures à clé publique (PKI). C'est le meilleur système que nous ayons à ce jour. Faites avec et sécurisez ainsi votre site. Utilisez <a href="https://tools.ietf.org/html/rfc6844">les enregistrements CAA</a> pour restreindre encore plus quelle CA a le droit d'émettre un certificat pour votre site, et croisez les doigts et espérez que la transparence et la surveillance des autorités continue (à ce jour cela marche).
                </p>

                <h2>«&nbsp;HTTPS ne cache pas la taille du contenu, donnant des indices aux attaquants.&nbsp;»</h2>
                <p>
                        TLS 1.3 et HTTP/2 utilisent des <a href="https://tlswg.github.io/tls13-spec/#rfc.section.5.4">trames de remplissage</a> pour augmenter si besoin la taille des données chiffrées.
                </p>

                <h2>«&nbsp;HTTPS ne cache pas les requêtes DNS.&nbsp;»</h2>
                <p>
                        Bien sûr que non. DNS n'est pas HTTP. Mais est-ce vraiment une bonne raison pour ne pas chiffrer les communications entre votre site et ses visiteurs&nbsp;? (Indice&nbsp;: non)
                </p>

                <h2>«&nbsp;HTTPS est lent.&nbsp;»</h2>
                <p>
                        <a href="https://istlsfastyet.com/">Non, il n'est pas lent.</a> Les sites au serveur web moderne servent HTTPS plus rapidement que HTTP, grâce à HTTP/2.
                </p>

                <h2>«&nbsp;Des sites de hameçonnage utilisent HTTPS.&nbsp;»</h2>
                <p>
                        ... donc vous ne devriez pas&nbsp;?
                </p>

                <h2>«&nbsp;Notre site affiche des publicités en HTTP.&nbsp;»</h2>
                <p>
		  Déso, mais pas déso. Cela ne change rien au fait que <b>votre site a besoin de HTTPS</b>. En passant à HTTPS avec des publicités en HTTP, vous obtiendrez un avertissement de contenu mixte sur les navigateurs, donc vous devriez trouver une manière créative de fuir cet horrible contrat de vente de publicité, apparemment attractif le jour où vous l'avez signé, ou de convaincre votre réseau de publicité de passer à HTTPS avant vous.
                </p>

                <h2>«&nbsp;Notre site marche très bien en HTTP.&nbsp;»</h2>
                <p>
                        C'est ce que <a href="https://arstechnica.com/security/2017/03/firefox-gets-complaint-for-labeling-unencrypted-login-page-insecure/">des entreprises de gaz et d'électricité internationales</a> pensaient, aussi. Jusqu'au jour où les navigateurs ont commencé à les signaler comme non sécurisés.
                </p>

                <h2>«&nbsp;Mais des mandataires (proxy) TLS peuvent casser la garantie qu'apporte HTTPS.&nbsp;»</h2>
                <p>
                        Uniquement si l'ordinateur de l'utilisateur est modifié pour avoir confiance dans ce mandataire TLS. Cela requiert des droits administrateurs (root) pour que le propriétaire de l'ordinateur l'autorise. De plus, <a href="https://jhalderm.com/pub/papers/interception-ndss17.pdf">l'interception HTTPS</a> peut habituellement <a href="https://caddyserver.com/docs/mitm-detection">être détectée par les serveurs web</a>.
                </p>

                <h2>«&nbsp;Je peux au moins servir mon site à la fois en HTTP et HTTPS.&nbsp;»</h2>
                <p>
		  La seule raison valable de conserver le port 80 de votre serveur ouvert est de rediriger toutes les requêtes vers le port 443 et fermer le port 80. (Un jour, nous pourrons fermer le port 80 entièrement.)
                </p>

                <h2>«&nbsp;Mon site n'est accessible que de manière interne ou via un VPN.&nbsp;»</h2>
                <p>
		  À quel point avez-vous confiance dans les entreprises ou états qui possèdent les infrastructures&nbsp;? Et les sociétés fabriquant le matériel dont est constitué votre réseau&nbsp;? <a href="https://www.troyhunt.com/the-importance-of-trust-and-integrity-in-a-vpn-provider-and-how-mysafevpn-blew-it/">Ou même votre fournisseur de VPN</a>&nbsp;?
                </p>

                <h2>«&nbsp;Nous protégeons les mots de passe par empreinte cryptographique.&nbsp;»</h2>
                <p>
		  Très bien. Maintenant, dites-moi que vous les collectez via HTTPS... n'est-ce pas&nbsp;?
                </p>

                <h2>«&nbsp;HTTPS a un impact sur le SEO.&nbsp;»</h2>
                <p>
		  Vous avez raison&nbsp;! HTTPS l'améliore&nbsp;! En migrant vos URLs de manière incorrecte, cela <b>pourrait</b> avoir un effet négatif sur votre classement, mais sinon <a href="https://webmasters.googleblog.com/2014/08/https-as-ranking-signal.html">HTTPS améliore votre classement SEO</a>. Assurez-vous donc juste de migrer vos URLs correctement selon les moteurs pour lesquels vous optimisez votre classement, et tout se passera bien, à part de rares effets de bords temporaires.
                </p>

                <h2>«&nbsp;C'est le rôle du navigateur que d'assurer la sécurité des utilisateurs.&nbsp;»</h2>
                <p>
		  Vrai, mais pas que. Ce n'est pas QUE le rôle du navigateur. Les navigateurs ne peuvent assurer la sécurité des utilisateurs que si le serveur confirme son identité via un certificat HTTPS. En tant que propriétaire de site, c'est votre responsabilité que de fournir cette identité à vos clients.
                </p>

                <h2>&mdash; COMMENT PASSER À HTTPS &mdash;</h2>
                <p>
		  La manière la plus simple est via <a href="https://letsencrypt.org">Let's Encrypt</a> et le serveur web <a href="https://caddyserver.com">Caddy</a>, qui active HTTPS par défaut sur tous vos sites automatiquement. Vous pouvez aussi utiliser un client indépendant Let's Encrypt nommé <a href="https://github.com/xenolf/lego">lego</a>, qui tourne sur toutes les plateformes.
                </p>
                <p>
		  Si vous avez des besoins plus spécifiques et besoin de fonctionner avec des serveurs web traditionnels, le client de l'EFF <a href="https://certbot.eff.org/">Certbot</a> sera assurément le meilleur pour vous.
                </p>
                <p>
                        Il y a plein d'autres moyens de passer votre site en HTTPS sans soucis. <a href="https://dassur.ma/things/h2setup/">Das Surma propose un guide pour divers serveurs web</a>.
                </p>

                <footer>
                        &copy; 2017 <a href="https://DoesMySiteNeedHTTPS.com">DoesMySiteNeedHTTPS.com</a>. Tous droits réservés. <br />Traduit avec la permission de <a href="https://twitter.com/mholt6">l'auteur</a>
                </footer>
        </body>
</html>

<!--
Sites qui ont besoin de HTTPS : 
        - tous


  If you like it, and you know it, put a lock on it ;) 
-->
