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
}
