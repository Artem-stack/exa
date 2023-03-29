<?php

namespace Tests\Unit;

use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_examp()
    {
        $response = $this->get('/');
        $response->assertOk();
        //$this->assertEquals(200, $response->status());
    }

  public function testAuthorize()
    {
        $this->post('/login', [
            'email' => 'Dam@gmail.com',
            'password' => '12345678'
        ]);
        $response = $this->get('/');
       
        $response->assertOk();
    }

    public function testRegistration()
    {
        $this->post('/register', [
            'name' => 'Robertson',
            'email' => 'Dams@gmail.com',
            'password' => '12345678'

        ]);
        $response = $this->get('/');
       
        $response->assertOk();
    }


     public function testproject()
    {
        $this->get('/project/create', [
            'name' => 'Robertsons',
            
        ]);
        $response = $this->get('/');
       
        $response->assertOk();
    }

}
