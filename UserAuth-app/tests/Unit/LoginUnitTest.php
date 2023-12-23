<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;
use App\Http\Controllers\HomeController;

class LoginUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_if_user_not_logged_()
    {
        $returnedValues = (new HomeController)->home(); 
        $this->assertEmpty($returnedValues);
    }

    public function test_if_user_logged_()
    {
        
    } 


}
