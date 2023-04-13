<?php

namespace Tests\Feature;

use Tests\TestCase;

class PaginationTest extends TestCase
{

    public function test_pagination_can_navigate_froward_to_page_2(): void
    {
        $this->visit('/')->seeElement( 'a', [
            'href' => $this->baseUrl . '?page=2',
            'aria-label' => 'Next &raquo;'
        ]);
    }

    public function test_pagination_can_navigate_backwards_from_page_2_to_page_1()
    {
        $this->visit('/?page=2')->seePageIs('/?page=2')
            ->dontSeeElement('a', ['href' => $this->baseUrl . '?page=1']);
    }

    public function test_pagination_on_the_head_shows_only_next_on_first_page()
    {
        $this->visit('/?page=1')->seePageIs('/?page=1')->seeElement('a', [
            'href' => $this->baseUrl . '?page=2',
            'rel' => 'next'
        ]);

        $this->visit('/?page=1')->seePageIs('/?page=1')->dontSeeElement('a', [
            'rel' => 'previous'
        ]);
    }

    public function test_pagination_on_the_head_shows_only_previous_on_the_last_page()
    {
        //this could be stored in a config value so updates are made in one place
        //something like config('app.paginator.default')
        $defaultResultSetCount = 20;

        //this too could be stored in a config value for the same reason
        $defaultResultSetSeedCount = 500;

        $lastPageUrl = '/?page=' . ($defaultResultSetSeedCount/$defaultResultSetCount);
        $this->visit($lastPageUrl)->seePageIs($lastPageUrl)
            ->dontSeeElement('a', [
                'rel' => 'next',
            ]);
        $this->visit($lastPageUrl)->seePageIs($lastPageUrl)->seeElement('a', [
            'rel' => 'previous',
            'href' => $this->baseUrl .'?page=' . (($defaultResultSetSeedCount/$defaultResultSetCount) - 1)
        ]);
    }
}
