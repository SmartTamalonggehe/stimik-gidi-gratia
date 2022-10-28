import { setSaveMethod } from "./tools";
import axios from "axios";

$(document).on("click", ".btn-ubah", function (e) {
    e.preventDefault();
    const href = $(this).data("id");
    axios({
        method: "get",
        url: `/crud/${route}/${href}/edit`,
    })
        .then(function (response) {
            // show modal
            $(".tampilModal").modal("show");
            // set save_method
            setSaveMethod("ubah");
            // set attribut form
            document.getElementById("judul_form").innerText = "From Ubah Data";
            document.getElementById("tombolForm").innerText = "Simpan Data";
            // call formData
            formData(response.data);
        })
        .catch(function (error) {
            console.log(error);
        });
});

const formData = (data) => {
    if (route == "jenis") {
        document.getElementById("id_form").value = data.id;
        document.getElementById("nm_jenis").value = data.nm_jenis;
    }
    if (route == "persembahan") {
        document.getElementById("id_form").value = data.id;
        $("#jenis_id").val(data.jenis_id).trigger("change");
        document.getElementById("nm_persembahan").value = data.nm_persembahan;
    }
    if (route == "transaksi") {
        document.getElementById("id_form").value = data.id;
        $("#persembahan_id").val(data.persembahan_id).trigger("change");
        document.getElementById("tgl_transaksi").value = data.tgl_transaksi;
        document.getElementById("uraian").value = data.uraian;
        document.getElementById("jumlah").value = data.jumlah;
    }
};
