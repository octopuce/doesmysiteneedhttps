<!DOCTYPE html>
<html>
	<head>
		<title>Does my site need HTTPS?</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta property="og:locale" content="en-us">
		<meta property="og:type" content="article">
		<meta property="og:title" content="Does my site need HTTPS?">
		<meta property="og:description" content="Find out if your site needs HTTPS.">
		<meta property="og:url" content="/">
		<meta property="og:site_name" content="Caddy">
		<meta property="article:publisher" content="https://doesmysiteneedhttps.com">
		<meta property="article:tag" content="https">
		<meta property="article:tag" content="infosec">
		<meta property="article:tag" content="tls">
		<meta name="twitter:card" content="summary">
		<meta name="twitter:title" content="Does my site need HTTPS?">
		<meta name="twitter:description" content="Find out if your site needs HTTPS.">
		<meta name="twitter:creator" content="@mholt6">
		<meta itemprop="name" content="Does my site need HTTPS?">
		<meta itemprop="description" content="Find out if your site needs HTTPS.">
		
		<script src="https://doesmysiteneedhttps.com/script.js"></script>
		<link rel="stylesheet" href="font.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1>
			YES
			<div class="subtitle">
				Your site needs HTTPS.
			</div>
		</h1>

		<h2>"But my site doesn't have forms or collect information from users."</h2>
		<p>
			Doesn't matter. HTTPS protects more than just form data! HTTPS keeps the URLs, headers, and contents of all transferred pages <b>confidential</b>.
		</p>

		<h2>"There's nothing sensitive on my site anyway."</h2>
		<p>
			Your site is a liability! Just because your site is hosted safely in your account doesn't mean it won't travel through cables and boxes controlled by who knows how many corporate- and state-owned entities. Do you really want someone injecting scripts, images, or <a href="https://justinsomnia.org/2012/04/hotel-wifi-javascript-injection/">ad content</a> onto your page so that it looks like you put them there? Or changing the words on your page? Or using your site to attack other sites? This stuff <a href="https://gist.github.com/ryankearney/4146814">happens</a>: on <a href="https://twitter.com/konklone/status/598696478018666496">airlines</a> (<a href="https://www.theregister.co.uk/AMP/2015/01/06/gogo_ssl/">a lot</a>, and <a href="https://twitter.com/troyhunt/status/691166196268417024">again</a>), <a href="https://citizenlab.org/2015/04/chinas-great-cannon/">in China</a>, even <a href="https://gist.github.com/Jarred-Sumner/90362639f96807b8315b">ISPs</a> <a href="https://arstechnica.com/tech-policy/2014/09/why-comcasts-javascript-ad-injections-threaten-security-net-neutrality/">do it</a> (<a href="https://twitter.com/paul_irish/status/871431848957575168">a lot</a>). And HTTPS prevents all of it. It guarantees <b>content integrity</b> and the ability to <b>detect tampering</b>. If we encrypt only secret content, then we automatically paint a target on those transmissions. Keep which of your transmissions contain secrets secret by encrypting everything.
		</p>

		<h2>"The site is HTTP, but our forms are submitted over HTTPS."</h2>
		<p>
			This is as bad as not using any HTTPS at all! All the attacker has to do is change the link or form action to a URL on his/her own server. There's no way to detect this because it happens over the wire with plain HTTP. <b>Encrypt the WHOLE site and redirect HTTP to HTTPS.</b>
		</p>

		<h2>"I can't afford a certificate."</h2>
		<p>
			<a href="https://letsencrypt.org">They're free.</a>
		</p>

		<h2>"HTTPS is difficult to set up and maintain."</h2>
		<p>
			It just works if <a href="https://caddyserver.com">Caddy</a> is your web server. Yes, including certificate renewals. No thought required. For everyone else, HTTPS can still be automated by using <a href="https://letsencrypt.org/docs/client-options/">a Let's Encrypt client of your choice</a>.
		</p>

		<h2>"Attackers can still impersonate my site, even if I use HTTPS."</h2>
		<p>
			They can try, but as long as your private key stays private, browsers will show warnings if attackers present a mismatched or invalid TLS certificate. And if the attacker does not use HTTPS at all, browsers should mark the imposter page as insecure. To this end, HTTPS guarantees <b>authenticity</b>.
		</p>

		<h2>"Domain-validated (DV) certificates aren't secure."</h2>
		<p>
			Yes they are. Just don't lose control over your DNS and choose a <a href="https://letsencrypt.org">competent certificate authority</a> (as opposed to <a href="https://www.godaddy.com/garage/godaddy/information-about-ssl-bug/">less competent</a> or <a href="https://groups.google.com/a/chromium.org/d/msg/blink-dev/eUAKwjihhBs/rpxMXjZHCQAJ">troublesome</a> <a href="https://bugzilla.mozilla.org/show_bug.cgi?id=1311713">ones</a>). There is absolutely no difference in the cryptography in a DV certificate compared to that of an extended validation (EV) certificate.
		</p>

		<h2>"But CAs can misissue for my site any day &lt;...or any other complaint about the CA system&gt;."</h2>
		<p>
			Look, this discussion isn't about PKI. It's the best system we've got for right now. Deal with it and secure your site. Use <a href="https://tools.ietf.org/html/rfc6844">CAA records</a> to restrict which CAs can issue certificates for your site, then cross your fingers and hope transparency and oversight works (it does, so far).
		</p>

		<h2>"HTTPS doesn't hide the size of the content, leaking clues to attackers."</h2>
		<p>
			TLS 1.3 and HTTP/2 have <a href="https://tlswg.github.io/tls13-spec/#rfc.section.5.4">padding frames</a> to inflate the size of the ciphertext.
		</p>

		<h2>"HTTPS doesn't hide the DNS lookup."</h2>
		<p>
			Of course not. DNS != HTTP. But is that really a valid reason not to encrypt the connection between your website and its visitors?? (Hint: no.)
		</p>

		<h2>"HTTPS is slow."</h2>
		<p>
			<a href="https://istlsfastyet.com/">No it's not.</a> Sites with modern servers load faster over HTTPS than over HTTP because of HTTP/2.
		</p>

		<h2>"Phishing sites use HTTPS."</h2>
		<p>
			... so you won't?
		</p>

		<h2>"Our site displays ads over HTTP."</h2>
		<p>
			Sorry, not sorry. Doesn't change the fact that <b>your site still needs HTTPS</b>. Switching to HTTPS with ads still over HTTP will cause mixed content warnings in browsers, so you better figure out a cute way to wiggle out of that ad publishing contract that looked really attractive when you first signed it, or convince your ad network to move to HTTPS before you do.
		</p>

		<h2>"It works over HTTP just fine."</h2>
		<p>
			That's what <a href="https://arstechnica.com/security/2017/03/firefox-gets-complaint-for-labeling-unencrypted-login-page-insecure/">Oil and Gas International</a> thought, too. Until browsers started flagging HTTP pages as insecure.
		</p>

		<h2>"But TLS proxies break the guarantees of HTTPS."</h2>
		<p>
			Only if the end user's computer is modified to trust the TLS proxy. This requires administrator (root) privileges, so the owner of the computer must allow it. Besides, <a href="https://jhalderm.com/pub/papers/interception-ndss17.pdf">HTTPS interception</a> can usually <a href="https://caddyserver.com/docs/mitm-detection">be detected by web servers</a>.
		</p>

		<h2>"At least I can still serve my site over both HTTP and HTTPS."</h2>
		<p>
			The only reason you should open port 80 on your server is to redirect all requests to port 443 and then close the connection on port 80. (Someday, maybe we can drop port 80 altogether.)
		</p>

		<h2>"My site is only accessible internally or with a VPN."</h2>
		<p>
			How much do you trust the corporation or state that owns the infrastructure? And the companies that produced the hardware that comprises your network? <a href="https://www.troyhunt.com/the-importance-of-trust-and-integrity-in-a-vpn-provider-and-how-mysafevpn-blew-it/">Or the VPN provider</a>?
		</p>

		<h2>"We hash the passwords."</h2>
		<p>
			Good for you. Now please tell me you're collecting them via HTTPS. ... you are, right?
		</p>

		<h2>"HTTPS impacts SEO."</h2>
		<p>
			You're right&mdash;HTTPS improves it! Switching site URLs improperly <b>may</b> impact your search rankings, but <a href="https://webmasters.googleblog.com/2014/08/https-as-ranking-signal.html">HTTPS actually improves them</a>. Just do the switch properly according to the search engine you're optimizing for, and everything will be fine, with only temporary side-effects at most.
		</p>

		<h2>"It's the browser's job to keep users safe."</h2>
		<p>
			True, but incomplete. It is not SOLELY the browser's job. Browsers can only keep the users safe if the server provides credentials through an HTTPS certificate. As a site owner, it's your responsibility to provide these credentials for your clients.
		</p>

		<h2>&mdash; HOW TO GET ON HTTPS &mdash;</h2>
		<p>
			The easiest way is through <a href="https://letsencrypt.org">Let's Encrypt</a> and the <a href="https://caddyserver.com">Caddy web server</a>, which enables HTTPS for all your sites automatically. You can also use a simple, stand-alone Let's Encrypt client called <a href="https://github.com/xenolf/lego">lego</a>, which runs on every platform.
		</p>
		<p>
			If you prefer a little more setup and system integration with traditional web servers, the EFF's client <a href="https://certbot.eff.org/">Certbot</a> will suit you well.
		</p>
		<p>
			There are plenty of other ways to get your site on HTTPS without much trouble. <a href="https://dassur.ma/things/h2setup/">Das Surma has a guide for several web servers</a> and CDNs like <a href="https://www.cloudflare.com">Cloudflare</a> can make your site available over HTTPS for minimal fees, if any at all.
		</p>

		<footer>
			&copy; 2017 DoesMySiteNeedHTTPS.com. All rights reserved.
		</footer>
	</body>
</html>

<!--
Sites that need HTTPS:
	- all of them


If you like it, you better put a lock on it.
-->