<?php
session_start();

error_reporting(-1);

if(isset($_POST['number']))
{
	$_SESSION['number'] 	= 	mt_rand(1,10);
	$guessed_number 	= 	isset( $_POST['number']) 	? (int) $_POST['number']	: 0;
	$count 			= 	isset($_SESSION['count']) 	? $_SESSION['count'] + 1	: 1;

	if($_SESSION['number'] === $guessed_number )
	{
		$text	=	'<p>' . _( 'You guessed it! The number was ' . $_SESSION['number'] . '!' ) . '</p>';

		session_destroy();
	}
	else
	{
		$_SESSION['count'] = $count;
		$text	= 	'<p>You have guessed <em>' . $count . ' times</em>.</p>'
				. '<p>The number ' . $guessed_number . ' was not correct.';
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo _( 'Guess the number' ) ; ?></title>

		<style type="text/css">
		html { font-family : sans-serif };
		</style>
	</head>

	<body>

	<h1><?php echo _( 'Guess the number' ); ?></h1>

	<?php echo $text; ?>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<input name="number" value="" min="1" max="10" step="1" />
		<input type="submit" value="<?php echo _( 'Little guess' );?>" />
	</form>

	</body>
</html>
