#Purjehduskilpailut  <small> vuonna 2016</small>

##Hirsiluoto-Race 18.6. <small>Lähtöaika: 11:15.00</small>

<?php $csvTaulu('purjehduskilpailut/2016/hirsiluoto.csv') ?>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##Virutholm-purjehdus 6.8. <small>Lähtöaika: 11:30:00</small>

<?php $csvTaulu('purjehduskilpailut/2016/virutholm.csv') ?>

<?php echo TAKAISIN_KILPAILUVALIKKOON; ?>

##RVS-Ranking 2016 <small>vain seuran jäsenille</small>

**Lyhenteet:**
* `Hir.`: Hirsiluoto-Race
* `Vir.`: Virutholm-purjehdus

<?php $csvTaulu('purjehduskilpailut/2016/yht.csv'); ?>
<?php $purjehdusKilpailutLinkit(); ?>
