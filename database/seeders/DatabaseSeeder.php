<?php

namespace Database\Seeders;

use App\Models\AccountType;
use App\Models\CustomerRequest;
use App\Models\Loan;
use App\Models\RequestStatus;
use App\Models\RequestType;
use App\Models\Transfer;
use App\Models\TransferType;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $transfer_types = ([
            [
                "name" => "SORBNET",
                "description" => "Ekspresowy rodzaj przelewu dedykowany przelewom wysokokwotowym. Zlecenia SORBNET realizowane są wyłącznie w złotych, a ich zaletą jest czas realizacji - zwykle do 1 godziny."
            ],
            [
                "name" => "ELIXIR",
                "description" => "Najpopularniejszy (domyślny) rodzaj przelewu. Operacje relizowane są w złotych, w ramach cyklicznych sesji, które odbywają się 3 razy dziennie."
            ],
            [
                "name" => "Przelew natychmiastowy",
                "description" => "Realizowane w każdy dzień tygodnia. Maksymalna kwota przelewu wynosi 5000 zł, lecz zlecenie może dotrzeć do banku w przeciągu sekund."
            ],
            [
                "name" => "Przelew zagraniczny"
            ]
        ]);

        foreach($transfer_types as $transfer_type)  {
            TransferType::create($transfer_type);
        }

        $account_types = [
            [
                "name" => "Rachunek Oszczędnościowo-Rozliczeniowy",
                "symbol" => "ROR",
                "description" => "Najpopularniejszy rodzaj rachunku. Prowadzony wyłącznie w walucie polskiej, cechuje się brakiem dodatkowych prowizji i opłat."
            ],
            [
                "name" => "Rachunek Oszczędnościowy",
                "symbol" => "RO",
                "description" => "Rachunek łączy cechy Rachunku Oszczędnościowo-Rozliczeniowego i lokaty. Służy do gromadzenia środków."
            ],
            [
                "name" => "Konto dla Dzieci i Młodzieży",
                "symbol" => "KDM",
                "description" => "Rachunek przeznaczony dla osób młodych (13-18 lat). Zapewnia dostęp do funkcji płatniczych bez dodatkowych opłat za obsługę karty debetowej oraz prowadzenia rachunku."
            ],
        ];

        foreach($account_types as $account_type)  {
            AccountType::create($account_type);
        }

        $request_statuses = [
            [
                "name" => "Złożony"
            ],
            [
                "name" => "Odrzucony"
            ],
            [
                "name" => "Zrealizowany"
            ],
            [
                "name" => "Wymagający uzupełnienia"
            ]
        ];

        foreach($request_statuses as $request_status)  {
            RequestStatus::create($request_status);
        }

        $request_types = ([
            [
                "name" => "Zmiana limitów karty"
            ],
            [
                "name" => "Zmiana danych osobowych",
                "description" => "Wniosek stosowany przy zmianie danych osobowych, takich jak numer telefonu czy miejsce zamieszkania."
            ],
            [
                "name" => "Inny wniosek",
                "description" => "Wniosek, który nie pasuje do pozostałych kategorii."
            ],
            [
                "name" => "Zmiana środka dostępu",
                "description" => "Wniosek dotyczy zmiany sposobu uwierzytelniania do bankowości elektronicznej."
            ]
        ]);

        foreach($request_types as $request_type)  {
            RequestType::create($request_type);
        }

        CustomerRequest::factory()->count(10)->create();
        Loan::factory()->count(10)->create();
        Transfer::factory()->count(10)->create();
        Transfer::factory()->count(10)->state(new Sequence(
            ["transfer_type_id" => 1, "transfer_date" => '2021-01-01'],
            ["transfer_type_id" => 2, "transfer_date" => '2021-01-01']
        ))
        ->create();

    }
}
