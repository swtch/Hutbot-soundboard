<?php
if ( !isset($_COOKIE["isGranted"]) || $_COOKIE["isGranted"] == NULL){
       setcookie("isGranted", NULL, -1);
       header('Location: ./index.php');
   }
    session_set_cookie_params(0);
    session_start();
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html">
	<head>
		<title>TheHut - SoundBox</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/bootstrap-table/src/bootstrap-table.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
 	<body onload="javascript:get_sound()">
<script type="text/javascript" src="assets/js/essai.js"></script>
<script type="text/javascript" src="assets/js/get_sound.js"></script>
<script type="text/javascript" src="assets/js/config.js"></script>
<!-- Main -->
<div id="main">
    <div class="container main_list">
        <h3>🎉 💪TheHut SoundBoard, by Swtch & Amne !💪 🎉</h3><br>
        <div class="row">
            <div class="col-md-12">
                <p>Les meilleurs sons du meilleur bot au monde sont accessible en un simple cliques ! 🔥</p>
                <div class="form-group">
                    <h4>📢 ⚠️Choisi la room ! ⚠️ 📢</h4>
                    <select class="form-control" id="VoiceChannel" name="VoiceChannel">
                        <option value="252894202382385162">- Room Discord -</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>👁️‍🗨️ Filter sur les catégories</label>
                    <select  class="form-control" name="sort-category" id="sort-category">
                        <option value="All"> ALL </option>
                    </select>
                </div>
                        <table class="table" >
                    <thead>
                    <tr >
                        <th >SoundName</th>
                        <th>Description</th>
                        <th >Category</th>
                        <th>Play</th>
                    </tr>
                    </thead>
                    <tbody class="listSound">

                    </tbody>
                </table>


            </div>

        </div>
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

function filterList(value) {
    var list = $(".list");
    $(list).fadeOut("fast");
    if (value == "All") {
        $(".list").each(function (i) {
            $(this).delay(200).slideDown("fast");
        });
    } else {
        $("."+value).each(function (i) {
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
