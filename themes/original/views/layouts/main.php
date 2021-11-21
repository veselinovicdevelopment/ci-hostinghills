<?php //$page = $this->template; ?>
<?php $section = $this->template->template['partials']; ?>
<!DOCTYPE html>

<html lang="<?php echo lang( 'lang_code' ); ?>">

<head>
	<meta charset="utf-8" />
	<?php
	$favicon = config_item( 'site_favicon' );
	$ext     = substr( $favicon, -4 );
	?>
	<?php if ( $ext == '.ico' ) { ?>
	<link rel="shortcut icon" href="<?php echo theme_assets(); ?>images/<?php echo config_item( 'site_favicon' ); ?>">
	<?php } ?>
	<?php if ( $ext == '.png' ) { ?>
	<link rel="icon" type="image/png" href="<?php echo theme_assets(); ?>images/<?php echo config_item( 'site_favicon' ); ?>">
	<?php } ?>
	<?php if ( $ext == '.jpg' || $ext == 'jpeg' ) { ?>
	<link rel="icon" type="image/jpeg" href="<?php echo theme_assets(); ?>images/<?php echo config_item( 'site_favicon' ); ?>">
	<?php } ?>
	<?php if ( config_item( 'site_appleicon' ) != '' ) { ?>
	<link rel="apple-touch-icon" href="<?php echo theme_assets(); ?>images/<?php echo config_item( 'site_appleicon' ); ?>" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo theme_assets(); ?>images/<?php echo config_item( 'site_appleicon' ); ?>" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo theme_assets(); ?>images/<?php echo config_item( 'site_appleicon' ); ?>" />
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo theme_assets(); ?>images/<?php echo config_item( 'site_appleicon' ); ?>" />
	<?php } ?>

	<title><?php echo $template['title']; ?> | <?php echo config_item( 'company_name' ); ?></title>
	<meta name="description" content="<?php echo config_item( 'site_desc' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="<?php echo theme_assets(); ?>css/bootstrap.min.css" type="text/css" /> -->
	<link rel="stylesheet" href="<?php echo theme_assets(); ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo theme_assets(); ?>css/reset.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo theme_assets(); ?>css/my_style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo theme_assets(); ?>css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo theme_assets(); ?>css/pricing-table.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo theme_assets(); ?>css/sweetalert.css" type="text/css" />

	<?php
	$family = 'Lato';
	$font   = config_item( 'system_font' );
	switch ( $font ) {
		case 'open_sans':
			$family = 'Open Sans';
			echo "<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext,greek-ext,cyrillic-ext' rel='stylesheet' type='text/css'>";
			break;
		case 'open_sans_condensed':
			$family = 'Open Sans Condensed';
			echo "<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&subset=latin,greek-ext,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>";
			break;
		case 'roboto':
			$family = 'Roboto';
			echo "<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700&subset=latin,greek-ext,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>";
			break;
		case 'roboto_condensed':
			$family = 'Roboto Condensed';
			echo "<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,300,700&subset=latin,greek-ext,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>";
			break;
		case 'ubuntu':
			$family = 'Ubuntu';
			echo "<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500,700&subset=latin,greek-ext,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>";
			break;
		case 'lato':
			$family = 'Lato';
			echo "<link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
			break;
		case 'oxygen':
			$family = 'Oxygen';
			echo "<link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>";
			break;
		case 'pt_sans':
			$family = 'PT Sans';
			echo "<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>";
			break;
		case 'source_sans':
			$family = 'Source Sans Pro';
			echo "<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>";
			break;
	}
	?>
	<style type="text/css">
	body {
		font-family: '<?php echo $family; ?>';
	}
	</style>

	<!--[if lt IE 9]>
			<script src="js/ie/html5shiv.js" cache="false">
			</script>
			<script src="js/ie/respond.min.js" cache="false">
			</script>
			<script src="js/ie/excanvas.js" cache="false">
			</script> <![endif]-->
	<!-- <script src="<?php echo theme_assets(); ?>js/jquery.min.js"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	var base_url = '<?php echo base_url(); ?>';
	var slideIndex = 0;
	$(document).ready(function() {
		if (document.getElementsByClassName("mySlides")) {
			showSlides();
		}
	})

	function showSlides() {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		if(!slides.length) return
		var dots = document.getElementsByClassName("dot");
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		slideIndex++;
		if (slideIndex > slides.length) {
			slideIndex = 1
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex - 1].style.display = "block";
		dots[slideIndex - 1].className += " active";
		setTimeout(showSlides, 2000); // Change image every 2 seconds
	}
	</script>
</head>

<body>
	<?php echo $section['header']; ?>

	<!--  
	<?php
	if ( ! $this->uri->segment( 1 ) || $this->uri->segment( 1 ) == 'domain' || $this->uri->segment( 1 ) == 'domain-name-search' || $this->uri->segment( 1 ) == 'domain-transfer' ) {

	} else {
		include active_theme() . '/views/sections/page_header.php';
	}
	?>
	 -->

	<?php echo $template['body']; ?>

	<?php echo $section['footer']; ?>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- <script src="<?php echo theme_assets(); ?>js/bootstrap.min.js"></script> -->
	<!-- <script src="<?php echo theme_assets(); ?>js/sweetalert.min.js"></script> -->
	<script src="<?php echo theme_assets(); ?>js/script.js"></script>
</body>

</html>
