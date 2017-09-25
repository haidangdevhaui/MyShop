<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiTrait;

abstract class ApiController extends Controller
{
	use ApiTrait;
}
