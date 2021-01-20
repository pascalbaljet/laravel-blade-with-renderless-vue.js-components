<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FileInputTest extends DuskTestCase
{
    /** @test */
    public function it_can_attach_a_file_and_show_the_name_of_the_file()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/file')
                ->attach('attachment', __DIR__ . '/../dummy.pdf')
                ->assertSeeIn('p', 'dummy.pdf');
        });
    }
}
