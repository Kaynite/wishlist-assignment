<?php

namespace Tests\Feature\Api;

use App\Models\Item;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ItemStatisticsTest extends TestCase
{
    use LazilyRefreshDatabase;

    /** @test */
    public function it_returns_all_stats(): void
    {
        Item::factory(50)->create();

        $this->getJson(route('api.items.stats'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['label', 'value'],
                ],
            ]);
    }
}
