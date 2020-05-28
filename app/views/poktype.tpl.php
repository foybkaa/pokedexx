<main id="main">
    <section id="pokemon-list-all">
        <?php 
            if(isset($arrayToView)) {
            
                foreach ($arrayToView as $key => $pokemon) {
                    echo '<a href="'.$this->staticUrl.'/pokemon/'.$pokemon[0]->getNumero().'"><div class="pokebox"><img src="'.$this->staticUrl.'/img/'.$pokemon[0]->getNumero().'.png" alt="image pokemon">
                        <p>#'.$pokemon[0]->getNumero().' '.$pokemon[0]->getNom().'</p></div></a>';
                }
            } else {
                echo '<p>Pas de Pokemon de ce type</p>';
            }

        ?>
    </section>
</main>