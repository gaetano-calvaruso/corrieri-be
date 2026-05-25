<?php

namespace Database\Seeders;

use App\Models\PickupPoint;
use Illuminate\Database\Seeder;

class PickupPointSeeder extends Seeder
{
    public function run(): void
    {
        $points = [
            // ── ROMA – Centro ─────────────────────────────────────────────────
            ['courier' => 'BRT', 'name' => 'BRT Roma Prati',         'address' => 'Via Cola di Rienzo, 150',        'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00192', 'lat' => 41.9069, 'lon' => 12.4658, 'phone' => '06 32111222', 'opening_hours' => 'Lun-Ven 9:00-19:00 | Sab 9:00-13:00'],
            ['courier' => 'DHL', 'name' => 'DHL Roma Trastevere',    'address' => 'Viale Trastevere, 60',           'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00153', 'lat' => 41.8804, 'lon' => 12.4665, 'phone' => '06 58111333', 'opening_hours' => 'Lun-Ven 8:30-18:30 | Sab 9:00-12:00'],
            ['courier' => 'SDA', 'name' => 'SDA Roma Testaccio',     'address' => 'Via Marmorata, 40',              'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00153', 'lat' => 41.8778, 'lon' => 12.4771, 'phone' => '06 57444111', 'opening_hours' => 'Lun-Ven 9:00-18:00'],
            ['courier' => 'BRT', 'name' => 'BRT Roma Nomentana',     'address' => 'Via Nomentana, 250',             'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00162', 'lat' => 41.9280, 'lon' => 12.5380, 'phone' => '06 86221100', 'opening_hours' => 'Lun-Ven 9:00-19:00 | Sab 9:00-13:00'],
            ['courier' => 'DHL', 'name' => 'DHL Roma Parioli',       'address' => 'Viale Parioli, 40',              'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00197', 'lat' => 41.9260, 'lon' => 12.5026, 'phone' => '06 80701200', 'opening_hours' => 'Lun-Ven 8:00-19:00 | Sab 9:00-13:00'],
            ['courier' => 'SDA', 'name' => 'SDA Roma Appio Latino',  'address' => 'Via Appia Nuova, 500',           'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00181', 'lat' => 41.8620, 'lon' => 12.5290, 'phone' => '06 78456700', 'opening_hours' => 'Lun-Ven 9:00-18:30'],
            ['courier' => 'BRT', 'name' => 'BRT Roma Tiburtina',     'address' => 'Via Tiburtina, 120',             'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00159', 'lat' => 41.9120, 'lon' => 12.5221, 'phone' => '06 43511700', 'opening_hours' => 'Lun-Ven 8:00-20:00 | Sab 9:00-13:00'],
            ['courier' => 'DHL', 'name' => 'DHL Roma Centocelle',    'address' => 'Via Casilina, 550',              'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00177', 'lat' => 41.8784, 'lon' => 12.5648, 'phone' => '06 24111890', 'opening_hours' => 'Lun-Sab 9:00-19:00'],
            ['courier' => 'SDA', 'name' => 'SDA Roma Prenestino',    'address' => 'Via Prenestina, 300',            'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00176', 'lat' => 41.8900, 'lon' => 12.5700, 'phone' => '06 27501230', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-12:30'],

            // ── ROMA – Sud ────────────────────────────────────────────────────
            ['courier' => 'BRT', 'name' => 'BRT Roma EUR',           'address' => 'Viale Europa, 42',               'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00144', 'lat' => 41.8299, 'lon' => 12.4696, 'phone' => '06 59111400', 'opening_hours' => 'Lun-Ven 8:30-19:30 | Sab 9:00-13:00'],
            ['courier' => 'DHL', 'name' => 'DHL Roma Laurentina',    'address' => 'Via Laurentina, 600',            'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00143', 'lat' => 41.8100, 'lon' => 12.4900, 'phone' => '06 50411200', 'opening_hours' => 'Lun-Ven 9:00-18:30'],
            ['courier' => 'SDA', 'name' => 'SDA Roma Garbatella',    'address' => 'Via Ostiense, 100',              'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00154', 'lat' => 41.8614, 'lon' => 12.4831, 'phone' => '06 57811300', 'opening_hours' => 'Lun-Ven 9:00-19:00 | Sab 9:00-13:00'],
            ['courier' => 'BRT', 'name' => 'BRT Roma Ostia',         'address' => 'Lungomare di Ostia, 10',         'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00122', 'lat' => 41.7322, 'lon' => 12.2340, 'phone' => '06 56111700', 'opening_hours' => 'Lun-Ven 9:00-19:00'],
            ['courier' => 'DHL', 'name' => 'DHL Roma Acilia',        'address' => 'Via di Acilia, 80',              'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00125', 'lat' => 41.7800, 'lon' => 12.3100, 'phone' => '06 52301100', 'opening_hours' => 'Lun-Sab 9:00-18:30'],

            // ── ROMA – Nord/Ovest ──────────────────────────────────────────────
            ['courier' => 'SDA', 'name' => 'SDA Roma Aurelia',       'address' => 'Via Aurelia, 320',               'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00165', 'lat' => 41.8902, 'lon' => 12.4324, 'phone' => '06 66201300', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-13:00'],
            ['courier' => 'BRT', 'name' => 'BRT Roma Balduina',      'address' => 'Via Candia, 50',                 'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00136', 'lat' => 41.9100, 'lon' => 12.4370, 'phone' => '06 35401900', 'opening_hours' => 'Lun-Ven 8:30-20:00 | Sab 9:00-13:00'],
            ['courier' => 'DHL', 'name' => 'DHL Roma Primavalle',    'address' => 'Via della Pineta Sacchetti, 200','city' => 'Roma', 'province' => 'RM', 'postal_code' => '00167', 'lat' => 41.9180, 'lon' => 12.4190, 'phone' => '06 66711200', 'opening_hours' => 'Lun-Ven 9:00-19:00'],
            ['courier' => 'SDA', 'name' => 'SDA Roma Trionfale',     'address' => 'Via Trionfale, 150',             'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00135', 'lat' => 41.9230, 'lon' => 12.4440, 'phone' => '06 39401100', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-12:00'],

            // ── ROMA – Est ────────────────────────────────────────────────────
            ['courier' => 'BRT', 'name' => 'BRT Roma Tor Vergata',   'address' => 'Via Tuscolana, 900',             'city' => 'Roma', 'province' => 'RM', 'postal_code' => '00173', 'lat' => 41.8450, 'lon' => 12.5990, 'phone' => '06 72501400', 'opening_hours' => 'Lun-Ven 9:00-19:00 | Sab 9:00-13:00'],
            ['courier' => 'DHL', 'name' => 'DHL Roma Tor Bella Monaca', 'address' => 'Via di Tor Bella Monaca, 200','city' => 'Roma', 'province' => 'RM', 'postal_code' => '00133', 'lat' => 41.8500, 'lon' => 12.6480, 'phone' => '06 21891200', 'opening_hours' => 'Lun-Sab 9:00-19:00'],

            // ── LAZIO – Provincia di Roma ──────────────────────────────────────
            ['courier' => 'BRT', 'name' => 'BRT Fiumicino',          'address' => 'Via Torre Clementina, 30',       'city' => 'Fiumicino', 'province' => 'RM', 'postal_code' => '00054', 'lat' => 41.7736, 'lon' => 12.2367, 'phone' => '06 65111400', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-13:00'],
            ['courier' => 'SDA', 'name' => 'SDA Tivoli',             'address' => 'Via Tiburtina Valeria, 100',     'city' => 'Tivoli',    'province' => 'RM', 'postal_code' => '00019', 'lat' => 41.9600, 'lon' => 12.8000, 'phone' => '0774 411200', 'opening_hours' => 'Lun-Ven 9:00-18:30'],
            ['courier' => 'DHL', 'name' => 'DHL Guidonia',           'address' => 'Via Roma, 50',                   'city' => 'Guidonia Montecelio', 'province' => 'RM', 'postal_code' => '00012', 'lat' => 41.9930, 'lon' => 12.7260, 'phone' => '0774 301100', 'opening_hours' => 'Lun-Ven 8:30-18:30 | Sab 9:00-12:00'],
            ['courier' => 'BRT', 'name' => 'BRT Velletri',           'address' => 'Via Ariana, 30',                 'city' => 'Velletri',   'province' => 'RM', 'postal_code' => '00049', 'lat' => 41.6870, 'lon' => 12.7780, 'phone' => '06 96111200', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-12:30'],
            ['courier' => 'SDA', 'name' => 'SDA Anzio',              'address' => 'Via Roma, 100',                  'city' => 'Anzio',      'province' => 'RM', 'postal_code' => '00042', 'lat' => 41.4520, 'lon' => 12.6260, 'phone' => '06 98411200', 'opening_hours' => 'Lun-Ven 9:00-18:30'],
            ['courier' => 'DHL', 'name' => 'DHL Albano Laziale',     'address' => 'Via Appia, 200',                 'city' => 'Albano Laziale', 'province' => 'RM', 'postal_code' => '00041', 'lat' => 41.7312, 'lon' => 12.6608, 'phone' => '06 93291100', 'opening_hours' => 'Lun-Sab 9:00-19:00'],
            ['courier' => 'BRT', 'name' => 'BRT Civitavecchia',      'address' => 'Corso Centocelle, 20',           'city' => 'Civitavecchia', 'province' => 'RM', 'postal_code' => '00053', 'lat' => 42.0935, 'lon' => 11.7943, 'phone' => '0766 211300', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-12:00'],

            // ── LAZIO – Altre Province ─────────────────────────────────────────
            ['courier' => 'SDA', 'name' => 'SDA Latina',             'address' => 'Via Ezio, 20',                   'city' => 'Latina',    'province' => 'LT', 'postal_code' => '04100', 'lat' => 41.4677, 'lon' => 12.9038, 'phone' => '0773 411200', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-13:00'],
            ['courier' => 'DHL', 'name' => 'DHL Latina Nord',        'address' => 'Via Nascosa, 50',                'city' => 'Latina',    'province' => 'LT', 'postal_code' => '04100', 'lat' => 41.4850, 'lon' => 12.9200, 'phone' => '0773 501400', 'opening_hours' => 'Lun-Ven 8:30-19:30'],
            ['courier' => 'BRT', 'name' => 'BRT Frosinone',          'address' => 'Via Aldo Moro, 10',              'city' => 'Frosinone', 'province' => 'FR', 'postal_code' => '03100', 'lat' => 41.6400, 'lon' => 13.3400, 'phone' => '0775 211100', 'opening_hours' => 'Lun-Ven 9:00-18:30'],
            ['courier' => 'SDA', 'name' => 'SDA Cassino',            'address' => 'Via Casilina, 50',               'city' => 'Cassino',   'province' => 'FR', 'postal_code' => '03043', 'lat' => 41.4900, 'lon' => 13.8300, 'phone' => '0776 301200', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-12:00'],
            ['courier' => 'DHL', 'name' => 'DHL Viterbo',            'address' => 'Via Garbini, 50',                'city' => 'Viterbo',   'province' => 'VT', 'postal_code' => '01100', 'lat' => 42.4160, 'lon' => 12.1090, 'phone' => '0761 311100', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-12:30'],
            ['courier' => 'BRT', 'name' => 'BRT Rieti',              'address' => 'Via Salaria, 80',                'city' => 'Rieti',     'province' => 'RI', 'postal_code' => '02100', 'lat' => 42.4042, 'lon' => 12.8573, 'phone' => '0746 211300', 'opening_hours' => 'Lun-Ven 9:00-18:00'],

            // ── NORD ITALIA ───────────────────────────────────────────────────
            ['courier' => 'DHL', 'name' => 'DHL Milano Buenos Aires',  'address' => 'Corso Buenos Aires, 50',      'city' => 'Milano',  'province' => 'MI', 'postal_code' => '20124', 'lat' => 45.4750, 'lon' => 9.2250,  'phone' => '02 29411200', 'opening_hours' => 'Lun-Ven 8:00-20:00 | Sab 9:00-14:00'],
            ['courier' => 'BRT', 'name' => 'BRT Milano Padova',        'address' => 'Via Padova, 80',              'city' => 'Milano',  'province' => 'MI', 'postal_code' => '20127', 'lat' => 45.4870, 'lon' => 9.2300,  'phone' => '02 27001100', 'opening_hours' => 'Lun-Ven 9:00-19:00 | Sab 9:00-13:00'],
            ['courier' => 'SDA', 'name' => 'SDA Torino Nizza',         'address' => 'Via Nizza, 200',              'city' => 'Torino',  'province' => 'TO', 'postal_code' => '10126', 'lat' => 45.0510, 'lon' => 7.6730,  'phone' => '011 6311400', 'opening_hours' => 'Lun-Ven 8:30-19:00 | Sab 9:00-13:00'],
            ['courier' => 'DHL', 'name' => 'DHL Bologna Emilia',       'address' => 'Via Emilia, 300',             'city' => 'Bologna', 'province' => 'BO', 'postal_code' => '40139', 'lat' => 44.4980, 'lon' => 11.3530, 'phone' => '051 6311200', 'opening_hours' => 'Lun-Ven 8:00-19:30 | Sab 9:00-13:00'],
            ['courier' => 'BRT', 'name' => 'BRT Genova XX Settembre',  'address' => 'Via XX Settembre, 30',        'city' => 'Genova',  'province' => 'GE', 'postal_code' => '16121', 'lat' => 44.4080, 'lon' => 8.9380,  'phone' => '010 5911400', 'opening_hours' => 'Lun-Ven 9:00-18:30'],
            ['courier' => 'SDA', 'name' => 'SDA Venezia Mestre',       'address' => 'Via Piave, 50',               'city' => 'Mestre',  'province' => 'VE', 'postal_code' => '30171', 'lat' => 45.5000, 'lon' => 12.2500, 'phone' => '041 9401100', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-12:30'],

            // ── CENTRO ITALIA ─────────────────────────────────────────────────
            ['courier' => 'DHL', 'name' => 'DHL Firenze Pellicceria',  'address' => 'Via Pellicceria, 10',         'city' => 'Firenze', 'province' => 'FI', 'postal_code' => '50123', 'lat' => 43.7710, 'lon' => 11.2540, 'phone' => '055 2811200', 'opening_hours' => 'Lun-Ven 8:30-19:30 | Sab 9:00-13:30'],
            ['courier' => 'BRT', 'name' => 'BRT Perugia',              'address' => 'Via Settevalli, 50',          'city' => 'Perugia', 'province' => 'PG', 'postal_code' => '06132', 'lat' => 43.1107, 'lon' => 12.3908, 'phone' => '075 5011300', 'opening_hours' => 'Lun-Ven 9:00-18:30'],

            // ── SUD ITALIA ────────────────────────────────────────────────────
            ['courier' => 'SDA', 'name' => 'SDA Napoli Foria',         'address' => 'Via Foria, 100',              'city' => 'Napoli',  'province' => 'NA', 'postal_code' => '80137', 'lat' => 40.8560, 'lon' => 14.2640, 'phone' => '081 2911100', 'opening_hours' => 'Lun-Ven 9:00-19:00 | Sab 9:00-13:00'],
            ['courier' => 'DHL', 'name' => 'DHL Bari Vittorio Emanuele','address' => 'Corso Vittorio Emanuele, 200','city' => 'Bari',   'province' => 'BA', 'postal_code' => '70121', 'lat' => 41.1200, 'lon' => 16.8700, 'phone' => '080 5211200', 'opening_hours' => 'Lun-Ven 9:00-18:30'],
            ['courier' => 'BRT', 'name' => 'BRT Palermo Libertà',      'address' => 'Via Libertà, 150',            'city' => 'Palermo', 'province' => 'PA', 'postal_code' => '90143', 'lat' => 38.1220, 'lon' => 13.3560, 'phone' => '091 6111400', 'opening_hours' => 'Lun-Ven 9:00-18:00 | Sab 9:00-13:00'],
        ];

        foreach ($points as $point) {
            PickupPoint::create($point);
        }
    }
}
