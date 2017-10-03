<?php
   if ( !isset($_COOKIE["isGranted"]) && !$_COOKIE["isGranted"] === true){
       setcookie("isGranted", NULL, -1);
       header('Location: ./index.php');
   }
    session_set_cookie_params(0);
    session_start();
?>

<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html xmlns="http://www.w3.org/1999/html">
	<head>
		<title>TheHut - SoundBox</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body onload="javascript:get_sound()">
	<script type="text/javascript" src="assets/js/essai.js"></script>
	<script type="text/javascript" src="assets/js/get_sound.js"></script>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">
							<!-- Logo -->
								<a href="soundboard.php" class="logo">
									<span class="symbol"><img src="images/logo.svg" alt="" /></span><span class="title">TheHut - SoundBox</span>
								</a>
							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>Menu</h2>
						<ul>
							<li><a href="soundboard.php">Home</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>
								<h1> TheHut SoundBoard, by Swtch & Amne<br /></h1>
								<p>Les meilleurs sons du meilleur bot au monde sont accessible en un simple cliques !</p>
							</header>

							<div class="select-wrapper">
								<h3>Choix de la Room</h3>
								<select id="VoiceChannel" name="VoiceChannel"/>
								<option value="252894202382385162">- Room Discord -</option>
								</select>
							</div>
							<br>
							<div class="select-wrapper">
								<h3>Filter sur les catégories</h3>
								<select name="sort-category" id="sort-category">
									<option value="All"> ALL </option>
								</select>
							</div>
							<br>

							<!--<h3>Ou rechercher</h3>
							<input type="text" id="search"/>-->
							<section class='tiles'>

							</section>
						</div>
					</div>


			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
		<script>
            $('select#sort-category').change(function() {
                var filter = $(this).val()
                filterList(filter);
            });

           /* $('#search').keyup(function(){
                var sSearch = this.value;
                $('select#sort-category').prop('selectedIndex',0);
                sSearch = sSearch.split(" ");
                $.each(sSearch, function(i){
                    $('section.tiles > article:contains("' + sSearch[i] + '"):not(:first-child)').show();
                });
			});*/

            function filterList(value) {
                var list = $(".tiles .style1 ");
                $(list).fadeOut("fast");
                if (value == "All") {
                    $(".tiles").find("article").each(function (i) {
                        $(this).delay(200).slideDown("fast");
                    });
                } else {
                    $("section.tiles").find("article[data-category*=" + value + "]").each(function (i) {
                        $(this).delay(200).slideDown("fast");
                    });
                }
            }

            $(window).on('beforeunload', function(e) {
                document.cookie = 'isGranted' + '=; expires=Thu, 01-Jan-70 00:00:01 GMT;';
            });
		</script>

	</body>
</html>