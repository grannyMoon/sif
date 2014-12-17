<?php
add_action( 'admin_menu', 'register_my_custom_menu_page' );

function register_my_custom_menu_page(){
    add_menu_page( 'custom menu title', 'Hjelp', 'manage_options',
    	'custompage', 'my_custom_menu_page',
    	'dashicons-smiley', 3 );
}

function my_custom_menu_page(){
?>
<style>
	img {
		border: 10px solid #FFF;
		margin: 1% 0 2%;
	}
</style>
<div class="container">
	<h1>Nytt lag</h1>
	<p>
		For å gjøre dette må du har <code>Super Admin</code> rettigheter (det rekker ikke å ha
		 bare admin :) ).
	</p>
	<h2>Opprett nettsted</h2>
	<p>
		Gå til <code>Nettsteder</code> -> <code>Opprett nytt</code>. 
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 1.png"
		width="50%" alt="">
	</p>
	<p>
		Legg til <code>Nettstedsadresse</code>, <code>Nettstedets navn</code> og <code>Administrator e-post</code>. <br>
		<code>Nettstedsadresse</code> er spesiell, den skal egentlig bestå av /avdelign/lag, slik:
	</p>
	<p>
		<code>sverresborg-if.no/fotball/gutter03</code>
	</p>
	<p>
		...men første gang den legges inn skal den legges til uten skråstreker, slik
		det er illustrert på skjermbildet.
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 2.png"
		width="50%" alt="">
	</p>
	<p>
		Når du har lagt til laget, skal du gå til <code>Rediger nettsted</code>. <br>
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 3.png"
		width="50%" alt="">
	</p>
	<p>Endre <code>Bane</code> til <code>/avdeling/lag/</code>, for eksempel <code>/fotball/gutter03/</code>. Endre
		<code>Category</code> til rett avdeling.
			<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 4.png"
		width="50%" alt="">
	</p>
	<h2>Sett tema</h2>
	<p>
		Gå til <code>Utseende -> Temaer</code> og trykk knappen <code>Aktiver</code>.
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 16.png"
		width="50%" alt="">
	</p>
	<h2>Opprett slider</h2>
	<p>
		Gå til lagsidene.
	</p>
	<p>
		Velg <code>Revolution Slider</code> -> <code>Import Slider</code>
		Sliden du skal importere finner du <a href="/her">Her</a>.
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 7.png"
		width="50%" alt="">
	</p>
	<h2>Opprett startside</h2>
	<p>Gå til <code>Sider</code>. Legg <code>Testside</code> i <code>Søppel</code>. </p>
	<p>Trykk på <code>Legg til ny</code>. Skall siden <code>Startside</code>, og sett <code>Maldokument</code> til
		<code>Hovedside for lag</code>. Trykk <code>Publiser</code>
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 8.png"
		width="50%" alt="">
</p>
	<p>
		Vi må sette denne siden som startside for laget. Går til "Innstillinger" ->
		"Lesing". Velg "En statisk side" -> "Startside" (dette er navnet vi lagde på
		siden i sted).
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 9.png"
		width="50%" alt="">
	</p>
	<h2>Opprett meny</h2>
	<p>
		Da har vi startsiden. Så trenger vi meny. Gå til "Utseende" -> "Menyer".
		Velg "Startside" og "Legg til i meny".
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 10.png"
		width="50%" alt="">
	</p>
	<p>
		Trykk på pilen for å se detaljene til menyelementet "Startside". Endre
		"Navigasjonsmerke" til Lagets navn, for eksempel "Gutter 03" (ikke "Fotball
		Gutter 03"). I CSS klasser legger du til nav-site-home. Trykk "Lagre Meny".
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 11.png"
		width="50%" alt="">
	</p>
	<p>
		Velg <code>Bestem plasseringer</code>, velg <code>Meny 1</code> og trykk <code>Lagre endringene</code>.
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 11.1.png"
		width="50%" alt="">
	</p>
	<p>
		Du har nå et menyelement i menyen.
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 12.png"
		width="50%" alt="">
	</p>
	<h2>Sett inn widgets</h2>
	<p>
		Gå til "Utseende" -> "Widgeter", og trekk de widgetene som er aktivert på
		bildet fra "Tilgjengelige widgeter" til "Sidebar Widgets". OBS!!! STANDARDTEKST TIL SUBSCRIBE FORM
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 14.png" width="50%" alt="">
	</p>
	<h2>Sett inn riktige innstillinger i kalenderen</h2>
	<p>
		Gå til "Aktiviteter" -> "Innstillinger" -> Fanen "Vis".
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 15.png" width="50%" alt="">
	</p>
	<p>
		Rull ned til "Date Format Settings" og skriv inn de verdiene i skjembildet her:
		<br><img class="" src="<?php echo get_template_directory_uri(); ?>/static/images/new-site/Image 15.1.png" width="50%" alt="">
	</p>
	<h2>Opprett bruker</h2>
	<p>
		Ikke ferdig enda
	</p>
	<p></p>
	<p></p>
</div>

<?php
}?>