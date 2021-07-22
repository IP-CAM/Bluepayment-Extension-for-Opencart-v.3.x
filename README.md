Instrukcja instalacji oraz obsługi wtyczki „BluePayment” dla platformy OpenCart

|**Projekt**|**BluePayment**|
| :- | :- |
|**Tytuł**|Instrukcja instalacji „BluePayment” dla systemu OpenCart|
|**Rodzaj**|Instrukcja użytkownika|
|**Wersja dokumentu**|1.0.0|
|**Wersja wtyczki**|1.0.0|
|**Platforma**|OpenCart|


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

# Instalacja modułu
Możesz zainstalować moduł płatności jedną z dwóch metod – automatycznie lub manualnie.

Instalacja manualna

1. Przejdź do zakładki Extensions ➝ Installer
2. Za pomocą formularza załaduj plik z modułem, a następnie wyślij formularz.
3. Przejdź do punktu Aktywacja modułu

Instalacja automatyczna

1. Przejdź do zakładki Extensions ➝ Marketplace
2. Za pomocą wyszukiwarki wyszukaj wtyczkę Blue Media płatności online
3. W zakładce Download kliknij przycisk Install
4. Przejdź do punktu Aktywacja modułu

# Aktywacja

1. Przejdź do zakładki Extensions > Extensions 
2. Z listy rozwijanej wybierz Payments
3. Wyszukaj moduł BM płatności online, zainstaluj ją, a następnie przejdź do konfiguracji modułu.

![Widok modułu w zakładce Rozszerzenia](opencart-plugin/images/Widok modułu w zakładce Rozszerzenia.png)


![](<img width="306" alt="Widok modułu w zakładce Rozszerzenia" src="https://user-images.githubusercontent.com/87177993/126602104-b7fd5b5d-0343-4f16-9442-e3354be93c49.png">
)

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
