<?php

namespace Database\Seeders;

use App\Models\Proizvod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProizvodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $proizvodi = [
            [
                'naziv' => 'Grand Burger',
                'opis' => 'Sočni pileci burger sa dabl sirom, hrskavom slaninom, svežom zelenom salatom, paradajzom i specijalnim BBQ sosom u mekanom brioche pecivu. Servira se sa pomfritom.',
                'slika' => 'proizvodi/Eyd9u7xk1xtEaPIxUUlxyBzxjHl8foy8NI6RhbBc.png',
                'cena' => 850.00,
                'izdvojeno' => 'izdvojeno',
            ],
            [
                'naziv' => 'Pileći Wrap Deluxe',
                'opis' => 'Grillovani pileći file sa hrskavom salatom, svežim krastavcem, paradajzom i domaćim jogurt sosom, umotan u mekanu tortilju. Lagano i zdravo jelo.',
                'cena' => 650.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Pomfrit sa Sirom',
                'opis' => 'Zlatno hrskavi pomfrit preliven sa topljenim kačkavaljem, posut sa začinskim biljem i serviran sa domaćim kečapom. Savršen prilog ili grickalica.',
                'cena' => 350.00,
                'izdvojeno' => 'izdvojeno',
            ],
            [
                'naziv' => 'Čokoladni Milkshake',
                'opis' => 'Kremasti čokoladni milkshake napravljen od pravog sladoleda, mleka i čokoladnog sirupa. Preliven sa šlagom, čokoladnim mrvicama i višnjom.',
                'cena' => 400.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Pileći Nuggeti',
                'opis' => 'Hrskavi pileći nuggeti napravljeni od belog pilećeg mesa. Serviraju se sa tri vrste sosa: BBQ, slatko-kiseli i ljuti sos. Idealni za deljenje.',
                'cena' => 550.00,
                'izdvojeno' => 'izdvojeno',
            ],
            [
                'naziv' => 'Double Cheese Burger',
                'opis' => 'Dva sočna goveđa odreska sa duplim slojem topljenog čedar sira, svežom salatom, kiselim krastavcima i domaćim majonezom. Pravi užitak za ljubitelje sira.',
                'cena' => 950.00,
                'izdvojeno' => 'izdvojeno',
            ],
            [
                'naziv' => 'Cezar Salata sa Piletinom',
                'opis' => 'Hrskava zelena salata sa grillovanim pilećim fileom, parmezanom, krutonima i klasičnim Cezar prelivom. Lagano i hranljivo jelo.',
                'cena' => 720.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Ljuti Burger',
                'opis' => 'Goveđi burger sa jalapeno papričicama, ljutim sirom, hrskavom slaninom, svežom salatom i ljutim čili sosom. Za ljubitelje začinjene hrane.',
                'cena' => 890.00,
                'izdvojeno' => 'izdvojeno',
            ],
            [
                'naziv' => 'Voćna Salata',
                'opis' => 'Sveža sezonska voćka (jagode, banana, kivi, grožđe, narandža) servirana sa domaćim jogurtom i medom. Savršen osvežavajući desert.',
                'cena' => 450.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Tortilja sa Piletinom',
                'opis' => 'Mekana tortilja punjena grillovanom piletinom, svežom salatom, paradajzom, kukuruzom, crnim pasuljem i domaćim salsa sosom.',
                'cena' => 680.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Sladoled Sundae',
                'opis' => 'Kremasti sladoled od vanile preliven sa čokoladnim ili voćnim prelivom, posut sa šarenim mrvicama, orasima i šlagom. Prava poslastica.',
                'cena' => 380.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Burger sa Pečurkama',
                'opis' => 'Sočni burger sa grillovanim pečurkama, karamelizovanim lukom, topljenim sirom, svežom salatom i belim lukom sosom. Odličan izbor za ljubitelje pečuraka.',
                'cena' => 780.00,
                'izdvojeno' => 'izdvojeno',
            ],
            [
                'naziv' => 'Palačinke sa Nutellom',
                'opis' => 'Meke domaće palačinke punjene kremastom Nutellom, prelivene sa još Nutelle, posute seckanim lešnicima i servirane sa svežim jagodama.',
                'cena' => 520.00,
                'izdvojeno' => 'izdvojeno',
            ],
            [
                'naziv' => 'Riblji File Burger',
                'opis' => 'Hrskavi panirani riblji file sa zelenom salatom, tartar sosom i svežim limunom u mekanom pecivu. Lagana i ukusna alternativa mesu.',
                'cena' => 750.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Limunada',
                'opis' => 'Sveže ceđena limunada sa mentom, ledom i malo šećera. Osvežavajući napitak za svako godišnje doba.',
                'cena' => 300.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Pileći Sendvič',
                'opis' => 'Grillovani pileći file sa hrskavom salatom, paradajzom, krastavcem i laganim majonezom u svežem integralnom hlebu. Zdrava i brza opcija.',
                'cena' => 580.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Onion Rings',
                'opis' => 'Hrskavi kolutići crnog luka u laganom pohovu, servirani sa ljutim čili sosom i domaćim kečapom. Savršena grickalica uz pivo.',
                'cena' => 420.00,
                'izdvojeno' => 'izdvojeno',
            ],
            [
                'naziv' => 'Vegetarijanski Burger',
                'opis' => 'Burger od crnog pasulja, kukuruza i povrća sa svežom salatom, paradajzom, krastavcem i vegan majonezom. Odličan izbor za vegeterijance.',
                'cena' => 720.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Topla Čokolada',
                'opis' => 'Bogata topla čokolada od prave čokolade, servirana sa šlagom i cimetom. Savršena za hladne dane.',
                'cena' => 350.00,
                'izdvojeno' => 'Ne',
            ],
            [
                'naziv' => 'Mega Burger',
                'opis' => 'Ogroman burger sa tri goveđa odreska, duplim sirom, hrskavom slaninom, prženim jajetom, svežom salatom, paradajzom i domaćim sosom. Za najveće apetite!',
                'cena' => 1290.00,
                'izdvojeno' => 'izdvojeno',
            ]
        ];

    foreach ($proizvodi as $p) {
        Proizvod::create($p);
    }
}
}