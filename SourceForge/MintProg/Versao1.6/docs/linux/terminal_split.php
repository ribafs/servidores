<?php require_once './header.php'; ?>

<hr><br>
<div class="container">

<h2>Dois softwares que dividem a tela do terminal</h2>

Tanto na vertical quanto na horizontal

<h3>tmux</h3>
<pre>
sudo apt install tmux

    Ctrl-B % for a vertical split (one shell on the left, one shell on the right)
    Ctrl-B" for a horizontal split (one shell at the top, one shell at the bottom)
    Ctrl-B O to make the other shell active
    Ctrl-B ? for help
    Ctrl-B d detach from Tmux, leaving it running in the background (use tmux attach to reenter)
</pre>

<h2>Terminator</h2>

sudo apt install terminator


<?php require_once '../footer.php'; ?>
