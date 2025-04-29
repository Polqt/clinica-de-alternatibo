<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Services\Doctor\CreateServices;
use App\Services\Doctor\EditServices;
use App\Services\Doctor\DeleteServices;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    protected $createServices;
    protected $editServices;
    protected $deleteServices;

    public function __construct(
        CreateServices $createServices,
        EditServices $editServices,
        DeleteServices $deleteServices,
    ) {
        $this->createServices = $createServices;
        $this->editServices = $editServices;
        $this->deleteServices = $deleteServices;
    }

    public function createDoctor(Request $request)
    {
        $this->createServices->execute($request);
        return redirect()->route('admin.doctors')->with('success', 'Doctor created successfully.');
    }

    public function editDoctor(Request $request, $id)
    {
        $this->editServices->execute($request, $id);
        return redirect()->route('admin.doctors')->with('success', 'Doctor updated successfully.');
    }

    public function deleteDoctor($id)
    {
        $this->deleteServices->execute($id);
        return redirect()->route('admin.doctors')->with('success', 'Doctor deleted successfully.');
    }
}
