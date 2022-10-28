import axios from "axios";
import { toastr } from "./tools";
import Swal from "sweetalert2";

// click body selector btn-hapus

$(document).on("click", ".btn-hapus", function (e) {
    e.preventDefault();
    const href = $(this).data("id");
    swalDelete(href);
});

const swalDelete = (href) => {
    Swal.fire({
        title: "Apa anda yakin?",
        text: "Data yang telah dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#007D88",
        cancelButtonColor: "#d33",
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            axios({
                method: "delete",
                url: `/crud/${route}/${href}`,
            })
                .then(function (response) {
                    toastr[response.data.type](
                        response.data.pesan,
                        response.data.judul
                    );
                    let oTable = $("#my_table").dataTable();
                    oTable.fnDraw(false);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    });
};

export default swalDelete;
