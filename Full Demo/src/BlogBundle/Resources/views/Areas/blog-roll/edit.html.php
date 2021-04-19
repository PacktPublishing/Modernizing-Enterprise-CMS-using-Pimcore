<?php


?>



Number of items: <?= $this->numeric('elements'); ?>

Template: 
        <?= $this->select("template", [
            "store" => [
                ["grid", "Grid"],
                ["list", "List"]
            ],
            "reload" => true
        ]); ?>