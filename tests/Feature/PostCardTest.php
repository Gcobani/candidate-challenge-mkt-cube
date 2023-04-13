<?php

namespace Tests\Feature;

use App\Models\Postcard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\SchemaOrg\Schema;
use Tests\TestCase;

class PostCardTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_show_post_card_page(): void
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

    public function test_show_post_card_page_has_canonical_tag_in_head()
    {
        $postCardId =  rand(1, 500);
        $this->visit('/postcards/' . $postCardId)->seeElement('link', [
            'rel' => 'canonical',
            'href' => $this->baseUrl . '/postcards/' . $postCardId
        ]);
    }

    public function test_show_post_card_page_shows_online_post_cards_only()
    {
        $response = $this->call('GET', '/');
        $items = $response->getOriginalContent()->getData()['postcards'];
        $this->assertEquals(Postcard::where('is_draft', 0)->count(), $items->total());
    }
}
