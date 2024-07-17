<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => $this->generateMyanmarPhoneNumber(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'amount' => $this->faker->numberBetween(1000, 100000),
            'role' => 1,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Generate a fake Myanmar phone number.
     *
     * @return string
     */
    private function generateMyanmarPhoneNumber()
    {
        // Myanmar country code
        $countryCode = '+95';

        // Operator code (e.g., 9 for Telenor, 7 for MPT, etc.)
        $operatorCode = $this->faker->randomElement(['9', '7', '8', '1']);

        // Subscriber number (7 digits for the purpose of this example)
        $subscriberNumber = $this->faker->numberBetween(1000000, 9999999);

        return $countryCode . $operatorCode . $subscriberNumber;
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}