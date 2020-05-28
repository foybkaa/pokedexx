<main id="main">
    <section id="pokemon-list-all">
        <?php 
            foreach ($arrayToView as $pokemon) {
                echo '<a href="'.$this->staticUrl.'/pokemon/'.$pokemon->getNumero().'"><div class="pokebox"><img src="'.$this->staticUrl.'/img/'.$pokemon->getNumero().'.png" alt="image pokemon">
                      <p>#'.$pokemon->getNumero().' '.$pokemon->getNom().'</p></div></a>';
            }
        ?>
    </section>
</main>