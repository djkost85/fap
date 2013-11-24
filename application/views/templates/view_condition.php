<div class="filter">
	<ul>
		<li class="state_active">
			<a href="#">По рейтингу</a>
		</li>
		<li>
			<a href="#">По просмотрам</a>
		</li>
		<li>
			<a href="#">По дате</a>
		</li>
	</ul>
</div>
<div class="row" id="content">

<? if ($videos_error): ?>
	<p class="error"><?= $videos_error_text ?></p>
<? else: ?>
	
	<? foreach ($videos as $video): ?>

	<div class="post_item span4">
		<div class="post_item_image">
			<img src="/public/img/post1.jpg" alt="">
		</div>
		<a href="/view/<?= $video['url_title'] ?>" class="post_item_outer">
			<div class="post_item_inner">
				<div class="post_item_title"><?= $video['title'] ?></div>
				<div class="post_item_actors">
					<? foreach ($video['actors'] as $actor): ?>
						<?= $actor ?>
					<? endforeach; ?>
				</div>
				<div class="post_item_likes"><?= $video['likes'] ?></div>
			</div>
		</a>
	</div><!-- post item -->

	<? endforeach; ?>

<? endif; ?>

</div><!-- row -->