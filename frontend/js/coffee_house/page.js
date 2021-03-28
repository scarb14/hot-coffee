let coffeeHousePage = {
    init: function () {
        this.iniMakingCoffeeBtn();
        this.initChangeCountry();
    },
    initChangeCountry: function () {
        $('.js-country').on('change', function(e) {
            let countryId = $(this).val();
            $('.js-coffee-element').addClass('hidden');
            $('.js-coffee-element[data-country-id="' + countryId + '"]').removeClass('hidden');
        });
    },
    iniMakingCoffeeBtn: function () {
        $('.js-make-coffee').on('click', function(e) {
            let countryId = $('.js-country').val();
            let coffeeId = $('#coffee').data('id');
            let ingredientIds = [];
            $('.js-coffee-element').each(function (index, value) {
                if ($(this).hasClass('hidden')) {
                    return true;
                }
                let checkBox = $(this).find('input');
                if (checkBox.is(':checked')) {
                    ingredientIds.push(checkBox.val());
                }
            });
            $.ajax({
                type: 'POST',
                url: '/coffee_house/hot_coffee/make_coffee',
                data: {
                    county_id: countryId,
                    coffee_id: coffeeId,
                    ingredient_ids: ingredientIds,
                },
                dataType: 'json',
                success: function(data) {
                    if (data.success) {
                        alert(data.message);
                    } else {
                        alert('Произошла ошибка на стороне сервера');
                    }
                },
            });
        });
    },
}