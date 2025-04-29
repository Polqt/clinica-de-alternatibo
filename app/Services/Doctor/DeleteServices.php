<?php

namespace App\Services\Doctor;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class DeleteServices
{
    /**
     * Execute the doctor deletion process
     * 
     * @param int $id
     * @return bool
     * @throws ModelNotFoundException
     */
    public function execute(int $id)
    {
        // Find the doctor
        $doctor = $this->findDoctor($id);

        // Check if doctor can be deleted (has no appointments, etc.)
        $this->checkDeletionConstraints($doctor);

        // Delete the doctor
        return $this->delete($doctor);
    }

    /**
     * Find a doctor by ID
     * 
     * @param int $id
     * @return Doctor
     * @throws ModelNotFoundException
     */
    private function findDoctor(int $id)
    {
        return Doctor::findOrFail($id);
    }

    /**
     * Check if a doctor can be deleted
     * 
     * @param Doctor $doctor
     * @return void
     * @throws \Exception
     */
    private function checkDeletionConstraints(Doctor $doctor)
    {
        // Example: Check if doctor has any future appointments
        if ($doctor->appointments()->where('appointment_date', '>=', now())->exists()) {
            throw new \Exception('Cannot delete doctor with future appointments');
        }

        // Add other business rules that might prevent deletion
    }

    /**
     * Delete a doctor
     * 
     * @param Doctor $doctor
     * @return bool
     * @throws \Exception
     */
    private function delete(Doctor $doctor): bool
    {
        DB::beginTransaction();
        try {
            // Perform any pre-deletion tasks like logging, archiving, etc.

            $result = $doctor->delete();

            DB::commit();
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
