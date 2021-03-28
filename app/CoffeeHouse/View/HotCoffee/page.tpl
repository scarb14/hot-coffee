<style>
	.hidden {
		display: none;
	}
</style>
<div>
	<h2>Заказать кофе</h2>
</div>
<div>
	<label for="country">
		Выберите страну:
	</label>
	<select id="country" name="country" class="js-country">
		{foreach $viewData.countries as $country}
			<option
					value="{$country.id}"
					{if $country['name'] === $viewData['default_country_name']}selected{/if}
			>
				{$country.name}
			</option>
		{/foreach}
	</select>
</div>
{foreach $viewData.coffee as $item}
	<div>
		<label
				id="coffee"
				data-id="{$item.id}"
				data-country-id="{$item.country_id}"
				class="js-coffee-element{if $item['country_name'] !== $viewData['default_country_name']} hidden{/if}"
		>
			{$item.name} ({$item.amount} €)
		</label>
	</div>
{/foreach}
<div>
	<h4>Основные ингридиенты:</h4>
	{foreach $viewData.ingredients['Основные'] as $item}
		<div
				data-country-id="{$item.country_id}"
				data-coffee-id="{$item.coffee_id}"
				class="js-coffee-element{if $item['country_name'] !== $viewData['default_country_name']} hidden{/if}"
		>
			<input type="checkbox" value="{$item.id}" name="{$item.short_name}" id="{$item.short_name}">
			<label for="{$item.short_name}">
				{$item.name} ({$item.amount} €)
			</label>
		</div>
	{/foreach}
</div>
<div>
	<h4>Дополнение:</h4>
	{foreach $viewData.ingredients['Дополнительные'] as $item}
		<div
				data-country-id="{$item.country_id}"
				data-coffee-id="{$item.coffee_id}"
				class="js-coffee-element{if $item['country_name'] !== $viewData['default_country_name']} hidden{/if}"
		>
			<input type="checkbox" value="{$item.id}" name="{$item.short_name}" id="{$item.short_name}">
			<label for="{$item.short_name}">
				{$item.name} ({$item.amount} €)
			</label>
		</div>
	{/foreach}
</div>
<div>
	<br>
	<button type="button" class="js-make-coffee">Приготовить кофе</button>
</div>
<script>
	coffeeHousePage.init();
</script>