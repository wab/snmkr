<?php
// affiche le numéro de version courante du PHP.
echo 'Version PHP courante : ' . phpversion();

// affiche e.g. '2.0' ou rien du tout si cette extension n'est pas active
echo phpversion('tidy');
?>