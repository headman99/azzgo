<?php

namespace Database\Seeders;

use App\Enums\GDPRTermTypeEnum;
use App\Models\GDPRTerms;
use Illuminate\Database\Seeder;

class GDPRTermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GDPRTerms::create([
            'type' => GDPRTermTypeEnum::CUSTOMER,
            'title' => 'Termini e Condizioni',
            'description' => "<p>I dati che volontariamente ha inserito nei campi di cui sopra, per registrarsi e avere accesso all'area attraverso cui beneficiare dei servizi offerti da AZZGO SRLS:(visibilit&agrave; annunci degli esercenti aderenti, scelta prodotti per l'acquisto, contatti per modalit&agrave; di acquisto e consegna), saranno trattati con responsabilit&agrave; e nel rispetto della normativa vigente in materia di Privacy (GDPR 679/2016).<br />I soggetti che effettueranno trattamento dei suoi dati sono stati regolarmente autorizzati dal Titolare del Trattamento, AZZGO SRLS, con apposita nomina. L&rsquo;assicuriamo che i suoi dati non saranno da noi n&eacute; comunicati n&eacute; diffusi a soggetti indesiderati n&eacute; utilizzati per finalit&agrave; non esplicitate.<br />Come interessato ha facolt&agrave; di esercitare i suoi diritti (art 15 al 22 del GDPR UE 679/2016).<br />Il Titolare del Trattamento &egrave; AZZGO SRLS - P.IVA 09708661211 - PEC azzgosrls@arubapec.it</p>"
        ]);

        GDPRTerms::create([
            'type' => GDPRTermTypeEnum::PUBLISHER,
            'title' => 'Termini e Condizioni',
            'description' => "<p>I dati che volontariamente ha inserito nei campi di cui sopra, saranno finalizzati alla richiesta di registrazione per avere una sua area personale attraverso cui beneficiare dei servizi offerti da AZZGO SRLS, per i quali ha precedentemente firmato accordo di adesione.<br />I dati immessi nei campi preposti saranno trattati con responsabilit&agrave; e nel rispetto della normativa vigente in materia di Privacy (GDPR 679/2016).<br />I soggetti che effettueranno trattamento dei suoi dati sono stati regolarmente autorizzati dal titolare del trattamento, AZZGO SRLS, con apposita nomina. L&rsquo;assicuriamo che i suoi dati non saranno da noi n&eacute; comunicati n&eacute; diffusi a soggetti indesiderati n&eacute; utilizzati per finalit&agrave; non esplicitate. Si informa inoltre che potr&agrave; esercitare i suoi diritti (dagli art. 15 al 22 del GDPR UE 679/2016).<br />Il Titolare del Trattamento &egrave; AZZGO SRLS - P.IVA 09708661211 - PEC azzgosrls@arubapec.it</p>"
        ]);
    }
}
