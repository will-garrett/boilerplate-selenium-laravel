<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Facebook\WebDriver\Firefox as WebDriver;

class SeleniumTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setUp(){
        $this->host = "selenium";
        $this->port = 4444;
        $this->webdriver = new WebDriver($this->host, $this->port);
        $this->webdriver->connect("firefox");
    }

    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
