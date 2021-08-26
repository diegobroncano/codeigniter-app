<?php /** @var string $token */ ?>
<h1>Activate your account</h1>

<p>Please click on the button bellow to activate your account:</p>
<a href="<?= site_url('/signup/activate/'.$token); ?>"><button>Activate!</button></a>

<p>If the button doesn't work try this link:</p>
<p><a href="<?= site_url('/signup/activate/'.$token); ?>"><?= site_url('/signup/activate/'.$token); ?></a></p>