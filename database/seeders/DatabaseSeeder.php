<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Location;
use App\Models\Payment;
use App\Models\Review;
use App\Models\User;
use App\Models\WashPackage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        WashPackage::factory(5)->create();
        Location::factory(3)->create();

        User::factory(10)->create()->each(function ($user) {
            $car = Car::factory()->create(['user_id' => $user->id]);
            $booking = Booking::factory()->create(['user_id' => $user->id, 'car_id' => $car->id]);
            Payment::factory()->create(['booking_id' => $booking->id]);
            Review::factory()->create(['user_id' => $user->id, 'booking_id' => $booking->id]);
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
