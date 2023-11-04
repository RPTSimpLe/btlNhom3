<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Grade;
use App\Models\Point;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){

    }

}
