<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Mtasuandi\Decay\Decay;

class DecayTest extends PHPUnit_Framework_TestCase {
	public function testRedditHot()
	{
		$c = new Decay();
		$decay = 45000;
		$ups = 10;
		$down = 100;
		$date = '2015-11-01 01:01:01';

		$redditHot = $c->redditHot( $decay, $ups, $down, $date );
		echo $redditHot . "\n";
	}

	public function testHackerHot()
	{
		$c = new Decay();
		$gravity = 1.8;
		$votes = 100;
		$itemDate = '2015-11-01 01:01:01';

		$hackerHot = $c->hackerHot( $gravity, $votes, $itemDate );
		echo $hackerHot . "\n";
	}

	public function testWilsonScore()
	{
		$c = new Decay();

		$z = 1.96;
		$ups = 100;
		$down = 1;

		$wilsonScore = $c->wilsonScore( $z, $ups, $down );
		echo $wilsonScore;
	}
}