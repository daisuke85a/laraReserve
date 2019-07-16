<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class LoginTest extends TestCase
{

    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->providerName = 'twitter';
    }

        /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * @test
     */
    public function Twitterの認証画面を表示できる()
    {

        // $response = $this->get('login/' . $this->providerName);

        //Expected status code 200 but received 500.が発生する。
        //おそらくリンク元がhttpsじゃないからTwitter認証画面にアクセスできない。
        //Twitter認証画面にアクセスせずともログインするよう、Mock等を使って実現したい
        $response = $this->get('/login/twitter');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function Twitterアカウントでユーザー登録できる()
    {
        $response = $this->get('/login/' . $this->providerName .'/callback');
        $response->assertStatus(200);
    }

}
