import axios from "axios";

const getDataJenis = async () => {
    try {
        const res = await axios({
            method: "GET",
            url: `/api/jenis`,
        });
        return res.data;
    } catch (err) {
        alert(`Terjadi kesalahan pada server ${err}`);
    }
};
const getDataPersembahan = async () => {
    try {
        const res = await axios({
            method: "GET",
            url: `/api/persembahan`,
        });
        return res.data;
    } catch (err) {
        alert(`Terjadi kesalahan pada server ${err}`);
    }
};

const getDataTransaksi = async () => {
    try {
        const res = await axios({
            method: "GET",
            url: `/api/transaksi/date`,
            params: {
                tahun: 2022,
                bulan: 9,
            },
        });
        return res.data;
    } catch (err) {
        alert(`Terjadi kesalahan pada server ${err}`);
    }
};

export { getDataJenis, getDataPersembahan, getDataTransaksi };
