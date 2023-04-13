<?php

namespace Tests\Feature;

use App\Models\Postcard;
use Spatie\SchemaOrg\Schema;
use Tests\TestCase;

class PostCardTest extends TestCase
{

    public function test_show_post_card(): void
    {
        $postCardId =  rand(1, 500);
        $postcard = Postcard::find($postCardId);
        $this->visit('/postcards/' . $postCardId)->seePageIs('/postcards/' . $postCardId)
            ->see($postcard->title)
            ->see(
                Schema::product()
                    ->name($postcard->title)
                    ->offers(
                        Schema::offer()->name($postcard->title)
                            ->price($postcard->price)
                            ->priceCurrency('ZAR')
                    )->toScript()
            );
    }

    public function test_show_post_page_has_canonical_tag_in_head()
    {
        $postCardId =  rand(1, 500);
        $this->visit('/postcards/' . $postCardId)->seeElement('link', [
            'rel' => 'canonical',
            'href' => $this->baseUrl . '/postcards/' . $postCardId
        ]);
    }
}
