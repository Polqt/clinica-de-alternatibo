<?php

namespace App\Services\Doctor;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EditServices
{
    /**
     * @param Request $request
     * @param int $id
     * @return Doctor
     * @throws \Exception
     */
    public function execute(Request $request, int $id)
    {
        $doctor = $this->findDoctor($id);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialization_id' => 'required|exists:specializations,id',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }

        $data = $validator->validated();

        return $this->update($doctor, $data);
    }

    /**
     * @param int $id
     * @return Doctor
     * @throws ModelNotFoundException
     */

    public function findDoctor(int $id)
    {
        return Doctor::findOrFail($id);
    }

    /**
     * @param Doctor $doctor
     * @param array $data
     * @return Doctor
     */

    public function update(Doctor $doctor, array $data) {
        DB::beginTransaction();

        try {
            $doctor->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'specialization_id' => $data['specialization_id'],
            ]);

            DB::commit();

            return $doctor;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
