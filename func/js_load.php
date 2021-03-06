<?php // NECESSARY STYLES: ?>
<link rel='stylesheet' type='text/css' href='./addons/prism/prism_twilight.css' />
<link rel='stylesheet' type='text/css' href='./addons/fa_5_free/css/fa-svg-with-js.css' />
<link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/dark.css">



<?php // JAVASCRIPT: ?>
<!--script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script-->
<script type="text/javascript" src="./javascript/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./javascript/gallery_fc.js"></script>
<script type="text/javascript" src="./javascript/setdisplay_fc.js"></script>
<script type="text/javascript" src="./javascript/hide_element_fc.js"></script>

<?php // ADDONS: ?>
<script type="text/javascript" src="./addons/prism/prism.js"></script>
<script type="text/javascript" src="./addons/zenscroll/zenscroll-min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<?php
// load up CKEditor AFTER jquery
if(isset($_SESSION["login_admin".md5($_SERVER['HTTP_HOST'].trim($_SERVER['PHP_SELF']))]))
{
	$a = 0;
	if(!empty($_GET['a']))
		$a = $_GET['a'];
	if($a == 3)
	{
		echo "<link rel='stylesheet' href='./addons/CKEditor4/samples/toolbarconfigurator/lib/codemirror/neo.css'>";
		echo "<script src='./addons/CKEditor4/ckeditor.js'></script>";
	}
}
?>
<!-- here we mix-up Font Awesome 4 (remote) with Font Awesome 5 (local) elements || updated to 5.1 -->
<script src="https://use.fontawesome.com/bd3d370837.js"></script>
<!--script defer type="text/javascript" src="./addons/fa_5_free/fa-regular.js"></script>
<script defer type="text/javascript" src="./addons/fa_5_free/fa-solid.js"></script>
<script defer type="text/javascript" src="./addons/fa_5_free/fa-brands.js"></script>
<script defer type="text/javascript" src="./addons/fa_5_free/fa-v4-shims.js"></script>
<script defer type="text/javascript" src="./addons/fa_5_free/fontawesome.js"></script-->
<script defer type="text/javascript" src="./addons/fa_5_free/fa_51/js/regular.js"></script>
<script defer type="text/javascript" src="./addons/fa_5_free/fa_51/js/solid.js"></script>
<script defer type="text/javascript" src="./addons/fa_5_free/fa_51/js/brands.js"></script>
<script defer type="text/javascript" src="./addons/fa_5_free/fa_51/js/v4-shims.js"></script>
<script defer type="text/javascript" src="./addons/fa_5_free/fa_51/js/fontawesome.js"></script>
