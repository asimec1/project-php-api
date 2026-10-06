---
title: Napredno web projektiranje web servisa
permalink: /ntpws/
---
# Napredno web projektiranje web servisa

**Upute za izradu semestralnog projekta**

## 1. Cilj projekta

Tijekom semestra potrebno je razviti funkcionalnu web-aplikaciju koja povezuje korisničko sučelje, poslužiteljsku logiku u PHP-u, relacijsku bazu podataka i web-servise.

Projekt mora sadržavati:

- javni dio aplikacije – frontend;
- backend razvijen u PHP-u;
- CMS i administracijsko sučelje;
- upravljanje vijestima i kategorijama;
- upravljanje korisnicima i njihovim ovlastima;
- vlastiti API za razmjenu podataka;
- povezivanje s najmanje jednim vanjskim API-jem;
- razmjenu podataka u JSON ili XML formatu;
- dokumentaciju i GitHub repozitorij.

Cilj je pokazati razumijevanje cjelovitog razvoja aplikacije: od organizacije podataka i korisničkih zahtjeva do sigurnosti, povezivanja sa servisima i prezentacije gotovog rješenja.

## 2. Odabir teme i organizacija rada

Tema projekta odabire se u dogovoru s nastavnikom. Aplikacija treba rješavati konkretan problem i imati jasno određene korisnike.

Primjeri tema su portal s vijestima, sustav za prijavu komunalnih problema, aplikacija za događanja, praćenje javnog prijevoza, rezervacije ili upravljanje nastavnim sadržajem.

Bez obzira na odabranu temu, aplikacija mora imati modul vijesti ili obavijesti, administraciju korisnika i funkcionalnosti navedene u ovim uputama. Dodatni moduli prilagođavaju se temi projekta.

Projekt se može izrađivati samostalno ili u paru, s najviše dva studenta u timu. Kod rada u paru potrebno je jasno opisati podjelu zadataka. Svaki student mora razumjeti cjelinu aplikacije i moći objasniti vlastiti doprinos. Seminarski rad svaki student izrađuje samostalno.

Prijedlog projekta treba sadržavati naziv aplikacije, opis problema, ciljane korisnike, planirane funkcionalnosti, tehnologije i odabrani vanjski servis.

## 3. Frontend – javni dio aplikacije

Javni dio aplikacije mora biti pregledan, funkcionalan i prilagođen računalima i mobilnim uređajima.

Obavezne stranice i funkcionalnosti:

- početna stranica s opisom aplikacije i izdvojenim sadržajem;
- popis objavljenih vijesti;
- detaljni prikaz pojedine vijesti;
- filtriranje vijesti prema kategoriji;
- pretraživanje vijesti prema naslovu ili sadržaju;
- straničenje rezultata;
- stranica s informacijama o projektu;
- prijava i registracija korisnika;
- prikaz profila prijavljenog korisnika.

Vijest treba prikazivati naslov, sažetak, sadržaj, kategoriju, autora, datum objave i pripadajuću sliku ako je dodana.

Podaci se moraju dohvaćati iz baze ili preko API-ja. Ručno upisani primjeri u HTML-u ne predstavljaju dovršenu funkcionalnost.

Sučelje treba jasno prikazati uspješno izvršenu radnju, pogrešku, prazne rezultate pretraživanja i nedostupnost servisa. Obrasci trebaju imati razumljive oznake i poruke uz neispravno unesena polja.

## 4. Backend i organizacija PHP koda

Backend upravlja poslovnom logikom, pristupom podacima, korisničkim sesijama i razmjenom podataka sa servisima.

Potrebno je:

- odvojiti konfiguraciju, rad s bazom, poslovnu logiku i prikaz;
- organizirati kod u smislene datoteke, funkcije i klase;
- izbjeći nepotrebno ponavljanje istog koda;
- provjeravati korisnički unos na poslužitelju;
- provjeravati ovlasti prije svake zaštićene radnje;
- obraditi pogreške bez otkrivanja osjetljivih podataka korisniku;
- dokumentirati korištene biblioteke i njihove ovisnosti.

