getProduct(null);

function getProduct(url) {
    var category = $('input[name="category"]:checked').map(function () {
        return this.value;
    }).get();
    var subcategory = $('input[name="subcategory"]:checked').map(function () {
        return this.value;
    }).get();
    var category1 = $('input[name="category1"]:checked').map(function () {
        return this.value;
    }).get();
    var category2 = $('input[name="category2"]:checked').map(function () {
        return this.value;
    }).get();
    var category3 = $('input[name="category3"]:checked').map(function () {
        return this.value;
    }).get();
    var category4 = $('input[name="category4"]:checked').map(function () {
        return this.value;
    }).get();

    var type_id = $('#type_id').val();
    var user_id = $('#user_id').val();

    if (!url) {
        url = `${base_url}/pengrajin-data`;
    }
    $.ajax({
        url: url,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        data: {
            type_id: type_id,
            user_id: user_id,
            category: category,
            subcategory: subcategory,
            category1: category1,
            category2: category2,
            category3: category3,
            category4: category4,
        },
        success: function (res) {
            var row_data = "";

            $.each(res.data.data, function (index, data) {

                row_data += `<div class="col-xs-12 col-md-3 product-item">
							<div class="product-img">
								<a href="${base_url}/produk-detail/${data.id}/${data.name_slug}"><img src="${base_url}/storage/${data.product_images[0].image}" alt="${data.name}"
										class="img-responsive"></a>
							</div>
							<div class="product-info text-center">
								<div class="link_toko">
									<a class="text-uppercase">${data.user.name}</a>
								</div>
								<h3 class="product-title">
									<a href="${base_url}/produk-detail/${data.id}/${data.name_slug}">${data.name}</a>
								</h3>
								<div class="product-price">
									<span>Rp${data.sell_price_format}</span>
								</div>
							</div>
						</div>`;
            });

            if (res.data.length == 0) {
                row_data += ``;
            }

            $("#row-data").html(row_data);
            $("#pagination").html(res.pagination);
        },
    });
}
