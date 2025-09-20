<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\Location;
use App\Models\User;
use App\Models\WashPackage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_time = $this->faker->dateTimeThisMonth();
        $duration = $this->faker->numberBetween(1, 3) * 30;
        $end_time = (clone $start_time)->modify('+'.$duration.' minutes');

        return [
            'user_id' => User::factory(),
            'car_id' => Car::factory(),
            'wash_package_id' => WashPackage::factory(),
            'location_id' => Location::factory(),
            'booking_date' => $this->faker->dateTimeThisMonth(),
            'start_time' => $start_time->format('H:i:s'),
            'end_time' => $end_time->format('H:i:s'),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'completed', 'cancelled']),
        ];
    }
}
