<?php

namespace App\Services;

use App\Models\Occupant;
use Illuminate\Support\Facades\Storage;

class OccupantService
{
    public function getAllOccupants()
    {
        return Occupant::all();
    }

    public function createOccupant($data)
    {
        // Logika untuk membuat penghuni baru
        // Misalnya, menyimpan foto KTP ke storage dan mengembalikan path
        $imagePath = $this->storeKtpImage($data['image_ktp']);

        return Occupant::create([
            'name' => $data['name'],
            'image_ktp_url' => $imagePath,
            'occupant_status' => $data['occupant_status'],
            'phone_number' => $data['phone_number'],
            'is_married' => (bool) $data['is_married'],
        ]);
    }

    public function updateOccupant(Occupant $occupant, $data)
    {
        // Logika untuk mengubah data penghuni
        // Misalnya, menyimpan foto KTP baru ke storage dan mengupdate path
        if (isset($data['image_ktp'])) {
            $imagePath = $this->storeKtpImage($data['image_ktp']);
            $occupant->update(['image_ktp_url' => $imagePath]);
        }

        $occupant->update([
            'name' => $data['name'],
            'occupant_status' => $data['occupant_status'],
            'phone_number' => $data['phone_number'],
            'is_married' => (bool) $data['is_married'],
        ]);

        return $occupant;
    }

    public function deleteOccupant(Occupant $occupant)
    {
        // Logika untuk menghapus penghuni
        // Misalnya, hapus foto KTP dari storage sebelum hapus data penghuni
        $this->deleteKtpImage($occupant->image_ktp_url);

        $occupant->delete();
    }

    protected function storeKtpImage($image)
    {
        // Logika untuk menyimpan foto KTP ke storage
        $path = Storage::putFile('ktp_images', $image);
        return Storage::url($path);
    }

    protected function deleteKtpImage($imageUrl)
    {
        // Logika untuk menghapus foto KTP dari storage
        $path = str_replace(Storage::url(''), '', $imageUrl);
        Storage::delete($path);
    }
}
