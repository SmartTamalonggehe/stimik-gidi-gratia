import ApexCharts from "apexcharts";

import { getDataTransaksi } from "../../getData";

const chartTransaksi = document.getElementById("chartTransaksi");

const Transaksi = async ({ tahun, bulan }) => {
    const { data_diminta } = await getDataTransaksi({ tahun, bulan });
    // kelompokan berdasarkan persembahan dan jumlahkan

    function addItemSum(items, groupByKeys) {
        const groups = _.groupBy(data_diminta, (obj) => {
            return groupByKeys.map((key) => obj[key]).join("-");
        });

        return _.map(groups, (g) => ({
            ...g[0],
            total: g
                .map((bill) => bill.jumlah)
                .reduce((acc, bill) => bill + acc),
        }));
    }

    const dataGroup = addItemSum(data_diminta, ["persembahan_id"]);
    console.log(dataGroup);

    const categories = [];
    const pemasukan = [];
    const pengeluaran = [];

    dataGroup.forEach((el) => {
        categories.push(el.persembahan.nm_persembahan);
        if (el.jenis_transaksi === "pemasukan") {
            pemasukan.push(el.total);
        } else {
            pemasukan.push(0);
        }
        if (el.jenis_transaksi === "pengeluaran") {
            pengeluaran.push(el.total);
        } else {
            pengeluaran.push(0);
        }
    });

    // clean chart
    chartTransaksi.innerHTML = "";

    showGrafik(categories, pemasukan, pengeluaran);
};

const showGrafik = (categories, pemasukan, pengeluaran) => {
    var options = {
        series: [
            {
                name: "Pemasukan",
                data: pemasukan,
            },
            {
                name: "Pengeluaran",
                data: pengeluaran,
            },
        ],
        chart: {
            type: "bar",
            height: 350,
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "55%",
                endingShape: "rounded",
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"],
        },
        xaxis: {
            categories,
        },
        yaxis: {
            title: {
                text: "$ (thousands)",
            },
        },
        fill: {
            opacity: 1,
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "Rp. " + val;
                },
            },
        },
    };

    var chart = new ApexCharts(chartTransaksi, options);
    chart.render();
};

// selector pilih bulan
const pilih_bulan = document.getElementById("pilih-bulan");
// selector pilih tahun
const pilih_tahun = document.getElementById("pilih-tahun");

pilih_tahun.addEventListener("change", () => {
    const tahun = pilih_tahun.value;
    const bulan = pilih_bulan.value;
    pilihParams({ tahun, bulan });
});
pilih_bulan.addEventListener("change", () => {
    const bulan = pilih_bulan.value;
    const tahun = pilih_tahun.value;
    pilihParams({ tahun, bulan });
});

const pilihParams = ({ tahun, bulan }) => {
    if (tahun && bulan) {
        Transaksi({ tahun, bulan });
    }
};
