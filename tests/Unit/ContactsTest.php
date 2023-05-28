<?php

namespace Tests\Unit;

use App\Models\Contacts;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testStoreNewContactWithValidData()
    {
        $data = [
            'name' => 'Fulano de Tal',
            'email' => 'fulano@example.com',
            'contact' => '123456789',
        ];
        $response = Contacts::create($data);

        $this->assertInstanceOf(Contacts::class, $response);
        $this->assertDatabaseHas('contacts', $data);
    }

    public function testContactFieldHasCorrectLength()
    {
        $data = [
            'name' => 'Fulano de Tal',
            'email' => 'fulano@example.com',
            'contact' => '123456789',
        ];

        $response = Contacts::create($data);

        $this->assertDatabaseHas('contacts', $data);
        $this->assertEquals(9, strlen($response->contact));
    }

    public function testEmailFieldContainsAtSymbol()
    {
        $data = [
            'name' => 'Fulano de Tal',
            'email' => 'fulano@example.com',
            'contact' => '123456789',
        ];

        $response = Contacts::create($data);

        $this->assertDatabaseHas('contacts', $data);
        $this->assertStringContainsString('@', $response->email);
    }

    public function testStoreContactWithValidData()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'contact' => '987654321',
        ];
        $response = $this->post('/contacts', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contacts', $data);
    }

    public function testUpdateContact()
    {
        $contact = Contacts::factory()->create();
        $newData = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'contact' => '999999999',
        ];
        $response = $this->put('/contacts/' . $contact->id, $newData);
        $response->assertRedirect();
        $this->assertDatabaseMissing('contacts', ['id' => $contact->id] + $newData);
    }



}
