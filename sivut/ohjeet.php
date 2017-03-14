
Katso myös [John Gruberin alkuperäinen Markdown-määrittely](http://daringfireball.net/projects/markdown/).

## Otsikot

```no-highlight
# H1
## H2
### H3
#### H4
##### H5
###### H6

Voit myös "alleviivata" 1. ja 2. tason otsikot.

Alt-H1
======

Alt-H2
------
```


# H1
## H2
### H3
#### H4
##### H5
###### H6

Voit myös "alleviivata" 1. ja 2. tason otsikot.

Alt-H1
======

Alt-H2
------

## Korostus

```no-highlight
Kursivointi *tähdillä* tai _alaviivoilla_.

Lihavointi **tuplatähdillä** or __tupla-alaviivoilla__.

Yhdistettynä **tähtiä sekä _alaviivoja_**.

Yliviivaus tapahtuu 2 tildellä. ~~Tämä pois.~~
```

Kursivointi *tähdillä* tai _alaviivoilla_.

Lihavointi **tuplatähdillä** or __tupla-alaviivoilla__.

Yhdistettynä **tähtiä sekä _alaviivoja_**.

Yliviivaus tapahtuu 2 tildellä. ~~Tämä pois.~~


## Listat

(Esimerkissä rivin alun ja lopun välilyönnit on merkattu ⋅.)

```no-highlight
1. Ensimmäinen listan jäsen
2. Toinen jäsen.
⋅⋅* Numeroimaton alilista.
1. Numeroilla sinänsä ei ole väliä, kunhan ovat numeroita.
⋅⋅1. Numeroitu alilista
4. Ja vielä yksi kohta.

⋅⋅⋅Voit kirjoittaa myös listan sisään jäsenneltyä tekstiä, kunhan se on sisennetty oikein.

⋅⋅⋅Jollet halua kappalevaihtoa, käytä kahta välilyöntiä rivin lopussa.⋅⋅
⋅⋅⋅Esimerkiksi tämä rivi on samassa kappaleessa, mutta eri rivillä.⋅⋅

* Numeroimattomissa listoissa voi käyttää tähtiä
- Tai miinuksia
+ Tai vaikka plus-merkkejä
```

1. Ensimmäinen listan jäsen
2. Toinen jäsen.
  * Numeroimaton alilista.
1. Numeroilla sinänsä ei ole väliä, kunhan ovat numeroita.
  1. Numeroitu alilista
4. Ja vielä yksi kohta.

   Voit kirjoittaa myös listan sisään jäsenneltyä tekstiä, kunhan se on sisennetty oikein.

   Jollet halua kappalevaihtoa, käytä kahta välilyöntiä rivin lopussa.  
   Esimerkiksi tämä rivi on samassa kappaleessa, mutta eri rivillä.  

* Numeroimattomissa listoissa voi käyttää tähtiä
- Tai miinuksia
+ Tai vaikka plus-merkkejä

## Linkit

Linkkejä voi luoda kahdella tapaa.

```no-highlight
[Olen tekstin sisällä sijaitseva linkki](https://www.google.com)

[Olen tekstin sisällä sijaitseva linkki jossa on otsikko](https://www.google.com "Googlen kotisivu")

[Olen viittaustyyppinen linkki][Vapaavalintainen viittausteksti]

[Viittaukset voi myös numeroida][1]

Tai jättää numeroimatta ja käyttää vain [linkin tekstiä]

Some text to show that the reference links can follow later.

[Vapaavalintainen viittausteksti]: https://www.mozilla.org
[1]: http://slashdot.org
[linkin tekstiä]: http://www.reddit.com
```

[Olen tekstin sisällä sijaitseva linkki](https://www.google.com)

[Olen tekstin sisällä sijaitseva linkki jossa on otsikko](https://www.google.com "Googlen kotisivu")

[Olen viittaustyyppinen linkki][Vapaavalintainen viittausteksti]

[Viittaukset voi myös numeroida][1]

Tai jättää numeroimatta ja käyttää vain [linkin tekstiä]

Some text to show that the reference links can follow later.

[Vapaavalintainen viittausteksti]: https://www.mozilla.org
[1]: http://slashdot.org
[linkin tekstiä]: http://www.reddit.com

## Kuvat

```no-highlight
Alla Pusheen-Octocat.

Tekstin sisällä:
![tilapäisteksti](https://octodex.github.com/images/pusheencat.png "Kuvateksti")

Viittaustyylisesti:
![tilapäisteksti][pusheencat]

[pusheencat]: https://octodex.github.com/images/pusheencat.png "Kuvateksti"
```

Alla Pusheen-Octocat.

Tekstin sisällä:
![tilapäisteksti](https://octodex.github.com/images/pusheencat.png "Kuvateksti")

Viittaustyylisesti:
![tilapäisteksti][pusheencat]

[pusheencat]: https://octodex.github.com/images/pusheencat.png "Kuvateksti"

## Koodi

Koodilohkot eivät ole tyypillistä Markdownia, mutta monet Markdown-tulkit silti tukevat niitä.

```no-highlight
Tekstin sisäinen `koodi` on `gravis-tarkkeiden sisällä`.
```

Tekstin sisäinen `koodi` on `gravis-tarkkeiden sisällä`.

Koodilohkot rajataan kolmella gravis-tarkkeella (tai sisennetään neljällä välilyönnillä). Tarkkeet ovat helpompia käyttää.

<pre lang="no-highlight"><code>```
Kovasti paljon koodia.
Jopas on!
Paljon, paljon koodia.
```
</code></pre>

```
Kovasti paljon koodia.
Jopas on!
Paljon, paljon koodia.
```

## Taulukot

Taulukotkaan eivät ole tyypillistä Markdownia, mutta monet tulkit tukevat niitä.

```no-highlight
Kaksoispisteitä voi käyttää kolumnien tasauksen vaihtoon

| Taulukot      | On aika          | Kivoi  |
| ------------- |:----------------:| ------:|
| kolumni 3 on  | oikealle tasattu | 16,00€ |
| kolumni 2 on  | keskitetty       |  0,80€ |
| rivit on myös | siistejä         |  1,00€ |

Ulkopuolisiä putkimerkkejä (|) ei tarvitse, eikä raa'an taulukon tarvitse näyttää "kivalta".

Vähemmän | Kaunis | Taulukko
--- | --- | ---
*silti* | **näyttää** | `ekstrakivalta`
1 | 2 | 3

```

Kaksoispisteitä voi käyttää kolumnien tasauksen vaihtoon

| Taulukot      | On aika          | Kivoi  |
| ------------- |:----------------:| ------:|
| kolumni 3 on  | oikealle tasattu | 16,00€ |
| kolumni 2 on  | keskitetty       |  0,80€ |
| rivit on myös | siistejä         |  1,00€ |

Ulkopuolisiä putkimerkkejä (|) ei tarvitse, eikä raa'an taulukon tarvitse näyttää "kivalta".

Vähemmän | Kaunis | Taulukko
--- | --- | ---
*silti* | **näyttää** | `ekstrakivalta`
1 | 2 | 3

## Lainaukset

```no-highlight
> Tässä on lainattua tekstiä.
> Tämä rivi on samaa lainausta.

Hopsaa, toinen lainaus.

> Tämä on kovin pitkä lainaus joka pysyy lainauksena vaikka jatkuisikin toiselle riville tekstissä. Ai niin, näissäkin voi olla **Markdownia!**

```

> Tässä on lainattua tekstiä.
> Tämä rivi on samaa lainausta.

Hopsaa, toinen lainaus.

> Tämä on pitkä lainaus joka pysyy lainauksena vaikka jatkuisikin toiselle 
  riville tekstissä; näissäkin voi olla **Markdownia!**

## HTML:n sisällytys

Voit myös käyttää raakaa HTML:ää Markdown-tekstissä.

```no-highlight
<dl>
  <dt>Määrittelylista</dt>
  <dd>Näitäkin käytetään.</dd>

  <dt>Markdown HTML:ssä</dt>
  <dd>Käytä <em>HTML-merkkausta</em> kun kerran aloitit.</dd>
</dl>
```

<dl>
  <dt>Määrittelylista</dt>
  <dd>Näitäkin käytetään.</dd>

  <dt>Markdown HTML:ssä</dt>
  <dd>Käytä <em>HTML-merkkausta</em> kun kerran aloitit.</dd>
</dl>

## Jakajaviivat

```
Kolme tai enemmän

---

väliviivaa

***

tähteä

___

tai alaviivaa.
```

Kolme tai enemmän

---

väliviivaa

***

tähteä

___

tai alaviivaa.

## Rivinvaihdot

* Kahdella rivinvaihdolla saa aikaan uuden kappaleen. 
* Yksi rivinvaihto kappaleen sisällä pitää uuden rivin samassa kappaleessa.
* Kaksi välilyöntiä rivin lopussa saa aikaan seuraavan rivin olemaan uusi rivi samassa kappaleessa.

