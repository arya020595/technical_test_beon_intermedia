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
        $data['image_ktp_url'] = $this->storeKtpImage($data['image_ktp_url']);

        return Occupant::create($data);
    }

    public function updateOccupant(Occupant $occupant, $data)
    {
        // Logika untuk mengubah data penghuni
        // Misalnya, menyimpan foto KTP baru ke storage dan mengupdate path
        if (isset($data['image_ktp_url'])) {
            $data['image_ktp_url'] = $this->storeKtpImage($data['image_ktp_url']);
        }

        $occupant->update($data);

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
