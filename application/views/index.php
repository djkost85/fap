<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Fapalo.ru</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="/public/css/normalize.css">
		<link rel="stylesheet" href="/public/css/icons.css">
		<link rel="stylesheet" href="/public/css/forms.css">
		<link rel="stylesheet" href="/public/css/main.css">
		<link rel="stylesheet" href="/public/css/components.css">
	</head>
	<body>
		
		<div class="layout">
			<div class="logo">
				<a href="/">
					<span>fapalo</span>
				</a>
			</div>
			<div class="sidebar">
				<? if ( $user->id != 0 ): ?>
				<div class="widget widget_userbar">
					<div class="widget_userbar_head">
						<div class="widget_userbar_image">
							<img src="/public/img/user/<?=$user->id ?>_50x50.jpg" alt="" width="30" height="30">
						</div>
						<div class="widget_userbar_name"><?= $user->first_name ?> <?= $user->last_name ?></div>
					</div>
					<div class="widget_userbar_body">
						<div class="widget_userbar_addvideo">
							<a href="/add">Добавить видео</a>
						</div>
						<div class="widget_userbar_exit">
							<a href="/logout">Выход</a>
						</div>
					</div>
				</div>
				<? endif;  ?>
				
				<?/*<div class="widget widget_search">
					<form action="#">
						<input type="search" name="" placeholder="Поиск" tabindex="1">
					</form>
				</div>*/?>
				<div class="widget widget_noborder widget_nav">
					<ul>
						<? foreach ($studios as $studio): ?>
							<li <?= $_SERVER['REQUEST_URI'] == '/studio/'.$studio['name'] ? "class='state_active'" : ""  ?>><a href="<?= $_SERVER['REQUEST_URI'] == '/studio/'.$studio['name'] ? "/" : "/studio/".$studio['name']  ?>"><?= $studio['name'] ?></a></li>
						<? endforeach; ?>
					</ul>
				</div><!-- widget nav -->
				<div class="widget widget_cats">
					<ul>
						<? foreach ($cats as $cat): ?>
							<li <?= $_SERVER['REQUEST_URI'] == '/category/'.$cat['name'] ? "class='state_active'" : ""  ?>><a href="<?= $_SERVER['REQUEST_URI'] == '/category/'.$cat['name'] ? "/" : "/category/".$cat['name'] ?>"><?= $cat['name'] ?></a></li>
						<? endforeach; ?>   
					</ul>
				</div><!-- widget cats -->
				<div class="widget widget_tags">
					<ul>
						<!-- <li class="state_active"><a href="#" class="tag">blonde</a></li> -->
						<? foreach ($tags as $tag): ?>
							<li><a href="#" class="tag"><?= $tag['name'] ?></a></li>
						<? endforeach; ?>  
					</ul>
				</div><!-- widget tags -->
				<? if ( $user->id == 0 ): ?>
				<div class="widget">
					<a href="/auth" class="btn">Личный кабинет</a>
				</div>
				<? endif; ?>
			</div><!-- sidebar -->
			<div class="mainbar<? foreach ($additionalClasses as $class): ?> <?= $class ?> <? endforeach; ?>">
				<?= $content ?>
			</div><!-- mainbar -->
		</div><!-- layout -->


		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="/public/js/plugins.js"></script>
		<script src="/public/js/main.js"></script>

	</body>
</html>