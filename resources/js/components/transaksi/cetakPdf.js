// import toast
import { toastr } from "../../my_crud/tools";

// selector pilih bulan
const pilih_bulan = document.getElementById("pilih-bulan");
// selector pilih tahun
const pilih_tahun = document.getElementById("pilih-tahun");
// selector btn-cetak
const btn_cetak = document.getElementById("btn-cetak");

if (btn_cetak) {
    btn_cetak.addEventListener("click", () => {
        const bulan = pilih_bulan.value;
        const tahun = pilih_tahun.value;

        if (!bulan) {
            toastr["error"]("Bulan harus dipilh", "Pilh Bulan");
        } else if (!tahun) {
            toastr["error"]("Tahun harus dipilih", "Pilh Tahun");
        } else {
            console.log("cetak");
            window
                .open(
                    `/diaken/laporan/pdf/transaksi?bulan=${bulan}&tahun=${tahun}`,
                    "_blank"
                )
                .focus();
        }
    });
}
