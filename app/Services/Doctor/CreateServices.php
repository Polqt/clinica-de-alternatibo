<?php

namespace App\Services\Doctor;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class CreateServices
{
    /**
     * @param Request $request
     * @return Doctor
     * @throws ValidationException
     */

    public function execute(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'license_number' => 'required|string|max:255|unique:doctors',
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $data = $validator->validated();

        return $this->create($data);
    }

    /**
     * @param array $data
     * @return Doctor
     * @throws \Exception
     */

    public function create(array $data)
    {
        DB::beginTransaction();

        try {
            $doctor = Doctor::create($data);

            DB::commit();

            return $doctor;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