Nije prihvatljivo cijelu aplikaciju smjestiti u jednu PHP datoteku. Moguće je koristiti vlastitu strukturu ili PHP framework uz dogovor s nastavnikom.

## 5. CMS i administracija vijesti

Administracijsko sučelje mora omogućiti upravljanje sadržajem bez ručnog uređivanja baze podataka ili programskog koda.

Za vijesti je potrebno omogućiti:

- dodavanje nove vijesti;
- pregled i pretraživanje postojećih vijesti;
- uređivanje naslova, sažetka i sadržaja;
- dodjeljivanje kategorije;
- unos sadržaja kroz uređivač obogaćenog teksta;
- prijenos, zamjenu i uklanjanje slike;
- spremanje nacrta i objavljivanje vijesti;
- povlačenje vijesti iz javnog prikaza;
- brisanje uz potvrdu korisnika.

Sustav treba bilježiti autora, vrijeme izrade i vrijeme posljednje izmjene.

**Neobjavljene vijesti ne smiju biti dostupne posjetiteljima kroz javne stranice ni kroz javni API.**

Kategorije moraju imati zasebnu administraciju. Potrebno je definirati što se događa s povezanim vijestima prilikom brisanja kategorije, primjerice zabraniti brisanje kategorije dok sadrži vijesti.

## 6. Korisnici, prijava i ovlasti

Aplikacija treba razlikovati posjetitelja i najmanje tri korisničke uloge:

| Uloga | Predviđene ovlasti |
| --- | --- |
| Posjetitelj | Pregled javno objavljenih sadržaja |
| Registrirani korisnik | Pregled sadržaja i upravljanje vlastitim profilom |
| Urednik | Izrada i uređivanje vlastitih vijesti |
| Administrator | Upravljanje svim vijestima, kategorijama, korisnicima i ulogama |

Administrator treba imati mogućnost pregleda korisnika, promjene uloge te aktivacije i deaktivacije računa.

Potrebno je implementirati registraciju, prijavu, odjavu i promjenu vlastite lozinke. Registracijom se dodjeljuje osnovna korisnička uloga. Korisnik ne smije sam odabrati administratorske ovlasti.

Pri deaktivaciji računa potrebno je onemogućiti daljnji pristup zaštićenim funkcionalnostima, uključujući već otvorene sesije.

Skrivanje gumba ili poveznice u sučelju nije dovoljna zaštita. Backend mora provjeriti ima li korisnik pravo izvršiti traženu radnju i pristupiti konkretnom zapisu.

## 7. Baza podataka

Potrebno je koristiti relacijsku bazu podataka, primjerice MySQL ili PostgreSQL.

Baza treba sadržavati podatke o korisnicima, ulogama, vijestima, kategorijama i slikama te dodatne tablice potrebne za odabranu temu.

Obavezno je:

- izraditi ER dijagram;
- definirati primarne i strane ključeve;
- koristiti prikladne tipove podataka;
- spriječiti dupliciranje korisničkih računa s istom e-mail adresom;
- definirati pravila za brisanje povezanih zapisa;
- koristiti pripremljene SQL upite i vezanje parametara;
- pripremiti skriptu ili migracije za izradu baze;
- osigurati testne podatke za demonstraciju.

Ako jedna radnja mijenja više povezanih zapisa koji moraju ostati usklađeni, potrebno je primijeniti transakciju.

Testni podaci trebaju omogućiti provjeru svih funkcionalnosti, uključujući više kategorija, različite korisničke uloge te objavljene i neobjavljene vijesti. Ne koristiti stvarne osobne podatke drugih osoba.

## 8. Vlastiti API

Aplikacija mora imati vlastiti API koji omogućuje programski pristup podacima i funkcionalnostima.

Za osnovnu izvedbu potrebno je implementirati REST API koji razmjenjuje podatke u **JSON ili XML formatu**. Obavezan je jedan odabrani format. Podrška za oba formata predstavlja nadogradnju.

