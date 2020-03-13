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

    public function index(Request $request)
    {
        $status = $request->status;
        $olympiads = Olympiad::byStatus($status)->paginate(10);

        return view('admin.olympiads.index', compact('olympiads', 'status'));
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
            $olympiad->changeToUpcoming();
            $request->session()->flash('success', 'Олимпиада была успешно принята');
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.olympiad.index');
    }

    public function reject(Request $request, Olympiad $olympiad)
      {
        try {
            $olympiad->changeToRejected();
            $request->session()->flash('success', 'Олимпиада была успешно отклонена');
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->route('admin.olympiad.index');
    }

    public function start(Request $request, Olympiad $olympiad)
    {
        try {
            $olympiad->changeToActive();
            $request->session()
                    ->flash('success', "Олимпиада {$olympiad->name}  началась");
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect()->route('admin.olympiad.show', $olympiad->id);
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
