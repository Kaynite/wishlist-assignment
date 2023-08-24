<?php

namespace Tests\Feature\Api;

use App\Models\Item;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ItemsTest extends TestCase
{
    use LazilyRefreshDatabase;

    /** @test */
    public function it_returns_all_items(): void
    {
        Item::factory(50)->create();

        $this->getJson(route('api.items.index'))
            ->assertOk()
            ->assertJsonCount(15, 'data')
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'price', 'seller', 'created_at', 'updated_at'],
                ],
                'links',
                'meta',
            ]);
    }

    /** @test */
    public function it_returns_a_single_item()
    {
        $item = Item::factory()->create();

        $this->getJson(route('api.items.show', $item))
            ->assertOk()
            ->assertJsonStructure([
                'data' => ['id', 'name', 'price', 'seller', 'created_at', 'updated_at'],
            ]);
    }

    /** @test */
    public function it_stores_an_item()
    {
        $data = Item::factory()->raw();

        $this->postJson(route('api.items.store'), $data)
            ->assertCreated();

        $this->assertDatabaseHas(Item::class, $data);
    }

    /** @test */
    public function item_data_is_required_to_store_item()
    {
        $this->postJson(route('api.items.store'), [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'name', 'price', 'seller',
            ]);

        $this->assertEquals(Item::count(), 0);
    }

    /** @test */
    public function item_price_must_be_numeric_to_store_item()
    {
        $data = Item::factory()->raw([
            'price' => 'not a number',
        ]);

        $this->postJson(route('api.items.store'), $data)
            ->assertUnprocessable()
            ->assertJsonValidationErrorFor('price');

        $this->assertDatabaseMissing(Item::class, $data);
    }
}
