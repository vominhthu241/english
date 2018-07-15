<?php

namespace App\Http\Controllers;


use App\Answer;
use App\Content;
use App\Image;
use App\Mp3;
use App\Question;
use App\Test;
use App\Result;
use App\Testresult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
