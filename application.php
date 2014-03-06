<?php
include 'emoticons.php';

class Application {

	private $emoticons = array(
	'whatever' => '¯\_(ツ)_/¯',
	'idontcare' => '╭∩╮（︶︿︶）╭∩╮',
	'dong' => '(̿▀̿ ̿Ĺ̯̿̿▀̿ ̿)̄',
	'donger' => 'ヽ༼ຈل͜ຈ༽ﾉ',
	'tableflip' => '(╯°□°）╯︵ ┻━┻)',
	'haha' => '☜(ﾟヮﾟ☜)',
	'butterfly' => 'Ƹ̵̡Ӝ̵̨̄Ʒ',
	'polarbear' => 'ˁ˚ᴥ˚ˀ',
	'coffee' => 'c[_]',
	'angry' => 'ლ(ಠ益ಠ)ლ',
	'facepalm' => '(>ლ)',
	'yuno' => '(ノಠ益ಠ)ノ',
	'gimme' => '༼ つ ◕_◕ ༽つ',
	'sunglass' => '( •_•)>⌐■-■',
	'pacman' => 'ᗧ͇̿ · · ᗣ͇̿ᗣ͇̿ᗣ͇̿ᗣ͇̿',
	'dollar' => '[̲̅$̲̅(̲̅1̲̅)̲̅$̲̅]',
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
		$count = 0;

		echo '<?xml version="1.0"?>';
		echo '<items>';
		foreach ($this->emoticons as $key => $value) {
			if(preg_match('/^'.$query.'/', $key)) {
				$count++;
				echo '
				<item uid="'.$key.'" arg="'.$value.'">
					<title>'.$value.'</title>
					<subtitle>Press enter to copy into clipboard.</subtitle>
					<icon>icon.png</icon>
				</item>';
			}
		}
		/* 
		* Fallback 
		*/
		if($count == 0) {
			echo '
				<item uid="empty" arg="">
					<title>Nothing found for \''.$query.'\'.</title>
					<subtitle>Try other searchwords. Try e.g. \''.array_rand($this->emoticons).'\'</subtitle>
					<icon>notfound.png</icon>
				</item>';
		}
		echo '</items>';
	}


}
?>