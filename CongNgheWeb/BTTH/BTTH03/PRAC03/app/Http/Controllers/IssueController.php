<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\issue;
class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::With("computers")->get();
        return view("index", compact("issues"));
    }
}
