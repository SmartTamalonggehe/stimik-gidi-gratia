import { getDataPersembahan } from "../getData";
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
selectRuangan();
