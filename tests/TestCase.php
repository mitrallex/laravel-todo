<?php

namespace Tests;

// use App\Exceptions\Handler;
// use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    // protected $baseurl = 'http://testsite/todo/public/';
}
