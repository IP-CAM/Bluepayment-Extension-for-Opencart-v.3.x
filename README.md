# Instrukcja instalacji oraz obsługi wtyczki „BluePayment” dla platformy OpenCart

## Podstawowe informacje
BluePayment to moduł płatności umożliwiający realizację transakcji bezgotówkowych w sklepie opartym na platformie OpenCart.

### Główne funkcje

Do najważniejszych funkcji modułu zalicza się:
- realizację płatności online poprzez odpowiednie zbudowanie startu transakcji
- obsługę powiadomień o statusie transakcji (notyfikacje XML)
- obsługę zakupów bez rejestracji w serwisie
- obsługę dwóch trybów działania – testowego i produkcyjnego (dla każdego z nich wymagane są osobne dane kont, po które zwróć się do nas)
- przekierowanie na paywall/bramkę Blue media, gdzie są dostępne wszystkie formy płatności 

### Wymagania systemowe.
- OpenCart 3 lub wyższa
- Wersja PHP 7.1 lub wyższa

### Opis zmian
Wersja 1.0.0
• Pierwsza wersja dokumentu

## Instalacja modułu
Możesz zainstalować moduł płatności jedną z dwóch metod – automatycznie lub manualnie.

### Instalacja manualna

1. Przejdź do zakładki Extensions ➝ Installer
2. Za pomocą formularza załaduj plik z modułem, a następnie wyślij formularz.
3. Przejdź do punktu Aktywacja modułu

### Instalacja automatyczna

1. Przejdź do zakładki Extensions ➝ Marketplace
2. Za pomocą wyszukiwarki wyszukaj wtyczkę Blue Media płatności online
3. W zakładce Download kliknij przycisk Install
4. Przejdź do punktu Aktywacja modułu

## Aktywacja

1. Przejdź do zakładki Extensions > Extensions 
2. Z listy rozwijanej wybierz Payments
3. Wyszukaj moduł BM płatności online, zainstaluj ją, a następnie przejdź do konfiguracji modułu.

<img width="306" alt="Widok modułu w zakładce Rozszerzenia" src="https://user-images.githubusercontent.com/87177993/126613447-92c964e1-4f31-4ac3-91e4-663f47380f9a.png">

Widok modułu w zakładce "Rozszerzenia"

## Konfiguracja modułu

### Konfiguracja podstawowych pól wtyczki

1. W sekcji Włącz/Wyłącz decydujesz czy kanał płatności będzie widoczny podczas składania zamówienia.

2. Użyj środowiska testowego – wybierając opcję TAK, sprawisz, że wszystkie płatności będą przekierowywane na testową bramkę płatniczą, która znajduje się pod adresem https://oplacasie-accept.bm.pl. Jeżeli tego nie zrobisz, automatycznie zostanie ustawiona produkcyjna wersja bramki płatniczej, a wszystkie płatności zostaną przekierowane na adres https://oplacasie.bm.pl.

Jeżeli wybierzesz środowisko testowe, moduł nie będzie przetwarzał żadnych faktycznych płatności.

3. Status oczekiwania na płatność – wybrany status zostanie ustawiony dla nowego zamówienia.

4. Status prawidłowej płatności – wybrany status zostanie ustawiony dla zamówienia, które zostało prawidłowo opłacone.

5. Status nieprawidłowej płatności – wybrany status zostanie ustawiony dla zamówienia, które nie zostało prawidłowo opłacone.

6. Po uzupełnieniu wszystkich pól – wciśnij: Zapisz zmiany i gotowe.

<img width="257" alt="Widok konfiguracji modułu" src="https://user-images.githubusercontent.com/87177993/126634649-d01a3169-ecc0-423d-8e14-9a3af7746c22.png">


### Konfiguracja sekcji Ustawienia walut

Żeby wyświetlić waluty – zdefiniuj je w zakładce System ➝ Localisation ➝ Currencies

Pola wspólne dla wszystkich walut:

1. Identyfikator serwisu partnera – ma wartość liczbową i jest unikalny dla każdego sklepu (otrzymasz go od Blue Media).

2. Klucz współdzielony – unikalny klucz przypisany do danego sklepu (otrzymasz go od Blue Media).


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