Primjer minimalnih krajnjih točaka:

| Metoda | Primjer putanje | Namjena |
| --- | --- | --- |
| `GET` | `/api/v1/vijesti` | Dohvat objavljenih vijesti |
| `GET` | `/api/v1/vijesti/{id}` | Dohvat pojedine objavljene vijesti |
| `POST` | `/api/v1/vijesti` | Stvaranje vijesti uz odgovarajuće ovlasti |
| `PATCH` | `/api/v1/vijesti/{id}` | Izmjena vijesti uz odgovarajuće ovlasti |
| `DELETE` | `/api/v1/vijesti/{id}` | Brisanje vijesti uz odgovarajuće ovlasti |
| `GET` | `/api/v1/kategorije` | Dohvat kategorija |

Nazivi putanja mogu se prilagoditi projektu, ali opisane funkcionalnosti moraju biti dostupne.

API mora:

- koristiti odgovarajuće HTTP metode;
- slati ispravno zaglavlje `Content-Type`;
- provjeravati obavezna polja, tipove i dopuštene vrijednosti;
- vraćati dosljednu strukturu uspješnih odgovora i pogrešaka;
- koristiti odgovarajuće HTTP statusne kodove;
- podržavati straničenje i barem jedan način filtriranja popisa;
- zahtijevati autentifikaciju i provjeru ovlasti za izmjene;
- spriječiti dohvat neobjavljenih ili nedopuštenih podataka.

Primjeri statusa koje treba razumjeti i primijeniti prema situaciji su `200`, `201`, `204`, `400`, `401`, `403`, `404` i `500`. Odgovor sa statusom `204` nema tijelo.

Za odabrani format potrebno je pripremiti JSON Schemu ili XML Schemu (XSD) za barem jedan zahtjev za unos podataka te demonstrirati provjeru valjanog i nevaljanog primjera.

Najmanje jedan dio vlastite aplikacije mora stvarno koristiti API, primjerice dohvat popisa i detalja vijesti. API ne smije ostati izdvojen primjer koji nije povezan s aplikacijom.

## 9. Povezivanje s vanjskim API-jem

Potrebno je povezati aplikaciju s najmanje jednim vanjskim servisom koji ima smislenu ulogu u odabranoj temi.

Primjeri primjene:

- dohvat vremenskih podataka za događanja;
- pretvaranje koordinata u adresu;
- dohvat podataka o javnom prijevozu;
- dohvat bibliografskih ili drugih otvorenih podataka;
- povezivanje s AI servisom.

Potrebno je demonstrirati slanje zahtjeva, čitanje JSON ili XML odgovora, izdvajanje potrebnih podataka i njihovu uporabu u aplikaciji.

Integracija mora obraditi barem sljedeće situacije:

- servis uspješno vraća podatke;
- servis ne odgovara ili vraća pogrešku;
- odgovor nema očekivanu strukturu ili potrebna polja.

Treba postaviti vremensko ograničenje zahtjeva i izbjeći nepotrebno ponavljanje poziva. Ako se koriste spremljeni podaci, korisniku treba prikazati vrijeme posljednjeg uspješnog dohvaćanja.

API ključevi ne smiju biti objavljeni na GitHubu. Tajni ključevi ne smiju biti dostupni u frontend kodu.

Prije odabira servisa potrebno je provjeriti dokumentaciju, dostupnost i ograničenja korištenja. Za demonstraciju kvara servisa moguće je koristiti jasno označene testne odgovore.

## 10. Sigurnosni zahtjevi

Sigurnost je sastavni dio projekta.

Obavezno je:

