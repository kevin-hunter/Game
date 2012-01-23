<?php
error_reporting(-1);

class RaadGetal
{
	public function __construct()
	{
		session_start();
		
		error_reporting(-1);

		if(isset($_POST['number']))
		{
			$_SESSION['number'] = mt_rand(1,10);

			$this->Raden();
		}	
	}

	private function Raden()
	{
		$guessed_number 	= 	isset($_POST['number']) 	? (int) $_POST['number']	: 0;

		if($_SESSION['number'] === $guessed_number)
		{
			echo "geraden: " . $guessed_number;

			$this->HerstartSpel();
		}
		else
		{
			$count 			= 	isset($_SESSION['count']) 	? $_SESSION['count'] + 1	: 1;
			$_SESSION['count'] = $count;
			echo "Poging #" . $count . " probeer het nog wat vaker.";
		}
	}

	private function HerstartSpel()
	{
		session_destroy();
	}

	public function titel ()
	{
		return _( 'Guess the number' );
	}
}

$spel  =  new RaadGetal();
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $spel->titel(); ?></title>

		<style type="text/css">
		html { font-family : sans-serif };
		</style>
	</head>

	<body>

	<h1><?php echo _( 'Guess the number' ); ?></h1>

	<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
		<input name="number" value="" min="1" max="10" step="1" />
		<input type="submit" value="<?php echo _( 'Little guess' );?>" />
	</form>

	</body>
</html>
