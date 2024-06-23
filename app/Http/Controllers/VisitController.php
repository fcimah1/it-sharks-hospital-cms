<?php

namespace App\Http\Controllers;

use App\DTO\VisitDTO;
use Illuminate\Http\Request;
use App\Repository\Interface\IUserRepository;
use App\Enums\Roles;
use App\Http\Requests\VisitRequest;
use App\Repository\Interface\IVisitRepository;

class VisitController extends Controller
{
    protected $userRepository;
    protected $visitRepository;
    public function __construct(IUserRepository $userRepository, IVisitRepository $visitRepository)
    {
        $this->userRepository = $userRepository;
        $this->visitRepository = $visitRepository;
    }
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $visits = $this->visitRepository->getAll();
        return view('dashboard.visit.index', ['visits', $visits]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = $this->userRepository->getByRole(Roles::DOCTOR);
        $patient = $this->userRepository->getByRole(Roles::PATIENT);
        $nurse = $this->userRepository->getByRole(Roles::NURSE);

        return view('dashboard.visit.create', [
            'doctors' => $doctors,
            'patient' => $patient,
            'nurse' => $nurse
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VisitRequest $visitRequest)
    {
        $this->visitRepository->create(VisitDTO::from($visitRequest->all()));
        return redirect()->route('visit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
