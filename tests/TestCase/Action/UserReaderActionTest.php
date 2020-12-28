<?php
namespace App\Test\TestCase\Action;
use App\Domain\User\Data\User;
use App\Domain\User\Repository\UserReaderRepository; use App\Test\Traits\AppTestTrait;
use PHPUnit\Framework\TestCase;

class UserReaderActionTest extends TestCase {
    use AppTestTrait;
    /**
    * Test. *
    * @dataProvider provideUserReaderAction *
    * @param User $user The user
    * @param array $expected The expected result *
    * @return void
    */
    public function testUserReaderAction(User $user, array $expected): void {
            // Mock the repository resultset
            $this->mock(UserReaderRepository::class) ->method('getUserById')->willReturn($user);
            // Create request with method and url
            $request = $this->createRequest('GET', '/user/1'); 
            // Make request and fetch response
            $response = $this->app->handle($request);
            // Asserts
            //$this->assertSame(200, $response->getStatusCode()); 
            $this->assertJsonData($expected, $response);
    }
    /**
    * Provider.
    *
    * @return array The data */
    public function provideUserReaderAction(): array {
        $user = new User();
        $user->id = 1;
        $user->username = 'johndoe'; 
        $user->email = 'johndoe@example.com'; 
        $user->firstName = 'John'; 
        $user->lastName = 'Doe';
        return [ 
            'User' => [
                $user, [
                        'id' => 1,
                        'username' => 'johndoe',
                        'first_name' => 'John',
                        'last_name' => 'Doe',
                        'email' => 'johndoe@example.com',
                ] 
            ]
        ];
    }
}