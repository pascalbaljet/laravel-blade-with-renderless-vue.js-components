<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CollectionTest extends DuskTestCase
{
    /** @test */
    public function it_can_add_more_input_elements_by_clicking_the_add_more_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/collection');

            $this->assertCount(1, $browser->elements('input[type="text"]'));

            $browser->press('Add more');

            $this->assertCount(2, $browser->elements('input[type="text"]'));
        });
    }

    /** @test */
    public function it_doenst_loose_the_state_when_we_add_a_new_input_element()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/collection')
                ->type('email[0]', 'info@protone.media')
                ->press('Add more')
                ->type('email[1]', 'pascal@protone.media');

            $browser->assertVue('items', ['info@protone.media','pascal@protone.media'], '@collection-component');
        });
    }

    /** @test */
    public function it_gives_the_collection_the_old_data_when_the_validation_fails()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/collection')
                ->type('email[0]', 'info@protone.media')
                ->press('Add more')
                ->type('email[1]', 'pascal@protone.media')
                ->press('Send form')
                ->assertSee('The email must have at least 4 items.');

            $browser->assertVue('items', ['info@protone.media','pascal@protone.media'], '@collection-component');
        });
    }
}
