import { getDataPersembahan, getDataJenis } from "../getData";
import select2 from "./select2";

const persembahan_id = document.getElementById("persembahan_id");

const selectRuangan = async () => {
    if (persembahan_id) {
        const dataPersembahan = await getDataPersembahan();
        console.log(dataPersembahan);
        persembahan_id.innerHTML = `<option value="" disabled selected>Pilih Persembahan</option>`;
        dataPersembahan.forEach((persembahan) => {
            persembahan_id.innerHTML += `
                <option value="${persembahan.id}">${persembahan.nm_persembahan}</option>
            `;
        });
    }
    select2();
};
const jenis_id = document.getElementById("jenis_id");

const selectJenis = async () => {
    if (jenis_id) {
        const dataJenis = await getDataJenis();
        console.log(dataJenis);
        jenis_id.innerHTML = `<option value="" disabled selected>Pilih Jenis</option>`;
        dataJenis.forEach((jenis) => {
            jenis_id.innerHTML += `
                <option value="${jenis.id}">${jenis.nm_jenis}</option>
            `;
        });
    }
    select2();
};
selectRuangan();
selectJenis();
