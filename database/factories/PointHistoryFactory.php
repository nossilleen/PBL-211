<?php

namespace Database\Factories;

use App\Models\PointHistory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PointHistory>
 */
class PointHistoryFactory extends Factory
{
    protected $model = PointHistory::class;

    public function definition(): array
    {
        $transactionType = $this->faker->randomElement(['credit','debit']);
        return [
            'user_id' => User::factory(),
            'transaction_type' => $transactionType,
            'amount' => $this->faker->numberBetween(10, 500),
            'description' => $this->faker->sentence(),
            'related_id' => null,
            'related_type' => null,
            'status' => $this->faker->randomElement(['berhasil','pending','gagal']),
        ];
    }
} 