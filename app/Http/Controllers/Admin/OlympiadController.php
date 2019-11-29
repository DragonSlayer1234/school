<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCases\Admin\OlympiadManagerService;
use App\Olympiad;
use App\Subject;
use DomainException;
use LogicException;

class OlympiadController extends Controller
{
    private $olympiadManager;

    public function __construct(OlympiadManagerService $olympiadManager)
    {
        $this->olympiadManager = $olympiadManager;
    }

    public function index()
    {
        $olympiads = Olympiad::active()->get();
        return view('admin.olympiads.index', compact('olympiads'));
    }

    public function moderating()
    {
        $olympiads = Olympiad::moderating()->get();
        return view('admin.olympiads.moderating', compact('olympiads'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.olympiads.create', compact('subjects'));
    }

    public function show(Olympiad $olympiad)
    {
        return view('admin.olympiads.show', compact('olympiad'));
    }

    public function accept(Request $request, Olympiad $olympiad)
    {
        try {
            $this->olympiadManager->accept($olympiad);
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.olympiad.moderating');
    }

    public function reject(Request $request, Olympiad $olympiad)
      {
        try {
            $this->olympiadManager->reject($olympiad);
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.olympiad.moderating');
    }

    public function start(Request $request, Olympiad $olympiad)
    {
        try {
            $this->olympiadManager->start($olympiad);
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.olympiad.index');
    }

    public function finish(Request $request, Olympiad $olympiad)
    {
        try {
            $this->olympiadManager->finish($olympiad);
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }
        return redirect()->route('admin.olympiad.index');
    }
}
