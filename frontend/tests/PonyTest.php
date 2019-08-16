<?php
declare(strict_types=1);

require_once("src/jwebgen/pony.php");


use PHPUnit\Framework\TestCase;

class PonyTest extends TestCase
{
    public function testColorsCanReturnDNA(): void
    {
        $pony = new \jwebgen\Pony();
        $pony->colorEyes[0] = '12';
        $pony->colorEyes[1] = 'ab';
        $pony->colorEyes[2] = 'f4';
        $this->assertEquals(
            '018|171|244',
            $pony->colors('colorEyes', 'dec')
        );
        $this->assertEquals(
            '12abf4',
            $pony->colors('colorEyes', 'dna')
        );
        $this->assertEquals(
            '018|171|244',
            $pony->colors('colorEyes')
        );
    }
}
