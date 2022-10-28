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
    if (route == "aset_bergerak") {
        document.getElementById("id_form").value = data.id;
        document.getElementById("nama").value = data.nama;
        document.getElementById("jenis_barang").value = data.jenis_barang;
        document.getElementById("jenis_id").value = data.jenis_id;
        document.getElementById("type").value = data.type;
        document.getElementById("merk").value = data.merk;
        document.getElementById("jmlh").value = data.jmlh;
        document.getElementById("ket").value = data.ket;
    }
    if (route == "aset_diam") {
        document.getElementById("id_form").value = data.id;
        document.getElementById("nama").value = data.nama;
        document.getElementById("jenis_id").value = data.jenis_id;
        document.getElementById("ruangan_id").value = data.ruangan_id;
        // $("#ruangan_id").val(data.ruangan_id).trigger("change.select2");
        document.getElementById("merk").value = data.merk;
        document.getElementById("jmlh").value = data.jmlh;
        document.getElementById("satuan").value = data.satuan;
        document.getElementById("ket").value = data.ket;
    }
};
