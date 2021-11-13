# Projekt z SBD - modelowanie rzeczywistości
Repo zawiera dwa foldery:
- _ekrany_
- _schemat_

## Ekrany
Folder ekrany składa się ze statycznych plików .html, będącymi pewnym zarysem tego jak **mniej więcej** wyobrażam sobie ekrany. 
1) Przedstawiłem jedynie CRUDa (prawie) dla relacji Klienci. Prawie, gdyż np. nie można wybrać którego klienta chcemy modyfikować. Nie ma też mowy o responsywności, dbałości o detale itd. 
2) Należy traktować to bardzo poglądowo, z włączeniem kolorystyki, użytego frameworka (Bootstrap za którym nie przepadam) i tak dalej. UI można zaimplementować na bardzo wiele sposobów, choć relacje wymuszają szukanie pewnych rozwiązań (np. klienci indywidualni/biznesowi - jedna relacja, ale w UI musi być to w jakiś sposób rozdzielone).

## Schemat
Zawartość folderu _schemat_ to dwa foldery:
- _encje_
- _relacje_

Folder _encje_ zawiera pliki związane z diagramem związków encji, a dokładniej:
- plik _Logical.png_ zawierający wyeksportowany (do pliku .png) diagram związków encji z narzędzia _SQL Developer_
- folder _data_modeler_ z plikami składowymi diagramu związków encji. Teoretycznie ten folder powinien dać się otworzyć z użyciem _SQL Developer_ (_File->Data modeler->Import->Data Modeler Design_ i wybrać plik _schemat.dmd_)

Folder _relacje_ zawiera pliki związane z modelem relacyjnym, będącym wynikiem przekształcenia schematu związków encji z folderu _encje_, a dokładniej:
- plik _relacje.txt_ zawierający pseudokod SQLa

O schemacie: uległ on pewnej zmianie od tego, co wcześniej wykonałem. Nie ma na przykład encji _pracownik_, gdyż była ona dość problematyczna. No bo nie realizujemy systemu zarządzania kadrami w banku, tylko system zarządzania usługami bankowymi (czyli dla klientów). Stąd to dziwne, że przy np. zakładaniu konta bankowego pracownik może wypełnić pole "id_pracownika" (lub inne) należące do innego pracownika. Bez sensu. W rzeczywistości pewnie jeśli takie pole istnieje, to jest wypełniane automatycznie przez system, który wie jaki pracownik jest w systemie zalogowany obecnie. Teraz więc schemat bardziej skupiony jest na kliencie i jego "potrzebach".

Mogą też dziwić encje typu np. adres. Czy jest ona potrzebna? W zasadzie nie, ale urozmaica schemat poprzez 1) encję 1:1 2) dość oryginalne atrybuty (miasto, kod-pocztowy itd.). Podobnie np. encja _Rachunek_ posiada klucz podstawowy naturalny "numer rachunku bankowego", a nie klucz sztuczny "id". Stąd jeśli w jakimś miejscu, analizującemu schemat, pojawia się w głowie pytanie "dlaczego _to_ zrobiono _w taki_ sposób?", to istnieje duże prawdopodobieństwo, że odpowiedzią jest "bo tak jest bardziej różnorodnie". 