- lozinke pohranjivati pomoću `password_hash()` i provjeravati pomoću `password_verify()`;
- koristiti pripremljene SQL upite;
- provjeravati podatke na poslužitelju, neovisno o frontend validaciji;
- prilagoditi izlazne podatke kontekstu prikaza radi zaštite od XSS-a;
- sanitizirati dopušteni HTML iz uređivača obogaćenog teksta;
- zaštititi zahtjeve za promjenu podataka od CSRF-a kada se autentifikacija temelji na kolačićima;
- obnoviti identifikator sesije nakon uspješne prijave;
- sigurno završiti sesiju pri odjavi;
- provjeravati vrstu i veličinu prenesenih datoteka;
- onemogućiti izvršavanje prenesenih datoteka;
- zaštititi administraciju i API od neovlaštenog pristupa;
- izdvojiti lozinke baze i druge tajne iz javno dostupnih datoteka;
- koristiti HTTPS na javno dostupnoj instalaciji.

Ako aplikacija obrađuje XML, potrebno je spriječiti učitavanje vanjskih entiteta i drugih nedopuštenih vanjskih resursa.

Korisniku se prikazuje razumljiva poruka o pogrešci. Detalji poput lozinki, SQL upita i internih putanja ne smiju se prikazivati u javnom odgovoru.

## 11. GitHub i praćenje rada

GitHub repozitorij koristi se tijekom cijelog semestra.

Potrebno je:

- redovito spremati smislene izmjene;
- pisati poruke commitova koje opisuju napravljenu promjenu;
- koristiti `.gitignore`;
- evidentirati zadatke i njihov napredak;
- kod rada u paru koristiti zasebne korisničke račune;
- dokumentirati doprinose članova tima.

Repozitorij mora sadržavati izvorni kod, dokumentaciju, konfiguracijski primjer bez tajni te datoteke potrebne za pripremu baze.

Jednokratni upload cijelog projekta na kraju semestra ne omogućuje praćenje razvoja i doprinosa članova tima.

## 12. Predložene faze rada kroz semestar

Raspored služi za planiranje rada. Konkretni rokovi objavljuju se u LMS-u.

| Razdoblje | Aktivnosti | Očekivani rezultat |
| --- | --- | --- |
| 1.–2. tjedan | Odabir teme, korisnika, funkcionalnosti i vanjskog servisa | Prijedlog projekta i GitHub repozitorij |
| 3.–4. tjedan | Modeliranje baze i organizacija aplikacije | ER dijagram, baza i osnovna struktura koda |
| 5.–6. tjedan | Razvoj javnog dijela, registracije i prijave | Funkcionalan frontend i korisnički računi |
| 7.–8. tjedan | Razvoj CMS-a i korisničkih ovlasti | Administracija vijesti, kategorija i korisnika |
| 9.–10. tjedan | Izrada vlastitog API-ja | Dokumentirane i testirane krajnje točke |
| 11.–12. tjedan | Integracija vanjskog servisa | Razmjena podataka i obrada pogrešaka |
| 13.–14. tjedan | Testiranje, sigurnost i dokumentacija | Dovršena aplikacija i upute za pokretanje |
| 15. tjedan | Završna priprema i prezentacija | Predaja i demonstracija projekta |

## 13. Testiranje projekta

Prije predaje potrebno je provjeriti uspješne i neuspješne scenarije.

Minimalni scenariji uključuju:

- registraciju s valjanim i nevaljanim podacima;
- pokušaj registracije već postojeće e-mail adrese;
- prijavu s ispravnom i pogrešnom lozinkom;
- pristup administraciji bez prijave;
- pokušaj urednika da mijenja tuđu vijest;
- pokušaj korisnika da promijeni vlastitu ulogu;
- stvaranje, uređivanje, objavljivanje i brisanje vijesti;
- pokušaj javnog dohvata neobjavljene vijesti;
- pretraživanje bez pronađenih rezultata;
- API zahtjev s nevaljanim podacima;
- API zahtjev bez potrebnih ovlasti;
- dohvat nepostojećeg zapisa;
- nedostupnost vanjskog API-ja;
- prijenos nedopuštene datoteke;
- prikaz aplikacije na mobilnom uređaju.

Za svaki scenarij treba zapisati očekivani i dobiveni rezultat. API se može testirati alatima kao što su Postman, Bruno ili cURL. Ključne provjere poslovne logike poželjno je automatizirati.

## 14. Dokumentacija i predaja

