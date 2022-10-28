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

const getChart = () => {
    return axios({
        method: "GET",
        url: `/api/chart`,
    })
        .then((res) => {
            return res.data;
        })
        .catch((err) => {
            alert(`Terjadi kesalahan pada server ${err}`);
        });
};

export { getDataJenis, getChart };
