<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\PickupPoint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PackageSeeder extends Seeder
{
    private array $names = [
        'Marco', 'Luca', 'Giulia', 'Chiara', 'Alessandro', 'Francesca',
        'Matteo', 'Sara', 'Lorenzo', 'Valentina', 'Simone', 'Federica',
        'Davide', 'Elena', 'Andrea', 'Martina', 'Stefano', 'Elisa',
        'Roberto', 'Laura', 'Antonio', 'Monica', 'Giovanni', 'Barbara',
        'Francesco', 'Anna', 'Nicola', 'Silvia', 'Pietro', 'Cristina',
    ];

    private array $surnames = [
        'Rossi', 'Ferrari', 'Esposito', 'Bianchi', 'Romano', 'Colombo',
        'Ricci', 'Marinelli', 'Greco', 'Bruno', 'Gallo', 'Conti',
        'De Luca', 'Costa', 'Mancini', 'Giordano', 'Rizzo', 'Lombardi',
        'Moretti', 'Barbieri', 'Fontana', 'Santoro', 'Marini', 'Fabbri',
        'Caruso', 'Ferrara', 'Gatti', 'Ruggiero', 'Palumbo', 'Battaglia',
    ];

    public function run(): void
    {
        $pointIds = PickupPoint::pluck('id')->toArray();

        if (empty($pointIds)) {
            return;
        }

        $packages = [];

        // 80 pacchi in attesa di ritiro (pending)
        for ($i = 0; $i < 80; $i++) {
            $packages[] = [
                'tracking_code'     => $this->uniqueCode($packages),
                'recipient_name'    => $this->names[array_rand($this->names)],
                'recipient_surname' => $this->surnames[array_rand($this->surnames)],
                'pickup_point_id'   => $pointIds[array_rand($pointIds)],
                'status'            => 'pending',
                'user_id'           => null,
                'collected_at'      => null,
            ];
        }

        // 15 pacchi scaduti (expired)
        for ($i = 0; $i < 15; $i++) {
            $packages[] = [
                'tracking_code'     => $this->uniqueCode($packages),
                'recipient_name'    => $this->names[array_rand($this->names)],
                'recipient_surname' => $this->surnames[array_rand($this->surnames)],
                'pickup_point_id'   => $pointIds[array_rand($pointIds)],
                'status'            => 'expired',
                'user_id'           => null,
                'collected_at'      => null,
            ];
        }

        foreach ($packages as $pkg) {
            Package::create($pkg);
        }
    }

    private function uniqueCode(array $existing): string
    {
        $existingCodes = array_column($existing, 'tracking_code');
        do {
            $code = strtoupper(Str::random(3)) . rand(1000, 9999) . strtoupper(Str::random(3));
        } while (in_array($code, $existingCodes) || Package::where('tracking_code', $code)->exists());

        return $code;
    }
}
