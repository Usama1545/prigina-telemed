$(function () {
    const chartData = window.adminDashboardCharts || {};
    const registrations = chartData.registrations || [
        { y: "Jan", doctors: 0, patients: 0 },
        { y: "Feb", doctors: 0, patients: 0 },
        { y: "Mar", doctors: 0, patients: 0 },
        { y: "Apr", doctors: 0, patients: 0 },
        { y: "May", doctors: 0, patients: 0 },
        { y: "Jun", doctors: 0, patients: 0 },
    ];
    const appointments = chartData.appointments || [
        { label: "No Appointments", value: 1 },
    ];

    if ($("#morrisLine").length) {
        window.mL = Morris.Line({
            element: "morrisLine",
            data: registrations,
            xkey: "y",
            ykeys: ["doctors", "patients"],
            labels: ["Doctors", "Patients"],
            lineColors: ["#003a8b", "#ff9d00"],
            lineWidth: 2,
            gridTextSize: 10,
            hideHover: "auto",
            parseTime: false,
            resize: true,
            redraw: true,
        });
    }

    if ($("#morrisAppointments").length) {
        window.mD = Morris.Donut({
            element: "morrisAppointments",
            data: appointments,
            colors: ["#ff9d00", "#003a8b", "#00d0f1", "#e63c3c", "#7c69ef"],
            resize: true,
        });
    }

    $(window).on("resize", function () {
        if (window.mL) {
            window.mL.redraw();
        }

        if (window.mD) {
            window.mD.redraw();
        }
    });
});
