<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PasswordGeneratorTest extends DuskTestCase
{
    /** @test */
    public function it_can_generate_a_random_password()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/password')
                ->press('Generate Password!');

            $generatedPassword = $browser->inputValue('password');

            $this->assertEquals(16, strlen($generatedPassword));

            $browser->press('Generate Password!');

            $nextGeneratedPassword = $browser->inputValue('password');

            $this->assertNotEquals($nextGeneratedPassword, $generatedPassword);
        });
    }
}
