<div class="container">
	<h1>Administration</h1>
	<p>Bienvenue dans la partie administration, <?php if (isset($this->username)) echo $this->username; ?></p>
	<ul class="nav nav-tabs nav-justified">
		<li><a href="/user/admin_bricks">Création de briques</a></li>
		<li><a href="/user/admin_lessons">Création de Leçons</a></li>
		<li><a href="/user/admin_users">Gestion des utilisateurs</a></li>
	</ul>
</div>