<main id="main-pokbytype">
    <h3>Cliquez sur un type pour voir tous les Pokémons de ce type</h3>
        <section id="type-list-all">
            
            <?php 
                foreach ($arrayToView as $type) {
                    echo '<form action="pokemon/'.$type->getId().'" method="post"><button class="typebox" style="background-color:#'.$type->getColor().'"><p>'.$type->getName().'</p></button></form>';
                }
            ?>
        </section>
</main>