<?php
include 'emoticons.php';

class Application {

	private $emoticons = array(
	'whatever' => '¯\_(ツ)_/¯',
	'idontcare' => '╭∩╮（︶︿︶）╭∩╮',
	'dong' => '(̿▀̿ ̿Ĺ̯̿̿▀̿ ̿)̄',
	'tableflip' => '(╯°□°）╯︵ ┻━┻)',
	'test' => 'Test successfull!',
	'haha' => '☜(ﾟヮﾟ☜)',
	);

	function get_all() {
		echo '<?xml version="1.0"?>';
		echo '<items>';
		foreach ($this->emoticons as $key => $value) {
			echo '
				<item uid="'.$key.'" arg="'.$value.'">
					<title>'.$value.'</title>
					<subtitle>Press enter to copy into clipboard.</subtitle>
					<icon>icon.png</icon>
				</item>';
		}
		echo '</items>';
	}

	function get($query = null) {
		$query = strtolower($query);

		echo '<?xml version="1.0"?>';
		echo '<items>';
		foreach ($this->emoticons as $key => $value) {
			if(preg_match('/^'.$query.'/', $key)) {
				echo '
				<item uid="'.$key.'" arg="'.$value.'">
					<title>'.$value.'</title>
					<subtitle>Press enter to copy into clipboard.</subtitle>
					<icon>icon.png</icon>
				</item>';
			}
		}
		echo '</items>';
	}


}
?>