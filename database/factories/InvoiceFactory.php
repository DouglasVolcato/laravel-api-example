<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = $this->faker->randomElement((['B', 'P', 'V']));
        $amount = $this->faker->numberBetween(100,20000);
        $billedDate = $this->faker->dateTimeThisDecade();
        $paidDate = $status == 'P' ? $this->faker->dateTimeThisDecade() : NULL;

        return [
            'customer_id' => Customer::factory(),
            'amount' => $amount,
            'status' => $status,
            'billed_date' => $billedDate,
            'paid_date' => $paidDate
        ];
    }
}
