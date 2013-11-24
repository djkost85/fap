<div class="post">
	<div class="post_thumbnail">
		<iframe src="<?= $video['url'] ?>" width="1016" height="572" frameborder="0"></iframe>
	</div>
	<div class="row">
		<div class="span7 post_main">
			<div class="post_title">
				<h1><?= $video['title'] ?></h1>
				<span class="post_date"><?= $video['date'] ?></span>
			</div>
			<div class="post_info">
				Студия: <a href="/studio/<?= $video['studio_name'] ?>"><?= $video['studio_name'] ?></a>, 
				категория: <a href="/category/<?= $video['cat_name'] ?>"><?= $video['cat_name'] ?></a>, 
				в ролях: 
				<? foreach ($video['actors'] as $actor): ?>
					<a href="#"><?= $actor ?></a>
				<? endforeach; ?>
			</div>
			<div class="post_tags">
				<? foreach ($video['tags'] as $tag): ?>
					<a href="#" class="tag"><?= $tag ?></a>
				<? endforeach; ?>
			</div>
		</div><!-- span6 post main -->
		<div class="span5 post_stats">
			<div class="post_views">Просмотров: <b><?= $video['views'] ?></b></div>
			<div class="post_likes">
			<? if ( $user->id != 0 ): ?>
				<a href="/like-it?type=videos&uid=<?= $user->id ?>&vid=<?= $video['id'] ?>&from=<?= $_SERVER['REQUEST_URI'] ?>" class="like_button <?= $video['user_like_it_early'] ? 'state_active' : '' ?>">
					<span class="like_button_wrap">Мне нравится <i class="fa fa-heart"></i></span>
					<span class="like_button_count"><?= $video['likes'] ?></span>
				</a>
			<? endif; ?>
			</div>
		</div><!-- span6 post stats -->
	</div><!-- row -->
</div><!-- post -->