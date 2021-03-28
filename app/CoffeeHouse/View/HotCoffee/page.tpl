<html>
	<head>
		<title>Title</title>
	</head>
	<body>
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
	</body>
</html>