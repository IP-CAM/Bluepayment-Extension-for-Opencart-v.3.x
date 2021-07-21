![](Aspose.Words.1383d066-ff99-4ba8-8972-f38f314d96d2.001.jpeg)

Instrukcja instalacji oraz obsługi wtyczki „BluePayment” dla platformy OpenCart

|**Projekt**|**BluePayment**|
| :- | :- |
|**Tytuł**|Instrukcja instalacji „BluePayment” dla systemu OpenCart|
|**Rodzaj**|Instrukcja użytkownika|
|**Wersja dokumentu**|1.0.0|
|**Wersja wtyczki**|1.0.0|
|**Platforma**|OpenCart|
# Spis treści
` `TOC \o "1-3" \h \z \u [Spis treści	PAGEREF _Toc3539 \h1](#_Toc3539)

[Podstawowe informacje	PAGEREF _Toc3540 \h2](#_Toc3540)

[Wymagania systemowe	PAGEREF _Toc3541 \h2](#_Toc3541)

[Opis zmian	PAGEREF _Toc3542 \h2](#_Toc3542)

[Instalacja modułu	PAGEREF _Toc3543 \h3](#_Toc3543)

[Konfiguracja modułu	PAGEREF _Toc3544 \h4](#_Toc3544)

[1. Konfiguracja podstawowych pól	PAGEREF _Toc3545 \h4](#_Toc3545)

[2. Konfiguracja sekcji „Ustawienia walut”	PAGEREF _Toc3546 \h5](#_Toc3546)

[Logi modułu	PAGEREF _Toc3547 \h6](#_Toc3547)

[Konfiguracja adresów URL	PAGEREF _Toc3548 \h6](#_Toc3548)


# Podstawowe informacje
Moduł płatności umożliwiający realizację transakcji bezgotówkowych w sklepie OpenCart.
## Wymagania systemowe.
- OpenCart 3 lub wyższa
- Wersja PHP 7.1 lub wyższa
## Opis zmian
Wersja 1.0.0

• Pierwsza wersja dokumentu
# Instalacja modułu
1. Zainstaluj moduł jedną z poniższych metod:
   1. Instalacja automatyczna

`	`◦	Przejdź do Extensions  → Marketplace

`	`◦	Za pomocą wyszukiwarki wyszukaj wtyczkę „*Blue Media płatności online*”

`	`◦	W zakładce „Download” kliknij przycisk „Install”

`	`◦	Przejdź do punktu *Aktywacja modułu*

1. Instalacja manualna

`	`◦	Przejdź do zakładki Extensions  → Installer

◦	Za pomocą formularza załaduj plik z modułem*,* a następnie wyślij formularz.

`	`◦	Przejdź do punktu *Aktywacja modułu*

1. Aktywacja modułu
   1. Przejdź do zakładki Extensions   Extensions→
   1. Z listy rozwijanej wybierz „Payments”
   1. Wyszukaj moduł „BM płatności online”, zainstaluj ją, a następnie przejdź do sekcji konfiguracji modułu.

![](Aspose.Words.1383d066-ff99-4ba8-8972-f38f314d96d2.002.jpeg)

Widok modułu w zakładce "Rozszerzenia"
# Konfiguracja modułu
### 1. Konfiguracja podstawowych pól 
- „Włącz/Wyłącz”

Wybór wartości „Włączony/Wyłączony” określa, czy kanał płatności będzie  widoczny przy składaniu zamówienia.

- „Użyj środowiska testowego”

Zaznaczenie opcji na „Tak” powoduje, że wszystkie płatności będą przekierowywane na testową bramkę płatniczą, która znajduje się pod adresem https://pay-accept.bm.pl/. W przeciwnym przypadku zostanie ustawiona produkcyjna bramka płatnicza – wszystkie płatności będą przekierowane na adres https://pay.bm.pl/

W przypadku wyboru środowiska testowego moduł nie będzie przetwarzała żadnych faktycznych płatności.

- „Status oczekiwania na płatność”

Wybrany status zostanie ustawiony dla nowego zamówienia.

- „Status prawidłowej płatności”

Wybrany status zostanie ustawiony dla zamówienia, które zostało poprawnie opłacone.

- „Status nieprawidłowej płatności”

Wybrany status zostanie ustawiony dla zamówienia, dla którego płatność nie powiodła się. 

![](Aspose.Words.1383d066-ff99-4ba8-8972-f38f314d96d2.003.jpeg)

Widok konfiguracji modułu
### 2. Konfiguracja sekcji „Ustawienia walut”
*W zakładach zostają wyświetlone waluty, które zostały zdefiniowane w systemie w zakładce System*  → *Localisation*  → *Currencies.*

- „Identyfikator serwisu partnera”

` `Wartość liczbowa - unikalny identyfikator sklepu.

- „Klucz współdzielony”

` `Unikalny klucz przypisany do danego sklepu. 

` `Wartości obu pól są dostarczone przez BlueMedia.

![](Aspose.Words.1383d066-ff99-4ba8-8972-f38f314d96d2.004.jpeg)

Przykładowy wygląd ustawień  poszczególnych walut
# Logi modułu
Logi wtyczki dostępne są w sekcji *konfiguracji modułu w zakładce „Logi”.*

Używając listy rozwijanej dostępne będą logi z podziałem na dni. Pliki są tworzone według wzoru bluepayment-YYYY-MM-DD.log

Pliki te zawierają logi błędów, które mogą wystąpić podczas procesu płatności. W plikach dostępne są również informacje dot. każdej wykonanej płatności za pomocą wtyczki BlueMedia.

Dane te mogą się okazać przydatne przy zgłaszaniu problemów z działaniem wtyczki.

![](Aspose.Words.1383d066-ff99-4ba8-8972-f38f314d96d2.005.jpeg)

Zakładka z logami - przykładowy widok
# Konfiguracja adresów URL
Należy upewnić się, że w panelach administracyjnych BlueMedia [ ](https://oplacasie.bm.pl/)[https://](https://oplacasie.bm.pl/)[ ](https://oplacasie.bm.pl/)[oplacasie.bm.pl](https://oplacasie.bm.pl/)[ ](https://oplacasie.bm.pl/)	[ ](https://oplacasie.bm.pl/)[ ](https://oplacasie.bm.pl/)oraz [ ](https://oplacasie-accept.bm.pl/)[https://](https://oplacasie-accept.bm.pl/)[ ](https://oplacasie-accept.bm.pl/)[oplacasie-accept.bm.p](https://oplacasie-accept.bm.pl/)[ ](https://oplacasie-accept.bm.pl/)	[l](https://oplacasie-accept.bm.pl/)[  ](https://oplacasie-accept.bm.pl/) poniższe pola zawierają poprawne adresy sklepu.

- Konfiguracja adresu powrotu po płatności

https://domena-sklepu.pl/index.php?route=extension/payment/ bluepayment/paymentReturn

- Konfiguracja adresu, na który jest wysyłany ITN 

https://domena-sklepu.pl/index.php?route=extension/payment/ bluepayment/processItn
![](Aspose.Words.1383d066-ff99-4ba8-8972-f38f314d96d2.006.jpeg)Strona  PAGE   \\* MERGEFORMAT 1 z  NUMPAGES   \\* MERGEFORMAT 6
