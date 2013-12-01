<div class="page_head">
	<div class="page_title">Добавление порно-ролика</div>
</div><!-- page head -->
<div class="page_body">
	<form class="form" action="/add" method="post">
		<input type="hidden" name="csrf" value="<?= Security::token(); ?>">
		<div class="form_group form_group_featured">
			<label class="form_group_label" for="add_field_url">Ссылка видео в Вконтакте</label>
			<div class="form_group_controls span8">
				<input type="text" name="url" placeholder="Введите url или iframe ссылку" id="add_field_url" value="<?= $video['url'] ?>">
			</div>
			<div class="form_group_descript">Пример: &lt;iframe src="http://vk.com/video_ext.php?oid=183231915&amp;id=166697716&amp;hash=dad7aec1391585ea&amp;hd=2" width="607" height="360" frameborder="0"&gt;&lt;/iframe&gt;</div>
		</div><!-- control group -->

		<? if ($video['method']): ?>
		<div class="form_group">
			<label class="form_group_label" for="add_field_name">Название видео</label>
			<div class="form_group_controls span8">
				<input type="text" name="title" placeholder="" id="add_field_name" value="<?= $video['title'] ?>">
			</div>
		</div><!-- control group -->
		<div class="form_group">
			<div class="row">
				<div class="span4">
					<label class="form_group_label" for="add_field_studio">Студия</label>
					<div class="form_group_controls">
						<select name="studio" id="add_field_studio">
							<? foreach ($studios as $studio): ?>
							<option value="<?= $studio['id'] ?>"><?= $studio['name'] ?></option>
                            <? endforeach; ?>
						</select>
					</div>
				</div>
				<div class="span4">
					<label class="form_group_label" for="add_field_cat">Категория</label>
					<div class="form_group_controls">
						<select name="cat" id="add_field_cat">
							<? foreach ($cats as $cat): ?>
							<option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                            <? endforeach; ?>
						</select>
					</div>
				</div>
			</div>
		</div><!-- control group -->
		<div class="form_group">
			<label class="form_group_label" for="add_field_actors">Актеры</label>
			<div class="form_group_controls span8">
				<div class="tagit clearfix">
					<ul class="tagit_list">
						<li class="tagit_add">
							<input type="text" id="add_field_actors" maxlength="50">
						</li>
					</ul>
					<input type="hidden" class="tagit_value" name="actors" value="">
				</div>
			</div>
		</div><!-- control group -->
		<div class="form_group">
			<label class="form_group_label" for="add_field_tags">Тэги</label>
			<div class="form_group_controls span8">
				<div class="tagit clearfix">
					<ul class="tagit_list">
						<li class="tagit_add">
							<input type="text" name="" id="add_field_tags" maxlength="50">
						</li>
					</ul>
					<input type="hidden" class="tagit_value" name="tags" value="">
				</div>
			</div>
		</div><!-- control group -->

		<?= $video['preview'] ? '<img src="'.$video['preview'].'"><input type="hidden" name="img_preview" value="'.$video['preview'].'">' : '' ?>
		<?= $video['method'] ? '<input type="hidden" name="method" value="'.$video['method'].'">' : '' ?>
	    <?= $video['duration'] ? '<input type="hidden" name="duration" value="'.$video['duration'].'">' : '' ?>
		
		<? endif; ?>

		<div class="form_actions">
			<div class="form_group_controls span3">
				<button type="submit" class="btn">Добавить видео</button>
			</div>
		</div>

		<script src="/public/js/video.js"></script>
		<script>

			$(function(){

				var video = new Video();

				$("#add_field_url").unbind('keypress paste').on({
					'keyup paste': function(){
						var obj = $(this);
						video.checkUrl(obj.val(), '<?= Security::token(); ?>');
					}
				})
			})

		</script>

	</form>
</div><!-- page body -->
	