Projekt se predaje preko LMS-a uz poveznicu na GitHub repozitorij.

Potrebno je predati:

- izvorni kod aplikacije;
- skriptu ili migracije za izradu baze i testne podatke;
- ER dijagram;
- README s uputama za instalaciju i pokretanje;
- opis korisničkih uloga;
- dokumentaciju vlastitog API-ja;
- opis integracije vanjskog servisa;
- pregled provedenih testova;
- seminarski rad i prezentaciju;
- snimke zaslona ključnih funkcionalnosti;
- poveznicu na demonstracijsku instalaciju ako je aplikacija javno postavljena.

README mora navesti potrebnu verziju PHP-a, potrebne ekstenzije, bazu podataka, ovisnosti, konfiguraciju i postupak pokretanja. Druga osoba treba moći pokrenuti projekt slijedeći napisane upute.

Dokumentacija API-ja treba sadržavati metodu i putanju, potrebne ovlasti, parametre, primjer zahtjeva, primjer odgovora i moguće pogreške za svaku krajnju točku.

Pristupne podatke za testne račune predati kroz LMS. Ne objavljivati stvarne lozinke ili produkcijske pristupne podatke u repozitoriju.

## 15. Prezentacija i obrana

Na završnoj prezentaciji potrebno je demonstrirati:

- javni dio aplikacije;
- prijavu korisnika različitih uloga;
- upravljanje vijestima, kategorijama i korisnicima;
- ograničenja pristupa prema ulozi;
- rad vlastitog API-ja;
- razmjenu podataka s vanjskim servisom;
- obradu barem jedne pogreške;
- strukturu baze i organizaciju koda.

Student mora moći objasniti tok podataka od korisničkog zahtjeva do baze i odgovora aplikacije, način zaštite podataka te odabrane postupke autentifikacije i autorizacije.

Kod rada u paru svaki student predstavlja vlastiti doprinos, ali mora razumjeti kako se njegov dio povezuje s ostatkom sustava.

## 16. Korištenje AI alata

AI alati mogu se koristiti kao pomoć pri planiranju, učenju, otklanjanju pogrešaka i izradi dijelova koda.

Student odgovara za sav predani kod i dokumentaciju, uključujući sadržaj nastao uz pomoć AI-ja. Mora razumjeti generirani kod, provjeriti njegovu ispravnost i sigurnost te ga prilagoditi vlastitom projektu.

U dokumentaciji treba kratko navesti korištene AI alate i svrhu njihove uporabe. U AI alate ne unositi lozinke, API ključeve ni stvarne osobne podatke korisnika.

## 17. Dodatne funkcionalnosti

Nakon dovršetka obaveznih elemenata projekt se može proširiti, primjerice:

- podrškom za JSON i XML uz odabir formata;
- dokumentacijom OpenAPI/Swagger;
- automatiziranim testovima i provjerama kroz GitHub Actions;
- zapisnikom administratorskih aktivnosti;
- verzioniranjem sadržaja i povijesti izmjena;
- predmemoriranjem i ograničavanjem broja API zahtjeva;
- autentifikacijom u dva koraka;
- obavijestima e-mailom;
- Docker okruženjem;
- AI funkcionalnošću povezanom s temom projekta.

Dodatne funkcionalnosti vrednuju se kroz njihovu svrhu, kvalitetu i uklopljenost u aplikaciju. Ne zamjenjuju obavezne elemente.

## 18. Kriteriji dovršenosti

Projekt je spreman za predaju kada se može pokrenuti prema dokumentaciji, kada sve obavezne funkcionalnosti rade i kada student može demonstrirati njihovu povezanost.

Pri vrednovanju promatraju se funkcionalnost, organizacija koda, model baze, sigurnost, kvaliteta vlastitog API-ja, integracija vanjskog servisa, dokumentacija, kontinuitet rada i razumijevanje rješenja.

Sama prisutnost stranice, gumba ili API putanje nije dovoljna. Svaka obavezna funkcionalnost mora biti povezana s ostatkom sustava, provjerena i objašnjiva na obrani.
