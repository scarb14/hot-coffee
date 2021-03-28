<div>
	<h2>Заказать кофе</h2>
</div>
<div>
	<label for="country">
		Выберите страну:
	</label>
	<select id="country" name="country">
		<option value="0">Ничего не выбрано</option>
		{foreach $viewData.countries as $country}
			<option value="{$country.id}">{$country.name}</option>
		{/foreach}
	</select>
</div>
<div>
	<h4>Основные ингридиенты:</h4>
	{foreach $viewData.ingredients as $item}
		<div>
			<input type="checkbox" value="{$item.id}" name="{$item.short_name}" id="{$item.short_name}">
			<label for="{$item.short_name}">
				{$item.name}
			</label>
		</div>
	{/foreach}
</div>
<div>
	<h4>Дополнение:</h4>
	{foreach $viewData.additions as $item}
		<div>
			<input type="checkbox" value="{$item.id}" name="{$item.short_name}" id="{$item.short_name}">
			<label for="{$item.short_name}">
				{$item.name}
			</label>
		</div>
	{/foreach}
</div>