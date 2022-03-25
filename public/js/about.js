var count = 0;

function addValue() {
    var html = `<tr id="row${count}">
                    <td>
                        <input type="text" class="form-control" name="title[]">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="description[]">
                    </td>
                    <td>
                        <button class="btn btn-danger" onclick="$('#row${count}').remove()">-</button>
                    </td>
                </tr>`;

    count++;
    $('#data-detail').append(html);
}


function deleteValue(id) {
    var result = confirm('Apakah anda yakin akan menghapus data ini?');
    if (result) {
        $.ajax({
            url: `${base_url}/about/value/${id}`,
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": token,
            },
            success: function (response) {
                $("#value" + id).remove();
            },
        });
    }
}
