<?php

declare(strict_types=1);

use PhpCsFixer\Finder;

$finder = Finder::create()
    ->in(__DIR__.'/src')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
;

return (new NeueCommerce\CodingStandards\PhpCsFixerConfig())
    ->setFinder($finder)
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
;
