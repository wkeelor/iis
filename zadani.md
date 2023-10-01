### Zadání
Úkolem zadání je vytvořit jednoduchý informační systém pro správu událostí pořádaných uživateli informačního systému (např. koncert, vystoupení, přednáška, setkání programátorů, demonstrace, apod.). 

Každá událost má nějaké unikátní označení, pomocí kterého ji uživatelé budou moci vhodně odlišit, datum/čas konání (od, do), místo konání, kapacita (omezená/neomezená), volitelné vstupné (může být více kategorií vstupného dle požadavků pořadatele), kategorie a další vhodné atributy (např. popis, ikona, fotky, apod.). 

Místo konání je definováno svoji adresou a dalšími vhodnými atributy (popis, fotky, apod.). Kategorie mají hierarchický charakter (např. vzdělání -> seminář). Na základě těchto kategorií pak uživatelé mohou přívětivě vyhledávat nové akce, registrovat se na akce a přidávat si je tak do svého kalendáře. 
##
Uživatelé budou moci dále informační systém používat následujícím způsobem:
#### administrátor
        spravuje uživatele
        má práva všech následujících rolí
   #### moderátor
        schvaluje události
        schvaluje místa konání a provádí jejich správu
        schvaluje kategorie a provádí jejich správu
        moderuje komentáře událostí
   #### registrovaný uživatel
        prochází osobní kalendář událostí
        zakládá události - stává se správcem události
        posílá žádosti o schválení události
        navrhuje nová místa konání do katalogu existujících míst
        navrhuje nové kategorie událostí
        potvrzuje úhradu vstupného předem, pokud je v dané akci vyžadováno
        registruje se na událostí - stává se účastníkem události
        hodnotí a komentuje události po jejich ukončení
   #### neregistrovaný uživatel
        prochází události


##
Návrhy na rozšíření:
propojení s Google kalendářem
automatický import reálných událostí z dostupných zdrojů