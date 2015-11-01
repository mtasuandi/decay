<?php
namespace Mtasuandi\Decay;

class Decay
{
	/**
	 * Reddit's hot sort
	 * (popularized by reddit's news ranking)
	 * http://amix.dk/blog/post/19588
	 */
	public function redditHot( $decay, $ups, $down, $date )
	{
		if ( is_null( $decay ) )
		{
			$decay = 45000;
		}

		$s = $ups - $down;
		$order = log( max( abs( $s ), 1 ) ) / 2.302585092994046;
		$secAge = ( round( microtime( true ) * 1000 ) - round( strtotime( $date ) * 1000 ) ) / 1000;
		return $order - $secAge / $decay;
	}


	/**
	 * Hackernews' hot sort
	 * http://amix.dk/blog/post/19574
	 */
	public function hackerHot( $gravity, $votes, $itemDate )
	{
		if ( is_null( $gravity ) )
		{
			$gravity = 1.8;
		}

		$hourAge = ( round( microtime( true ) * 1000 ) - round( strtotime( $itemDate ) * 1000 ) ) / ( 1000 * 3600 );
		return ( $votes - 1 ) / pow( $hourAge + 2, $gravity );
	}

	/**
	 * NON-DECAY
	 * Wilson score interval sort
	 * (popularized by reddit's best comment system)
	 * http://www.evanmiller.org/how-not-to-sort-by-average-rating.html
	 */
	public function wilsonScore( $z, $ups, $down )
	{
		if ( is_null( $z ) )
		{
			/**
			 * z represents the statistical confidence
    	 * z = 1.0 => ~69%, 1.96 => ~95% (default)
    	 */
			$z = 1.96;
		}

		$n = $ups + $down;
		if ( $n === 0 )
		{
			return 0;
		}

		$p = $ups / $n;
		$zzfn = $z * $z / ( 4 * $n );
		return ( $p + 2 * $zzfn - $z * sqrt( ( $zzfn / $n + $p * ( 1 - $p ) ) / $n ) ) / ( 1 + 4 * $zzfn );
	}
}