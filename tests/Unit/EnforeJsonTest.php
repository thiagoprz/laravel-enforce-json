<?php

namespace Thiagoprz\EnforceJson\Tests\Unit;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Orchestra\Testbench\TestCase;
use Thiagoprz\EnforceJson\EnforceJson;

class EnforeJsonTest extends TestCase
{

    /**
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        \Route::middleware(EnforceJson::class)->any('/dummy-test-route', function () {
            return 'OK';
        });
    }

    /**
     * tests a successful request with valid json headers
     *
     * @return void
     */
    public function test_json_request_success()
    {
        $this->get('/dummy-test-route', [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ])
            ->assertStatus(Response::HTTP_OK);
    }

    /**
     * tests a request with invalid response (not a valid json request)
     *
     * @return void
     */
    public function test_request_failure()
    {
        $this->get('/dummy-test-route')
            ->assertStatus(Response::HTTP_BAD_REQUEST);
    }
}