<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Repositories\FranchiseRepository;
use App\Repositories\HomeRepository;

class HomeController extends Controller
{

    protected $franchise;
    protected $home;

    public function __construct(FranchiseRepository $franchise, HomeRepository $home)
    {
        $this->franchise = $franchise;
        $this->home = $home;
    }

    public function index(Request $request)
    {
        return view('home', [
            'recent_skater' => $this->home->recentSkater(),
            'recent_goalie' => $this->home->recentGoalie(),
            'information' => $this->franchise->info(),
        ]);
    }
}
