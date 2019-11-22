<?php 

require_once 'functions.php'; 

if($_POST['submit']){
	update($_POST['txt'], $_POST['id']);
	header("Location: ".$_SERVER['PHP_SELF']);
	exit;
}

$txt = selectTxt(); 


?>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<link rel="stylesheet" rev="stylesheet" type="text/css" href="style.css"  />
	<title>Редактор</title>	
	
	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/AjexFileManager/ajex.js"></script>
	
</head>

<body>

<div class="content">

	<form method="post">
		<textarea id="editor1" name="txt" cols="100" rows="20"><?php echo $txt[0]['text'] ?></textarea>
		<script type="text/javascript">
			var ckeditor1 = CKEDITOR.replace( 'editor1' );
			AjexFileManager.init({
				returnTo: 'ckeditor',
				editor: ckeditor1
			});
		</script>
		<br />
		<input type="hidden" name="id" value="<?php echo $txt[0]['id'] ?>" />
		<input type="submit" name="submit" value="Обновить" />
	</form>
	
</div>


</body>
</html>