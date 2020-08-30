<main class="content">
	<?php
		requireValidSession(true);
		renderTitle('Título Aqui','Subtítulo aqui','icofont-ui-calendar');
		include(TEMPLATE_PATH . "/messages.php");
		isset($message) ? "<script>$('#message').fadeOut(4500);</script>" : '';
	?>
	<div>
		<form class="mb-4" action="#" method="post">
			<div class="input-group">
				<?php if($user->isAdmin): ?>
					<select name="user" class="form-control mr-2" placeholder="Selecione o usuário...">
						<option value="">Selecione o usuário</option>
						<?php
							foreach($users as $user) {
								$selected = $user->codigo === $selectedUserId ? 'selected' : '';
								echo "<option value='{$user->codigo}' {$selected}>{$user->nome}</option>";
							}
						?>
					</select>
				<?php endif ?>
				<select name="period" class="form-control" placeholder="Selecione o período...">
					<?php
						foreach($meses as $key => $month) {
							$selected = $key === $selectedPeriod ? 'selected' : '';
							echo "<option value='{$key}' {$selected}>{$month}</option>";
						}
					?>
				</select>
				<button class="btn btn-primary ml-2">
					<i class="icofont-search"></i>
				</button>
			</div>
		</form>

		<table class="table table-bordered table-striped table-hover">
			<thead>
				<th>Info 1</th>
				<th>Info 2</th>
				<th>Info 3</th>
				<th>Info 4</th>
				<th>Info 5</th>
				<th>Info 6</th>
			</thead>
			<tbody>
				<?php foreach($report as $registry): ?>
					<tr>
						<td><?= 'Coluna 1' ?></td>
						<td><?= 'Coluna 2' ?></td>
						<td><?= 'Coluna 3' ?></td>
						<td><?= 'Coluna 4' ?></td>
						<td><?= 'Coluna 5' ?></td>
						<td><?= 'Coluna 6' ?></td>
					</tr>
				<?php endforeach ?>
				<tr class="bg-primary text-white">
					<td>Texto 1</td>
					<td colspan="3"><?= 'Texto 2' ?></td>
					<td>Texto 3</td>
					<td><?= 'Texto 4' ?></td>
				</tr>
			</tbody>	
		</table>
	</div>
</main>
