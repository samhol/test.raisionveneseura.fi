#Purjehduskilpailut <small>vuonna 2012</small>

##Hirsiluoto-Race 26.5. <small>Lähtöaika: 11:30.00</small>

<?php $csvTaulu('purjehduskilpailut/2012/hirsiluoto.csv') ?>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##Virutholm-purjehdus 28.7. <small>Lähtöaika: 13:00:00</small>

<?php $csvTaulu('purjehduskilpailut/2012/virutholm.csv') ?>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

<div class="row small-up-1 medium-up-2">
  <div class="column column-block" markdown="1">

###Etappikisa 1

1. Wilma
2. Felina
3. Lill Marie
4. Crista
5. Iida II
6. Fröökynä

  </div>
  <div class="column column-block" markdown="1">

###Etappikisa 2

1. Lill Marie
2. Felina
3. Wilma
4. Iida II
5. Crista
6. Fröökynä

  </div>
</div>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##RVS-Ranking 2012 <small>vain seuran jäsenille</small>
**Lyhenteet:**
* `Hir.`: Hirsiluoto-Race
* `Vir.`: Virutholm-purjehdus

<?php $csvTaulu('purjehduskilpailut/2012/yht.csv') ?>
<?php $purjehdusKilpailutLinkit(); ?>
