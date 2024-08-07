<?php

namespace App\Observers;

use App\Models\Pengguna;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {

        if (Pengguna::where('email', $user->email)->orWhere('nama', $user->name)->exists()) {
            return;
        } else {
            //Buat data pengguna baru berdasarkan tabel user yang baru dibuat
            Pengguna::create([
                'nama' => $user->name,
                'nomor_telepon' => null,
                'role' => $user->role,
                'email' => $user->email,
                'password' => $user->unHashed_password,
            ]);
        }
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        $pengguna = Pengguna::where('email', $user->email)->first();
        if ($pengguna) {
            $pengguna->update([
                'nama' => $user->name,
                'role' => $user->role,
                'password' => $user->password,
            ]);
        }
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        $pengguna = Pengguna::where('email', $user->email)->first();
        if ($pengguna) {
            $pengguna->delete();
        }
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
