[![Build Status](https://travis-ci.org/mtasuandi/decay.svg?branch=master)](https://travis-ci.org/mtasuandi/decay)

# Decay
Famous sorting algorithms based on vote popularity and time implemented for PHP.

## Installation
```
composer require mtasuandi/tiket-php dev-master
```

## Usage
```php
<?php
use Mtasuandi\Decay\Decay;

$c = new Decay();

$decay = 45000;
$ups = 10;
$down = 100;
$date = '2015-11-01 01:01:01';

$gravity = 1.8;
$votes = 100;

$z = 1.96;

/**
 * Reddit
 */
$redditHot = $c->redditHot( $decay, $ups, $down, $date );
echo $redditHot . "\n";

/**
 * Hacker News
 */
$hackerHot = $c->hackerHot( $gravity, $votes, $date );
echo $hackerHot . "\n";

/**
 * Wilson Score
 */
$wilsonScore = $c->wilsonScore( $z, $ups, $down );
echo $wilsonScore;
```

# License
The MIT License (MIT).