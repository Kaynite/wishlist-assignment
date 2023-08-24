<?php

namespace Tests\Feature\Web;

use App\Models\Item;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ItemsTest extends TestCase
{
    use LazilyRefreshDatabase;

    /** @test */
    public function it_returns_all_items(): void
    {
        $items = Item::factory(10)->create();
        $lastItem = $items->last();

        $this->get(route('items.index'))
            ->assertOk()
            ->assertViewIs('items.index')
            ->assertViewHas('items')
            ->assertSee('All Items')
            ->assertSee([$lastItem->name, $lastItem->price, $lastItem->seller]);
    }
}
