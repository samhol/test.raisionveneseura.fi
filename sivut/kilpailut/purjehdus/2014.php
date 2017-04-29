#Purjehduskilpailut <small>vuonna 2014</small>

##Hirsiluoto-Race 7.6. <small>Lähtöaika: 12.30.00</small>

<?php $csvTaulu('purjehduskilpailut/2014/hirsiluoto.csv') ?>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##Virutholm-purjehdus 9.8. <small>Lähtöaika: 11:30:00</small>

<?php $csvTaulu('purjehduskilpailut/2014/virutholm.csv') ?>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##Virutholmin etappikisat

<div class="row small-up-1 medium-up-2">
  <div class="column column-block" markdown="1">
    
###Etappikisa I

1. Jouko Jyrkkiö
2. Matti Niemelä
3. Matti Arpalahti
4. Esko Micelsson
5. Esko Salminen
6. Mikko Kemppainen
7. Timo Päivärinta
8. Calle Fredriksson
9. Arttu Erfe

  </div>
  <div class="column column-block" markdown="1">

###Etappikisa II

1. Jouko Jyrkkiö
2. Esko Micelsson
3. Matti Arpalahti
4. Matti Niemelä
5. Esko Salminen
6. Mikko Kemppainen
7. Calle Fredriksson
8. Timo Päivärinta
9. Arttu Erfe

  </div>
</div>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##RVS-Ranking 2014 <small>vain seuran jäsenille</small>
**Lyhenteet:**
* `Hir.`: Hirsiluoto-Race
* `Vir.`: Virutholm-purjehdus

<?php $csvTaulu('purjehduskilpailut/2014/yht.csv') ?>
<?php $purjehdusKilpailutLinkit(); ?>
