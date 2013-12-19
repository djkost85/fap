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
		<meta name="viewport" content="width=818px, initial-scale=1">

		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,700&subset=latin,cyrillic">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
		<link rel="stylesheet" href="/public/css/normalize.css">
		<link rel="stylesheet" href="/public/css/icons.css">
		<link rel="stylesheet" href="/public/css/forms.css">
		<link rel="stylesheet" href="/public/css/main.css">
		<link rel="stylesheet" href="/public/css/components.css">
		<link rel="stylesheet" href="/public/css/responsive.css">

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	</head>
	<body>
		
		<div class="layout">
			<div class="logo">
				<a href="/">
					<span>fapallo</span>
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
				
				<? if ( $catalog ): ?>
				<div class="widget widget_search">
					<form action="#">
						<input type="search" name="" placeholder="Поиск" tabindex="1">
					</form>
				</div>
				<? endif;?>

				<div class="widget widget_noborder widget_nav <?if(count($studios) > 9) echo 'toggle'?>">
					<?if(count($studios) > 9){?>
						<div class="toggle_outer">
							<div class="toggle_inner">
					<?}?>

					<ul class="toggle_wrap">
						<? $i=0; foreach ($studios as $studio): ?>
							<li class='<?= $_SERVER['REQUEST_URI'] == '/studio/'.$studio['name'] ? "state_active" : ""  ?> <?if($i > 9) echo "toggle_item" ?>'><a href="<?= $_SERVER['REQUEST_URI'] == '/studio/'.$studio['name'] ? "/" : "/studio/".$studio['name']  ?>"><?= $studio['name'] ?></a></li>
						<? $i++; endforeach; ?>
					</ul>
					
					<?if(count($studios) > 9){?>
							</div>
							<div class="toggle_open">
								<a href="#">показать еще</a>
							</div>
						</div>
					<?}?>
				</div><!-- widget nav -->
				<div class="widget widget_cats <?if(count($cats) > 9) echo 'toggle'?>">
					<?if(count($cats) > 9){?>
						<div class="toggle_outer">
							<div class="toggle_inner">
					<?}?>

					<ul class="toggle_wrap">
						<? $i=0; foreach ($cats as $cat): ?>
							<li class='<?= $_SERVER['REQUEST_URI'] == '/category/'.$cat['name'] ? "state_active" : ""  ?> <?if($i > 9) echo "toggle_item" ?>'><a href="<?= $_SERVER['REQUEST_URI'] == '/category/'.$cat['name'] ? "/" : "/category/".$cat['name'] ?>"><?= $cat['name'] ?></a></li>
						<? $i++; endforeach; ?>
					</ul>

					<?if(count($cats) > 9){?>
							</div>
							<div class="toggle_open">
								<a href="#">показать еще</a>
							</div>
						</div>
					<?}?>
				</div><!-- widget cats -->
				<div class="widget widget_tags <?if(count($tags) > 9) echo 'toggle'?>">
					<?if(count($tags) > 9){?>
						<div class="toggle_outer">
							<div class="toggle_inner">
					<?}?>

					<ul class="toggle_wrap">
						<? $i=0; foreach ($tags as $tag): ?>
							<li class="<?if($i > 9) echo "toggle_item" ?>"><a href="#" class="tag"><?= $tag['name'] ?></a></li>
						<? $i++; endforeach; ?>
					</ul>

					<?if(count($tags) > 9){?>
							</div>
							<div class="toggle_open">
								<a href="#">показать еще</a>
							</div>
						</div>
					<?}?>
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

		<script src="/public/js/plugins.js"></script>
		<script src="/public/js/main.js"></script>

	</body>
</html>