var count = 0;

function getCategory() {
    $('#data-detail').html("");
    var id = $("#type_id").val();
    $.ajax({
        url: `${base_url}/product/category/${id}`,
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        success: function (response) {
            var category = `<option value="">Pilih Kategori</option>`;
            response.map((value) => {
                category += `<option value="${value.id}">${value.name}</option>`;
            });

            $("#category_id").html(category);
            $("#subcategory_id").html("");
        },
    });
}

function getSubcategory() {
    var id = $("#category_id").val();

    $.ajax({
        url: `${base_url}/product/subcategory/${id}`,
        method: "GET",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        success: function (response) {
            var subcategory = `<option value="">Pilih Sub Kategori</option>`;
            response.map((value) => {
                subcategory += `<option value="${value.id}">${value.name}</option>`;
            });

            $("#subcategory_id").html(subcategory);
        },
    });
}

function addProductDetail() {
    var category_id = $("#category_id").val();
    var category_name = $("#category_id").find('option:selected').text();
    var subcategory_id = $("#subcategory_id").val();
    var subcategory_name = $("#subcategory_id").find('option:selected').text();

    if (subcategory_id == "") {
        subcategory_name = "";
    }

    var html = `<tr id="row${count}">
        <td>
            <input type="hidden" name="category_id[]" value="${category_id}">
            ${category_name}
        </td>
        <td>
            <input type="hidden" name="subcategory_id[]" value="${subcategory_id}">
            ${subcategory_name}
        </td>
        <td>
            <button class="btn btn-danger" onclick="$('#row${count}').remove()">-</button>
        </td>
    </tr>`;

    count++;
    $('#data-detail').append(html);
}


function deleteImage(id) {
    $.ajax({
        url: `${base_url}/product/image/destroy`,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        data: {
            id: id,
        },
        success: function (response) {
            $("#image" + id).remove();
        },
    });
}

function deleteDetail(id) {
    $.ajax({
        url: `${base_url}/product/detail/destroy`,
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": token,
        },
        data: {
            id: id,
        },
        success: function (response) {
            $("#detail" + id).remove();
        },
    });
}

function getSellPrice() {
    var price = $('#price').val();
    var disc = $('#disc').val();

    var disc_price = parseFloat(price) * parseFloat(disc) / 100;
    var sell_price = price - disc_price;

    $("#sell_price").val(sell_price);

}
