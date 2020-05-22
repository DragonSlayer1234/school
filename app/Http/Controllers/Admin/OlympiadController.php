<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UseCases\Admin\OlympiadManagerService;
use App\Olympiad;
use App\Subject;
use DomainException;
use LogicException;
use App\Http\Requests\RejectedReasonRequest;
use App\RejectedReason;

class OlympiadController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;
        $olympiads = Olympiad::byStatus($status)->get();

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
            $status = 'upcoming';
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect()->route('admin.olympiad.show', $olympiad->id);
        }

        return redirect()->route('admin.olympiad.index', compact('status'));
    }

    public function reject(RejectedReasonRequest $request, Olympiad $olympiad)
      {
        try {
            $olympiad->changeToRejected();
            RejectedReason::new($olympiad->id, $request->reason);
            $request->session()->flash('success', 'Олимпиада была успешно отклонена');
            $status = 'rejected';
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect()->route('admin.olympiad.show', $olympiad->id);
        }

        return redirect()->route('admin.olympiad.index', compact('status'));
    }

    public function start(Request $request, Olympiad $olympiad)
    {
        try {
            $olympiad->changeToActive();
            $request->session()
                    ->flash('success', "Олимпиада {$olympiad->name} началась");
            $status = 'active';
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect()->route('admin.olympiad.show', $olympiad->id);
        }

        return redirect()->route('admin.olympiad.index', compact('status'));
    }

    public function finish(Request $request, Olympiad $olympiad)
    {
        try {
            $olympiad->changeToCheck();
            $request->session()
                    ->flash('success', "Олимпиада {$olympiad->name} теперь находится на проверке");
            $status = 'check';
        } catch (DomainException | LogicException $e) {
            $request->session()->flash('error', $e->getMessage());
            return redirect()->route('admin.olympiad.show', $olympiad->id);
        }
        return redirect()->route('admin.olympiad.index', compact('status'));
    }
}
