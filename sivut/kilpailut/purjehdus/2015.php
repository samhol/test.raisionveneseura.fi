#Purjehduskilpailut <small>vuonna 2015</small>

##Hirsiluoto-Race 6.6. <small>Lähtöaika: 10:45:00</small>

<?php $csvTaulu('purjehduskilpailut/2015/hirsiluoto.csv') ?>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##Virutholm-purjehdus 8.8. <small>Lähtöaika: 11:15:00</small>

<?php $csvTaulu('purjehduskilpailut/2015/virutholm.csv') ?>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##Virutholmin etappikisat

<div class="row small-up-1 medium-up-2">
  <div class="column column-block" markdown="1">

###Etappikisa I
1. M. Arpalahti
2. J. Jyrkkiö
3. T. Fageström
4. P. Juhansson
5. M. Niemelä
6. J. Salonen
7. S. Kaapro
8. P. Koskinen
9. E. Salmien
10. E. Mickelsson

  </div>
  <div class="column column-block" markdown="1">
    
###Etappikisa II
1. M. Niemelä
2. J. Jyrkkiö
3. P. Johansson
4. M. Arpalahti
5. T. Fageström
6. J. Salonen
7. P. Koskinen
8. S. Kaapro
9. E. Mickelsson
10. E. Salminen

  </div>
</div>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##RVS-Ranking 2015 <small>vain seuran jäsenille</small>
**Lyhenteet:**
* `Hir.`: Hirsiluoto-Race
* `Vir.`: Virutholm-purjehdus

<?php $csvTaulu('purjehduskilpailut/2015/yht.csv') ?>
<?php $purjehdusKilpailutLinkit(); ?>
