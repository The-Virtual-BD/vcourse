<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    use VerifiesEmails;
}
