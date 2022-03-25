getProduct(null);
var priceOrder = "";

function getProduct(url) {
    var user = $('input[name="user"]:checked').map(function () {
        return this.value;
    }).get();
    var type_id = $("#type_id").val();
    var category_id = $("#category_id").val();
    var subcategory_id = $("#subcategory_id").val();

    if (!url) {
        url = `${base_url}/data-produk`;
    }
    $.ajax({
        url: url,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        data: {
            user: user,
            order: priceOrder,
            type_id: type_id,
            category_id: category_id,
            subcategory_id: subcategory_id,
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
									<a href="${base_url}/pengrajin/${data.user.id}/${data.user.name}" class="text-uppercase">${data.user.name}</a>
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

            if (res.data.data.length == 0) {
                row_data += ``;
            }

            $("#row-data").html(row_data);
            $("#pagination").html(res.pagination);
        },
    });
}


function setPriceOrder(reqPriceOrder) {
    priceOrder = reqPriceOrder;
    getProduct(null);
}
