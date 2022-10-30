import { getDataTransaksi } from "../../getData";

const hitunSaldo = async () => {
    const data = await getDataTransaksi();
    // hitung pemasukan
    const dtPemasukan = data.pemasukan_sebelumnya;
    console.log(dtPemasukan);
};

hitunSaldo();
