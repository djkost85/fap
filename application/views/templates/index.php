<div class="filter">
	<div class="row">
	
		<div class="span9 filter_search clearfix">
			<div class="filter_search_field">
				<form action="#">
					<input type="search" name="filter_search" placeholder="Поиск" tabindex="1">
				</form>
			</div>
			<div class="filter_search_title"></div>
		</div>

		<div class="span3 filter_sort">
			<select name="filter_sort">
				<option value="0">Сортируем по рейтингу</option>
				<option value="1">Сортируем по популярности</option>
			</select>
		</div>
	</div>
</div>
<div class="row page_body" id="content">

	<? foreach ($videos as $video): ?>

	<div class="post_item">
		<div class="post_item_image">
			<a href="/view/<?= $video['url_title'] ?>" class="fa fa-play">
				<img src="<?= $video['img_preview'] ?>" alt="">
				<div class="post_item_duration"><?= $video['duration'] ?></div>
			</a>
		</div>
		<div class="post_item_title">
			<a href="/view/<?= $video['url_title'] ?>"><?= $video['title'] ?></a>
		</div>
		<ul class="post_item_info">
			<li class="post_item_views"><?= $video['views'] ?> views</li>
			<li class="post_item_date"><?= $video['date'] ?></li>
		</ul>
	</div><!-- post item -->

	<? endforeach; ?>
	
	
</div><!-- row -->