<main id="main-details">
    <h2>Détails de <?=$pokemon[0]->getNom()?></h3>
    <section id="pokemon-details">
        <div id="avatar">
            <img src="<?= $this->staticUrl?>/img/<?=$pokemon[0]->getNumero()?>.png" alt="image pokemon">
        </div>
        <aside id="liste-details">
            <h4>#<?= $pokemon[0]->getNumero().' '.$pokemon[0]->getNom()?></h4>

            <?php 
                foreach ($types as $type) {
                    
                    echo '<form action="'.$this->staticUrl.'/types/pokemon/'.$type->getId().'" method="post"><button style="background-color:#'.$type->getColor().'"><p>'.$type->getName().'</p></button></form>';
                }
            ?>

            <h5>Statistiques</h5>
            <?php function getPourcent($base) {
                return $base*100/200;
            }
            ?>
            <div id="stats">
                <div class="stat">
                    <p class="detail-name">PV</p>
                    <p class="detail-score"><?= $pokemon[0]->getPv()?></p>
                    <div class="stat-background">
                        <div class="stat-pv" style="width:<?= getPourcent($pokemon[0]->getPv())?>%">
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <p class="detail-name">Attaque</p>
                    <p class="detail-score"><?= $pokemon[0]->getAttaque()?></p>
                    <div class="stat-background">
                        <div class="stat-att" style="width:<?= getPourcent($pokemon[0]->getAttaque())?>%">
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <p class="detail-name">Défense</p>
                    <p class="detail-score"><?= $pokemon[0]->getDefense()?></p>
                    <div class="stat-background">
                        <div class="stat-def" style="width:<?= getPourcent($pokemon[0]->getDefense())?>%">
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <p class="detail-name">Attaque spé.</p>
                    <p class="detail-score"><?= $pokemon[0]->getAttaque_spe()?></p>
                    <div class="stat-background">
                        <div class="stat-atts" style="width:<?= getPourcent($pokemon[0]->getAttaque_spe())?>%" >
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <p class="detail-name">Défense spé.</p>
                    <p class="detail-score"><?= $pokemon[0]->getDefense_spe()?></p>
                    <div class="stat-background">
                        <div class="stat-defs" style="width:<?= getPourcent($pokemon[0]->getDefense_spe())?>%">
                        </div>
                    </div>
                </div>
                <div class="stat">
                    <p class="detail-name">Vitesse</p>
                    <p class="detail-score"><?= $pokemon[0]->getVitesse()?></p>
                    <div class="stat-background">
                        <div class="stat-vit"   style="width:<?= getPourcent($pokemon[0]->getVitesse())?>%">
                        </div>
                    </div>
                </div>
            </div>

        </aside>
    </section>
</main>