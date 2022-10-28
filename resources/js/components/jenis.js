import { getDataJenis } from "../getData";
import select2 from "./select2";

const jenis_id = document.getElementById("jenis_id");

const selectRuangan = async () => {
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
